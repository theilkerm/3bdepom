<?php
require_once "core/init.php";
if($_SESSION["signed"] == 1){
    echo '</br>Zaten giriş yapılmış. ';
    echo $_SESSION["username"];
    echo ', değilseniz çıkış yapınız.';
};

if (isset($_POST["username"])) {

    //preparing the order
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $SIGN_IN = $DB->prepare("select * from users WHERE username=? and password=?");
    $SIGN_IN->execute(array($username, ($password)));
    $USER = $SIGN_IN->fetch();

    if ($_POST["username"] == $USER['username'] and md5($_POST["password"]) == $USER['password']) {
        $_SESSION["signed"] = 1;
        $_SESSION["username"] = $USER["username"];
        $_SESSION["password"] = $USER["password"];
        $_SESSION["id"] = $USER["user_id"];

        echo "GİRİŞ BAŞARILI";
        header("Refresh:1; url=index.php");
        die();
    } else {
        echo 'KULLANICI ADI YAHUT PAROLANIZ HATALI';
    }
}
include "view/header.php";
include "view/navbar.php";
include "view/sign_in.php";
  