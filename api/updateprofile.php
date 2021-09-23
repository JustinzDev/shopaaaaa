<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    include('./setlink.php');
    error_reporting(0);
    
    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        return;
    }

    $target_file = "";

    $target_dir = "../assets/img/users/";
    //$target_file = $target_dir . basename($_FILES["myfilepic"]["name"]);
    $type = $_FILES["myfilepic"]["type"];

    if ($_FILES["myfilepic"]["size"] > 1000000) {
        $uploadOk = 0;
        $message = "ขนาดไฟล์รูปใหญ่เกิน 1 MB !!";
        echo "<script>alert('$message')</script>";
        $newlink = $mylocalhost."user/account/profile";
        echo "<script>window.location='$newlink';</script>";
        exit();
    }

    if($type == "image/png"){
        unlink($target_dir . $_SESSION['Uall_username'].".jpeg");
        $target_file = $target_dir . $_SESSION['Uall_username'].".png";
    }
    else if($type == "image/jpeg"){
        unlink($target_dir . $_SESSION['Uall_username'].".png");
        $target_file = $target_dir . $_SESSION['Uall_username'].".jpeg";
    }
    $uploadOk = 1;

    if($target_file != ""){
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    }
    
    if($target_file != ""){
        $check = getimagesize($_FILES["myfilepic"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    $checkimage = false;
    $checkupdatename = false;
    $checkupdategender = false;
    $checkupdatebirthday = false;

    $nameuser = $_POST['nameuser'];
    $genderuser = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $_SESSION['GetSuccessEditProfile'] = false;

    if($nameuser != ""){
        $update = "UPDATE customers SET cus_name = '".trim($nameuser)."' WHERE cus_id = '".$_SESSION['Uall_id']."'";
        $queryupdate = mysqli_query($conn, $update);
        $checkupdatename = true;
        $_SESSION['Uall_nameuser'] = $nameuser;
    }

    if($genderuser != ""){
        $update = "UPDATE customers SET cus_gender = '".trim($genderuser)."' WHERE cus_id = '".$_SESSION['Uall_id']."'";
        $queryupdate = mysqli_query($conn, $update);
        $checkupdategender = true;
        $_SESSION['Uall_genderuser'] = $genderuser;
    }

    if($birthday != ""){
        $update = "UPDATE customers SET cus_birthday = '".trim($birthday)."' WHERE cus_id = '".$_SESSION['Uall_id']."'";
        $queryupdate = mysqli_query($conn, $update);

        /*$selectdate = "SELECT DATE_FORMAT(`cus_birthday`, '%d-%m-%Y') AS `cus_birthday` FROM customers WHERE cus_id = '".$_SESSION['Uall_id']."'";
        $querydate = mysqli_query($conn, $selectdate);
        $resultdate = mysqli_fetch_array($querydate, MYSQLI_ASSOC);*/
        $checkupdatebirthday = true;
        $_SESSION['Uall_birthday'] = $birthday;
    }
    
    if($checkimage || $checkupdatename || $checkupdategender || $checkupdatebirthday){

        if($uploadOk == 1){
            move_uploaded_file($_FILES["myfilepic"]["tmp_name"], $target_file);
        }

        $_SESSION['GetSuccessEditProfile'] = true;

        $message = "คุณได้อัพเดทโปรไฟล์เรียบร้อยแล้ว !!";
        echo "<script>alert('$message')</script>";
        $newlink = $mylocalhost."user/account/profile";
        echo "<script>window.location='$newlink';</script>";
        //header("location:$newlink");
    }

?>