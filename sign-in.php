<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="./css/sign-in.css">
    <link rel="stylesheet" href="./css/index-sign-in-query.css">
    <title>Registrace</title>
</head>
<body>
    <main>
        <section class="registration-form">
            <form action="./admin/after-registration.php" method="POST">
                <h1 class="reg-heading">Zaregistrovat se</h1>
                <label for="name">Jméno a Příjmení</label>
                <input type="text" id="name" name="name" placeholder="Jméno a příjmení" required><br>
                <label for="nickname">Přezdívka</label>
                <input type="text" id="nickname" name="nickname" placeholder="Přezdívka" required><br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required><br>
                <label for="password1">Heslo</label>
                <input type="password" id="password1" class="first-password" name="password" placeholder="Heslo" required minlength="5"><br>
                <label for="password2">Heslo znovu</label>
                <input type="password" id="password2" class="second-password" name="password-again" placeholder="Heslo znovu" required minlength="5"><br>
                <p class="password-text"></p>
                <button id="btn" class="btn-reg" disabled>Zaregistrovat</button>
                <p>Už máte vytvořený účet?</p><a href="index.php">Přihlásit se</a>
            </form>
        </section>
    </main>

    <script src="js/password-checker.js"></script>
</body>
</html>