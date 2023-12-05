<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Восстановление пароля</title>
</head>
<body>
<form action="vendor/process.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Новый пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Повторите пароль</label>
        <input type="password" name="confirm_password" placeholder="Введите пароль">
        <button type="submit">Восстановить</button>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
</form>
</body>
</html>