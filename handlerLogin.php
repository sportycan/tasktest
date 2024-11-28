<?php
session_start();
    require_once('connection.php');
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    //var_dump($_POST);
    $log=array();
    
    define('SMARTCAPTCHA_SERVER_KEY', 'ysc2_dmIz8JJcdx6rjp15Y3nxYw0srFxEGfJt3yKuKnNW49c9dab3');

function check_captcha($token) {
    $ch = curl_init();
    $args = http_build_query([
        "secret" => SMARTCAPTCHA_SERVER_KEY,
        "token" => $token,
        "ip" => $_SERVER['REMOTE_ADDR'], // Нужно передать IP пользователя.
                                         // Как правильно получить IP зависит от вашего прокси.
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
        return true;
    }
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}
$captcha=false;
$token = $_POST['smart-token'];
if (check_captcha($token)) {
    echo "Passed\n";
} else {
    $captcha=true;
}
   if($captcha){
       $log[] = "Робот!";
   }
   if(empty($name)){
        $log[] = "Имя пустое!";
    }
    if(empty($phone)){
        $log[] = "Телефон/Почта не заполнен!";
    }
    if(empty($pass)){
        $log[] = "Пароль не заполнен!";
    }
    if(sizeof($log) != 0){
        foreach($log AS $logerr){
            echo $logerr, PHP_EOL;
        }
    }
    else{
        $query = $connection -> query ("SELECT * FROM users WHERE name LIKE '$name' AND password LIKE '$pass' AND phone LIKE '$phone' OR mail LIKE '$phone'");
    }
    $nameBD=$query->fetch_assoc();
        if(isset($nameBD)){
            $_SESSION['id'] = $nameBD["id"];
            header("Location: profile.php");
        }
        else{
            echo "Нет такого пользователя!!!";
        }
?>