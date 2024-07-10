<!-- Include functions maskData e isBase64Encoded -->
<?php require_once 'src/helpers/functions.php'; ?>
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
                <th>Last Name</th>
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
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo isBase64Encoded($user['document']) ? maskData(base64_decode($user['document']), 'document') : $user['document']; ?></td>
                    <td><?php echo isBase64Encoded($user['email']) ? maskData(base64_decode($user['email']), 'email') : $user['email']; ?></td>
                    <td><?php echo isBase64Encoded($user['phone_number']) ? maskData(base64_decode($user['phone_number']), 'phone') : $user['phone_number']; ?></td>
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

