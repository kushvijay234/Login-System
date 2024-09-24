<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
