<?php
    require_once('connection.php');
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $mail=$_POST['mail'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];
    $log=array();
    if(empty($name)){
        $log[] = "Имя пустое!";
    }
    if(empty($phone)){
        $log[] = "Телефон не заполнен!";
        echo $count;
    }
    if(empty($mail)){
        $log[] = "Почта не заполнена!";
    }
    if(empty($pass)){
        $log[] = "Пароль не заполнен!";
    }
    if($pass != $pass2){
        $log[] = "Пароли не совпадает!";
    }
    if(sizeof($log) != 0){
        foreach($log AS $logerr){
            echo $logerr, PHP_EOL;
        }
    }
    else{
        $query = $connection -> query ("SELECT * FROM users WHERE name LIKE ('$name') OR phone LIKE ('$phone') OR mail LIKE ('$mail') ");
        
    }
    if(($query->num_rows) != 0){
        while($nameBD=$query->fetch_assoc()){
            
            if($name==$nameBD["name"]){
                echo "Пользователь". " ". $nameBD["name"]." ". "существует! Выполните вход!";
                exit();
            }
            else if($phone==$nameBD["phone"]){
                echo "Пользователь с телефоном". " ". $nameBD["phone"]." ". "существует! Выполните вход!";
                exit();
            }
            else if($mail==$nameBD["mail"]){
                echo "Пользователь с почтой". " ". $nameBD["mail"]." ". "существует! Выполните вход!";
                exit();
            }
        }
        
    }
        
    else{
        $query = $connection -> query ("INSERT INTO users (name, phone, mail, password) VALUES ('$name', '$phone', '$mail', '$pass')");
        if($query){            
                        header("Location: index.html");
                        exit();
                    }
                    else{
                        echo "Ошибка соединения! Попробуйте ещё раз!";
                        exit();
                    }
    }
?>
