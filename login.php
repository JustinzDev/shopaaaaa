<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/login.css?v=<?=time();?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <img src="./assets/img/logo.png"><br><br>
                <h2>
                    แหล่งช้อปปิ้งออนไลน์ที่ใหญ่ที่สุดในจักรวาล<br>
                    กาแลกซี่พร้อมขายอินฟินิตี้สโตน
                </h2>
            </div>
            <div class="rightbody">
                <form action="#" method="POST">
                    <h5>เข้าสู่ระบบ</h5>
                    <input type="text" name="Uname" placeholder="หมายเลขโทรศัพท์ / Email / ชื่อผู้ใช้"><br>
                    <input type="password" name="pw1" placeholder="รหัสผ่าน"> <br>
                    <button type="submit">เข้าสู่ระบบ</button><br>
                    <a href="#" style="float: right; font-size: 12px; margin-top: 3px;">ลืมรหัสผ่าน</a><br>

                    <span style="font-size: 14px; color: grey">เพิ่งเคยเข้ามาใน Shopee ใช่หรือไม่</span><a href="#" style="font-size: 14px;  color: #ee4d2d;"> สมัครใหม่</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>