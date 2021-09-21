<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);

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
    <title>สมัครสมาชิกช็อปป๊ะออนไลน์ที่นี่</title>
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
                        <label for="uname">ชื่อผู้ใช้</label>
                        <input id="uname" type="text" name="uname" pattern="^[A-z0-9]+$" placeholder="ชื่อผู้ใช้" require><br>
                        <label for="pw1">รหัสผ่าน</label>
                        <input id="password1" type="password" name="pw1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" placeholder="รหัสผ่าน" require> <br>
                        <h6 style="font-size: 11px">* ใช้อักขระ 8 ตัวขึ้นไปที่มีทั้งตัวอักษรพิมพ์เล็ก-พิมพ์ใหญ่ และตัวเลขผสมกัน</h6>
                        <label for="pw2">ยืนยัน-รหัสผ่าน</label>
                        <input id="password2" type="password" name="pw2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" placeholder="ยืนยัน-รหัสผ่าน" require> <br>
                        <span id='message'></span><br>
                        <label for="uemail">Email</label>
                        <input id="uemail" type="email" name="uemail" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" placeholder="Email" require><br>
                        <label for="telphone">เบอร์โทรศัพท์</label>
                        <input id="telphone" type="tel" name="telphone" placeholder="เบอร์โทรศัพท์มือถือ" pattern="(08|09|06)[0-9]{8}" minlength="1" maxlength="10" require><br>
                        <label for="telphone">วัน/เดือน/ปี ที่เกิด</label>
                        <input type="date" id="birthday" name="birthday" value="<?php echo date('Y-m-d'); ?>" require onchange="handler(event);"><br>
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

    if(uname.value == "" || password1 == "" || password2 == "" || uemail == "" || telphone == ""){
        document.getElementById("register2").style.background="#C8C8C8";
        document.getElementById("register2").disabled = true;
    }

    $('#uname, #password1, #password2, #uemail, #telphone, #birthday').on('change', function () {
        var uname = document.getElementById("uname"), reuname = uname.pattern;
        var password1 = document.getElementById("password1"), repassword1 = password1.pattern;
        var password2 = document.getElementById("password2"), repassword2 = password2.pattern;
        var uemail = document.getElementById("uemail"), reuemail = uemail.pattern;
        var telphone = document.getElementById("telphone"), retelphone = telphone.pattern;

        var patternuname = new RegExp(reuname);
        var resultuname = patternuname.test(uname.value);

        var patternpassword1 = new RegExp(repassword1);
        var resultpassword1 = patternpassword1.test(password1.value);

        var patternpassword2 = new RegExp(repassword2);
        var resultpassword2 = patternpassword2.test(password2.value);

        var patternuemail = new RegExp(reuemail);
        var resultuemail = patternuemail.test(uemail.value);

        var patterntelphone = new RegExp(retelphone);
        var resulttelphone = patterntelphone.test(telphone.value);

        var patterntelphone = new RegExp(retelphone);
        var resulttelphone = patterntelphone.test(telphone.value);

        var birthday = document.getElementById("birthday").value;
        const formatYmd = date => date.toISOString().slice(0, 10);
        var date = formatYmd(new Date());

        //==== [ เงื่อนไขไม่ถูกต้อง ปิดการใช้งานปุ่ม Submit ] ====//
        if (!resultuname || !resultpassword1 || !resultpassword2 || !resultuemail || !resulttelphone || password1.value != password2.value || date == birthday) {
            document.getElementById("register2").style.background="#C8C8C8";
            document.getElementById("register2").disabled = true;
        }
        //==== [ เงื่อนไขถูกต้อง เปิดการใช้งานปุ่ม Submit ] ====//
        else if(resultuname && resultpassword1 && resultpassword2 && resultuemail && resulttelphone && date != birthday){
            document.getElementById("register2").style.background="#f5552d";
            document.getElementById("register2").disabled = false;
        }
    });

    $(document).ready(function(){
        $("#register2").click(function(e){
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
            }
            
        );
</script>
</html>