<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<main>
    <h2>Orders</h2>
    <a href="create">Create Order</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>description </th>
                <th>quantity</th>
                <th>price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td><?php echo $order['description']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['price']; ?></td>
                    <td>
                        <a href="update/<?php echo $order['id']; ?>">Edit</a>
                        <a href="delete/<?php echo $order['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include 'templates/footer.php'; ?>
