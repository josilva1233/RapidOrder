<!-- Include templates -->
<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>
<!-- Users -->
<main>
    <h2>Users</h2>
    <a href="create">Create User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Sobrenome</th>
                <th>Document</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Birth Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['document']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone_number']; ?></td>
                    <td><?php echo $user['birth_date']; ?></td>
                    <td>
                        <a href="update/<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete/<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<!-- Include templates -->
<?php include 'templates/footer.php'; ?>