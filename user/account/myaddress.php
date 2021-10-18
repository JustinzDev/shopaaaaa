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
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/css/profile.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>
<body style="background-color: #f1f1f1;">
    <?php include('../../navbar.php');?>
    <div id="main">
        <div clsss="contain">
            <div class="body1">
                <div class="navbar-left">
                    <div class="ontop">
                        <div class="profileimg" style="width:60px; height:60px; margin-bottom:100px;">
                            <img id="output">
                        </div>
                        <h6><?php echo $_SESSION['Uall_username'];?> <br>ข้อมูลส่วนตัว</h6>
                    </div>
                    <div class="ondown">
                        <span class="myaccounts"><i style="color:#008FFF;" class="fas fa-user-alt"></i> บัญชีของฉัน</span>
                        <span class="history" id="myprofile">ประวัติส่วนตัว</span>
                        <span class="bank_card">บัญชีธนาคาร&บัตร</span>
                        <span class="address" id="myaddress" style="color:#ee4d2d;">ที่อยู่</span>
                        <span class="changepass">เปลี่ยนรหัสผ่าน</span>
                        <span class="mybuying" id="mybuyorder"><i style="color:#008FFF;" class="fas fa-clipboard"></i> การซื้อของฉัน</span>
                        <span class="notify"><i style="color:#FF7800;" class="fas fa-bell"></i> การแจ้งเตือน</span>
                        <span class="codeseller"><i style="color:#FF7800;" class="fas fa-archive"></i> โค้ดส่วนลดของฉัน</span>
                        <span class="shopcoin"><i style="color:#FFBD00;" class="fas fa-coins"></i> Shopee Coins ของฉัน</span>
                    </div>
                </div>
                <form action="../../api/updateaddress" method="POST" id="update1">
                    <div class="navbar-right">
                        <div class="headinfo">
                            <h5 class="textmyprofile">ที่อยู่ของฉัน</h5>
                            <span class="textinfomyprofile">ที่อยู่สำหรับการจัดส่งสินค้า</span>
                        </div>
                        <div class="inline-left">
                            <div class="myusername">
                                <label>ชื่อผู้รับ</label>
                                <div class="nameinfo" id="nameuser"><?php echo $_SESSION['Uall_nameuser'];?></div> 
                            </div>
                            <div class="mytelphone">
                                <label>หมายเลขโทรศัพท์</label>
                                <div class="telphoneinput"><?php echo $_SESSION['Uall_contact'];?></div>
                            </div><br>
                            <div class="myname">
                                <label>ที่อยู่</label><textarea id="addressdetail" name="addressdetail"  cols="50" require><?php echo $_SESSION['Uall_address'];?></textarea><br>
                            </div>
                        </div>
                        <div class="inline-right">
                            <!-- -->
                        </div>
                        <div class="buttonsaveprofile">
                            <button id="update2" class="buttonsubmit" type="submit" name="submit">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
<script>

    $("textarea").keydown(function(e){
        // Enter pressed
        if (e.keyCode == 13)
        {
            //method to prevent from default behaviour
            e.preventDefault();
        }
    });

    function changename(){
        $(".nameinput").addClass("show");
        $("#nameuser").addClass("hide");
    }
    
    $('#mybuyorder').click(function(){
        window.location = "<?php echo $mylocalhost;?>user/account/myorder";
    })

    $('#myaddress').click(function(){
        window.location = "<?php echo $mylocalhost;?>user/account/myaddress";
    })

    $('#myprofile').click(function(){
        window.location = "<?php echo $mylocalhost;?>user/account/profile";
    })


    var imgUrl = "<?php echo $mylocalhost;?>assets/img/users/<?php echo $_SESSION['Uall_username']?>";
    var tester = new Image();
    tester.onload=function() {
        document.getElementById("output").src = imgUrl + '.png?t=' + new Date().getTime();
    };
    tester.onerror=function() { 
        document.getElementById("output").src = imgUrl + '.jpeg?t=' + new Date().getTime();         
    };

    tester.src=imgUrl + '.png';

    var loadFile = function(event) {
        var image = document.getElementById('output');
        var image2 = document.getElementById('output2');
        image.src = URL.createObjectURL(event.target.files[0]);
        image2.src = URL.createObjectURL(event.target.files[0]);
    };

    $("#inputdate").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")

    $('.buttonuploadimg').click(function() {
        $('#myfilepic').click();
    });

    function clickonme(){
        swal({
            title: "ออกจากระบบ",
            text: "คุณออกจากระบบสำเร็จ!",
            type: "success",
            showButtonCancel: true,
        }, function(isConfirm) {
                if(isConfirm){
                    window.location = "<?php echo $mylocalhost;?>logout";
                }
                if(isCancel){
                    window.location = "<?php echo $mylocalhost;?>logout";
                }
        });
    }
</script>
</html>