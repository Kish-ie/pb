# PBIRT Admin Control Panel - README.md

## Overview
The PBIRT Admin Control Panel is the administrative backend for managing the PB Training Institute of Research and Technology website. This secure portal provides authorized staff with tools to manage courses, student data, content, and system settings.

## Features
- **User Authentication**: Secure login system with role-based permissions
- **Course Management**: Add, edit, and delete courses
- **Student Records**: Manage student information and enrollments
- **Content Management**: Update website content including news and events
- **System Settings**: Configure global system parameters
- **File Management**: Upload and organize documents and media files

## Technical Stack
- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL (sis_db)
- **Libraries/Frameworks**:
  - Bootstrap (likely used for admin UI)
  - jQuery (for interactive elements)

## Directory Structure
```
admin_cpanel/
├── classes/
│   ├── DBConnection.php
│   └── SystemSettings.php
├── inc/
│   └── header.php
├── config.php
├── initialize.php
└── [other admin modules]
```

## Setup Instructions
1. Ensure you have a web server with PHP 7.4+ and MySQL 5.7+
2. The admin panel shares the same database as the client portal
3. Access is restricted to authorized users only
4. Default login credentials are provided separately for security reasons

## Configuration
The main configuration files are:
- `initialize.php`: Database credentials and base URL definitions
- `config.php`: Core configuration settings and utility functions
- `classes/DBConnection.php`: Database connection handler

## Security Features
- Password hashing for user authentication
- Session management and timeout
- Input validation and sanitization
- CSRF protection

## Database Structure
The system uses a MySQL database named `sis_db` with tables including:
- `course_list`: Stores course information
- User-related tables for authentication
- Content and settings tables

## Development Guidelines
- Always validate and sanitize user inputs
- Use prepared statements for database queries
- Follow the established coding patterns for consistency
- Document any changes to core functionality

## Backup Procedures
- Regular database backups should be scheduled
- Configuration files should be backed up after changes
- Media uploads should be included in backup routines

## Troubleshooting
Common issues:
- Database connection errors: Check credentials in `initialize.php`
- Permission issues: Verify file/directory permissions
- Session problems: Check PHP session configuration

## Contact
For technical support or admin access:
- Email: admin@pbinstituteofresearch.co.ke
- Phone: +254 721 214 795