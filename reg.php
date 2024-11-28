<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>REG</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="forms">
            <div class="form">
                <h3>Регистрация</h3>
                <form action="handlerReg.php" method="POST">
                    <p>Имя: <input type="text" name="name"/> </p>
                    <p>Телефон: <input type="text" name="phone"/> </p>
                    <p>Почта: <input type="text" name="mail"/> </p>
                    <p>Пароль: <input type="password" name="pass" id="pass"> <span id="status"><span/> </p>
                    <p>Пароль: <input type="password" name="pass2" id="pass2"/> </p>
                    <input type="submit" name="submit" value="Зарегестрироваться"/>
                </form>
            </div>
        </div>
    </body>
</html>