<?php
session_start();
require 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Basic validation
    if ($password !== $confirmPassword || strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
        $error = "Passwords do not match or are not strong enough.";
    } else {
        if (registerUser($username, $email, $password)) {
            $_SESSION['user'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error = "User registration failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Register</h2>
        <div><?php if(isset($error)) echo $error; ?></div>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
