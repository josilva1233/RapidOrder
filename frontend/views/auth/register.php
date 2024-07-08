<?php include '../../templates/header.php'; ?>
<?php include '../../templates/sidebar.php'; ?>

<main>
    <h2>Register</h2>
    <form action="auth/register" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</main>

<?php include '../../templates/footer.php'; ?>
