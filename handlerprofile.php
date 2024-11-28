<?php
        require_once('connection.php');
        $userid=$_POST['id'];
        $newname=$_POST['name'];
        $newphone=$_POST['phone'];
        $newmail=$_POST['mail'];
        $newpass=$_POST['pass'];
        if(!empty($newname) && !empty($newphone) && !empty($newmail) && !empty($newpass)){
            $query=$connection->query("UPDATE users SET name='$newname', phone='$newphone', mail='$newmail', password='$newpass' WHERE id LIKE '$userid'");
                header("Location: profile.php");
        }
        else{
            echo "Заполните все поля!";
        }
?>