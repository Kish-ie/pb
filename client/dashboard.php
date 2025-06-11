<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --parent-sidebar-width: 250px;
            --child-sidebar-width: 220px;
            --collapsed-width: 70px;
            --header-height: 80px;
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --tertiary-color: #3d566e;
            --accent-color: #3498db;
            --danger-color: #e74c3c;
            --text-light: #ecf0f1;
            --text-dark: #333;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: var(--text-dark);
            line-height: 1.6;
            display: grid;
            grid-template-columns: var(--parent-sidebar-width) var(--child-sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr auto;
            grid-template-areas:
                "header header header"
                "parent-sidebar child-sidebar main"
                "footer footer footer";
            min-height: 100vh;
            transition: all var(--transition-speed) ease;
        }

        body.parent-collapsed {
            grid-template-columns: var(--collapsed-width) var(--child-sidebar-width) 1fr;
        }

        body.child-collapsed {
            grid-template-columns: var(--parent-sidebar-width) var(--collapsed-width) 1fr;
        }

        body.both-collapsed {
            grid-template-columns: var(--collapsed-width) var(--collapsed-width) 1fr;
        }

        /* Header Styles */
        header {
            grid-area: header;
            background-color: var(--primary-color);
            color: white;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        header h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        header a {
            color: white;
            text-decoration: none;
            background-color: var(--danger-color);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color var(--transition-speed);
        }

        header a:hover {
            background-color: #c0392b;
        }

        /* Parent Sidebar */
        #parent-sidebar {
            grid-area: parent-sidebar;
            background-color: var(--secondary-color);
            color: white;
            padding: 1.5rem 0;
            overflow: hidden;
            position: relative;
            border-right: 1px solid rgba(0,0,0,0.1);
        }

        /* Child Sidebar */
        #child-sidebar {
            grid-area: child-sidebar;
            background-color: var(--tertiary-color);
            color: white;
            padding: 1.5rem 0;
            overflow: hidden;
            position: relative;
            border-right: 1px solid rgba(0,0,0,0.1);
        }

        .sidebar-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-speed);
            z-index: 5;
        }

        .sidebar-toggle:hover {
            background: rgba(255,255,255,0.2);
        }

        #parent-sidebar .sidebar-toggle {
            right: 1rem;
        }

        #child-sidebar .sidebar-toggle {
            right: 1rem;
        }

        nav ul {
            list-style-type: none;
            padding-top: 2rem;
        }

        nav li {
            margin-bottom: 0.5rem;
            white-space: nowrap;
        }

        nav a {
            display: flex;
            align-items: center;
            color: var(--text-light);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            transition: all var(--transition-speed);
            font-size: 1rem;
            gap: 1rem;
        }

        nav a:hover, nav a:focus {
            background-color: rgba(0,0,0,0.1);
            color: #fff;
        }

        #parent-sidebar nav a:hover {
            border-left: 4px solid var(--accent-color);
        }

        #child-sidebar nav a:hover {
            border-left: 4px solid #f39c12;
        }

        nav a i {
            font-size: 1.2rem;
            min-width: 24px;
            text-align: center;
        }

        nav .link-text {
            transition: opacity var(--transition-speed);
        }

        /* Collapsed states */
        body.parent-collapsed #parent-sidebar .link-text,
        body.child-collapsed #child-sidebar .link-text,
        body.both-collapsed .link-text {
            opacity: 0;
            width: 0;
            display: none;
        }

        body.parent-collapsed #parent-sidebar nav a,
        body.child-collapsed #child-sidebar nav a,
        body.both-collapsed nav a {
            justify-content: center;
            padding: 0.8rem 0;
        }

        body.parent-collapsed #parent-sidebar nav li,
        body.child-collapsed #child-sidebar nav li,
        body.both-collapsed nav li {
            text-align: center;
        }

        /* Main Content Area */
        main {
            grid-area: main;
            padding: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            align-content: start;
        }

        section {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform var(--transition-speed), box-shadow var(--transition-speed);
        }

        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        section h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent-color);
            font-size: 1.3rem;
        }

        section ul {
            list-style-type: none;
        }

        section li {
            margin-bottom: 0.7rem;
        }

        section a {
            color: #2980b9;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 4px;
            transition: all 0.2s;
        }

        section a:hover {
            background-color: #f0f8ff;
            color: #1a5276;
            padding-left: 1rem;
        }

        /* Footer Styles */
        footer {
            grid-area: footer;
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
        }

        /* Active menu item */
        .active-parent {
            background-color: rgba(0,0,0,0.2) !important;
            border-left: 4px solid var(--accent-color) !important;
        }

        .active-child {
            background-color: rgba(0,0,0,0.2) !important;
            border-left: 4px solid #f39c12 !important;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            body {
                grid-template-columns: var(--collapsed-width) var(--child-sidebar-width) 1fr;
            }
            
            body.parent-collapsed {
                grid-template-columns: var(--collapsed-width) var(--collapsed-width) 1fr;
            }
            
            #parent-sidebar .link-text {
                opacity: 0;
                width: 0;
                display: none;
            }
            
            #parent-sidebar nav a {
                justify-content: center;
                padding: 0.8rem 0;
            }
            
            #parent-sidebar nav li {
                text-align: center;
            }
        }

        @media (max-width: 992px) {
            body {
                grid-template-columns: var(--collapsed-width) var(--collapsed-width) 1fr;
                grid-template-areas:
                    "header header header"
                    "parent-sidebar child-sidebar main"
                    "footer footer footer";
            }
            
            #child-sidebar .link-text {
                opacity: 0;
                width: 0;
                display: none;
            }
            
            #child-sidebar nav a {
                justify-content: center;
                padding: 0.8rem 0;
            }
            
            #child-sidebar nav li {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            body {
                grid-template-columns: 1fr;
                grid-template-rows: var(--header-height) 1fr auto;
                grid-template-areas:
                    "header"
                    "main"
                    "footer";
            }
            
            #parent-sidebar, #child-sidebar {
                position: fixed;
                top: var(--header-height);
                height: calc(100vh - var(--header-height));
                z-index: 100;
                transition: transform var(--transition-speed);
            }
            
            #parent-sidebar {
                left: 0;
                width: var(--parent-sidebar-width);
                transform: translateX(-100%);
            }
            
            #child-sidebar {
                left: var(--parent-sidebar-width);
                width: var(--child-sidebar-width);
                transform: translateX(-100%);
            }
            
            body.parent-sidebar-open #parent-sidebar {
                transform: translateX(0);
            }
            
            body.child-sidebar-open #child-sidebar {
                transform: translateX(0);
            }
            
            .link-text {
                opacity: 1 !important;
                display: inline !important;
            }
            
            nav a {
                justify-content: flex-start !important;
                padding: 0.8rem 1.5rem !important;
            }
            
            nav li {
                text-align: left !important;
            }
            
            .mobile-menu-toggle {
                display: block !important;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
                margin-right: 1rem;
            }
            
            .mobile-child-toggle {
                display: block !important;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
            }
            
            main {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            header {
                flex-direction: row;
                text-align: center;
                gap: 1rem;
                padding: 1rem;
                height: auto;
                flex-wrap: wrap;
            }
            
            section {
                padding: 1rem;
            }
            
            #child-sidebar {
                left: 0;
                width: 100%;
            }
        }

        /* Animation for section entries */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        section {
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }

        /* Create staggered animation */
        section:nth-child(1) { animation-delay: 0.1s; }
        section:nth-child(2) { animation-delay: 0.2s; }
        section:nth-child(3) { animation-delay: 0.3s; }
        section:nth-child(4) { animation-delay: 0.4s; }
        section:nth-child(5) { animation-delay: 0.5s; }
        section:nth-child(6) { animation-delay: 0.6s; }
        section:nth-child(7) { animation-delay: 0.7s; }

        /* Mobile Menu Toggles */
        .mobile-menu-toggle {
            display: none;
        }

        .mobile-child-toggle {
            display: none;
            position: absolute;
            left: 1rem;
            top: 1rem;
        }

        /* Tooltips for collapsed state */
        [data-tooltip] {
            position: relative;
        }

        [data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            white-space: nowrap;
            z-index: 100;
            margin-left: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <button class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <h1>Student Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($student['firstname']); ?> <?php echo htmlspecialchars($student['lastname']); ?></p>
        <a href="logout.php">Logout</a>
    </header>
    
    <aside id="parent-sidebar">
        <button class="sidebar-toggle" data-target="parent">
            <i class="fas fa-chevron-left"></i>
        </button>
        <nav>
            <ul>
                <li>
                    <a href="#" class="active-parent" data-tooltip="Academic Information" data-show-child="academic">
                        <i class="fas fa-graduation-cap"></i>
                        <span class="link-text">Academic Information</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="Registration & Enrollment" data-show-child="registration">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="link-text">Registration & Enrollment</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="Financial Information" data-show-child="financial">
                        <i class="fas fa-money-bill-wave"></i>
                        <span class="link-text">Financial Information</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="Communication Tools" data-show-child="communication">
                        <i class="fas fa-comments"></i>
                        <span class="link-text">Communication Tools</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="Personal & Support" data-show-child="support">
                        <i class="fas fa-hands-helping"></i>
                        <span class="link-text">Personal & Support</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="Campus Life" data-show-child="campus">
                        <i class="fas fa-home"></i>
                        <span class="link-text">Campus Life</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-tooltip="System Tools" data-show-child="system">
                        <i class="fas fa-cog"></i>
                        <span class="link-text">System Tools</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    
    <aside id="child-sidebar">
        <button class="mobile-child-toggle">
            <i class="fas fa-arrow-left"></i>
        </button>
        <button class="sidebar-toggle" data-target="child">
            <i class="fas fa-chevron-left"></i>
        </button>
        <nav id="academic-child">
            <ul>
                <li><a href="class_schedule.php" class="active-child"><i class="fas fa-calendar-alt"></i><span class="link-text">Class Schedule</span></a></li>
                <li><a href="grades_transcripts.php"><i class="fas fa-award"></i><span class="link-text">Grades & Transcripts</span></a></li>
                <li><a href="course_materials.php"><i class="fas fa-book"></i><span class="link-text">Course Materials</span></a></li>
                <li><a href="assignment_deadlines.php"><i class="fas fa-tasks"></i><span class="link-text">Assignment Deadlines</span></a></li>
                <li><a href="class_announcements.php"><i class="fas fa-bullhorn"></i><span class="link-text">Class Announcements</span></a></li>
                <li><a href="attendance_records.php"><i class="fas fa-user-check"></i><span class="link-text">Attendance Records</span></a></li>
            </ul>
        </nav>
        
        <nav id="registration-child" style="display:none;">
            <ul>
                <li><a href="course_registration.php"><i class="fas fa-pen-fancy"></i><span class="link-text">Course Registration</span></a></li>
                <li><a href="degree_progress.php"><i class="fas fa-chart-line"></i><span class="link-text">Degree Progress Tracker</span></a></li>
                <li><a href="academic_calendar.php"><i class="fas fa-calendar"></i><span class="link-text">Academic Calendar</span></a></li>
            </ul>
        </nav>
        
        <!-- Add similar nav sections for other child menus -->
    </aside>
    
    <main>
        <!-- Your existing sections here -->
    </main>
    
    <footer>
        <p>&copy; 2023 Student Information System</p>
    </footer>

    <script>
        // Toggle sidebar collapse
        document.querySelectorAll('.sidebar-toggle').forEach(button => {
            button.addEventListener('click', (e) => {
                const target = button.getAttribute('data-target');
                
                if (target === 'parent') {
                    document.body.classList.toggle('parent-collapsed');
                    const icon = button.querySelector('i');
                    if (document.body.classList.contains('parent-collapsed')) {
                        icon.classList.remove('fa-chevron-left');
                        icon.classList.add('fa-chevron-right');
                    } else {
                        icon.classList.remove('fa-chevron-right');
                        icon.classList.add('fa-chevron-left');
                    }
                } else if (target === 'child') {
                    document.body.classList.toggle('child-collapsed');
                    const icon = button.querySelector('i');
                    if (document.body.classList.contains('child-collapsed')) {
                        icon.classList.remove('fa-chevron-left');
                        icon.classList.add('fa-chevron-right');
                    } else {
                        icon.classList.remove('fa-chevron-right');
                        icon.classList.add('fa-chevron-left');
                    }
                }
            });
        });

        // Mobile menu toggle
        document.querySelector('.mobile-menu-toggle').addEventListener('click', () => {
            document.body.classList.toggle('parent-sidebar-open');
            document.body.classList.remove('child-sidebar-open');
        });

        // Mobile child menu toggle
        document.querySelector('.mobile-child-toggle').addEventListener('click', () => {
            document.body.classList.toggle('child-sidebar-open');
        });

        // Close sidebars when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                if (!e.target.closest('aside') && !e.target.closest('.mobile-menu-toggle') && !e.target.closest('.mobile-child-toggle')) {
                    document.body.classList.remove('parent-sidebar-open', 'child-sidebar-open');
                }
            }
        });

        // Parent menu click handler to show child menus
        document.querySelectorAll('#parent-sidebar nav a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove active class from all parent links
                document.querySelectorAll('#parent-sidebar nav a').forEach(a => {
                    a.classList.remove('active-parent');
                });
                
                // Add active class to clicked link
                link.classList.add('active-parent');
                
                // Get which child menu to show
                const childMenuId = link.getAttribute('data-show-child') + '-child';
                
                // Hide all child menus
                document.querySelectorAll('#child-sidebar nav').forEach(nav => {
                    nav.style.display = 'none';
                });
                
                // Show selected child menu
                document.getElementById(childMenuId).style.display = 'block';
                
                // On mobile, automatically show child sidebar when parent item is clicked
                if (window.innerWidth <= 768) {
                    document.body.classList.add('child-sidebar-open');
                }
            });
        });

        // Child menu click handler
        document.querySelectorAll('#child-sidebar nav a').forEach(link => {
            link.addEventListener('click', (e) => {
                // Remove active class from all child links
                document.querySelectorAll('#child-sidebar nav a').forEach(a => {
                    a.classList.remove('active-child');
                });
                
                // Add active class to clicked link
                link.classList.add('active-child');
                
                // On mobile, close both sidebars after selection
                if (window.innerWidth <= 768) {
                    document.body.classList.remove('parent-sidebar-open', 'child-sidebar-open');
                }
            });
        });

        // Initialize - show academic child menu by default
        document.getElementById('academic-child').style.display = 'block';
    </script>
</body>
</html>