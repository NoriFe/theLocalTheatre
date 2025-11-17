<?php
session_start();
require 'php/db.class.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // get db connection
    $conn = db::getInstance();

    // fetch user by email
    $sql = "SELECT id, username, password_hash, role, status FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // ✅ check if banned
        if ($user['status'] === 'banned') {
            echo "<p style='color:red;'>Your account has been banned. Please contact the administrator for assistance.</p>";
            exit;
        }

        // verify password
        if (password_verify($password, $user['password_hash'])) {
            // set session variables
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['username']  = $user['username'];
            $_SESSION['role']      = $user['role'];

            // redirect to dashboard or homepage
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>