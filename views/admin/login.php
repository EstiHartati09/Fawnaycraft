<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Fawnaycraft</title>
    <link rel="stylesheet" href="/Fawnaycraft/public/login-admin.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>

        <form action="/Fawnaycraft/index.php?page=login-proses" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>
