<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);

    include('../../api/setlink.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Centre</title>
    <link href="<?php echo $vps;?>assets/css/navbarshop.css?v=<?=time();?>" rel="stylesheet">
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
                <img src="<?php echo $vps;?>assets/img/logologin.png">
            </div>
            <h4>Seller Centre</h4>
            <div class="menuright">  
                <div class="dropdown">
                    <span class="dropbtn">
                        <div class="divpicprofile"><img id="mypicprofile"></div>
                        <?php echo $_SESSION['Uall_username']; ?>
                    </span>
                    <div class="dropdown-content">
                        <a href="<?php echo $vps;?>user/myshop/shop">ร้านค้าของฉัน</a>
                        <a href="#" onclick="clickonme();">ออกจากระบบ</a>
                    </div>
                </div>
                <a href="<?php echo $vps;?>">กลับหน้าหลัก</a>
            </div>
        </div>
    </header>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณเข้าสู่ระบบสำเร็จ!",
                            type: "success",
                            showButtonCancel: true,
                        }, function(isConfirm) {
                                if(isConfirm){
                                    window.location = "<?php echo $vps;?>";
                                }
                                if(isCancel){
                                    window.location = "<?php echo $vps;?>";
                                }
                        });
                    }
                    else if(result.status == 0)
                    {
                        swal({
                            title: "ผิดพลาด!",
                            text: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!",
                            type: "error",
                            showButtonCancel: true,
                        }, function(isConfirm) {
                                if(isConfirm){
                                    window.location = "<?php echo $vps;?>login";
                                }
                                if(isCancel){
                                    window.location = "<?php echo $vps;?>login";
                                }
                        });
                    }
                }
            });

        });
    });
  </script>
</html>