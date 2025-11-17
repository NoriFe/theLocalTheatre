<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?? 'the local theatre'; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>the local theatre</h1>
    <nav>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="announcements.php">announcements</a></li>
            <li><a href="movies.php">movies</a></li>
            <li><a href="reviews.php">reviews</a></li>

            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php">login</a></li>
                <li><a href="register.php">register</a></li>
            <?php else: ?>
                <li><a href="dashboard.php">dashboard</a></li>
                <li><a href="logout.php">logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>