<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- User Orders -->
<main>
    <h2>User Orders</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td><?php echo $order['description']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>
