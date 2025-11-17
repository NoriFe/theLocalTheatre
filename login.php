 <?php $pageTitle = 'the local theatre – login'; ?>
<?php include 'templates/header.php'; ?>

<main class="page-container">
    <section class="login">
        <h2>member login</h2>
        <p>enter your credentials to access announcements, reviews, and community features.</p>

        <form method="post" action="processlogin.php" id="loginForm">
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="login" class="btn">
        </form>
    </section>
</main>

<?php include 'templates/footer.php'; ?>

