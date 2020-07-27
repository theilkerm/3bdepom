<?php
    require_once 'core/init.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email  = $_POST['email'];
        $password    = $_POST['password'];

        // Emiri hazırlayalım
        $SORGU = $DB->prepare("INSERT INTO users(username, email, password)
        VALUES (:username,:email,:password)");
        $SORGU->bindParam(":username", $username);
        $SORGU->bindParam(":email",  $email);
        $SORGU->bindParam(":password",    md5($password));
        // SQL Emrini çalıştır
        $SORGU->execute();
        header("location: index.php");
        die();
    }

    include 'view/navbar.php';
    include 'view/sign_up.php';