<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    include('./setlink.php');
    error_reporting(0);

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        return;
    }
    
    
?>