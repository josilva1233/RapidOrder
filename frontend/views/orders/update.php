<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<main>
    <h2>Update Order</h2>
    <form action="orders/update/<?php echo $order['id']; ?>" method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" value="<?php echo $order['user_id']; ?>" required>
        <label for="description">description:</label>
        <input type="text" id="description" name="description" value="<?php echo $order['description']; ?>" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $order['quantity']; ?>" required>
        <label for="price">price:</label>
        <input type="number" id="price" name="price" value="<?php echo $order['price']; ?>" required>
        <button type="submit">Update</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
