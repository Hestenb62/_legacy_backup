// --- GOOGLE DRIVE SYNC LOGIC ---
const CLIENT_ID = '988211241767-n13gda92d0t48la0ibou2jl5cir723nc.apps.googleusercontent.com'; 
const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];
const SCOPES = 'https://www.googleapis.com/auth/drive.file'; 

let tokenClient;
let gapiInited = false;
let gisInited = false;
let gdriveAutoSyncDebounce = null;

function gapiLoaded() {
    gapi.load('client', initializeGapiClient);
}

async function initializeGapiClient() {
    await gapi.client.init({
        discoveryDocs: DISCOVERY_DOCS,
    });
    gapiInited = true;
    maybeEnableButtons();
}

function gisLoaded() {
    tokenClient = google.accounts.oauth2.initTokenClient({
        client_id: CLIENT_ID,
        scope: SCOPES,
        callback: '', // defined at request time
    });
    gisInited = true;
    maybeEnableButtons();
}

function maybeEnableButtons() {
    if (gapiInited && gisInited) {
        const saveBtn = document.getElementById('gdrive-save-btn');
        const loadBtn = document.getElementById('gdrive-load-btn');
        if (saveBtn) saveBtn.disabled = false;
        if (loadBtn) loadBtn.disabled = false;
    }
}

function getAllSiteData() {
    let data = {};
    for (let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i);
        // Exclude internal gapi/sync states to prevent loops
        if (key === 'auto_sync_gdrive' || key.startsWith('gapi')) continue;
        data[key] = localStorage.getItem(key);
    }
    return JSON.stringify(data);
}

function restoreSiteData(jsonString) {
    try {
        let data = typeof jsonString === 'string' ? JSON.parse(jsonString) : jsonString;
        // Temporarily disable auto sync while restoring
        const wasAutoSync = localStorage.getItem('auto_sync_gdrive');
        localStorage.setItem('auto_sync_gdrive', 'false');
        
        for (let key in data) {
            localStorage.setItem(key, data[key]);
        }
        
        if(wasAutoSync === 'true') {
             localStorage.setItem('auto_sync_gdrive', 'true');
        }
        
        alert('Data restored successfully from Google Drive! The page will now reload.');
        window.location.reload();
    } catch (e) {
        alert('Error parsing site data from Drive.');
        console.error(e);
    }
}

async function saveToGoogleDrive(silent = false) {
    if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
        if (!silent) alert('Setup Required: Please replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID.');
        return;
    }
    
    const executeSave = async (resp) => {
        if (resp && resp.error !== undefined) {
            if (!silent) console.error(resp);
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

            let fileContent = getAllSiteData();
            const token = gapi.client.getToken();
            if(!token) return; // Silent fail if no token
            
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
        } catch (err) {
            if (!silent) {
                alert('Error saving to Google Drive: ' + err.message);
                console.error(err);
                const saveBtn = document.getElementById('gdrive-save-btn');
                if (saveBtn) {
                    saveBtn.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Backup to Drive';
                    saveBtn.disabled = false;
                }
            }
        }
    };

    if (gapi.client.getToken() === null) {
        if(!silent) tokenClient.callback = executeSave;
        if(!silent) tokenClient.requestAccessToken({prompt: 'consent'});
    } else {
        tokenClient.callback = executeSave;
        if(!silent) {
            tokenClient.requestAccessToken({prompt: ''});
        } else {
            // Already have token, execute silently
            executeSave();
        }
    }
}

async function loadFromGoogleDrive() {
    if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
        alert('Setup Required: Please replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID.');
        return;
    }

    tokenClient.callback = async (resp) => {
        if (resp.error !== undefined) {
            console.error(resp);
            return;
        }
        try {
            const loadBtn = document.getElementById('gdrive-load-btn');
            const originalText = loadBtn.innerHTML;
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
        tokenClient.requestAccessToken({prompt: 'consent'});
    } else {
        tokenClient.requestAccessToken({prompt: ''});
    }
}

function triggerAutoSync() {
    if (localStorage.getItem('auto_sync_gdrive') === 'true' && gapiInited && gisInited && gapi.client.getToken() !== null) {
        clearTimeout(gdriveAutoSyncDebounce);
        gdriveAutoSyncDebounce = setTimeout(() => {
            saveToGoogleDrive(true);
        }, 3000);
    }
}

// Intercept LocalStorage to trigger auto-sync
const originalSetItem = localStorage.setItem;
localStorage.setItem = function(key, value) {
    originalSetItem.apply(this, arguments);
    if(key !== 'auto_sync_gdrive') {
        triggerAutoSync();
    }
};

const originalRemoveItem = localStorage.removeItem;
localStorage.removeItem = function(key) {
    originalRemoveItem.apply(this, arguments);
    if(key !== 'auto_sync_gdrive') {
        triggerAutoSync();
    }
};
