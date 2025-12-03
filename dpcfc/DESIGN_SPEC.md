# PortfolioBuilder - Design Specification Document

This document contains all design specifications needed to recreate the website in Figma.

## Color Palette

### Primary Colors
- **Primary**: `#6366f1` (Indigo)
- **Primary Dark**: `#4f46e5` (Darker Indigo)
- **Secondary**: `#8b5cf6` (Purple)

### Neutral Colors
- **Text Dark**: `#1f2937` (Dark Gray)
- **Text Light**: `#6b7280` (Medium Gray)
- **Background Light**: `#f9fafb` (Light Gray)
- **Background White**: `#ffffff` (White)
- **Border Color**: `#e5e7eb` (Light Border)

### Gradients
- **Hero Gradient**: `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`
- **Artist Template**: `linear-gradient(135deg, #f5e6d3 0%, #e8d5c4 100%)`
- **Designer Template**: `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`
- **Photographer Template**: Dark theme with `#000000` background

## Typography

### Font Family
- **Primary**: `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif`
- **Artist Template**: `Georgia, serif`
- **Designer Template**: `'Helvetica Neue', Arial, sans-serif`
- **Photographer Template**: `Arial, sans-serif`

### Font Sizes
- **Hero Title**: 3rem (48px) / Mobile: 2rem (32px)
- **Page Title**: 2.5rem (40px)
- **Section Title**: 2.5rem (40px)
- **Card Title**: 1.5rem (24px)
- **Body Text**: 1rem (16px)
- **Small Text**: 0.875rem (14px)

### Font Weights
- **Bold**: 700
- **Semi-bold**: 600
- **Medium**: 500
- **Regular**: 400

## Spacing System

### Container
- **Max Width**: 1200px
- **Padding**: 0 20px

### Section Spacing
- **Section Padding**: 4rem (64px) top/bottom
- **Section Gap**: 2rem (32px)

### Component Spacing
- **Card Padding**: 1.5rem (24px)
- **Button Padding**: 0.75rem 1.5rem (12px 24px)
- **Large Button**: 1rem 2rem (16px 32px)
- **Form Input Padding**: 0.75rem (12px)
- **Grid Gap**: 2rem (32px)

## Components

### Navigation Bar
- **Height**: Auto (padding 1rem top/bottom)
- **Background**: White (#ffffff)
- **Shadow**: `0 4px 6px -1px rgba(0, 0, 0, 0.1)`
- **Position**: Sticky, top: 0
- **Logo**: 1.5rem, Primary color
- **Menu Items**: Gap 2rem, Medium weight

### Buttons

#### Primary Button
- **Background**: `#6366f1`
- **Color**: White
- **Padding**: 0.75rem 1.5rem
- **Border Radius**: 8px
- **Font Weight**: 600
- **Hover**: Background `#4f46e5`, Transform translateY(-2px), Shadow

#### Secondary Button
- **Background**: White
- **Color**: `#6366f1`
- **Border**: 2px solid `#6366f1`
- **Padding**: 0.75rem 1.5rem
- **Border Radius**: 8px
- **Hover**: Background `#6366f1`, Color white

#### Large Button
- Same as Primary but padding: 1rem 2rem, font-size: 1.1rem

### Hero Section
- **Background**: Gradient (135deg, #667eea to #764ba2)
- **Padding**: 4rem 0
- **Text Color**: White
- **Text Align**: Center
- **Title**: 3rem, Weight 800
- **Subtitle**: 1.25rem, Opacity 0.95
- **Image**: Max-width 800px, Border-radius 12px, Shadow

### Template Cards
- **Background**: White
- **Border Radius**: 12px
- **Shadow**: `0 4px 6px -1px rgba(0, 0, 0, 0.1)`
- **Hover**: Transform translateY(-5px), Larger shadow
- **Image Height**: 200px (gallery), 250px (featured)
- **Card Padding**: 1.5rem

### Grid Layouts

#### Templates Grid
- **Columns**: `repeat(auto-fit, minmax(300px, 1fr))`
- **Gap**: 2rem
- **Mobile**: Single column

#### Features Grid
- **Columns**: `repeat(auto-fit, minmax(250px, 1fr))`
- **Gap**: 2rem
- **Text Align**: Center
- **Icon Size**: 3rem

### Form Elements
- **Input Height**: Auto (padding 0.75rem)
- **Border**: 2px solid `#e5e7eb`
- **Border Radius**: 8px
- **Focus Border**: `#6366f1`
- **Label**: Weight 500, Margin-bottom 0.5rem

### Filter Buttons
- **Padding**: 0.5rem 1.5rem
- **Border**: 2px solid `#e5e7eb`
- **Border Radius**: 25px (pill shape)
- **Active**: Background `#6366f1`, Color white

### Search Bar
- **Max Width**: 500px
- **Padding**: 0.75rem 1rem
- **Border**: 2px solid `#e5e7eb`
- **Border Radius**: 8px

### Demo Page Layout
- **Grid**: 2fr 1fr (Desktop), 1fr (Mobile)
- **Gap**: 2rem
- **Sidebar**: Sticky, top: 100px
- **Preview Container**: Border 2px, Border-radius 8px, Min-height 600px
- **Iframe Height**: 600px (desktop), 667px (mobile)

### Step Cards (Documentation)
- **Layout**: Flex, Gap 2rem
- **Background**: `#f9fafb`
- **Padding**: 2rem
- **Border Radius**: 12px
- **Step Number**: 60px circle, Primary color, White text

### FAQ Items
- **Background**: `#f9fafb`
- **Padding**: 1.5rem
- **Border Radius**: 8px
- **Margin Bottom**: 2rem

### Footer
- **Background**: `#1f2937`
- **Color**: White
- **Padding**: 3rem 0 1rem
- **Grid**: `repeat(auto-fit, minmax(200px, 1fr))`
- **Link Color**: `rgba(255, 255, 255, 0.7)`
- **Hover**: White

## Shadows

- **Small**: `0 4px 6px -1px rgba(0, 0, 0, 0.1)`
- **Large**: `0 10px 15px -3px rgba(0, 0, 0, 0.1)`

## Border Radius

- **Small**: 4px
- **Medium**: 8px
- **Large**: 12px
- **Pill**: 25px
- **Circle**: 50%

## Breakpoints

- **Mobile**: max-width 768px
- **Tablet**: 769px - 1024px
- **Desktop**: 1025px+

## Page Layouts

### Home Page
1. **Navigation**: Full width, sticky
2. **Hero**: Full width, gradient background, centered content
3. **Featured Templates**: Container width, 3-column grid
4. **Features**: Container width, 3-column grid
5. **Footer**: Full width, dark background

### Gallery Page
1. **Navigation**: Full width, sticky
2. **Header**: Container width, centered
3. **Controls**: Container width, search + filters
4. **Grid**: Container width, responsive grid
5. **Footer**: Full width, dark background

### Demo Page
1. **Navigation**: Full width, sticky
2. **Content**: 2-column grid (preview + sidebar)
3. **Preview**: Full-width iframe with controls
4. **Sidebar**: Sticky, template info + download
5. **Footer**: Full width, dark background

### Documentation Page
1. **Navigation**: Full width, sticky
2. **Header**: Container width, centered
3. **Content**: Container width, step cards + FAQ + hosting
4. **Footer**: Full width, dark background

### Contact Page
1. **Navigation**: Full width, sticky
2. **Header**: Container width, centered
3. **Content**: 2-column grid (form + info)
4. **Footer**: Full width, dark background

## Icons & Emojis

- **Mobile-Friendly**: 📱
- **Easy to Customize**: ✏️
- **Professional Designs**: ✨
- **Location**: 📍

## Interactive States

### Hover States
- **Links**: Color change to primary
- **Buttons**: Background change, transform, shadow
- **Cards**: Transform translateY(-5px), larger shadow
- **Images**: Scale effect

### Active States
- **Navigation Links**: Primary color
- **Filter Buttons**: Primary background, white text
- **Demo Toggle**: Primary background, white text

### Focus States
- **Inputs**: Border color change to primary
- **Buttons**: Outline (accessibility)

## Responsive Behavior

### Mobile (< 768px)
- Navigation menu becomes hamburger
- Grids become single column
- Hero title: 2rem
- Demo layout: Single column
- Contact layout: Single column
- Step cards: Vertical layout

## Template-Specific Styles

### Artist Template
- **Color Scheme**: Warm browns (#8b5a3c, #5a3d2e)
- **Background**: Light beige (#f5e6d3, #e8d5c4)
- **Font**: Georgia serif

### Designer Template
- **Color Scheme**: Blues (#3498db, #2980b9)
- **Background**: Light gray (#f8f9fa)
- **Font**: Helvetica Neue

### Photographer Template
- **Color Scheme**: Black/White/Gold (#000000, #ffffff, #ffd700)
- **Background**: Black
- **Font**: Arial

## Design Principles

1. **Consistency**: Same spacing, colors, and typography throughout
2. **Hierarchy**: Clear visual hierarchy with size and weight
3. **Whitespace**: Generous padding and margins
4. **Accessibility**: High contrast ratios, focus states
5. **Responsiveness**: Mobile-first approach
6. **Modern**: Clean, minimal, gradient accents



