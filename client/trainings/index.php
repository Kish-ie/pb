<?php
require_once __DIR__ . '/../global_config_utils.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    /* ===== HERO SECTION ===== */
    .hero {
        position: relative;
        background: linear-gradient(to right, rgba(255, 0, 0, 0.7), rgba(255, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 60px 20px;
        text-align: center;
        margin-bottom: 30px;
        
    }

    .hero h1 {
        font-size: 36px;
        margin-bottom: 15px;
    }

    .hero p {
        font-size: 16px;
        max-width: 700px;
        margin: 0 auto;
    }

    /* ===== DEPARTMENTS SECTION ===== */
    .department-container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto 40px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    .accordion-item {
        margin-bottom: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .accordion-item:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .accordion-header {
        background-color: #f8f8f8;
        color: #333;
        padding: 12px 20px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .accordion-header:after {
        content: '+';
        font-size: 20px;
        font-weight: bold;
    }

    .accordion-header.active:after {
        content: '-';
    }

    .accordion-header.active {
        background-color: #ff0000;
        color: #fff;
    }

    .accordion-content {
        display: none;
        padding: 15px;
        background-color: #f9f9f9;
        animation: fadeIn 0.3s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .course-item {
        padding: 15px;
        margin-bottom: 10px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .course-item:hover {
        background-color: #f5f5f5;
        transform: translateX(5px);
    }

    .course-item strong {
        display: block;
        font-size: 16px;
        color: #ff0000;
        margin-bottom: 5px;
    }

    .course-item small {
        display: block;
        color: #666;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .course-item a {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ff0000;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .course-item a:hover {
        background-color: #d60000;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
</style>

<!-- ===== HERO SECTION ===== -->
<div class="hero" style="height:200px;">
    <h1>Explore Our Trainings</h1>
    <p>Browse our professional training programs designed to enhance your skills and advance your career.</p>
</div>

<!-- ===== DEPARTMENT LIST ===== -->
<div class="department-container">
    <?php
    try {
        $deptSql = "SELECT id, name, description FROM department_list WHERE status = 1 AND delete_flag = 0 ORDER BY name ASC";
        $departments = $conn->query($deptSql);

        if ($departments->num_rows > 0) {
            while ($dept = $departments->fetch_assoc()) {
                $deptId = (int)$dept['id'];
                $deptName = htmlspecialchars($dept['name'], ENT_QUOTES, 'UTF-8');
                $deptDesc = htmlspecialchars($dept['description'], ENT_QUOTES, 'UTF-8');

                echo '<div class="accordion-item">';
                echo '<div class="accordion-header" onclick="toggleAccordion(this)">' . $deptName . '</div>';
                echo '<div class="accordion-content">';

                // Get courses for this department
                $stmt = $conn->prepare("SELECT id, name, description FROM course_list WHERE department_id = ? AND status = 1 AND delete_flag = 0 ORDER BY name ASC");
                $stmt->bind_param("i", $deptId);
                $stmt->execute();
                $courses = $stmt->get_result();

                if ($courses->num_rows > 0) {
                    while ($course = $courses->fetch_assoc()) {
                        $courseId = (int)$course['id'];
                        $courseName = htmlspecialchars($course['name'], ENT_QUOTES, 'UTF-8');
                        $courseDesc = htmlspecialchars($course['description'], ENT_QUOTES, 'UTF-8');

                        echo '<div class="course-item">';
                        echo '<strong>' . $courseName . '</strong>';
                        echo '<small>' . $courseDesc . '</small>';
                        echo '<a href="../courses/course_view.php?page=course_view&id=' . $courseId . '">View Course</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="padding: 15px; color: #666;">No courses available for this department.</p>';
                }

                $stmt->close();
                echo '</div>'; // .accordion-content
                echo '</div>'; // .accordion-item
            }
        } else {
            echo '<p style="padding: 20px; text-align: center; color: #666;">No departments found.</p>';
        }
    } catch (Exception $e) {
        echo '<p style="color:red; padding: 20px; text-align: center;">Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    } finally {
        $conn->close();
    }
    ?>
</div>

<!-- ===== ACCORDION SCRIPT ===== -->
<script>
    function toggleAccordion(header) {
        const content = header.nextElementSibling;
        const isActive = header.classList.contains('active');
        
        // Close all other accordions
        document.querySelectorAll('.accordion-header').forEach(h => {
            if (h !== header) {
                h.classList.remove('active');
                h.nextElementSibling.style.display = 'none';
            }
        });
        
        // Toggle current accordion
        if (isActive) {
            header.classList.remove('active');
            content.style.display = 'none';
        } else {
            header.classList.add('active');
            content.style.display = 'block';
        }
    }
    
    // Open first accordion by default
    document.addEventListener('DOMContentLoaded', function() {
        const firstAccordion = document.querySelector('.accordion-header');
        if (firstAccordion) {
            firstAccordion.click();
        }
    });
</script>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>