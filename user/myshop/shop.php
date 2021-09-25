<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/shop.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body style="background-color: rgba(189, 189, 189, 0.3);">
    <?php include('./navbarshop.php');?>
    <div class="container">
        <div id="nav-left"></div>
        <div class="bodymain" id="contentdata">
            <?php include('./manageitem.php');?>
        </div>
    </div>
</body>
<script>
    $("#dateitem").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")

    $.get("<?php echo $mylocalhost;?>user/myshop/navbarleftshop", function(data){
        $("#nav-left").replaceWith(data);
    });
</script>
</html>