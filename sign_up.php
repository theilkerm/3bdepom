<?php
    @session_start();

    require_once 'sub/db_connect.php';

    include 'sub/navbar.php';

    if(isset($_POST['submit'])){
        $username = htmlentities($_POST['username']);
        $email  = htmlentities($_POST['email']);
        $password    = htmlentities($_POST['password']);

        // Emiri hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO users(username, email, password)
        VALUES (:username,:email,:password)");
        $SORGU->bindParam(":username", $username);
        $SORGU->bindParam(":email",  $email);
        $SORGU->bindParam(":password",    $password);
        // SQL Emrini çalıştır
        $SORGU->execute();
        header("location: index.php");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Üye Ol - 3B Depom</title>
    </head>
    <body>
        <h1>3B Deposu</h1>
        <form method="post">
            <input required type="text" name="username" placeholder="Kullanıcı Adınız" /> <br>
            <input required type="text" name="email" placeholder="E-Posta Adresiniz" /> <br>
            <input required type="text" name="password" placeholder="Parolanız" /> <br>
            <input type="submit" name="submit" value="Üye ol" />
        </form>
    </body>
</html>
