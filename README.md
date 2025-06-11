
# PBIRT - PB Institute of Research and Technology

## Overview
PBIRT (PB Institute of Research and Technology) is a comprehensive web-based system for managing an educational institution in Kenya specializing in accounting, technology, and research training. The system consists of two main components:

1. **Client Portal** - A responsive, public-facing website for prospective and current students
2. **Admin Control Panel** - A secure administrative backend for staff to manage the institution's operations

This integrated system provides a complete solution for course management, student records, content management, and institutional operations.

## System Architecture

```
PBIRT/
├── client/             # Public-facing website
├── admin_cpanel/       # Administrative backend
├── .htaccess           # URL routing configuration
└── index.php           # Main entry point
```

## Components

### Client Portal
The client portal serves as the primary interface for prospective and current students to:
- Browse and search available courses
- Apply for courses online
- Access institutional information
- View news and events
- Contact the institution

### Admin Control Panel
The admin control panel provides authorized staff with tools to:
- Manage user authentication with role-based permissions
- Add, edit, and delete courses
- Manage student information and enrollments
- Update website content
- Configure system settings
- Upload and organize documents and media files

## Technical Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL (sis_db)
- **Libraries/Frameworks**:
  - Font Awesome (icons)
  - AOS (Animate On Scroll)
  - Bootstrap (admin UI)
  - jQuery (interactive elements)

## Directory Structure

```
PBIRT/
├── client/
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   ├── courses/
│   │   └── course_view.php
│   ├── inc/
│   │   ├── header.php
│   │   └── footer.php
│   ├── config.php
│   ├── DBConnection.php
│   ├── global_config_utils.php
│   ├── home.php
│   └── index.php
├── admin_cpanel/
│   ├── classes/
│   │   ├── DBConnection.php
│   │   └── SystemSettings.php
│   ├── database/
│   │   └── sis_db.sql
│   ├── inc/
│   │   └── header.php
│   ├── config.php
│   ├── initialize.php
│   └── [other admin modules]
├── .htaccess
└── index.php
```

## Setup Instructions

### Prerequisites
- Web server with PHP 7.4+ and MySQL 5.7+
- XAMPP, WAMP, LAMP, or similar local development environment

### Installation
1. Clone the repository to your web server directory (e.g., `htdocs` for XAMPP)
2. Import the database schema from `admin_cpanel/database/sis_db.sql`
3. Configure database connection in both:
   - `client/DBConnection.php`
   - `admin_cpanel/classes/DBConnection.php`
4. Adjust paths in configuration files if necessary:
   - `client/global_config_utils.php`
   - `admin_cpanel/initialize.php`
5. Access the client portal at: `http://localhost/pbirt/client/`
6. Access the admin panel at: `http://localhost/pbirt/admin_cpanel/`

## Database Structure

The system uses a MySQL database named `sis_db` with the following key tables:
- `course_list`: Stores course information
- `department_list`: Stores department information
- `student_list`: Stores student information
- `academic_history`: Tracks student enrollment and progress
- `users`: Admin users and authentication
- `system_info`: System configuration settings

## Configuration Files

### Client Portal
- `config.php`: Core configuration settings
- `global_config_utils.php`: Path definitions and utility functions
- `DBConnection.php`: Database connection parameters

### Admin Control Panel
- `initialize.php`: Database credentials and base URL definitions
- `config.php`: Core configuration settings and utility functions
- `classes/DBConnection.php`: Database connection handler
- `classes/SystemSettings.php`: System-wide settings management

## Security Features

- Password hashing for user authentication
- Session management and timeout
- Input validation and sanitization
- CSRF protection
- Secure cookie handling

## Development Guidelines

- Follow established CSS naming conventions
- Use the utility functions in configuration files for consistent path handling
- Sanitize all user inputs using the provided sanitization functions
- Maintain accessibility standards with proper ARIA attributes and semantic HTML
- Document any changes to core functionality
- Use prepared statements for database queries

## Browser Compatibility

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest version)
- Opera (latest version)

## Backup Procedures

- Regular database backups should be scheduled
- Configuration files should be backed up after changes
- Media uploads should be included in backup routines

## Contact Information

For technical support or inquiries, contact:
- **Client Portal**: info@pbinstituteofresearch.co.ke | +254 721 214 795
- **Admin Access**: admin@pbinstituteofresearch.co.ke | +254 721 214 795

---

© 2025 PB Institute of Research and Technology. All rights reserved.