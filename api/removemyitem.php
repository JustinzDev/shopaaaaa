<?php 
    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../api/setlink.php'); 
    
    echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    ';


    if($_SESSION['Uall_id'] == ""){
        $newlink = $mylocalhost."login";
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

    $refuseorder = "DELETE FROM products WHERE product_id = '".$_GET['myproduct_id']."' AND acc_id = '".$_SESSION['Uall_id']."'";
    $queryorder = mysqli_query($conn, $refuseorder);
    $resultorder = mysqli_fetch_array($queryorder, MYSQLI_ASSOC);

    $newlink = $mylocalhost."user/myshop/shop";
        echo '
            <script>

                setTimeout(function(){
                    swal({
                        title: "การลบสินค้าในร้านสำเร็จ",
                        text: "คุณได้ทำการลบสินค้าในร้านของคุณสำเร็จแล้ว",
                        type: "success",
                        showButtonCancel: true,
                        confirmButtonColor: "#74DD55",
                        confirmButtonText: "ตกลง",
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
        ';
?>

