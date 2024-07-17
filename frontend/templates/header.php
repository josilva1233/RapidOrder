<!-- head -->
<!DOCTYPE html>
<html>
<head>
    <title>RapidOrder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</head>
<body>
<header class="bg-primary text-white p-3">
    <h1>RapidOrder</h1>
    <div class="user-info">
        <span>User: <?php echo $_SESSION['user']['list_name'] ?? 'Guest'; ?></span>
    </div>


