<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Sign In</button>
    </form>
</body>
</html>

<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // Store user session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user"] = $user["username"];
            
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "<p style='color: red;'>Incorrect password!</p>";
        }
    } else {
        echo "<p style='color: red;'>No account found with this email!</p>";
    }
}
?>
