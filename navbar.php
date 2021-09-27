<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
    include('api/setlink.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>    
        <div class="navbartop">
            <div class="navbar-warpper">
                <div class="navbar-warpperleft">
                    <a class="anormal" href="#">Seller Centre</a>
                    <a class="anormal" href="#">ขายสินค้ากับช้อปปี้</a>
                    <a class="anormal"href="#">ดาวน์โหลด</a>
                    <a class="aspec" href="#">ติดต่อเราบน</a>
                    <a class="iconapp" href="#"><i class="fab fa-facebook"></i></a>
                    <a class="iconapp" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="iconapp" href="#"><i class="fab fa-line"></i></a>
                </div>

                <div class="navbar-warpperright">
                    <a class="iconapp" href="#"><i class="far fa-bell"></i></a>
                    <a class="aspec right" href="#">การแจ้งเตือน</a>
                    <a class="iconapp" href="#"><i class="far fa-question-circle"></i></a>
                    <a class="aspec right" href="#">ช่วยเหลือ</a>
                    <?php if($_SESSION['Uall_id'] == ""){ ?>
                        <a class="aspec right" href="<?php echo $vps;?>register">สมัครใหม่</a>
                        <a class="alogin right" href="<?php echo $vps;?>login">เข้าสู่ระบบ</a>
                    <?php } else { ?>
                        <div class="dropdown">
                            <span class="dropbtn">
                                <div class="divpicprofile"><img id="mypicprofile"></div>
                                <?php echo $_SESSION['Uall_username']; ?>
                            </span>
                            <div class="dropdown-content">
                                <a href="<?php echo $vps;?>user/account/profile">บัญชีของฉัน</a>
                                <a href="<?php echo $vps;?>user/account/myorder">การซื้อของฉัน</a>
                                <a href="<?php echo $vps;?>user/myshop/shop">ร้านค้าของฉัน</a>
                                <a href="#" onclick="clickonme();">ออกจากระบบ</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="navbar-warpperdown">
                <img src="<?php echo $vps;?>assets/img/logo.png" onclick="gotoindex()">
                <input type="text" placeholder=" ค้นหาสินค้าและร้านค้า" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
                <i class="fas fa-shopping-cart cart"></i>
            </div>
            
            <div class="navbar-warpperdowntoo">
                <a href="#">ผักอบกรอบ</a>
                <a href="#">ชุดนอน</a>
                <a href="#">รองเท้าแตะผู้หญิง</a>
                <a href="#">แมส</a>
                <a href="#">กางเกงขาสั้น</a>
                <a href="#">เสื้อยืด</a>
                <a href="#">เสื้อครอป</a>
                <a href="#">ชั้นวางของ</a>
            </div>
        </div>
    </header>
</body>
<script>

var imgUrl = "<?php echo $vps;?>assets/img/users/<?php echo $_SESSION['Uall_username']?>";
var tester=new Image();
tester.onload=function() {
  document.getElementById("mypicprofile").src = imgUrl + '.png?t=' + new Date().getTime();
};
tester.onerror=function() { 
  document.getElementById("mypicprofile").src = imgUrl + '.jpeg?t=' + new Date().getTime();      
};
tester.src=imgUrl + '.png';

function gotoindex(){
    window.location = "<?php echo $vps;?>";
}

function clickonme(){
    swal({
        title: "ออกจากระบบ",
        text: "คุณออกจากระบบสำเร็จ!",
        type: "success",
        showButtonCancel: true,
    }, function(isConfirm) {
            if(isConfirm){
                window.location = "<?php echo $vps;?>logout";
            }
            if(isCancel){
                window.location = "<?php echo $vps;?>logout";
            }
    });
}
</script>
</html>