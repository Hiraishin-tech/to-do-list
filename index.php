<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index-sign-in-query.css">

    <script src="https://kit.fontawesome.com/88b85df50e.js" crossorigin="anonymous"></script>
    <title>Přihlášení</title>
</head>
<body>
    <div class="animation">
    <i class="fa-regular fa-file-lines"></i>
    </div>
<section class="log-in-form">
    <form action="./admin/auth.php" method="POST">
        <h1>Přihlásit se</h1>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Heslo" required><br>
        <button>Přihlásit se</button>
        <p>Ještě nemáte účet?</p><a href="sign-in.php">Zaregistrovat se</a>
    </form>
</section>
    
</body>
</html>