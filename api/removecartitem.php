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

    $removecart = "DELETE FROM carts WHERE item_id = '".$_GET['itemid']."'";
    $query = mysqli_query($conn, $removecart);

    $newlink = $vps."cart";

    echo '
    <script>

        setTimeout(function(){
            swal({
                title: "คุณได้ทำการลบสินค้าในตะกร้าสำเร็จ",
                text: "คุณได้ทำการลบสินค้าในตะกร้าเรียบร้อยแล้ว",
                type: "success",
                showButtonCancel: true,
                confirmButtonColor: "#2DEE4D",
                confirmButtonText: "ตกลง",
            }, function(isConfirm){
                if(isConfirm) window.location = "'.$newlink.'";
                if(isCancel) window.location = "'.$newlink.'";
            });
        }, 300);
    </script>
';

?>