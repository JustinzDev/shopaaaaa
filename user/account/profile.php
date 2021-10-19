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
    <link href="<?php echo $vps;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/css/profile.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
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
                        <div class="profileimg" style="width:60px; height:60px;">
                            <img id="output2">
                        </div>
                        <h6><?php echo $_SESSION['Uall_username'];?> <br>ข้อมูลส่วนตัว</h6>
                    </div>
                    <div class="ondown">
                        <span class="myaccounts"><i style="color:#008FFF;" class="fas fa-user-alt"></i> บัญชีของฉัน</span>
                        <span class="history" style="color:#ee4d2d;">ประวัติส่วนตัว</span>
                        <span class="bank_card">บัญชีธนาคาร&บัตร</span>
                        <span class="address" id="myaddress">ที่อยู่</span>
                        <span class="changepass">เปลี่ยนรหัสผ่าน</span>
                        <span class="mybuying" id="mybuyorder"><i style="color:#008FFF;" class="fas fa-clipboard"></i> การซื้อของฉัน</span>
                        <span class="notify"><i style="color:#FF7800;" class="fas fa-bell"></i> การแจ้งเตือน</span>
                        <span class="codeseller"><i style="color:#FF7800;" class="fas fa-archive"></i> โค้ดส่วนลดของฉัน</span>
                        <span class="shopcoin"><i style="color:#FFBD00;" class="fas fa-coins"></i> Shopee Coins ของฉัน</span>
                    </div>
                </div>
                <form action="../../api/updateprofile" method="POST" id="update1" enctype="multipart/form-data">
                    <div class="navbar-right">
                        <div class="headinfo">
                            <h5 class="textmyprofile">ข้อมูลของฉัน</h5>
                            <span class="textinfomyprofile">จัดการข้อมูลส่วนตัวคุณเพื่อความปลอดภัยของบัญชีผู้ใช้นี้</span>
                        </div>
                        <div class="inline-left">
                            <div class="myusername">
                                <label>ชื่อผู้ใช้</label>
                                <div class="nameinfo"><?php echo $_SESSION['Uall_username'];?></div>
                            </div>
                            <div class="myname">
                                <label>ชื่อ</label>
                                <?php if($_SESSION['Uall_nameuser'] != ""){?>
                                    <div class="nameinput hide"><input type="text" name="nameuser" value="<?php echo $_SESSION['Uall_nameuser'];?>"></div>
                                    <div class="nameinfo" id="nameuser"><?php echo $_SESSION['Uall_nameuser'];?> <a href="#" style="font-size: 12px;" onclick="changename()">เปลี่ยน</a></div> 
                                <?php }else{?>
                                    <div class="nameinput"><input type="text" name="nameuser"></div>
                                <?php }?>
                            </div>
                            <div class="myemail">
                                <label>Email</label>
                                <div class="emailinput"><?php echo $_SESSION['Uall_email'];?></div>
                            </div>
                            <div class="mytelphone">
                                <label>หมายเลขโทรศัพท์</label>
                                <div class="telphoneinput"><?php echo $_SESSION['Uall_contact'];?></div>
                            </div>
                            <div class="mygender">
                                <label class="genderhead">เพศ</label>
                                <div class="genderinput">
                                    <?php if($_SESSION['Uall_genderuser'] == "male"){?>
                                        <input type="radio" name="gender" id="male" value="male" checked> <label for="male">ชาย</label>
                                    <?php } else{?>
                                        <input type="radio" name="gender" id="male" value="male"> <label for="male">ชาย</label>
                                    <?php }?>
                                    <?php if($_SESSION['Uall_genderuser'] == "female"){?>
                                        <input type="radio" name="gender" id="female" value="female" checked> <label for="female">หญิง</label>
                                    <?php } else{?>
                                        <input type="radio" name="gender" id="female" value="female"> <label for="female">หญิง</label>
                                    <?php } ?>
                                    <?php if($_SESSION['Uall_genderuser'] == "other"){?>
                                        <input type="radio" name="gender" id="other" value="other" checked> <label for="other">อื่นๆ</label>
                                    <?php } else{?>
                                        <input type="radio" name="gender" id="other" value="other"> <label for="other">อื่นๆ</label>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="mybirthday">
                                <label>วัน/เดือน/ปี เกิด</label>
                                <div class="birthdayselect">
                                    <!--<input name="birthday" type="date"/>-->
                                    <?php if($_SESSION['Uall_birthday'] == ""){?>
                                        <input id="inputdate" name="birthday" type="date" data-date="" data-date-format="DD MMMM YYYY" value="1990-01-01">
                                    <?php } else{?>
                                        <input id="inputdate" name="birthday" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo $_SESSION['Uall_birthday'];?>">
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="inline-right">
                            <div class="profileimg">
                                <img id="output">
                            </div>
                            <div class="forminputimg">
                                    <div class="pbutton"><button type="button" class="buttonuploadimg">เลือกรูป</button></div>
                                    <input id="myfilepic" name="myfilepic" accept=".jpg,.jpeg,.png" onchange="loadFile(event)" type="file">
                                <div class="infoimg">
                                    <span>ขนาดไฟล์: สูงสุด 1MB</span>
                                    <span>ไฟล์ที่รองรับ: .JPEG, .PNG</span>
                                </div>
                            </div>
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

    function changename(){
        $(".nameinput").addClass("show");
        $("#nameuser").addClass("hide");
    }
    
    $('#mybuyorder').click(function(){
        window.location = "<?php echo $vps;?>user/account/myorder";
    })

    $('#myaddress').click(function(){
        window.location = "<?php echo $vps;?>user/account/myaddress";
    })

    var imgUrl = "<?php echo $vps;?>assets/img/users/<?php echo $_SESSION['Uall_username']?>";
    var tester = new Image();
    tester.onload=function() {
        document.getElementById("output").src = imgUrl + '.png?t=' + new Date().getTime();
        document.getElementById("output2").src = imgUrl + '.png?t=' + new Date().getTime();
    };
    tester.onerror=function() { 
        document.getElementById("output").src = imgUrl + '.jpeg?t=' + new Date().getTime();    
        document.getElementById("output2").src = imgUrl + '.jpeg?t=' + new Date().getTime();       
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
                    window.location = "<?php echo $vps;?>logout";
                }
                if(isCancel){
                    window.location = "<?php echo $vps;?>logout";
                }
        });
    }
</script>
</html>