<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    include('./setlink.php');
    error_reporting(0);
    
    echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    ';

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        return;
    }

    $target_file = "";
    $target_dir = "../assets/img/users/";
    $type = $_FILES["myfilepic"]["type"];

    if ($_FILES["myfilepic"]["size"] > 1000000) {

        $newlink = $mylocalhost."user/account/profile";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "ขนาดไฟล์ภาพเกิน 1 MB!!",
                        type: "error",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';

        //$message = "ขนาดไฟล์รูปใหญ่เกิน 1 MB !!";
        //echo "<script>alert('$message')</script>";
        //$newlink = $mylocalhost."user/account/profile";
        //echo "<script>window.location='$newlink';</script>";
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

        if($target_file != "") move_uploaded_file($_FILES["myfilepic"]["tmp_name"], $target_file);
        $newlink = $mylocalhost."user/account/profile";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "สำเร็จ",
                        text: "คุณได้อัพเดทโปรไฟล์สำเร็จแล้ว!!",
                        type: "success",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';

        //echo "<script>alert('$message')</script>";
        //echo "<script>window.location='$newlink';</script>";
        //header("location:$newlink");
    }

?>