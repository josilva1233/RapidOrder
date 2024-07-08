<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<main>
    <h2>Users</h2>
    <a href="/users/create">Create User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="/users/update/<?php echo $user['id']; ?>">Edit</a>
                        <a href="/users/delete/<?php echo $user['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include '../templates/footer.php'; ?>
