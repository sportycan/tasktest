<?php
session_start();
require_once('connection.php');
$userid=$_SESSION['id'];
if(empty($userid)){
    header("Location: index.html");
}
if(isset($userid)){
    $row=$connection->query("SELECT * FROM users WHERE id LIKE '$userid'");
    $user=$row->fetch_assoc();
}
else echo "Ошибка соединения с БД :(";
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>profile</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="forms">
            <div class="form">
                <h3>Профиль</h3>
                <form action="handlerprofile.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user["id"];?>"/>
                    <p>Имя: <input type="text" name="name" value="<?php echo $user["name"];?>"/> </p>
                    <p>Телефон: <input type="text" name="phone" value="<?php echo $user["phone"];?>"/> </p>
                    <p>Почта: <input type="text" name="mail" value="<?php echo $user["mail"];?>"/> </p>
                    <p>Пароль: <input type="password" name="pass" value="<?php echo $user["password"];?>"/> </p>
                    <input type="submit" value="Сохранить изменения"/>
                    <button><a href="index.html">На главную</a></button>
                    <button><a href="out.php">Выход</a></button>
                </form>
            </div>
        </div>
    </body>
</html>