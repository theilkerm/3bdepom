<?php
require_once "core/init.php";

echo($_POST["name"]);

if(isset($_POST['name'])){
  //prepare the order
  $ORDER = $DB->prepare("INSERT INTO `designs` (`name`, `description`, `category`, `creation_time`, `user_id`)
  VALUES ('ahmet', 'tasarim', '1', now(), '1');");

  $ORDER->bindParam(":name", $_POST["name"]);
  $ORDER->bindParam(":description", $_POST["description"]);
  $ORDER->bindParam(":category_id",   $_POST["category_id"]);
  $ORDER->bindParam(":user_id", $_POST["user_id"]);
}

$target_dir = "uploads/";

//3D DOSYA KONTROLÜ

$target_file = $target_dir . basename($_FILES["File"]["name"]);
$uploadOk = 1;
$designFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["File"]["size"] > 15000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($designFileType != "stl" ) {
  echo "Sorry, only STL files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["File"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["File"]["name"]). " has been uploaded.";
  } /*else {
    echo "Sorry, there was an error uploading your file.";
    die();
  }*/
}

//GÖRSEL KONTROLÜ

$target_image = $target_dir . basename($_FILES["Image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["Image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_image)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["Image"]["size"] > 1500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_image)) {
    echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
  } /*else {
    echo "Sorry, there was an error uploading your file.";
    die();
  }*/
}
