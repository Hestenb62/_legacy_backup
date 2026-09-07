// --- GOOGLE DRIVE SYNC & AUTO-SYNC ENGINE ---
const CLIENT_ID = '988211241767-n13gda92d0t48la0ibou2jl5cir723nc.apps.googleusercontent.com'; 
const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];
const SCOPES = 'https://www.googleapis.com/auth/drive.file'; 

let tokenClient = null;
let gapiInited = false;
let gisInited = false;
let gdriveAutoSyncDebounce = null;
let isSyncing = false;

// 1. Initialize Google API (gapi)
function gapiLoaded() {
    if (typeof gapi !== 'undefined') {
        gapi.load('client', initializeGapiClient);
    }
}
window.gapiLoaded = gapiLoaded;

async function initializeGapiClient() {
    try {
        await gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
        });
        gapiInited = true;
        maybeEnableButtons();
    } catch (err) {
        console.warn('[GDrive Sync] Error initializing GAPI client:', err);
    }
}

// 2. Initialize Google Identity Services (GIS)
function gisLoaded() {
    if (typeof google !== 'undefined' && google.accounts && google.accounts.oauth2) {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: '', // defined at request time
        });
        gisInited = true;
        maybeEnableButtons();
    }
}
window.gisLoaded = gisLoaded;

// 3. Status UI Management
function updateSyncStatus(text, state) {
    const statusEl = document.getElementById('gdrive-sync-status');
    if (!statusEl) return;
    
    statusEl.textContent = text;
    statusEl.className = 'sync-status-badge ' + (state || 'disabled');

    // Add icon based on state
    if (state === 'synced') {
        statusEl.innerHTML = '<i class="fas fa-check-circle"></i> ' + text;
    } else if (state === 'syncing' || state === 'connecting') {
        statusEl.innerHTML = '<i class="fas fa-sync fa-spin"></i> ' + text;
    } else if (state === 'auth_required') {
        statusEl.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + text;
    } else if (state === 'error') {
        statusEl.innerHTML = '<i class="fas fa-times-circle"></i> ' + text;
    }
}
window.updateSyncStatus = updateSyncStatus;

function maybeEnableButtons() {
    if (gapiInited && gisInited) {
        const saveBtn = document.getElementById('gdrive-save-btn');
        const loadBtn = document.getElementById('gdrive-load-btn');
        const toggle = document.getElementById('gdrive-autosync-toggle');
        if (saveBtn) saveBtn.disabled = false;
        if (loadBtn) loadBtn.disabled = false;
        
        const isAutoSync = localStorage.getItem('auto_sync_gdrive') === 'true';
        if (toggle) {
            toggle.checked = isAutoSync;
        }

        if (isAutoSync) {
            updateSyncStatus('Restoring connection...', 'connecting');
            attemptSilentConnect();
        } else {
            updateSyncStatus('Auto-Sync disabled', 'disabled');
        }
    }
}

// 4. Silent Connection for Auto-Sync on Page Load
function attemptSilentConnect() {
    if (!tokenClient || !gapiInited || !gisInited) return;

    tokenClient.callback = async (resp) => {
        if (resp && !resp.error) {
            console.log('[GDrive Sync] Google session authenticated silently.');
            updateSyncStatus('Connected & Synced', 'synced');
            // Trigger automatic sync verification
            saveToGoogleDrive(true);
        } else {
            console.info('[GDrive Sync] Silent authentication requires user interaction or consent.');
            updateSyncStatus('Sign-in required to sync', 'auth_required');
        }
    };

    try {
        tokenClient.requestAccessToken({ prompt: '' });
    } catch (err) {
        console.warn('[GDrive Sync] Error attempting silent auth:', err);
        updateSyncStatus('Ready to connect', 'disabled');
    }
}

// 5. User Toggle Switch Handler
async function toggleAutoSync(enabled) {
    const toggle = document.getElementById('gdrive-autosync-toggle');
    
    if (enabled) {
        if (!gisInited || !gapiInited) {
            alert('Google Drive services are still loading. Please wait a few moments and try again.');
            if (toggle) toggle.checked = false;
            return;
        }

        const token = (typeof gapi !== 'undefined' && gapi.client) ? gapi.client.getToken() : null;
        
        if (!token) {
            updateSyncStatus('Waiting for Google authorization...', 'connecting');
            tokenClient.callback = async (resp) => {
                if (resp && resp.error) {
                    console.warn('[GDrive Sync] Authorization cancelled or failed:', resp);
                    localStorage.setItem('auto_sync_gdrive', 'false');
                    if (toggle) toggle.checked = false;
                    updateSyncStatus('Sign-in cancelled', 'error');
                    return;
                }
                localStorage.setItem('auto_sync_gdrive', 'true');
                if (toggle) toggle.checked = true;
                updateSyncStatus('Syncing to Google Drive...', 'syncing');
                await saveToGoogleDrive(true);
                updateSyncStatus('Connected & Synced', 'synced');
            };
            tokenClient.requestAccessToken({ prompt: 'consent' });
        } else {
            localStorage.setItem('auto_sync_gdrive', 'true');
            updateSyncStatus('Syncing to Google Drive...', 'syncing');
            await saveToGoogleDrive(true);
            updateSyncStatus('Connected & Synced', 'synced');
        }
    } else {
        localStorage.setItem('auto_sync_gdrive', 'false');
        updateSyncStatus('Auto-Sync disabled', 'disabled');
    }
}
window.toggleAutoSync = toggleAutoSync;

// 6. Data Serialization
function getAllSiteData() {
    let data = {};
    const ignoredPrefixes = ['auto_sync_gdrive', 'gapi', 'google', 'gdrive_'];
    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i);
        if (!key) continue;
        const isIgnored = ignoredPrefixes.some(prefix => key.startsWith(prefix) || key === prefix);
        if (isIgnored) continue;
        data[key] = localStorage.getItem(key);
    }
    return JSON.stringify(data);
}
window.getAllSiteData = getAllSiteData;

function restoreSiteData(jsonString) {
    try {
        let data = typeof jsonString === 'string' ? JSON.parse(jsonString) : jsonString;
        const wasAutoSync = localStorage.getItem('auto_sync_gdrive');
        localStorage.setItem('auto_sync_gdrive', 'false');
        
        for (let key in data) {
            localStorage.setItem(key, data[key]);
        }
        
        if (wasAutoSync === 'true') {
            localStorage.setItem('auto_sync_gdrive', 'true');
        }
        
        alert('Data restored successfully from Google Drive! The page will now reload.');
        window.location.reload();
    } catch (e) {
        alert('Error parsing site data from Drive.');
        console.error(e);
    }
}

// 7. Save to Google Drive
async function saveToGoogleDrive(silent = false) {
    if (isSyncing) return;
    isSyncing = true;

    const executeSave = async (resp) => {
        if (resp && resp.error !== undefined) {
            if (!silent) console.error(resp);
            isSyncing = false;
            updateSyncStatus('Sync error: ' + (resp.error || 'Auth failed'), 'error');
            return;
        }
        try {
            const saveBtn = document.getElementById('gdrive-save-btn');
            let originalText = '';
            if (saveBtn && !silent) {
                originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                saveBtn.disabled = true;
            }
            if (silent) {
                updateSyncStatus('Syncing to Drive...', 'syncing');
            }

            let fileContent = getAllSiteData();
            const token = gapi.client.getToken();
            if (!token) {
                isSyncing = false;
                return;
            }
            
            const accessToken = token.access_token;

            const response = await gapi.client.drive.files.list({
                fields: 'files(id, name)',
                pageSize: 10,
                q: "name='hestens_learning_data.json' and trashed=false"
            });
            const files = response.result.files;
            
            let fileId;

            if (files && files.length > 0) {
                fileId = files[0].id;
            } else {
                const metaResponse = await fetch('https://www.googleapis.com/drive/v3/files', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + accessToken,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: 'hestens_learning_data.json'
                    })
                });
                const metaData = await metaResponse.json();
                fileId = metaData.id;
            }

            await fetch('https://www.googleapis.com/upload/drive/v3/files/' + fileId + '?uploadType=media', {
                method: 'PATCH',
                headers: {
                    'Authorization': 'Bearer ' + accessToken,
                    'Content-Type': 'application/json'
                },
                body: fileContent
            });
            
            if (saveBtn && !silent) {
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
                alert('Site data backed up to your Google Drive seamlessly!');
            }
            updateSyncStatus('Connected & Synced', 'synced');
        } catch (err) {
            console.error('[GDrive Sync] Save error:', err);
            updateSyncStatus('Error syncing data', 'error');
            if (!silent) {
                alert('Error saving to Google Drive: ' + err.message);
                const saveBtn = document.getElementById('gdrive-save-btn');
                if (saveBtn) {
                    saveBtn.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Backup to Drive';
                    saveBtn.disabled = false;
                }
            }
        } finally {
            isSyncing = false;
        }
    };

    const currentToken = (typeof gapi !== 'undefined' && gapi.client) ? gapi.client.getToken() : null;
    if (currentToken === null) {
        tokenClient.callback = executeSave;
        if (!silent) {
            tokenClient.requestAccessToken({ prompt: 'consent' });
        } else {
            // Attempt silent auth for background auto-sync
            try {
                tokenClient.requestAccessToken({ prompt: '' });
            } catch (e) {
                isSyncing = false;
            }
        }
    } else {
        tokenClient.callback = executeSave;
        executeSave();
    }
}
window.saveToGoogleDrive = saveToGoogleDrive;

// 8. Load / Restore from Google Drive
async function loadFromGoogleDrive() {
    tokenClient.callback = async (resp) => {
        if (resp && resp.error !== undefined) {
            console.error(resp);
            return;
        }
        try {
            const loadBtn = document.getElementById('gdrive-load-btn');
            const originalText = loadBtn ? loadBtn.innerHTML : '';
            if (loadBtn) {
                loadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                loadBtn.disabled = true;
            }

            const response = await gapi.client.drive.files.list({
                fields: 'files(id, name)',
                pageSize: 10,
                q: "name='hestens_learning_data.json' and trashed=false"
            });
            const files = response.result.files;
            
            if (files && files.length > 0) {
                const fileResponse = await gapi.client.drive.files.get({
                    fileId: files[0].id,
                    alt: 'media'
                });
                restoreSiteData(fileResponse.body);
            } else {
                alert('No saved data found in your Google Drive. Try backing it up first!');
            }
            if (loadBtn) {
                loadBtn.innerHTML = originalText;
                loadBtn.disabled = false;
            }
        } catch (err) {
            alert('Error loading from Google Drive: ' + err.message);
            console.error(err);
            const loadBtn = document.getElementById('gdrive-load-btn');
            if (loadBtn) {
                loadBtn.innerHTML = '<i class="fas fa-cloud-download-alt"></i> Restore from Drive';
                loadBtn.disabled = false;
            }
        }
    };

    if (gapi.client.getToken() === null) {
        tokenClient.requestAccessToken({ prompt: 'consent' });
    } else {
        tokenClient.requestAccessToken({ prompt: '' });
    }
}
window.loadFromGoogleDrive = loadFromGoogleDrive;

// 9. Auto-Sync Trigger & Event Listeners
function triggerAutoSync() {
    if (localStorage.getItem('auto_sync_gdrive') !== 'true') return;
    if (!gapiInited || !gisInited) return;

    clearTimeout(gdriveAutoSyncDebounce);
    gdriveAutoSyncDebounce = setTimeout(async () => {
        const token = (typeof gapi !== 'undefined' && gapi.client) ? gapi.client.getToken() : null;
        if (token !== null) {
            await saveToGoogleDrive(true);
        } else {
            attemptSilentConnect();
        }
    }, 2000);
}
window.triggerAutoSync = triggerAutoSync;

// Intercept LocalStorage changes to trigger real-time background sync
const originalSetItem = localStorage.setItem;
localStorage.setItem = function(key, value) {
    originalSetItem.apply(this, arguments);
    const ignoredPrefixes = ['auto_sync_gdrive', 'gapi', 'google', 'gdrive_', 'dev_fallback_query'];
    const isIgnored = ignoredPrefixes.some(prefix => key.startsWith(prefix) || key === prefix);
    if (!isIgnored) {
        triggerAutoSync();
    }
};

const originalRemoveItem = localStorage.removeItem;
localStorage.removeItem = function(key) {
    originalRemoveItem.apply(this, arguments);
    const ignoredPrefixes = ['auto_sync_gdrive', 'gapi', 'google', 'gdrive_', 'dev_fallback_query'];
    const isIgnored = ignoredPrefixes.some(prefix => key.startsWith(prefix) || key === prefix);
    if (!isIgnored) {
        triggerAutoSync();
    }
};

// Also listen for settings-changed custom events dispatched by the A11y controller
window.addEventListener('settings-changed', () => {
    triggerAutoSync();
});
