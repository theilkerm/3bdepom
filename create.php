<?php
require_once "core/init.php";
if($_SESSION["signed"] == 0){
    echo '<meta http-equiv = "refresh" content = "0; url = sign_in.php" />';
    die();
};

if(isset($_POST['name'])){
    //prepare the order
    $ORDER = $DB->prepare("INSERT INTO `designs` (`name`, `description`, `category`, `creation_time`, `user_id`)
    VALUES ('name', 'description', 'category_id', now(), 'user_id');");

    $ORDER->bindParam(":name", $_POST["name"]);
    $ORDER->bindParam(":desctription", $_POST["desctription"]);
    $ORDER->bindParam(":category_id",   $_POST["category_id"]);
    $ORDER->bindParam(":user_id", $_POST["user_id"]);
    

};

include "view/create.php";