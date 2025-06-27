<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../classes/DBConnection.php';

// Get search query
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';

// Instantiate DBConnection
$dbConnection = new DBConnection();
$conn = $dbConnection->getConnection();

if ($conn === null) {
    die("Database connection failed. Check configuration and logs.");
}

$courses = [];
if (!empty($searchQuery)) {
    try {
        // Search only in available courses (status=1, delete_flag=0)
        $stmt = $conn->prepare("SELECT cl.*, dl.name AS department_name 
                              FROM course_list cl
                              LEFT JOIN department_list dl ON cl.department_id = dl.id
                              WHERE (cl.name LIKE ? OR cl.description LIKE ?)
                              AND cl.status = 1 AND cl.delete_flag = 0
                              ORDER BY cl.name ASC");
        
        $searchParam = "%{$searchQuery}%";
        $stmt->bind_param("ss", $searchParam, $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }
        $stmt->close();
    } catch (Exception $e) {
        error_log("Search error: " . $e->getMessage());
        $error = "An error occurred while searching. Please try again.";
    }
}

// Determine the correct base URL for course details
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$course_detail_path = '/pbirt/client/courses/course_view.php'; // Adjust this path as needed
?>

<link rel="stylesheet" href="../assets/css/index.css">
<style>
.search-results-container {
    padding: 60px 0;
    min-height: 60vh;
}

.search-results-container h2 {
    margin-bottom: 30px;
    color: #333;
    font-size: 2rem;
    text-align: center;
}

.search-results-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.search-result-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 25px;
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.search-result-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.no-results {
    text-align: center;
    padding: 50px 20px;
    background: #f9f9f9;
    border-radius: 8px;
    margin: 30px 0;
}

.error-message {
    color: #d9534f;
    background-color: #f2dede;
    border-color: #ebccd1;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    text-align: center;
}

.btn-primary {
    display: inline-block;
    padding: 8px 20px;
    background-color: #cc0000;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #a30000;
}
</style>

<div class="search-results-container">
    <div class="container" style="margin-top:150px;">
        <?php if (isset($error)): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <h2>Search Results for "<?= htmlspecialchars($searchQuery) ?>"</h2>
        
        <?php if (!empty($searchQuery)): ?>
            <?php if (!empty($courses)): ?>
                <div class="search-results-grid">
                    <?php foreach ($courses as $course): ?>
                        <div class="search-result-card">
                            <h3>
                                <a href="<?= $base_url . $course_detail_path ?>?id=<?= htmlspecialchars($course['id']) ?>">
                                    <?= htmlspecialchars($course['name']) ?>
                                </a>
                            </h3>
                            <?php if (!empty($course['department_name'])): ?>
                                <p><strong>Department:</strong> <?= htmlspecialchars($course['department_name']) ?></p>
                            <?php endif; ?>
                            <p><?= nl2br(htmlspecialchars(substr($course['description'], 0, 200))) ?>...</p>
                            <a href="<?= $base_url . $course_detail_path ?>?id=<?= htmlspecialchars($course['id']) ?>" class="btn-primary">
                                View Course Details
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <p>No available courses found matching your search.</p>
                    <p>This course may not exist or is no longer available.</p>
                    <a href="/pbirt/client/courses/" class="btn-primary">Browse All Available Courses</a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="no-results">
                <p>Please enter a search term to find courses.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>