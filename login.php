<?php
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
    </head>
    <body>
        <div class="forms">
            <div class="form">
                <h3>Вход</h3>
                <form action="handlerLogin.php" method="POST">
                    <p>Имя: <input type="text" name="name"/> </p>
                    <p>Телефон/Почта: <input type="text" name="phone"/> </p>
                    <p>Пароль: <input type="password" name="pass"/> </p>
                    <div 
  style="height: 100px"
  id="captcha-container"
  class="smart-captcha"
  data-sitekey="ysc1_dmIz8JJcdx6rjp15Y3nxy1lvpGHpjbwXw1DaSyAF581ee880"
></div>
                    <input type="submit" value="Войти"/>
                </form>
            </div>
        </div>
    </body>
</html>