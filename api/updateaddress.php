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
        exit();
    }

    $addressdetail = $_POST['addressdetail'];

    if($addressdetail == ""){
        echo "<script>window.location='../user/account/myaddress';</script>";
        exit();
    }

    $updateaddress = "UPDATE accounts SET acc_address = '".mysqli_real_escape_string($conn, $addressdetail)."' WHERE acc_id = '".$_SESSION['Uall_id']."'";
    $queryupdate = mysqli_query($conn, $updateaddress);

    $_SESSION['Uall_address'] = mysqli_real_escape_string($conn, $addressdetail);

    $newlink = $vps."user/account/myaddress";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "สำเร็จ",
                        text: "คุณได้อัพเดทที่อยู่ของคุณเรียบร้อยแล้ว!",
                        type: "success",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';
?>