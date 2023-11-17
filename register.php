<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">



        <label>ФИО</label>
        <input type="text" name="name" placeholder="Введите свое имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Войти</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);


        ?>
    </form>
   

    <form action="" method="post">
        <input type="submit" name="submit" value="Сгенерировать">
        <?php
				
                function gen_password($length = 8)
                {				
                    $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP!@#$%^&*()_+=-?'; 
                    $size = strlen($chars) - 1; 
                    $password = ''; 
                    while($length--) {
                        $password .= $chars[random_int(0, $size)]; 
                    }
                    return $password;
                }
                if($_POST['submit']){
                    echo gen_password(8);
                }
            
                ?>
    </form>

</body>
</html>
