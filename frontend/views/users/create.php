<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Create User -->
<main>
    <h2>Create User</h2>
    <form action="create/" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <label for="name">Sobrenome:</label>
        <input type="text" id="last_name" name="last_name" required>
        <label for="document">Document:</label>
        <input type="text" id="document" name="document" required oninput="this.value = formatCPF(this.value)">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone_number">Telefone:</label>
        <input type="text" id="phone_number" name="phone_number" required oninput="this.value = formatPhone(this.value)">
        <label for="birth_date">Data de Nascimento:</label>
        <input type="date" id="birth_date" name="birth_date" required>
        <button type="submit">Create</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>
