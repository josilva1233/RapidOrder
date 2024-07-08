<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/script.js" defer></script>
</head>
<body>
<header>
    <h1>My App</h1>
    <div class="user-info">
        <span>User: <?php echo $_SESSION['user']['list_name'] ?? 'Guest'; ?></span>
    </div>
</header>
