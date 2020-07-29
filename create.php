<?php
require_once "core/init.php";
if($_SESSION["signed"] == 0){
    echo '<meta http-equiv = "refresh" content = "0; url = sign_in.php" />';
    die();


};

include "view/create.php";