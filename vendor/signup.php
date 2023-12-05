<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {


        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `user` (`id`,`name`,`login`,`password`) VALUES (NULL, '$name', '$login', '$password')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
