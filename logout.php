<?php
    session_start();
    session_destroy();
    include('api/setlink.php');
    header("location:$hosting");
?>