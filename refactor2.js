const fs = require('fs');
const path = require('path');

const studentDir = path.join(__dirname, 'student');
const files = fs.readdirSync(studentDir)
  .filter(f => (f.startsWith('math-') || f.startsWith('science-') || f.startsWith('social-')) && !f.endsWith('math-resources.php'))
  .map(f => path.join(studentDir, f));

const scriptHtml = `
<div id="no-results-state" class="no-results-box" style="display: none;">
    <i class="fas fa-search-minus no-results-icon"></i>
    <h3 class="no-results-title">No matching topics found</h3>
    <p class="no-results-desc">Try checking your spelling.</p>
    <button id="reset-search-btn" class="reset-search-btn">Reset Search</button>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("topic-search");
    const clearBtn = document.getElementById("clear-search");
    const filterTabs = document.querySelectorAll(".filter-tab");
    const cards = document.querySelectorAll(".resource-card");
    const noResultsState = document.getElementById("no-results-state");
    const resetBtn = document.getElementById("reset-search-btn");
    let currentCategory = "all";
    let searchQuery = "";
    function applyFilters() {
        let visibleCardsCount = 0;
        cards.forEach(card => {
            const cardCategory = card.getAttribute("data-card-category");
            const categoryMatch = currentCategory === "all" || cardCategory === currentCategory;
            const pills = card.querySelectorAll(".topic-pill");
            let matchingPillsInCard = 0;
            pills.forEach(pill => {
                const text = pill.textContent.toLowerCase();
                const terms = pill.getAttribute("data-search-terms").toLowerCase();
                const textMatch = text.includes(searchQuery) || terms.includes(searchQuery);
                if (textMatch) { pill.style.display = "block"; matchingPillsInCard++; }
                else { pill.style.display = "none"; }
            });
            const shouldBeVisible = categoryMatch && (searchQuery === "" || matchingPillsInCard > 0);
            if (shouldBeVisible) { card.style.display = "flex"; visibleCardsCount++; }
            else { card.style.display = "none"; }
        });
        if (visibleCardsCount === 0) {
            noResultsState.style.display = "block";
            document.getElementById("topics-grid").style.display = "none";
        } else {
            noResultsState.style.display = "none";
            document.getElementById("topics-grid").style.display = "grid";
        }
    }
    if (searchInput) searchInput.addEventListener("input", (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        clearBtn.style.display = searchQuery.length > 0 ? "block" : "none";
        applyFilters();
    });
    if (clearBtn) clearBtn.addEventListener("click", () => {
        searchInput.value = ""; searchQuery = "";
        clearBtn.style.display = "none"; searchInput.focus();
        applyFilters();
    });
    filterTabs.forEach(tab => {
        tab.addEventListener("click", () => {
            filterTabs.forEach(t => { t.classList.remove("active"); t.setAttribute("aria-selected", "false"); });
            tab.classList.add("active"); tab.setAttribute("aria-selected", "true");
            currentCategory = tab.getAttribute("data-category"); applyFilters();
        });
    });
    if (resetBtn) resetBtn.addEventListener("click", () => {
        searchInput.value = ""; searchQuery = ""; clearBtn.style.display = "none";
        currentCategory = "all";
        filterTabs.forEach(t => {
            t.classList.remove("active"); t.setAttribute("aria-selected", "false");
            if (t.getAttribute("data-category") === "all") { t.classList.add("active"); t.setAttribute("aria-selected", "true"); }
        });
        applyFilters();
    });
});
</script>
`;

for (const file of files) {
  let content = fs.readFileSync(file, 'utf-8');

  if (content.includes('resource-grid')) {
    continue;
  }

  content = content.replace(/<link rel="stylesheet" href="\/assets\/css\/pages\/student-hub\.css">/g, '<link rel="stylesheet" href="/assets/css/pages/student-resources.css">');

  const headerMatch = content.match(/<h1[^>]*>(.*?)<\/h1>\s*<p[^>]*>(.*?)<\/p>/s);
  let title = '', subtitle = '';
  
  if (!headerMatch) {
    const backupMatch = content.match(/<h1[^>]*>(.*?)<\/h1>/);
    if (backupMatch) {
      title = backupMatch[1].replace(/<[^>]+>/g, '');
      subtitle = 'Resources for ' + title;
    } else {
      continue;
    }
  } else {
    title = headerMatch[1].replace(/<[^>]+>/g, '');
    subtitle = headerMatch[2].replace(/<[^>]+>/g, '');
  }

  const newHeader = `<div class="resource-header">
    <h1 class="resource-title">${title}</h1>
    <p class="resource-subtitle">${subtitle}</p>
    <div class="search-filter-container">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="topic-search" placeholder="Search topics..." aria-label="Search topics">
            <button id="clear-search" class="clear-btn" aria-label="Clear search" style="display: none;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="filter-tabs" role="tablist">
            <button class="filter-tab active" data-category="all" role="tab" aria-selected="true">All Topics</button>
        </div>
    </div>
</div>
<div class="resource-grid" id="topics-grid">`;

  content = content.replace(/<h1[^>]*>.*?<div class="student-hub-grid">/s, newHeader);
  content = content.replace(/student-hub-card-title/g, 'resource-card-title');
  content = content.replace(/student-hub-card-desc/g, 'resource-card-desc');
  content = content.replace(/student-hub-card-btn/g, 'card-action-btn');
  // Handle some inline tailwind classes in card titles/btns that might exist
  content = content.replace(/<h5 class="[^"]*text-xl[^"]*">/g, '<h5 class="resource-card-title">');
  content = content.replace(/<a href="[^"]*" class="[^"]*bg-red-600[^"]*">/g, (match) => {
      let url = match.match(/href="([^"]*)"/)[1];
      return `<a href="${url}" class="card-action-btn">`;
  });
  content = content.replace(/<a href="[^"]*" class="[^"]*bg-yellow-500[^"]*">/g, (match) => {
      let url = match.match(/href="([^"]*)"/)[1];
      return `<a href="${url}" class="card-action-btn">`;
  });

  // Replace lists with pills
  content = content.replace(/<ul class="student-hub-card-list">(.*?)<\/ul>/gs, (match, inner) => {
    let pills = [];
    let links = [...inner.matchAll(/<a[^>]*onclick="openDynamicModal\('([^']+)'\)[^>]*>.*?<\/a>/g)];
    if (links.length === 0) {
      let fallbackLinks = [...inner.matchAll(/<a[^>]*>(.*?)<\/a>/g)];
      for (let l of fallbackLinks) {
        let t = l[1].replace(/<i.*?><\/i>/, '').trim();
        let st = t.replace(/<[^>]+>/g, '').trim().toLowerCase();
        pills.push(`<button onclick="openDynamicModal('${t}'); return false;" class="topic-pill" data-search-terms="${st}">${t}</button>`);
      }
    } else {
      for (let l of links) {
        let t = l[1].trim();
        let st = t.toLowerCase();
        pills.push(`<button onclick="openDynamicModal('${t}'); return false;" class="topic-pill" data-search-terms="${st}">${t}</button>`);
      }
    }
    return `<div class="pills-container">\n${pills.join('\n')}\n</div>`;
  });

  content = content.replace(/<div class="(?:student-hub-card|bg-card-bg[^>]*)\">/g, '<div class="resource-card" data-card-category="all">');

  if (content.includes('</main>')) {
    content = content.replace('</main>', scriptHtml + '</main>');
  }

  // Determine icon class based on file name for variety
  let iconClass = 'math';
  if (file.includes('science')) iconClass = 'science';
  if (file.includes('social')) iconClass = 'social';

  content = content.replace(/<h5 class="resource-card-title">\s*<i class="(.*?)".*?><\/i>\s*(.*?)<\/h5>/g, 
    `<div class="resource-card-header"><div class="resource-card-icon ${iconClass}"><i class="$1"></i></div><h2 class="resource-card-title">$2</h2></div>`);

  fs.writeFileSync(file, content, 'utf-8');
}
