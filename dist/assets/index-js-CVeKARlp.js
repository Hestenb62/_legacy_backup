let v=[],L=[],E="all";function U(){try{v=JSON.parse(localStorage.getItem("hl_completed_levels")||"[]"),L=JSON.parse(localStorage.getItem("hl_bookmarked_levels")||"[]")}catch(e){console.error(e)}}function R(){localStorage.setItem("hl_completed_levels",JSON.stringify(v)),localStorage.setItem("hl_bookmarked_levels",JSON.stringify(L))}function j(){const e=typeof learningLevels<"u"?learningLevels.length:0,t=v.length,s=e?Math.round(t/e*100):0,a=document.getElementById("user-progress-stat");a&&(a.textContent=s+"%")}function V(e){E=e}function z(e){v.includes(e)||v.push(e)}function X(e){const t=v.indexOf(e);t>-1&&v.splice(t,1)}function K(e){L.includes(e)||L.push(e)}function Q(e){const t=L.indexOf(e);t>-1&&L.splice(t,1)}function P(e,t,s=!1){if(V(t),document.querySelectorAll(".path-tab").forEach(a=>{a.classList.remove("active"),a.setAttribute("aria-selected","false")}),e&&e.classList.contains("path-tab")&&(e.classList.add("active"),e.setAttribute("aria-selected","true")),document.querySelectorAll(".path-card").forEach(a=>{a.classList.remove("journey-path-active","ring-4","ring-primary/20")}),t!=="all"&&e&&e.classList.contains("path-card")&&e.classList.add("journey-path-active","ring-4","ring-primary/20"),B(),s){const a=document.getElementById("main-content");a&&a.scrollIntoView({behavior:"smooth",block:"start"})}}function B(){const e=document.getElementById("level-search"),t=e?e.value.toLowerCase().trim():"",s=document.querySelectorAll(".level-card"),a=document.getElementById("clear-search");let o=0;a&&(t?a.classList.remove("hidden"):a.classList.add("hidden")),s.forEach(i=>{const h=i.dataset.category,x=i.dataset.id;let g=!1;E==="all"?g=h!=="extra"||x==="test-section":E==="extra"?g=h==="extra"&&x!=="test-section":g=h===E;const S=!t||i.dataset.title&&i.dataset.title.toLowerCase().includes(t)||i.dataset.desc&&i.dataset.desc.toLowerCase().includes(t)||i.dataset.keywords&&i.dataset.keywords.toLowerCase().includes(t);g&&S?(i.classList.remove("hidden"),i.style.display="flex",o++):(i.classList.add("hidden"),i.style.display="none")});const n=document.getElementById("level-grid"),m=document.getElementById("no-results"),l=document.getElementById("results-count"),u=document.getElementById("section-title");n&&m&&(o===0?(n.classList.add("hidden"),m.classList.remove("hidden")):(n.classList.remove("hidden"),m.classList.add("hidden")));const k={all:"Full Journey",elem:"Elementary Path",middle:"Middle School Path",high:"High School Path",extra:"Extra Resources"};u&&(u.textContent=k[E]||"Academic Path"),l&&(l.textContent=`${o} levels available`)}function Z(){const e=document.getElementById("level-search");e&&(e.value=""),P(null,"all")}const q={elem:{icon_bg:"theme-elem-bg",icon_text:"theme-elem-text",label:"Elementary"},middle:{icon_bg:"theme-middle-bg",icon_text:"theme-middle-text",label:"Middle School"},high:{icon_bg:"theme-high-bg",icon_text:"theme-high-text",label:"High School"},extra:{icon_bg:"theme-extra-bg",icon_text:"theme-extra-text",label:"Extra"}};function ee(e){const t=document.getElementById("level-grid");if(!t)return;t.innerHTML=e.map((a,o)=>{const n=q[a.category]||q.elem,m=a.keywords?a.keywords.toLowerCase():"",l=a.title.replace(/'/g,"\\'"),u=a.description.replace(/'/g,"\\'");return`
        <article class="level-card group relative flex flex-col h-full animate-reveal"
            style="animation-delay: ${o*50}ms"
            data-category="${a.category}"
            data-display-title="${a.title}"
            data-title="${a.title.toLowerCase()}"
            data-desc="${a.description}"
            data-keywords="${m}"
            data-icon="${a.icon}"
            data-doc="${encodeURIComponent(a.documentation||"")}"
            data-id="${a.id}">

            <div class="level-card-inner">
                <div class="level-card-glow group-hover-glow"></div>
                
                <div class="level-card-header">
                    <div class="level-card-title-group">
                        <div class="level-card-icon ${n.icon_bg} ${n.icon_text}">
                            <i class="${a.icon}"></i>
                        </div>
                        <div>
                            <h3 class="level-card-title">${a.title}</h3>
                            <span class="level-card-category">${n.label}</span>
                        </div>
                    </div>
                    <div class="level-card-actions">
                        <button type="button" class="bookmark-btn level-action-btn"
                            onclick="window.hl.toggleBookmark('${a.id}', this)" aria-label="Bookmark ${a.title}">
                            <i class="far fa-star"></i>
                        </button>
                        <button type="button" class="complete-btn level-action-btn"
                            onclick="window.hl.toggleCompletion('${a.id}', this)" aria-label="Mark ${a.title} as Complete">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

                <p class="level-card-desc">${a.description}</p>

                <div class="level-card-footer">
                    <button type="button" aria-haspopup="dialog" class="level-doc-btn"
                        onclick="window.hl.openDocModal(this)">
                        <i class="fas fa-book-open"></i> Curriculum
                    </button>
                    <div class="level-card-links">
                        <button type="button" class="level-listen-btn"
                            onclick="window.hl.speakCard(this, '${l}', '${u}')" aria-label="Listen to description">
                            <i class="fas fa-volume-up"></i>
                        </button>
                        <a href="${a.link}" aria-label="Explore ${a.title}" class="level-open-btn">
                            <span>Open</span>
                            <i class="fas fa-arrow-right icon-sm"></i>
                        </a>
                    </div>
                </div>
                <div class="completion-bar"></div>
            </div>
        </article>`}).join(""),te();const s=new IntersectionObserver(a=>{a.forEach(o=>{o.isIntersecting&&(o.target.classList.add("animate-reveal"),s.unobserve(o.target))})},{threshold:.1});document.querySelectorAll(".level-card").forEach(a=>{s.observe(a)}),B()}function te(){v.forEach(e=>{const t=document.querySelector(`.level-card[data-id="${e}"]`);t&&T(t,!0)}),L.forEach(e=>{const t=document.querySelector(`.level-card[data-id="${e}"] .bookmark-btn`);t&&G(t,!0)}),N()}function T(e,t){const s=e.querySelector(".completion-bar"),a=e.querySelector(".complete-btn"),o=e.querySelector(".level-card-inner");t?(s&&(s.style.width="100%"),a&&(a.classList.add("btn-completed"),a.innerHTML='<i class="fas fa-check text-sm"></i>'),o&&o.classList.add("card-completed")):(s&&(s.style.width="0%"),a&&(a.classList.remove("btn-completed"),a.innerHTML='<i class="fas fa-check text-sm"></i>'),o&&o.classList.remove("card-completed"))}function G(e,t){t?(e.classList.add("btn-bookmarked"),e.innerHTML='<i class="fas fa-star text-sm"></i>'):(e.classList.remove("btn-bookmarked"),e.innerHTML='<i class="far fa-star text-sm"></i>')}function ae(e){const t=e.getBoundingClientRect(),s=(t.left+t.width/2)/window.innerWidth,a=(t.top+t.height/2)/window.innerHeight;typeof window.triggerConfetti=="function"&&window.triggerConfetti({x:s,y:a})}function N(){const e=document.getElementById("resume-banner");if(!e)return;const s=Array.from(document.querySelectorAll(".level-card")).find(a=>!v.includes(a.dataset.id));if(s&&v.length>0){const a=s.querySelector("h3").textContent.trim();document.getElementById("next-level-name").textContent=a;const o=s.querySelector("a").href,n=document.getElementById("resume-click-area");n&&(n.onclick=()=>window.location.href=o),e.classList.remove("hidden"),e.classList.add("animate-reveal")}else e.classList.add("hidden")}function se(){const e=new Date().getHours(),t=document.getElementById("hero-dynamic-greeting");if(!t)return;let s="THE LEARNING ODYSSEY";e<12?s="Good Morning Odyssey":e<18?s="Good Afternoon Journey":s="Good Evening Odyssey",t.textContent=s.toUpperCase()}function oe(e,t,s){if("speechSynthesis"in window){window.speechSynthesis.speaking&&window.speechSynthesis.cancel();const a=new SpeechSynthesisUtterance(t+". "+s);window.speechSynthesis.speak(a)}}function ne(e,t){let s;return function(...a){const o=this;clearTimeout(s),s=setTimeout(()=>e.apply(o,a),t)}}function ce(){const e=localStorage.getItem("hl_last_visit"),t=parseInt(localStorage.getItem("hl_streak")||"0"),s=new Date().toDateString(),a=document.getElementById("streak-stat");if(a)if(e===s)a.textContent=t;else if(e){const o=new Date;if(o.setDate(o.getDate()-1),e===o.toDateString()){const n=t+1;localStorage.setItem("hl_streak",n),a.textContent=n,localStorage.setItem("hl_last_visit",s)}else localStorage.setItem("hl_streak",1),a.textContent=1,localStorage.setItem("hl_last_visit",s)}else localStorage.setItem("hl_streak",1),a.textContent=1,localStorage.setItem("hl_last_visit",s)}function le(e,t){const s=t.closest(".level-card");v.indexOf(e)===-1?(z(e),ae(t),T(s,!0)):(X(e),T(s,!1)),R(),j(),N()}function ie(e,t){L.indexOf(e)===-1?(K(e),G(t,!0)):(Q(e),G(t,!1)),R()}function de(e){const t=e.closest(".level-card"),s=t.dataset.displayTitle,a=t.dataset.desc,o=t.dataset.icon,n=decodeURIComponent(t.dataset.doc),m=t.dataset.category,l=document.getElementById("doc-modal"),u=document.getElementById("modal-container"),k=l.querySelector(".doc-modal-content"),i={elem:{color:"#14b8a6",bg:"rgba(20, 184, 166, 0.1)",text:"Elementary Path"},middle:{color:"#f59e0b",bg:"rgba(245, 158, 11, 0.1)",text:"Middle School Path"},high:{color:"#e11d48",bg:"rgba(225, 29, 72, 0.1)",text:"High School Path"},extra:{color:"#7c3aed",bg:"rgba(124, 58, 237, 0.1)",text:"Extra Resources"}},h=i[m]||i.elem;u.style.borderTopColor=h.color,document.documentElement.style.setProperty("--color-primary",h.color),document.documentElement.style.setProperty("--color-primary-rgb",m==="elem"?"20, 184, 166":m==="middle"?"245, 158, 11":m==="high"?"225, 29, 72":"124, 58, 237");const x=document.getElementById("modal-icon-container");x.style.backgroundColor=h.bg,document.getElementById("modal-title").textContent=s,document.getElementById("modal-subtitle").textContent=h.text,document.getElementById("modal-icon").className=o,document.getElementById("modal-icon").style.color=h.color,document.getElementById("modal-desc").textContent=a;const g=document.getElementById("modal-docs");let S=[];const A=window.currentSettings&&window.currentSettings.curriculum||"engageny",F=A==="engageny"?"ccss":A,D={"Pre-K":"Pre-K",Kindergarten:"Kindergarten","Grade 1":"1st Grade","Grade 2":"2nd Grade","Grade 3":"3rd Grade","Grade 4":"4th Grade","Grade 5":"5th Grade","Grade 6":"6th Grade","Grade 7":"7th Grade","Grade 8":"8th Grade","Grade 9":"9th Grade","Grade 10":"10th Grade","Grade 11":"11th Grade","Grade 12":"12th Grade"}[s]||s;if(typeof window.curriculumData<"u"&&["math","ela","science","social"].forEach(d=>{const c=window.curriculumData[d],r=c&&c.grades&&c.grades[D]?c.grades[D]:null;if(r){const y=r[F]||r.ccss||r.teks||r.custom;y&&S.push({key:d,name:d==="math"?"Mathematics":d==="ela"?"English Language Arts":c.desc?d.charAt(0).toUpperCase()+d.slice(1):d,data:y})}}),S.length>0){let p='<div class="doc-modal-tab-container">';p+='<div id="modal-tab-slider" class="doc-modal-tab-slider"></div>';let d='<div class="doc-modal-pane-container">';S.forEach((c,r)=>{const y=r===0;p+=`<button type="button" class="modal-tab-pill ${y?"active":""}" data-index="${r}" onclick="switchModalTab(this, ${r})">
                ${c.name}
            </button>`;const w=y?"doc-modal-pane active":"doc-modal-pane",C=y?"0s":`${r*.05}s`;let f=`
                <div class="doc-modal-pane-inner">
                    <div class="doc-modal-pane-glow"></div>
                    <div class="doc-modal-pane-content prose-content">
                        <h5 class="text-lg font-bold text-primary mb-2">Overview</h5>
                        <div class="mb-4">${c.data.overview}</div>
            `;c.data.competencies&&c.data.competencies.length>0&&(f+=`
                        <h5 class="text-lg font-bold text-primary mb-2 mt-4">Core Competencies</h5>
                        <ul class="list-disc pl-5 mb-4">
                            ${c.data.competencies.map(b=>`<li>${b}</li>`).join("")}
                        </ul>
                `),c.data.standards&&c.data.standards.trim()!==""&&(f+=`
                        <h5 class="text-lg font-bold text-primary mb-2 mt-4">Curriculum Standards</h5>
                        <div class="curr-standards-list">${c.data.standards}</div>
                `),f+=`
                    </div>
                </div>
            `,d+=`<div class="${w}" data-index="${r}" style="animation-delay: ${C}">
                ${f}
            </div>`}),p+="</div>",d+="</div>",g.innerHTML=`<h4 class="doc-modal-curriculum-title">
            <span class="doc-modal-curriculum-dot"></span> Core Subjects & Standards
        </h4>${p}${d}`,setTimeout(()=>{const c=document.querySelector(".modal-tab-pill");c&&H(c)},50)}else if(n&&n.trim()!==""){const d=new DOMParser().parseFromString(n,"text/html"),c=d.querySelector("h4"),r=d.querySelector("div.space-y-4");if(c&&r){const y=c.textContent,$=Array.from(r.children);let w='<div class="doc-modal-tab-container">';w+='<div id="modal-tab-slider" class="doc-modal-tab-slider"></div>';let C='<div class="doc-modal-pane-container">';$.forEach((f,b)=>{const I=f.querySelector("h5"),J=I?I.textContent:`Module ${b+1}`;let _=f.innerHTML;I&&(_=_.replace(I.outerHTML,""));const M=b===0;w+=`<button type="button" class="modal-tab-pill ${M?"active":""}" data-index="${b}" onclick="switchModalTab(this, ${b})">
                    ${J}
                </button>`;const W=M?"doc-modal-pane active":"doc-modal-pane",Y=M?"0s":`${b*.05}s`;C+=`<div class="${W}" data-index="${b}" style="animation-delay: ${Y}">
                    <div class="doc-modal-pane-inner">
                        <div class="doc-modal-pane-glow"></div>
                        <div class="doc-modal-pane-content prose-content">
                            ${_}
                        </div>
                    </div>
                </div>`}),w+="</div>",C+="</div>",g.innerHTML=`<h4 class="doc-modal-curriculum-title">
                <span class="doc-modal-curriculum-dot"></span> ${y}
            </h4>${w}${C}`,setTimeout(()=>{const f=document.querySelector(".modal-tab-pill");f&&H(f)},50)}else g.innerHTML=`<div class="doc-modal-fallback-box">${n}</div>`}else g.innerHTML='<div class="doc-modal-empty-box"><i class="fas fa-sparkles doc-modal-empty-icon"></i><p class="doc-modal-empty-text">Detailed curriculum is being prepared for this journey.</p></div>';if(t){const p=t.getBoundingClientRect(),d=window.innerHeight,c=Math.min(d*.85,750),r=Math.min(window.innerWidth*.9,896),y=p.left+p.width/2,$=p.top+p.height/2,w=window.innerWidth/2-r/2,C=window.innerHeight/2-c/2,f=y-w,b=$-C;u.style.transformOrigin=`${f}px ${b}px`}l.classList.remove("hidden"),l.offsetWidth,l.classList.remove("opacity-0","pointer-events-none"),l.classList.add("opacity-100"),k.classList.remove("scale-90","opacity-0"),k.classList.add("scale-100","opacity-100"),document.body.style.overflow="hidden"}function re(){const e=document.getElementById("doc-modal"),t=e.querySelector(".doc-modal-content");e.classList.remove("opacity-100"),e.classList.add("opacity-0"),t.classList.remove("scale-100","opacity-100"),t.classList.add("scale-90","opacity-0"),setTimeout(()=>{e.classList.add("hidden","pointer-events-none"),t.style.position="",t.style.top="",t.style.left="",t.style.transform="",t.style.margin="",document.body.style.overflow=""},300)}function me(){window.print()}function ue(e,t){const s=e.closest("#modal-docs"),a=s.querySelectorAll(".modal-tab-pill"),o=s.querySelectorAll(".doc-modal-pane");a.forEach(n=>{n.classList.remove("active")}),e.classList.add("active"),H(e),o.forEach(n=>{parseInt(n.dataset.index)===t?(n.classList.add("active"),n.style.animationDelay="0s"):n.classList.remove("active")})}function H(e){const t=document.getElementById("modal-tab-slider");t&&(t.style.width=e.offsetWidth+"px",t.style.left=e.offsetLeft+"px")}function fe(){const e="hl_missed_standards";let t=[];try{t=JSON.parse(localStorage.getItem(e)||"[]")}catch{}if(t.length===0)return;const s=document.getElementById("main-content");if(!s)return;const a=document.createElement("section");a.id="a11y-focus-recommendations",a.className="focus-rec-section animate-reveal",a.innerHTML=`
        <div class="focus-rec-glow-1"></div>
        <div class="focus-rec-glow-2"></div>
        
        <header class="focus-rec-header">
            <div>
                <h3 class="focus-rec-title">
                    <span class="focus-rec-icon-box">
                        <i class="fas fa-bullseye"></i>
                    </span>
                    Recommended Focus Areas
                </h3>
                <p class="focus-rec-subtitle">Based on your latest assessments, practicing these levels will help you grow!</p>
            </div>
            <button onclick="window.hl.clearFocusRecommendations()" class="focus-rec-clear-btn">
                <i class="fas fa-trash-alt icon-sm"></i> Clear Recommendations
            </button>
        </header>
        
        <div class="focus-rec-grid" id="recommendations-grid"></div>
    `;const o=document.getElementById("resume-banner");o?o.parentNode.insertBefore(a,o.nextSibling):s.insertBefore(a,s.firstChild);const n=document.getElementById("recommendations-grid");if(!n)return;let m="";t.forEach(l=>{const u=typeof learningLevels<"u"?learningLevels.find(g=>g.id===l.id):null;if(!u)return;const k=u.link||"#",i=u.title||l.gradeName,h=u.icon||"fas fa-star",x=l.subject.toLowerCase()==="language arts"?"ela":l.subject.toLowerCase();m+=`
            <div class="focus-card stats-card">
                <div class="focus-card-header">
                    <div class="focus-card-icon">
                        <i class="${h}"></i>
                    </div>
                    <div>
                        <h4 class="focus-card-title">${i}</h4>
                        <span class="focus-card-tag">${l.subject} Focus</span>
                    </div>
                </div>
                
                <p class="focus-card-desc">
                    Review and practice your ${l.subject} skills to boost your mastery level and build confidence.
                </p>
                
                <div class="focus-card-footer">
                    <span class="focus-card-warning">
                        <i class="fas fa-exclamation-triangle warning-icon"></i> Needs Practice
                    </span>
                    <a href="${k}?tab=${x}" class="focus-card-btn">
                        <span>Practice</span>
                        <i class="fas fa-arrow-right icon-sm"></i>
                    </a>
                </div>
            </div>
        `}),n.innerHTML=m}function he(){if(confirm("Are you sure you want to clear your current personalized recommendations?")){localStorage.removeItem("hl_missed_standards");const e=document.getElementById("a11y-focus-recommendations");e&&(e.style.transition="all 0.3s ease-out",e.style.opacity="0",e.style.transform="translateY(15px) scale(0.98)",setTimeout(()=>e.remove(),300))}}window.hl={toggleCompletion:le,toggleBookmark:ie,openDocModal:de,closeDocModal:re,printCurriculum:me,switchModalTab:ue,speakCard:oe,clearFocusRecommendations:he,setCategory:P,resetFilters:Z};console.log("Learning Odyssey initialized via Vite ES Modules!");U();typeof window.learningLevels<"u"&&(ee(window.learningLevels),B());ce();se();fe();const O=document.getElementById("level-search");O&&O.addEventListener("input",e=>{const t=document.getElementById("hero-search");t&&(t.value=e.target.value),ne(B,200)()});
