<?php
session_start();

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll = $conn->real_escape_string($_POST['roll']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT id, roll, password FROM student_list WHERE roll = '$roll' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $_SESSION['student_id'] = $student['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid roll number or password";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h1>Student Login</h1>
    </header>
    <main>
        <form action="login.php" method="POST">
            <label for="roll">Roll Number:</label>
            <input type="text" id="roll" name="roll" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2023 Student Information System</p>
    </footer>
</body>
</html>