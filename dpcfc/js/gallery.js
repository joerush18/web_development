// Gallery Page Functionality
let displayedTemplates = 8;
let currentFilter = 'all';
let searchQuery = '';

function renderTemplates() {
    const grid = document.getElementById('templatesGrid');
    if (!grid) return;

    // Filter templates
    let filtered = templatesData.filter(template => {
        const matchesFilter = currentFilter === 'all' || template.category === currentFilter;
        const matchesSearch = template.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                             template.description.toLowerCase().includes(searchQuery.toLowerCase());
        return matchesFilter && matchesSearch;
    });

    // Limit displayed templates
    const toDisplay = filtered.slice(0, displayedTemplates);
    
    // Clear grid
    grid.innerHTML = '';

    // Render templates
    toDisplay.forEach(template => {
        const card = document.createElement('div');
        card.className = 'template-card';
        card.innerHTML = `
            <div class="template-preview">
                <img src="${template.image}" alt="${template.name}" 
                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22300%22%3E%3Crect fill=%22%23e0e0e0%22 width=%22400%22 height=%22300%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22%3E${template.name}%3C/text%3E%3C/svg%3E'">
            </div>
            <div class="template-info">
                <h3>${template.name}</h3>
                <p>${template.description}</p>
                <a href="demo.html?template=${template.id}" class="btn btn-secondary">View Demo</a>
            </div>
        `;
        grid.appendChild(card);
    });

    // Show/hide load more button
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        if (displayedTemplates >= filtered.length) {
            loadMoreBtn.style.display = 'none';
        } else {
            loadMoreBtn.style.display = 'block';
        }
    }
}

// Filter buttons
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Update filter
            currentFilter = this.getAttribute('data-filter');
            displayedTemplates = 8; // Reset to initial count
            renderTemplates();
        });
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            searchQuery = this.value;
            displayedTemplates = 8; // Reset to initial count
            renderTemplates();
        });
    }

    // Load more button
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            displayedTemplates += 4;
            renderTemplates();
        });
    }

    // Initial render
    renderTemplates();
});

