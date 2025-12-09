// Gallery Page Functionality
let displayedTemplates = 8;
let currentFilter = "all";
let searchQuery = "";
const previewPalettes = [
  "linear-gradient(135deg, #e0f2fe 0%, #c7d2fe 50%, #a5b4fc 100%)",
  "linear-gradient(135deg, #fee2e2 0%, #fecdd3 50%, #fbcfe8 100%)",
  "linear-gradient(135deg, #ecfccb 0%, #d9f99d 50%, #a3e635 100%)",
  "linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #f59e0b 100%)",
  "linear-gradient(135deg, #e0f7fa 0%, #b3e5fc 50%, #81d4fa 100%)",
  "linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 50%, #d8b4fe 100%)",
];

function setPreviewBackground(previewEl) {
  if (!previewEl) return;
  const img = previewEl.querySelector("img");
  if (!img) return;

  const apply = () => {
    const src = img.currentSrc || img.src;
    if (src) {
      previewEl.style.setProperty("--thumb-image", `url("${src}")`);
    }
  };

  if (img.complete && img.naturalWidth) {
    apply();
  } else {
    img.addEventListener("load", apply, { once: true });
  }
}

function renderTemplates() {
  const grid = document.getElementById("templatesGrid");
  if (!grid) return;

  // Filter templates
  let filtered = templatesData.filter((template) => {
    const matchesFilter =
      currentFilter === "all" || template.category === currentFilter;
    const matchesSearch =
      template.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
      template.description.toLowerCase().includes(searchQuery.toLowerCase());
    return matchesFilter && matchesSearch;
  });

  // Limit displayed templates
  const toDisplay = filtered.slice(0, displayedTemplates);

  // Clear grid
  grid.innerHTML = "";

  // Render templates
  toDisplay.forEach((template, idx) => {
    const card = document.createElement("div");
    card.className = "template-card";

    const thumbSrc = template.image;
    const errorFallback =
      "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='600' height='360'%3E%3Crect width='600' height='360' fill='%23e5e7eb'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='%23808080' font-family='Arial' font-size='24'%3ENo Image%3C/text%3E%3C/svg%3E";

    card.innerHTML = `
            <div class="template-preview" data-label="${template.name}" data-category="${template.category}">
                <img src="${thumbSrc}" alt="${template.name}" loading="lazy"
                     onerror="this.src='${errorFallback}'">
            </div>
            <div class="template-info">
                <h3>${template.name}</h3>
                <p>${template.description}</p>
                <a href="demo.html?template=${template.id}" class="btn btn-secondary">View Demo</a>
            </div>
        `;
    const previewEl = card.querySelector(".template-preview");
    const palette = previewPalettes[idx % previewPalettes.length];
    previewEl.style.setProperty("--thumb-background", palette);
    setPreviewBackground(previewEl);
    grid.appendChild(card);
  });

  // Show/hide load more button
  const loadMoreBtn = document.getElementById("loadMoreBtn");
  if (loadMoreBtn) {
    if (displayedTemplates >= filtered.length) {
      loadMoreBtn.style.display = "none";
    } else {
      loadMoreBtn.style.display = "block";
    }
  }
}

// Filter buttons
document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".filter-btn");
  filterButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      // Update active state
      filterButtons.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      // Update filter
      currentFilter = this.getAttribute("data-filter");
      displayedTemplates = 8; // Reset to initial count
      renderTemplates();
    });
  });

  // Search functionality
  const searchInput = document.getElementById("searchInput");
  if (searchInput) {
    searchInput.addEventListener("input", function () {
      searchQuery = this.value;
      displayedTemplates = 8; // Reset to initial count
      renderTemplates();
    });
  }

  // Load more button
  const loadMoreBtn = document.getElementById("loadMoreBtn");
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      displayedTemplates += 4;
      renderTemplates();
    });
  }

  // Initial render
  renderTemplates();
});
