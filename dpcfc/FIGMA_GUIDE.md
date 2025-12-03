# How to Recreate This Design in Figma

This guide will help you recreate the PortfolioBuilder website design in Figma.

## Step 1: Set Up Your Figma File

1. Create a new Figma file
2. Set up frames for each page:
   - Home Page (1440px width)
   - Gallery Page (1440px width)
   - Demo Page (1440px width)
   - Documentation Page (1440px width)
   - Contact Page (1440px width)

## Step 2: Create Color Styles

### Create Color Styles in Figma:
1. Go to **Design** → **Color Styles**
2. Create these colors:
   - `Primary`: #6366f1
   - `Primary Dark`: #4f46e5
   - `Secondary`: #8b5cf6
   - `Text Dark`: #1f2937
   - `Text Light`: #6b7280
   - `Background Light`: #f9fafb
   - `Background White`: #ffffff
   - `Border Color`: #e5e7eb

### Create Gradient Styles:
1. Create gradient for Hero section:
   - Type: Linear
   - Angle: 135deg
   - Stops: #667eea (0%), #764ba2 (100%)

## Step 3: Create Text Styles

### Create Text Styles:
1. Go to **Design** → **Text Styles**
2. Create these styles:
   - **Hero Title**: Size 48px, Weight 800, Color White
   - **Page Title**: Size 40px, Weight 700, Color Text Dark
   - **Section Title**: Size 40px, Weight 700, Color Text Dark
   - **Card Title**: Size 24px, Weight 600, Color Text Dark
   - **Body**: Size 16px, Weight 400, Color Text Dark
   - **Small**: Size 14px, Weight 400, Color Text Light

## Step 4: Create Component Library

### Navigation Component
- **Height**: Auto (padding 16px)
- **Background**: White
- **Shadow**: 0px 4px 6px rgba(0, 0, 0, 0.1)
- **Logo**: Text "PortfolioBuilder", 24px, Primary color
- **Menu Items**: Horizontal layout, 32px gap

### Button Components
Create these button variants:
1. **Primary Button**
   - Background: Primary color
   - Text: White, 16px, Weight 600
   - Padding: 12px 24px
   - Border Radius: 8px
   - Hover state: Darker primary

2. **Secondary Button**
   - Background: White
   - Text: Primary color
   - Border: 2px solid Primary
   - Padding: 12px 24px
   - Border Radius: 8px

3. **Large Button**
   - Same as Primary but padding: 16px 32px, 18px text

### Template Card Component
- **Width**: 300px (min)
- **Background**: White
- **Border Radius**: 12px
- **Shadow**: 0px 4px 6px rgba(0, 0, 0, 0.1)
- **Image Area**: 200px height
- **Content Padding**: 24px
- **Hover State**: Transform up 5px, larger shadow

### Form Input Component
- **Height**: Auto (padding 12px)
- **Border**: 2px solid Border Color
- **Border Radius**: 8px
- **Focus State**: Border Primary color

## Step 5: Build Each Page

### Home Page Layout
1. **Navigation Bar** (sticky at top)
2. **Hero Section** (full width, gradient background)
   - Title: "Build Your Creative Portfolio"
   - Subtitle text
   - Hero image placeholder (800px max width)
   - CTA button
3. **Featured Templates Section**
   - Section title
   - 3-column grid of template cards
4. **Features Section**
   - Section title
   - 3-column grid of feature items
5. **Footer** (full width, dark background)

### Gallery Page Layout
1. **Navigation Bar**
2. **Header Section** (centered)
   - Page title
   - Subtitle
3. **Controls Section**
   - Search bar (500px max width, centered)
   - Filter buttons (horizontal, centered)
4. **Templates Grid**
   - Responsive grid (3-4 columns)
   - Template cards
   - Load more button (centered)
5. **Footer**

### Demo Page Layout
1. **Navigation Bar**
2. **Main Content** (2-column grid)
   - **Left Column (2/3 width)**:
     - View toggle buttons (Desktop/Mobile)
     - Preview container (iframe placeholder)
   - **Right Column (1/3 width, sticky)**:
     - Template name
     - Category badge
     - Features list
     - Download button
     - Customization guide
3. **Footer**

### Documentation Page Layout
1. **Navigation Bar**
2. **Header Section**
3. **Content Section**:
   - **Step-by-Step Guide**:
     - 4 step cards (numbered circles)
   - **FAQ Section**:
     - 5 FAQ items (accordion style)
   - **Hosting Options**:
     - 4 hosting cards in grid
4. **Footer**

### Contact Page Layout
1. **Navigation Bar**
2. **Header Section**
3. **Content Section** (2-column grid):
   - **Left Column**: Contact form
   - **Right Column**: Contact info + map placeholder
4. **Footer**

## Step 6: Create Auto Layouts

Use Figma's Auto Layout for:
- Navigation menu items
- Button groups
- Form fields
- Card content
- Grid layouts

## Step 7: Set Up Responsive Design

### Create Mobile Frames (375px width)
1. Duplicate each page frame
2. Adjust for mobile:
   - Single column layouts
   - Smaller text sizes
   - Hamburger menu
   - Stacked elements

### Use Constraints
- Set constraints for elements that should resize
- Use "Left & Right" for full-width elements
- Use "Center" for centered elements

## Step 8: Create Interactive Prototypes

### Add Interactions:
1. **Navigation Links**: Navigate to corresponding frames
2. **Filter Buttons**: Show filtered state
3. **Template Cards**: Navigate to demo page
4. **Buttons**: Hover states
5. **Mobile Menu**: Toggle open/close

### Prototype Settings:
- **Device**: Desktop (1440px) and Mobile (375px)
- **Starting Point**: Home page

## Step 9: Export Assets

### Export Settings:
- **Images**: PNG, 2x resolution
- **Icons**: SVG format
- **Templates**: Export as images for previews

## Step 10: Design System Organization

### Organize Your File:
```
📁 Pages
  📄 Home
  📄 Gallery
  📄 Demo
  📄 Documentation
  📄 Contact

📁 Components
  📄 Navigation
  📄 Buttons
  📄 Cards
  📄 Forms
  📄 Footer

📁 Design System
  📄 Colors
  📄 Typography
  📄 Spacing
  📄 Shadows
```

## Tips for Figma

1. **Use Components**: Make reusable components for buttons, cards, etc.
2. **Auto Layout**: Use Auto Layout for responsive designs
3. **Variants**: Create button variants (primary, secondary, large)
4. **Styles**: Use color and text styles for consistency
5. **Frames**: Organize with frames and pages
6. **Constraints**: Set proper constraints for responsive behavior
7. **Prototyping**: Add interactions to show user flow

## Quick Reference: Key Measurements

- **Container Max Width**: 1200px
- **Section Padding**: 64px (top/bottom)
- **Card Padding**: 24px
- **Grid Gap**: 32px
- **Border Radius**: 8px (standard), 12px (cards), 25px (pills)
- **Shadow**: 0px 4px 6px rgba(0, 0, 0, 0.1)

## Color Codes Quick Reference

```
Primary: #6366f1
Primary Dark: #4f46e5
Secondary: #8b5cf6
Text Dark: #1f2937
Text Light: #6b7280
Background Light: #f9fafb
Background White: #ffffff
Border: #e5e7eb
```

Use this guide to recreate the entire design system in Figma!



