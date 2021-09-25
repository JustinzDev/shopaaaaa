<?php 
    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../api/setlink.php'); 
    
    $sql = "SELECT * FROM products WHERE product_id = '".$_GET['itemid']."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){

        $sql = "INSERT INTO `listproducts`(`product_id`, `acc_id`, `seller_id`, `list_counto`) VALUES ('".$_GET['itemid']."', 
        '".$_SESSION['Uall_id']."','".$result['acc_id']."', '".$_POST['countitem']."')";
        $query = mysqli_query($conn, $sql);
        

      





    }
    


    
?>
