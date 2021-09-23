<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    include('./setlink.php');
    $target_dir = "../assets/img/users/";
    //$target_file = $target_dir . basename($_FILES["myfilepic"]["name"]);
    $type = $_FILES["myfilepic"]["type"];

    

    if($type == "image/png"){
        unlink($target_dir . $_SESSION['Uall_username'].".jpeg");
        $target_file = $target_dir . $_SESSION['Uall_username'].".png";
    }
    else if($type == "image/jpeg"){
        unlink($target_dir . $_SESSION['Uall_username'].".png");
        $target_file = $target_dir . $_SESSION['Uall_username'].".jpeg";
    }
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["myfilepic"]["tmp_name"]);
        if($check !== false) {
            //echo $check["mime"];
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["myfilepic"]["size"] > 1000000) {
        echo "ไฟล์ของคุณเกินขนาด 1MB";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "เกิดข้อผิดพลาด, ไม่สามารถอัพโหลดไฟล์ได้";
    } else {
        if (move_uploaded_file($_FILES["myfilepic"]["tmp_name"], $target_file)) {
            echo "". htmlspecialchars(basename($target_file)). " อัพโหลดไฟล์เสร็จสิ้น";
            header("location:$mylocalhost/user/account/profile");
        } else {
          echo "เกิดข้อผิดพลาด, ไม่สามารถอัพโหลดไฟล์ได้";
        }
    }
?>