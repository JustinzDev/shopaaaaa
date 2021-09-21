<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิกช็อปปี้ออนไลน์ที่นี่</title>
    <link href="assets/css/login.css?v=<?=time();?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <style>
        input:invalid{
            border: 1px solid #FF938C;
        }
    </style>
</head>
<body>
    <header>    
        <div class="navbartop">
            <div class="logo">
                <img src="./assets/img/logologin.png" alt="">
            </div>
            <h4>สมัครใหม่</h4>
            
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
                    <form action="api/checkregister" method="POST" id="register1">
                        <h5>สมัครสมาชิก</h5>
                        <input type="text" name="uname" pattern="[A-z0-9]{1,24}" placeholder="ชื่อผู้ใช้" require><br>
                        <input id="password1" type="password" name="pw1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" placeholder="รหัสผ่าน" require> <br>
                        <input id="password2" type="password" name="pw2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" placeholder="ยืนยัน-รหัสผ่าน" require> <br>
                        <span id='message'></span>
                        <input type="email" name="uemail" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" placeholder="Email" require><br>
                        <input type="tel" name="telphone" placeholder="เบอร์โทรศัพท์มือถือ" pattern="(08|09|06)[0-9]{8}" minlength="1" maxlength="10" require><br>
                        <button id="register2" type="submit">สมัครสมาชิก</button><br>
                        <a href="index" style="float: right; font-size: 12px; margin-top: 3px;">กลับหน้าหลัก</a><br>
                    </form>
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
</body>
<script>
    $(document).ready(function()
    {
        $("#register2").click(function(e)
        {
            e.preventDefault();
            $.ajax(
            {
                type: "POST",
                url:  "api/checkregister",
                data: $("#register1").serialize(),
                success:function(result)
                {
                    if(result.status == 0)
                    {
                        swal({
                            title: "ผิดพลาด!",
                            text: "บัญชีผู้ใช้ หรือ Email หรือ โทรศัพท์มือถือ นี้ถูกใช้งานแล้ว!",
                            type: "error",
                            showButtonCancel: true,
                        }, function(isConfirm) {
                                if(isConfirm){
                                    window.location = "login";
                                }
                                if(isCancel){
                                    window.location = "login";
                                }
                        });
                    }
                    else if(result.status == 1)
                    {
                        swal({
                            title: "สำเร็จ!",
                            text: result.message,
                            type: "success",
                            showButtonCancel: true,
                        }, function(isConfirm) {
                                if(isConfirm){
                                    window.location = "login";
                                }
                                if(isCancel){
                                    window.location = "login";
                                }
                        });
                    }
                }
            });

        });
    });
  </script>
<script>
        $('#password1, #password2').on('keyup', function () {
        if ($('#password1').val() == $('#password2').val()) {
            $('#message').html('').css('color', 'green');
        } else 
            $('#message').html('รหัสผ่านทั้งสองไม่ตรงกัน!!').css('color', 'red');
        });
</script>
</html>