<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    .vacancies-container {
        width: 90%;
        max-width: 1100px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
        border-radius: 10px;
    }

    .vacancies-container h1 {
        color: #ff0000;
        text-align: center;
        margin-bottom: 30px;
    }

    .vacancy-card {
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.2s ease;
    }

    .vacancy-card:hover {
        background-color: #f9f9f9;
        transform: scale(1.01);
    }

    .vacancy-title {
        font-size: 20px;
        color: #cc0000;
        font-weight: bold;
    }

    .vacancy-meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }

    .vacancy-description {
        font-size: 15px;
        color: #333;
        margin-bottom: 15px;
    }

    .apply-btn {
        background-color: #ff0000;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s ease;
    }

    .apply-btn:hover {
        background-color: #cc0000;
    }
</style>

<div class="vacancies-container">
    <h1>Current Vacancies</h1>
    <?php
    try {
        $sql = "SELECT v.*, d.name AS department_name 
                FROM vacancy_list v 
                INNER JOIN department_list d ON v.department_id = d.id
                WHERE v.status = 1 AND v.delete_flag = 0 
                ORDER BY v.date_posted DESC";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['title']);
                $desc = htmlspecialchars($row['description']);
                $dept = htmlspecialchars($row['department_name']);
                $date = date("F j, Y", strtotime($row['date_posted']));

                echo '<div class="vacancy-card">';
                echo '<div class="vacancy-title">' . $title . '</div>';
                echo '<div class="vacancy-meta">Department: ' . $dept . ' | Posted: ' . $date . '</div>';
                echo '<div class="vacancy-description">' . nl2br($desc) . '</div>';
                echo '<a href="#" class="apply-btn">Apply Now</a>';
                echo '</div>';
            }
        } else {
            echo "<p style='text-align:center;'>No current vacancies available.</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error loading vacancies: " . htmlspecialchars($e->getMessage()) . "</p>";
    } finally {
        $conn->close();
    }
    ?>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
