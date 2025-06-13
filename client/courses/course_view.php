<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../classes/DBConnection.php';

// Instantiate DBConnection and get the connection
$dbConnection = new DBConnection();
$conn = $dbConnection->getConnection();

if ($conn === null) {
    die("Database connection failed. Check configuration and logs.");
}

$courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$course = null;
$department = null;

if ($courseId > 0) {
    // Get course with department information
    $stmt = $conn->prepare("SELECT cl.*, dl.name AS department_name 
                          FROM course_list cl
                          LEFT JOIN department_list dl ON cl.department_id = dl.id
                          WHERE cl.id = ? AND cl.status = 1 AND cl.delete_flag = 0");
    $stmt->bind_param("i", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $course = $result->fetch_assoc();
    }
    $stmt->close();
}

// Handle registration form submission
$registrationSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_course'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $note = trim($_POST['note']);

    if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO course_registrations 
                              (course_id, name, email, phone, note, date_created) 
                              VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issss", $courseId, $name, $email, $phone, $note);

        if ($stmt->execute()) {
            $registrationSuccess = true;
        }
        $stmt->close();
    }
}
?>
<link rel="stylesheet" href="../assets/css/index.css">
<style>
.course-view-container {
    width: 80%;
    margin: 150px auto 40px;
    background: #fff;
    padding: 30px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.course-header {
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.course-view-container h2 {
    color: #cc0000;
    margin-bottom: 10px;
}

.course-meta {
    color: #666;
    margin-bottom: 15px;
    font-size: 14px;
}

.course-view-container p {
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

.course-notes {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    margin: 25px 0;
    border-left: 4px solid #cc0000;
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

.register-form input, 
.register-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

.register-form button {
    background-color: #cc0000;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.register-form button:hover {
    background-color: #a30000;
}

.success-msg {
    color: #28a745;
    background-color: #e8f5e9;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
}

.error-msg {
    color: #dc3545;
    background-color: #f8d7da;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    text-align: center;
}

@media (max-width: 768px) {
    .course-view-container {
        width: 95%;
        margin: 120px auto 30px;
        padding: 20px;
    }
}
</style>

<div class="course-view-container">
    <?php if ($course): ?>
        <div class="course-header">
            <h2><?= htmlspecialchars($course['name']) ?></h2>
            <?php if (!empty($course['department_name'])): ?>
                <p class="course-meta"><strong>Department:</strong> <?= htmlspecialchars($course['department_name']) ?></p>
            <?php endif; ?>
        </div>
        
        <p><?= nl2br(htmlspecialchars($course['description'])) ?></p>
        
        <?php if (!empty($course['notes'])): ?>
            <div class="course-notes">
                <h3>Additional Notes</h3>
                <p><?= nl2br(htmlspecialchars($course['notes'])) ?></p>
            </div>
        <?php endif; ?>

        <div class="register-section">
            <h3>Register for this Course</h3>
            
            <?php if ($registrationSuccess): ?>
                <div class="success-msg">You have successfully registered! We will contact you soon.</div>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !$registrationSuccess): ?>
                <div class="error-msg">Please fill all required fields correctly.</div>
            <?php endif; ?>

            <form class="register-form" method="POST">
                <input type="text" name="name" placeholder="Your Full Name" required
                       value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                <input type="email" name="email" placeholder="Your Email Address" required
                       value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                <input type="tel" name="phone" placeholder="Your Phone Number (optional)"
                       value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                <textarea name="note" rows="4" placeholder="Additional Information (optional)"><?= 
                    isset($_POST['note']) ? htmlspecialchars($_POST['note']) : '' ?></textarea>
                <button type="submit" name="register_course">Submit Registration</button>
            </form>
        </div>
    <?php else: ?>
        <h2>Course Not Found</h2>
        <p>This course may not exist or is no longer available.</p>
        <a href="../courses/" class="btn btn-primary">Browse Available Courses</a>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('.register-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const name = form.querySelector('input[name="name"]');
            const email = form.querySelector('input[name="email"]');
            
            if (!name.value.trim() || !email.value.trim()) {
                e.preventDefault();
                alert('Please fill in all required fields.');
                return false;
            }
            
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                return false;
            }
        });
    }
});
</script>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>