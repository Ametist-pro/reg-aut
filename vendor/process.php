<?php
session_start();
include 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$query = "SELECT * FROM user WHERE login='$login'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    if ($password==$confirm_password) {

        $password = md5($password);
        $query = "UPDATE user SET password='$password' WHERE login='$login'";
        mysqli_query($connect, $query);

        $_SESSION['message'] = 'Пароль обновлён!';
        header('Location: ../index.php');
    }
    else {
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../pass.php');
    }
    
} else {
    $_SESSION['message'] = 'Логин не совпадает!';
    header('Location: ../pass.php');
}

?>
