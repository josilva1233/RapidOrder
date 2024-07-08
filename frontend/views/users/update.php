<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<main>
    <h2>Update User</h2>
    <form action="/users/update/<?php echo $user['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Update</button>
    </form>
</main>

<?php include '../templates/footer.php'; ?>
