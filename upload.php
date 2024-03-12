<?php 
session_start();
require('./utility.php');


if(isset($_FILES["staPic"]) && $_FILES["staPic"]["error"] == 0){
    $staPic = $_FILES["staPic"]["tmp_name"];
    $imgContent = file_get_contents($staPic);
    $stmt = $condb->prepare("INSERT INTO stadium (staPic) VALUES(?)");
    $stmt->bind_param("s", $imgContent); // การใช้งาน bind_param สำหรับประเภทข้อมูล blob

    if($stmt->execute()){ // ทำการ execute prepare statement
        $_SESSION["success"] = "Image uploaded successfully.";
        header("Location: stdUp.php");
    }else{
        $_SESSION["error"] = "Failed to upload image. please try again.";
        header("Location: stdUp.php");
    }
}else{
    $_SESSION["error"] = "Please select an image file to upload.";
    header("Location: stdUp.php");
}
?>
