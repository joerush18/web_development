// Demo Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Get template ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const templateId = urlParams.get('template');
    
    // Find template data
    let template;
    if (templateId) {
        // Check if it's a category name or ID
        if (isNaN(templateId)) {
            // It's a category name
            template = templatesData.find(t => t.category === templateId) || templatesData[0];
        } else {
            // It's an ID
            template = templatesData.find(t => t.id === parseInt(templateId)) || templatesData[0];
        }
    } else {
        template = templatesData[0];
    }

    // Update page content
    if (template) {
        document.getElementById('templateName').textContent = template.name;
        document.getElementById('templateCategory').textContent = template.category.charAt(0).toUpperCase() + template.category.slice(1);
        
        // Update features list
        const featuresList = document.getElementById('featuresList');
        featuresList.innerHTML = template.features.map(feature => `<li>${feature}</li>`).join('');
        
        // Update iframe source
        const iframe = document.getElementById('templateFrame');
        iframe.src = `templates/${template.category}/index.html`;
        
        // Update download button
        const downloadBtn = document.getElementById('downloadBtn');
        downloadBtn.href = `#`; // In a real implementation, this would link to a ZIP file
        downloadBtn.addEventListener('click', function(e) {
            e.preventDefault();
            alert(`Download would start for ${template.name} template. In a real implementation, this would download a ZIP file.`);
        });
    }

    // Desktop/Mobile toggle
    const demoToggles = document.querySelectorAll('.demo-toggle');
    const previewContainer = document.getElementById('previewContainer');
    
    demoToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            // Update active state
            demoToggles.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Update view
            const view = this.getAttribute('data-view');
            if (view === 'mobile') {
                previewContainer.classList.add('mobile-view');
            } else {
                previewContainer.classList.remove('mobile-view');
            }
        });
    });
});

