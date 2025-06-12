<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    .downloads-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
    }

    .downloads-container h1 {
        text-align: center;
        color: #ff0000;
        margin-bottom: 30px;
    }

    .download-item {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .download-item:last-child {
        border-bottom: none;
    }

    .download-title {
        font-size: 18px;
        font-weight: bold;
        color: #cc0000;
    }

    .download-meta {
        font-size: 14px;
        color: #888;
        margin-bottom: 8px;
    }

    .download-desc {
        margin-bottom: 10px;
        font-size: 15px;
        color: #333;
    }

    .download-link {
        background: #ff0000;
        color: #fff;
        padding: 8px 14px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: background 0.2s ease;
    }

    .download-link:hover {
        background: #c40000;
    }
</style>

<div class="downloads-container">
    <h1>Downloadable Resources</h1>

    <?php
    try {
        $query = "SELECT * FROM download_list WHERE status = 1 AND delete_flag = 0 ORDER BY date_uploaded DESC";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['title']);
                $desc = htmlspecialchars($row['description']);
                $file = htmlspecialchars($row['file_path']);
                $date = date("F j, Y", strtotime($row['date_uploaded']));

                echo '<div class="download-item">';
                echo '<div class="download-title">' . $title . '</div>';
                echo '<div class="download-meta">Uploaded: ' . $date . '</div>';
                echo '<div class="download-desc">' . nl2br($desc) . '</div>';
                echo '<a class="download-link" href="' . $file . '" download>Download</a>';
                echo '</div>';
            }
        } else {
            echo "<p style='text-align:center;'>No files available for download.</p>";
        }
    } catch (Exception $e) {
        echo '<p style="color:red;">Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    } finally {
        $conn->close();
    }
    ?>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
