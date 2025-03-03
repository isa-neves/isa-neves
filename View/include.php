<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/login.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <form action= "../Controller/Controller.php" method="POST" id="formulario">
    <p>CADASTRO</p>
    <label>Login</label><br>
    <input type="hidden" name="include_user">
    <input type="text" name="email" required/><br><br>
    <label>Senha</label><br>
    <input type="password" name="senha" required/><br><br>
    <input type="submit" id="botao"/>
    </form>
</body>
</html>