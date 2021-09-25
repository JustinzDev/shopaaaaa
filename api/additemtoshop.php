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

    $itemname = $_POST['itemname'];
    $itemcount = $_POST['itemcount'];
    $itemprice = $_POST['itemprice'];
    $itemdetails = $_POST['itemdetails'];

    $target_file = "";
    $target_dir = "../assets/img/products/";
    $newtarget_dir = "assets/img/products/";
    $type = $_FILES["myfilepic"]["type"];

    if ($_FILES["myfilepic"]["size"] > 5000000) {

        $newlink = $mylocalhost."user/myshop/shop";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "ขนาดไฟล์ภาพเกิน 5 MB!!",
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

    if($type == "image/png"){
        unlink($target_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".jpeg");
        $target_file = $target_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".png";
        $newlinkimg = $newtarget_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".png";
    }
    else if($type == "image/jpeg"){
        unlink($target_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".png");
        $target_file = $target_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".jpeg";
        $newlinkimg = $newtarget_dir . $itemname . "_" . $_SESSION['Uall_id'] . ".jpeg";
    }
    
    $sql = "INSERT INTO `products`(`acc_id`, `product_name`, `product_details`, `product_price`, `product_count`, `product_img`) 
    VALUES ('".$_SESSION['Uall_id']."', '".$itemname."','".$itemdetails."', '".$itemprice."', '".$itemcount."', '".$newlinkimg."')";
    $query = mysqli_query($conn, $sql);

    if($target_file != "") move_uploaded_file($_FILES["myfilepic"]["tmp_name"], $target_file);
    $newlink = $mylocalhost."user/myshop/shop";
    echo '
        <script>
            setTimeout(function(){
                swal({
                    title: "สำเร็จ",
                    text: "คุณได้ลงขายสินค้า [ '.$itemname.' ] เรียบร้อยแล้ว",
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