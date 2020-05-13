<?php

    require_once 'sub/db_connect.php';

    if(isset($_POST['submit'])){
        // HTML Etiket girişinden kaynaklı XSS doğmasını engelleyelim
        $username = htmlentities($_POST['username']);
        $email  = htmlentities($_POST['email']);
        $password    = htmlentities($_POST['password']);

        // Emiri hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO users(username, email, password)
        VALUES (:username,:email,:password)");
        $SORGU->bindParam(":username", $username);
        $SORGU->bindParam(":email",  $email);
        $SORGU->bindParam(":password",    $password);
        // SQL Sorgumuzu çalıştıralım
        $SORGU->execute();
        // İşlem tamam. Ana sayfaya yönlendirelim.
        header("location: index.php");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
