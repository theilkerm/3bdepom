<?php
    @session_start();

    require_once 'sub/db_connect.php';

    include_once 'sub/navbar.php';

    error_reporting(E_ALL);

    ini_set("display_errors", 1);

    if(isset($_POST["username"])){

        //preparing the order
        $username = $_POST["username"];
        $password = $_POST["password"];

        $SIGN_IN = $DB->prepare("select * from users WHERE username=? and password=?");
        $SIGN_IN->execute(array($username,($password)));
        $USER = $SIGN_IN->fetch();

            if($_POST["username"] == $USER['username'] and $_POST["password"] == $USER['password'] ){
                $_SESSION["signed"] = 1;
                $_SESSION["username"] = $USER["username"];
                $_SESSION["password"] = $USER["password"];
                $_SESSION["id"] = $USER["user_id"];

                echo "GİRİŞ BAŞARILI";
                header("Refresh:1; url=index.php");
                die();
            } else {
                echo 'KULLANICI ADI YAHUT PAROLANIZ HATALI</br>GİRİŞ SAYFASINA YÖNLENİRİLİYORSUNUZ<meta http-equiv = "refresh" content = "5; url = sub/sign_in.php" />';
                echo '<meta http-equiv = "refresh" content = "3"; url ="sign_in.php" />';
                die();  
            }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Giriş Yap - 3B Depom</title>
    </head>
    <body>
        <h1>Giriş Yap</h1>
                <form method="POST" autocomplete="off" >
                    <input required type="text" name="username" placeholder="Kullanıcı adı"><br>
                    <input required type="password" min="8" name="password" placeholder="Parola"><br>
                    <input type="submit" name="submit" value="Giriş Yap" /></br>
                </form>
                </br>
                <a href="sign_up.php" role="button">Üye Olmak İçin Tıkla!</a>

    </body>
                    
    </body>
    3B Depom
