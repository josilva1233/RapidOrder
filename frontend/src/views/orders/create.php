<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Create Order -->
<main>
    <h2>Create Order</h2>
    <form action="create/" method="POST">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id"  required>
        <label for="description">description:</label>
        <input type="text" id="description" name="description" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <label for="quantity">price:</label>
        <input type="number" id="price" name="price" required>
        <button type="submit">Create</button>
    </form>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>