
# PBIRT Client Portal - README.md

## Overview
The PBIRT Client Portal is the public-facing website for PB Training Institute of Research and Technology, an educational institution in Kenya specializing in accounting, technology, and research training. This responsive, modern website serves as the primary interface for prospective and current students to learn about course offerings, institutional information, and educational opportunities.

## Features
- **Responsive Design**: Fully responsive layout that works on desktop, tablet, and mobile devices
- **Course Catalog**: Browse and search available courses with detailed information
- **Online Application**: Apply for courses directly through the website
- **Contact System**: Integrated contact form with validation
- **News & Events**: Latest updates about the institution and upcoming events
- **Testimonials**: Success stories from alumni
- **Interactive Elements**: Dynamic content with animations and interactive components

## Technical Stack
- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Libraries/Frameworks**:
  - Font Awesome (icons)
  - AOS (Animate On Scroll)
  - Custom CSS framework

## Directory Structure
```
client/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── courses/
│   └── course_view.php
├── inc/
│   ├── header.php
│   └── footer.php
├── config.php
├── DBConnection.php
├── global_config_utils.php
├── home.php
└── index.php
```

## Setup Instructions
1. Ensure you have a web server with PHP 7.4+ and MySQL 5.7+
2. Clone the repository to your web server directory
3. Import the database schema from the provided SQL file
4. Configure database connection in `DBConnection.php`
5. Adjust paths in `global_config_utils.php` if necessary
6. Access the site through your web server

## Configuration
The main configuration files are:
- `config.php`: Core configuration settings
- `global_config_utils.php`: Path definitions and utility functions
- `DBConnection.php`: Database connection parameters

## Key Pages
- `index.php`: Entry point that handles routing
- `home.php`: Main landing page with featured content
- `courses/course_view.php`: Course catalog and details
- `inc/header.php` & `inc/footer.php`: Common page elements

## Development Guidelines
- Follow the established CSS naming conventions
- Use the utility functions in `global_config_utils.php` for consistent path handling
- Sanitize all user inputs using the provided sanitization functions
- Maintain accessibility standards with proper ARIA attributes and semantic HTML

## Browser Compatibility
- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest version)
- Opera (latest version)

## Contact
For technical support or inquiries, contact:
- Email: info@pbinstituteofresearch.co.ke
- Phone: +254 721 214 795

---

