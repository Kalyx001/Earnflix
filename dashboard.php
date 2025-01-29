<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Welcome, <?php echo $_SESSION["user"]; ?>!</h2>
    <p>This is your user dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
