<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

    echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    ';

    if($_SESSION['Uall_id'] == ""){
        $newlink = $vps."login";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "คุณจำเป็นต้องเข้าสู่ระบบ!!",
                        type: "error",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';
        exit();
    }

    if($_GET['itemid'] == ""){
        $newlink = $vps."user/myshop/shop";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "ไอดีสินค้าผิดพลาดกรุณาลองใหม่อีกครั้ง!!",
                        type: "error",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';
        exit();
    }

    $update = "UPDATE products SET product_name = '".trim($_POST['productname'])."', product_details = '".mysqli_real_escape_string($conn, $_POST['productdetails'])."'
    , product_price = '".trim($_POST['productprice'])."', product_count = '".trim($_POST['productcount'])."' WHERE product_id = '".$_GET['itemid']."'";
    $queryupdate = mysqli_query($conn, $update);

    $newlink = $vps."user/myshop/shop";
    echo '
        <script>
            setTimeout(function(){
                swal({
                    title: "แก้ไขสินค้าสำเร็จ",
                    text: "คุณได้ทำการแก้ไขสินค้าไอดี: '.$_GET['itemid'].' ของคุณสำเร็จ",
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