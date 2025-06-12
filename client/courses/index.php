<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    .container1 {
        width: 90%;
        margin: 20px auto;
        padding: 40px 20px 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .courses {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .course-card {
        width: calc(33.333% - 20px);
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .course-card:hover {
        transform: scale(1.05);
    }

    .course-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .course-content {
        padding: 15px;
    }

    .course-card h3 {
        color: #ff0000;
        margin: 0 0 10px;
    }

    .course-card p {
        color: #333;
        font-size: 14px;
        line-height: 1.5;
    }

    .course-card a {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #ff0000;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
    }

    .course-card a:hover {
        background-color: #cc0000;
    }

    .pagination {
        margin-top: 30px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        padding: 8px 16px;
        background-color: #ff0000;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .pagination a.active,
    .pagination a:hover {
        background-color: #cc0000;
    }
</style>

<div class="container1">
    <h1 style="color: #ff0000; text-align: center;">Our Courses</h1>
    <div class="courses">
        <?php
        if ($conn->connect_error) {
            die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
        }

        try {
            // Pagination setup
            $recordsPerPage = 6;
            $p = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
            $start = ($p - 1) * $recordsPerPage;

            // Get total number of records
            $totalResult = $conn->query("SELECT COUNT(*) as total FROM course_list WHERE delete_flag = 0 AND status = 1");
            if (!$totalResult) {
                throw new Exception("Error fetching total records: " . $conn->error);
            }
            $totalRecords = $totalResult->fetch_assoc()['total'];
            $totalPages = ceil($totalRecords / $recordsPerPage);

            // Get paginated course data
            $stmt = $conn->prepare("SELECT * FROM course_list WHERE delete_flag = 0 AND status = 1 ORDER BY id ASC LIMIT ?, ?");
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("ii", $start, $recordsPerPage);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $courseId = (int)$row['id'];
                    $courseName = htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');
                    $courseDescription = htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8');
                    $image = !empty($row["image_url"]) ? htmlspecialchars($row["image_url"], ENT_QUOTES, 'UTF-8') : '../assets/img/default-course.jpg';

                    echo '<div class="course-card">';
                    echo '<img src="' . $image . '" alt="' . $courseName . '">';
                    echo '<div class="course-content">';
                    echo '<h3>' . $courseName . '</h3>';
                    echo '<p>' . $courseDescription . '</p>';
                    echo '<a href="../courses/course_view.php?page=course_view&id=' . $courseId . '">View Course</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No courses found.</p>";
            }

            $stmt->close();

            // Pagination links
            if ($totalPages > 1) {
                echo '<div class="pagination">';
                for ($i = 1; $i <= $totalPages; $i++) {
                    $active = ($i == $p) ? ' class="active"' : '';
                    echo '<a href="../index.php?page=courses&p=' . $i . '"' . $active . '>' . $i . '</a>';
                }
                echo '</div>';
            }
        } catch (Exception $e) {
            echo '<p style="color: red;">Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
        } finally {
            $conn->close();
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
