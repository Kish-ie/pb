<?php
//require_once __DIR__ . '/../global_config_utils.php';
require_once __DIR__ . '/../inc/header.php';
?>

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
            justify-content: space-around;
        }
        .course-card:hover {

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
        .course-card .course-content {
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .pagination a:hover {
            background-color: #cc0000;
        }
    </style>

    <div class="container1">
        <h1 style="color: #ff0000; text-align: center;">Our Courses</h1>
        <div class="courses">
            <?php
            require_once('../DBConnection.php');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            try {
                // Pagination variables
                $recordsPerPage = 6;
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $start = ($page - 1) * $recordsPerPage;

                // Fetch total records for pagination
                $totalResult = $conn->query("SELECT COUNT(*) as total FROM course_list WHERE delete_flag = 0 AND status = 1");
                if (!$totalResult) {
                    throw new Exception("Error fetching total records: " . $conn->error);
                }
                $totalRecords = $totalResult->fetch_assoc()['total'];
                $totalPages = ceil($totalRecords / $recordsPerPage);

                // Fetch courses from the database with pagination
                $sql = "SELECT * FROM course_list WHERE delete_flag = 0 AND status = 1 ORDER BY id ASC LIMIT ?, ?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param("ii", $start, $recordsPerPage);
                if (!$stmt->execute()) {
                    throw new Exception("Error executing statement: " . $stmt->error);
                }

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $courseName = htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8');
                        $courseDescription = htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8');

                        echo '<div class="course-card">';
                        echo '<img src="' . $courseName . '" alt="' . $courseName . '">';
                        echo '<div class="course-content">';
                        echo '<h3>' . $courseName . '</h3>';
                        echo '<p>' . $courseDescription . '</p>';
                        echo '<button>Learn more</button>';
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
                        $activeClass = ($i == $page) ? ' style="background-color: #cc0000;"' : '';
                        echo '<a href="?page=' . $i . '"' . $activeClass . '>' . $i . '</a>';
                    }
                    echo '</div>';
                }

            } catch (Exception $e) {
                echo '<p style="color: red;">Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
            } finally {
                if (isset($conn)) {
                    $conn->close();
                }
            }
            ?>
        </div>
    </div>

<?php require_once('../inc/footer.php'); ?>