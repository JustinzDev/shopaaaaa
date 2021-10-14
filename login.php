<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);

    include('api/setlink.php');

    if($_SESSION['Uall_id'] != ""){
		echo "<script>window.location='index';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบช็อปป๊ะออนไลน์ได้แล้วที่นี่</title>
    <link href="assets/css/login.css?v=<?=time();?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<body>
    <header>    
        <div class="navbartop">
            <div class="logo">
                <img src="./assets/img/logologin.png" alt="">
            </div>
            <h4>เข้าสู่ระบบ</h4>
        </div>
        <a href="#" class="help">ต้องการความช่วยเหลือ?</a>
    </header>
    <div id="main">
        <div clsss="contain">
            <div class="mainbody">
                <div class="leftbody">
                    <img src="./assets/img/shopatanglogo.png"><br><br>
                    <h2>
                        แหล่งช้อปปิ้งออนไลน์ที่ใหญ่ที่สุดในจักรวาล<br>
                        กาแลกซี่พร้อมขายอินฟินิตี้สโตน
                    </h2>
                </div>
                <div class="rightbody">
                    <form action="api/checklogin" id="login1" method="POST">
                        <h5>เข้าสู่ระบบ</h5>
                        <input type="text" name="Uname" placeholder="หมายเลขโทรศัพท์ / Email / ชื่อผู้ใช้" require><br>
                        <input type="password" name="pw1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" placeholder="รหัสผ่าน" require> <br>
                        <button id="login2" type="submit">เข้าสู่ระบบ</button><br>
                        <a href="#" style="float: right; font-size: 12px; margin-top: 3px;">ลืมรหัสผ่าน</a><br>
                    </form>
                    <div class="spana">
                        <span >เพิ่งเคยเข้ามาใน Shopa ใช่หรือไม่</span><a href="register"> สมัครใหม่</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer1">
            <div class="row1">
                <h6>ศูนย์ช่วยเหลือ</h6>
                <a href="#">Help Center</a>
                <a href="#">สั่งซื้อสินค้าอย่างไร</a>
                <a href="#">เริ่มขายสินค้าอย่างไร</a>
                <a href="#">ช่องทางการชำระเงินใน Shopa</a>
                <a href="#">Shopa Coins</a>
                <a href="#">การจัดส่งสินค้า</a>
                <a href="#">การคืนเงินและคืนสินค้า</a>
                <a href="#">การันตีโดย Shopa คืออะไร?</a>
                <a href="#">ติดต่อ Shopa</a>
            </div>
            <div class="row2">
                <h6>เกี่ยวกับ SHOPA</h6>
                <a href="#">โปรแกรม Affiliate</a>
                <a href="#">ร่วมงานกับเรา</a>
                <a href="#">นโยบายของ Shopa</a>
                <a href="#">ช่องทางการชำระเงินใน Shopa</a>
                <a href="#">นโยบายความเป็นส่วนตัว</a>
                <a href="#">Shopa Blog</a>
                <a href="#">Shopa Mall</a>
                <a href="#">Seller Centre</a>
                <a href="#">Flash Deals</a>
                <a href="#">ผู้ติดต่อออนไลน์</a>
            </div>
            <div class="row3">
                <h6>วิธีการชำระเงิน</h6>
                <div class="howpay">
                    <img src="./assets/img/howpay1.png" class="hp1">
                    <img src="./assets/img/howpay2.png" class="hp2">
                    <img src="./assets/img/howpay3.png" class="hp3"><br>
                    <img src="./assets/img/howpay4.png" class="hp4">
                    <img src="./assets/img/howpay5.png" class="hp5">
                    <img src="./assets/img/howpay6.png" class="hp6"><br>
                    <img src="./assets/img/howpay7.png" class="hp7">
                    <img src="./assets/img/howpay8.png" class="hp8">
                    <img src="./assets/img/howpay9.png" class="hp9"><br>
                    <img src="./assets/img/howpay10.png" class="hp10">
                    <img src="./assets/img/howpay11.png" class="hp11"><br>
                </div><br>
                <h6>บริการจัดส่ง</h6>
                <div class="delivery">
                    <img src="./assets/img/delivery1.png" class="der1">
                    <img src="./assets/img/delivery2.png" class="der2">
                    <img src="./assets/img/delivery3.png" class="der3"><br>
                    <img src="./assets/img/delivery4.png" class="der4">
                    <img src="./assets/img/delivery5.png" class="der5">
                    <img src="./assets/img/delivery6.png" class="der6"><br>
                    <img src="./assets/img/delivery7.png" class="der7">
                    <img src="./assets/img/delivery8.png" class="der8">
                    <img src="./assets/img/delivery9.png" class="der9"><br>
                </div>
                
            </div>
            <div class="row4">
                <h6>ติดตามเรา</h6>
                <a href="#">
                    <img src="./assets/img/contact1.png"><h5>facebook</h5>
                </a>
                <a href="#">
                    <img src="./assets/img/contact2.png"><h5>Instagram</h5>
                </a>
                <a href="#">
                    <img src="./assets/img/contact3.png"><h5>Line</h5>
                </a>
                <a href="#">
                    <img src="./assets/img/contact4.png"><h5>Linkedln</h5>
                </a>
            </div>
            <div class="row5">
                <h6>ดาวน์โหลดแอปพลิเคชั่น</h6>
                <div class="download">
                    <a href="#">
                        <img src="./assets/img/download1.png" style="width: 80px;">
                    </a>
                    <a href="#">
                        <img src="./assets/img/download2.png" style="width: 80px;">
                    </a>
                    <a href="#">
                        <img src="./assets/img/download3.png" style="width: 80px;">
                    </a>
                </div> 
            </div>
        </div>
        <div class="footer2">
            © 2021 Shopa. All Rights Reserved Design By Top-Kod-Geem.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function(){
        $("#login2").click(function(e){
            e.preventDefault();
            $.ajax(
            {
                type: "POST",
                url:  "api/checklogin",
                data: $("#login1").serialize(),
                success:function(result)
                {
                    if(result.status == 1)
                    {
                        setTimeout(function(){
                            swal({
                                title: "สำเร็จ!",
                                text: "คุณเข้าสู่ระบบสำเร็จ!",
                                type: "success",
                                showButtonCancel: true,
                            }, function(isConfirm) {
                                    if(isConfirm){
                                        window.location = "<?php echo $mylocalhost;?>";
                                    }
                                    if(isCancel){
                                        window.location = "<?php echo $mylocalhost;?>";
                                    }
                            });
                        }, 100);
                    }
                    else if(result.status == 0)
                    {
                        setTimeout(function(){
                            swal({
                                title: "ผิดพลาด!",
                                text: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!",
                                type: "error",
                                showButtonCancel: true,
                            }, function(isConfirm) {
                                    if(isConfirm){
                                        window.location = "<?php echo $mylocalhost;?>login";
                                    }
                                    if(isCancel){
                                        window.location = "<?php echo $mylocalhost;?>login";
                                    }
                            });
                        }, 100);
                    }
                }
            });

        });
    });
  </script>
</html>