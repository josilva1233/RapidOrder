<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Login -->
<main>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="submit">Login</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>