<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<main>
    <h2>Login</h2>
    <form action="login" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Login</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
