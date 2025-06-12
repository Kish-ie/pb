<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    .gallery-container {
        width: 90%;
        margin: 30px auto;
        max-width: 1200px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .gallery-title {
        color: #ff0000;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }

    .gallery-item {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        background-color: #fff;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 14px rgba(0,0,0,0.15);
    }

    .gallery-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }

    .gallery-content {
        padding: 15px;
    }

    .gallery-content h3 {
        margin: 0 0 10px;
        color: #ff0000;
        font-size: 1.2rem;
    }

    .gallery-content p {
        font-size: 0.9rem;
        color: #444;
        line-height: 1.4;
    }

    .gallery-date {
        margin-top: 10px;
        font-size: 0.8rem;
        color: #888;
        font-style: italic;
    }
</style>

<div class="gallery-container">
    <h1 class="gallery-title">Gallery - Latest Uploads</h1>
    <div class="gallery-grid">
        <?php
        try {
            $sql = "SELECT id, title, image_url, description, date_created FROM gallery WHERE 1 ORDER BY date_created DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                    $image = htmlspecialchars($row['image_url'], ENT_QUOTES, 'UTF-8');
                    $desc = htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8');
                    $date = date("F j, Y, g:i a", strtotime($row['date_created']));

                    echo '<div class="gallery-item">';
                    echo '<img src="' . $image . '" alt="' . $title . '" class="gallery-image">';
                    echo '<div class="gallery-content">';
                    echo '<h3>' . $title . '</h3>';
                    echo '<p>' . $desc . '</p>';
                    echo '<div class="gallery-date">Uploaded on ' . $date . '</div>';
                    echo '</div></div>';
                }
            } else {
                echo '<p style="text-align:center; color:#666;">No images found in the gallery.</p>';
            }
        } catch (Exception $e) {
            echo '<p style="color:red; text-align:center;">Error loading gallery: ' . htmlspecialchars($e->getMessage()) . '</p>';
        } finally {
            $conn->close();
        }
        ?>
    </div>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
