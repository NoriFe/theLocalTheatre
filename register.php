<?php $pageTitle = 'the local theatre – register'; ?>
<?php include 'templates/header.php'; ?>

<main class="page-container">
    <section class="register">
        <h2>create an account</h2>
        <p>register below to comment on announcements, reviews, and join the local theatre community.</p>

        <form method="post" action="registerform.php" id="registerForm">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">confirm password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <input type="submit" value="register" class="btn">
        </form>
    </section>
</main>

<?php include 'templates/footer.php'; ?>
