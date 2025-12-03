# Digital Portfolio Builder for Creatives

A static website that helps creatives (artists, designers, photographers) discover and download professional portfolio templates.

## Project Structure

```
dpcfc/
├── index.html              # Home/Landing page
├── gallery.html            # Templates gallery page
├── demo.html               # Template demo page
├── documentation.html     # Download & documentation page
├── contact.html            # Contact page
├── css/
│   └── style.css          # Main stylesheet
├── js/
│   ├── main.js            # Navigation and common functionality
│   ├── templates-data.js  # Template data
│   ├── gallery.js         # Gallery filtering and search
│   ├── demo.js            # Demo page functionality
│   └── contact.js         # Contact form handling
├── templates/
│   ├── artist/
│   │   ├── index.html
│   │   └── style.css
│   ├── designer/
│   │   ├── index.html
│   │   └── style.css
│   └── photographer/
│       ├── index.html
│       └── style.css
└── assets/                 # Images and other assets (placeholder)
```

## Features

- **Browse Templates**: Filter by category (Artist, Designer, Photographer)
- **Live Demos**: View templates in action with desktop/mobile toggle
- **Search Functionality**: Search templates by name or description
- **Download Templates**: Download ZIP files with HTML/CSS/JS
- **Documentation**: Step-by-step guide for customization
- **Contact Form**: Request custom templates or get support

## Pages

1. **Home Page** (`index.html`)
   - Hero section with featured template
   - 3 featured templates
   - Features section

2. **Templates Gallery** (`gallery.html`)
   - Filter buttons (All, Artists, Designers, Photographers)
   - Search bar
   - Grid of template thumbnails
   - Load more functionality

3. **Template Demo** (`demo.html`)
   - Full-width template preview (iframe)
   - Sidebar with template details
   - Download button
   - Customization guide
   - Desktop/Mobile view toggle

4. **Documentation** (`documentation.html`)
   - Step-by-step customization guide
   - FAQ section
   - Free hosting options

5. **Contact** (`contact.html`)
   - Contact form
   - Contact information
   - Map placeholder (Sydney location)

## Getting Started

1. Open `index.html` in a web browser
2. Navigate through the pages using the navigation menu
3. Browse templates in the gallery
4. View demos and download templates

## Customization

All templates are fully customizable:
- Edit HTML files to change content
- Modify CSS files to change styling
- Replace placeholder images in the assets folder
- Update JavaScript for additional functionality

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Notes

- Template images are placeholders (SVG fallbacks included)
- Download functionality is simulated (would link to actual ZIP files in production)
- Contact form submission is simulated (would connect to backend in production)
- Map integration is placeholder (would use Google Maps API in production)

## License

Free to use for personal and commercial projects.

