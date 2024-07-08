<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<main>
    <h2>Create Order</h2>
    <form action="/orders/create" method="POST">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>
        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit">Create</button>
    </form>
</main>

<?php include '../templates/footer.php'; ?>
