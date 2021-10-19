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

    $sql = "SELECT * FROM ((products INNER JOIN listproducts ON products.product_id = listproducts.product_id) INNER JOIN accounts ON listproducts.acc_id = accounts.acc_id) WHERE listproducts.list_id = '".$_GET['list_productid']."' AND listproducts.list_state = 'wait'";
	$query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        $update = "UPDATE listproducts SET list_state = 'payment'  WHERE list_id = '".$result['list_id']."'";
        $query = mysqli_query($conn, $update);

        $newcountsell = $result['product_countsell']+$result['list_counto'];
        $newcountproduct = $result['product_count']-$result['list_counto'];
        $updatesell_count = "UPDATE products SET product_countsell = $newcountsell,product_count = $newcountproduct WHERE product_id = '".$result['product_id']."'";
        $query = mysqli_query($conn, $updatesell_count);


        $newlink = $vps."user/myshop/shop";
        echo '
            <script>

                setTimeout(function(){
                    swal({
                        title: "การยืนยันการสั่งซื้อสำเร็จ",
                        text: "คุณได้ทำการยืนยันการสั่งซื้อ Order Id: '.$result['list_id'].' เรียบร้อยแล้ว",
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
    }
    
    
?>