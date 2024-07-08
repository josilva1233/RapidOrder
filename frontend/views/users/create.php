<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<main>
    <h2>Create User</h2>
    <form action="/users/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="first_name" required>
        <label for="name">Sobrenome:</label>
        <input type="text" id="name" name="fast_name" required>
        <label for="name">document:</label>
        <input type="text" id="name" name="document" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone_number">phone_number:</label>
        <input type="phone" id="phone_number" name="phone_number" required>
        <label for="phone_number">phone_number:</label>
        <input type="number" id="birth_date" name="birth_date" required>
        <button type="submit">Create</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
