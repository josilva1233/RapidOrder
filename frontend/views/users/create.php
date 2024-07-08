<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Create User -->
<main>
    <h2>Create User</h2>
    <form action="create/" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="fast_name" name="fast_name" required>
        <label for="name">Sobrenome:</label>
        <input type="text" id="fast_name" name="fist_name" required>
        <label for="document">document:</label>
        <input type="text" id="document" name="document" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone_number">phone_number:</label>
        <input type="phone" id="phone_number" name="phone_number" required>
        <label for="birth_date">birth_date:</label>
        <input type="date" id="birth_date" name="birth_date" required>
        <button type="submit">Create</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>
