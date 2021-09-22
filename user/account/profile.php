<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="http://103.91.207.202/projectdata/assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="http://103.91.207.202/projectdata/assets/css/profile.css?v=<?=time();?>" rel="stylesheet">
    <link href="http://103.91.207.202/projectdata/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<body style="background-color: #f1f1f1;">
    <?php include('../../navbar.php');?>
    <div id="main">
        <div clsss="contain">
            <div class="body1">
                <div class="navbar-left">
                    แก้ไขโปรไฟล์
                </div>
                <div class="navbar-right">
                    <div class="headinfo">
                        <h6>ข้อมูลของฉัน</h6>
                        <div class="mycaption">จัดการข้อมูลส่วนตัวคุณเพื่อความปลอดภัยของบัญชีผู้ใช้นี้</div>
                    </div>
                    <div class="myusername">
                        <label>ชื่อผู้ใช้</label>
                        <div class="nameinfo"><?php echo $_SESSION['Uall_username'];?></div>
                    </div>
                    <div class="myname">
                        <label>ชื่อ</label>
                        <div class="nameinput"><input type="text"></div>
                    </div>
                    <div class="myemail">
                        <label>Email</label>
                        <?php if($_SESSION['Uall_email'] != ""){?>
                            <div class="emailinput"><?php echo $_SESSION['Uall_email'];?></div>
                        <?php } else{?>
                            <div class="emailinput"><input type="text"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
<script>

function clickonme(){
    swal({
        title: "ออกจากระบบ",
        text: "คุณออกจากระบบสำเร็จ!",
        type: "success",
        showButtonCancel: true,
    }, function(isConfirm) {
            if(isConfirm){
                window.location = "../../logout";
            }
            if(isCancel){
                window.location = "../../logout";
            }
    });
}
</script>
</html>