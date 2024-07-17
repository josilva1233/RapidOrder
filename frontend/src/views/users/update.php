<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Update User -->
<main>
    <h2>Update User</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>
        <label for="text">Sobrenome:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>
        <label for="number">document:</label>
        <input type="text" id="document" name="document" value="<?php echo $user['document']; ?>" required>
        <label for="email">email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label for="phone">phone_number:</label>
        <input type="phone" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>
        <label for="email">birth_date:</label>
        <input type="date" id="birth_date" name="birth_date" value="<?php echo $user['birth_date']; ?>" required>
        <button type="submit">Update</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>
