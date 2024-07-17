<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Register -->
<main>
    <h2>Register</h2>
    <form action="register" method="POST">
        <label for="">Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>
