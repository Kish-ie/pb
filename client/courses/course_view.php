<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../DBConnection.php';

$courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$course = null;

if ($courseId > 0) {
    $stmt = $conn->prepare("SELECT * FROM course_list WHERE id = ? AND status = 1 AND delete_flag = 0");
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $course = $result->fetch_assoc();
    }
    $stmt->close();
}
?>
<link rel="stylesheet" href="../assets/css/index.css">
<style>
.course-view-container {
        width: 80%;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .course-view-container h2 {
        color: #ff0000;
        margin-bottom: 10px;
    }

    .course-view-container p {
        font-size: 16px;
        color: #333;
    }

    .register-section {
        margin-top: 40px;
        border-top: 1px solid #ddd;
        padding-top: 30px;
    }

    .register-section h3 {
        color: #cc0000;
        margin-bottom: 20px;
    }

    .register-form input, .register-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .register-form button {
        background-color: #ff0000;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .register-form button:hover {
        background-color: #cc0000;
    }

    .success-msg {
        color: green;
        font-weight: bold;
    }

    .error-msg {
        color: red;
        font-weight: bold;
    }
</style>

<div class="course-view-container">
    <?php if ($course): ?>
        <h2><?= htmlspecialchars($course['name']) ?></h2>
        <p><?= nl2br(htmlspecialchars($course['description'])) ?></p>

        <div class="register-section">
            <h3>Register for this Course</h3>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_course'])) {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $note = trim($_POST['note']);

                if ($name && $email) {
                    $stmt = $conn->prepare("INSERT INTO course_registrations (course_id, name, email, note, date_created) VALUES (?, ?, ?, ?, NOW())");
                    $stmt->bind_param("isss", $courseId, $name, $email, $note);

                    if ($stmt->execute()) {
                        echo '<p class="success-msg">You have successfully registered!</p>';
                    } else {
                        echo '<p class="error-msg">Failed to register. Please try again.</p>';
                    }
                    $stmt->close();
                } else {
                    echo '<p class="error-msg">Name and Email are required.</p>';
                }
            }
            ?>

            <form class="register-form" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="note" rows="4" placeholder="Additional Note (optional)"></textarea>
                <button type="submit" name="register_course">Submit Registration</button>
            </form>
        </div>
    <?php else: ?>
        <h2>Course Not Found</h2>
        <p>This course may not exist or is no longer available.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
