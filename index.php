<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>the local theatre</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'templates/header.php'; ?>   
    <main class="page-container">
    <section class="welcome">
        <h1>welcome to the local theatre</h1>
        <p>
            this prototype website has been developed for assessment 2. it provides a hub for announcements, 
            movie reviews, and community interaction. registered users can log in, comment, and participate, 
            while administrators can manage posts and moderate content.
        </p>
        <div class="actions">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.php" class="btn">login</a>
                    <a href="register.php" class="btn">register</a>
                <?php else: ?>
                    <a href="dashboard.php" class="btn">go to dashboard</a>
                    <a href="logout.php" class="btn">logout</a>
                <?php endif; ?>
        </div>
    </section>
    </main>
    <?php include 'templates/footer.php'; ?>
</body>
</html>