<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>
        <a href="index.php">3B Depom</a></br>


        <?php if($_SESSION["signed"] == 1){
                echo ("Hoşgeldininiz sayın ");
                echo $_SESSION["username"];
                echo '</br><a href="sub/sign_out.php">Çıkış</a>';
        
            } else {
            echo '<a href="sign_in.php">Giriş Yap</a></br><a href="sign_up.php">Üye ol</a>';
            }
    ?>
        </p>

    </body>
</html>