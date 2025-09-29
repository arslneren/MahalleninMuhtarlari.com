<?php
session_start();
include("../vt.php");
$email = "";
$parola = "";

if (isset($_SESSION["oturum"]) && $_SESSION["oturum"]=="6789"){
    echo "2";
}
else if(isset($_COOKIE["çerez"])){
    $sorgu=$baglanti->prepare("SELECT email, muhName, id FROM muhtarlar");
    $sorgu->execute();
    while ( $sonuc=$sorgu->fetch()){
        $email = $sonuc["email"];
        if($_COOKIE["çerez"] == md5("aa".$email."bb")){
            $_SESSION["oturum"] ="6789";
            $_SESSION["email"] = $sonuc["email"];
            $_SESSION["muhName"] = $sonuc["muhName"];
            $_SESSION["muhId"] = $sonuc["id"];
            echo "2";
        }
    }
}

if($_POST){
    $email = $_POST["email"];
    $parola = $_POST["password"];

    if($email == "" || $parola == ""){
        echo "0";
    }
    else{
        $sorgu=$baglanti->prepare("SELECT passw, muhName, id FROM muhtarlar WHERE email =:email");
        $sorgu->execute(['email'=>htmlspecialchars($email)]);
        $sonuc=$sorgu->fetch();
        if($sonuc){
            if($parola == $sonuc["passw"]){
                $_SESSION["oturum"] ="6789";
                $_SESSION["email"] = $email;
                $_SESSION["muhName"] = $sonuc["muhName"];
                $_SESSION["muhId"] = $sonuc["id"];

                if(isset($_POST["remember"])){
                    setcookie("çerez", md5("aa".$email."bb"), time()+(60*60*24*7));
                }
                $cases = 'login';
                $browser = $_SERVER['HTTP_USER_AGENT'];
                $getIp = $_SERVER['REMOTE_ADDR'];
                $sorgu5=$baglanti->prepare("INSERT INTO records (muhId, cases, ip, user_agent) VALUES (:gtId, :cases, :ip, :browser)");
                $sorgu5->bindParam(':gtId', $sonuc["id"]);
                $sorgu5->bindParam(':cases', $cases);
                $sorgu5->bindParam(':ip', $getIp);
                $sorgu5->bindParam(':browser', $browser);
                $sonuc5 = $sorgu5->execute();

                echo "2";
            }
            else{
                $parola = "";
                echo "1";
            }
        }
        else{
            $parola = "";
            echo "1";
        }
    }
}
?>