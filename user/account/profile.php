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
    <link href="<?php echo $link2;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $link2;?>assets/css/profile.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $link2;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
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
                    <form action="#" method="POST">
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
                            <div class="emailinput"><?php echo $_SESSION['Uall_email'];?> <a href="#" style="font-size: 12px;">เปลี่ยน</a></div>
                        </div>
                        <div class="mytelphone">
                            <label>หมายเลขโทรศัพท์</label>
                            <div class="telphoneinput"><?php echo $_SESSION['Uall_contact'];?> <a href="#" style="font-size: 12px;">เปลี่ยน</a></div>
                        </div>
                        <div class="mygender">
                            <label class="genderhead">เพศ</label>
                            <div class="genderinput"><input type="radio" name="gender" id="male" value="male"> <label for="male">ชาย</label> <input type="radio" name="gender" id="female" value="female"> <label for="female">หญิง</label> <input type="radio" name="gender" id="other" value="other"> <label for="other">อื่นๆ</label></div>
                        </div>
                        <div class="mybirthday">
                            <label>วัน/เดือน/ปี เกิด</label>
                            <div class="birthdayselect">
                                <select name="date" id="date-select">
                                    <?php 
                                        $start_date = 1;
                                        $end_date   = 31;
                                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                                            echo '<option value='.$j.'>'.$j.'</option>';
                                        }
                                    ?>
                                </select>
                                <select name="month" id="month-select">
                                    <?php for( $m=1; $m<=12; ++$m ) { 
                                        $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                        ?>
                                        <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                                    <?php } ?>
                                </select>
                                <select name="year" id="year-select">
                                    <?php 
                                        $year = date('Y');
                                        $min = $year - 60;
                                        $max = $year;
                                        for( $i=$max; $i>=$min; $i-- ) {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                    ?>
                                </select><br>
                                <button class="buttonsubmit" type="submit">บันทึก</button>
                            </div>
                        </div>
                    </form>
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
                window.location = "<?php echo $link2;?>logout";
            }
            if(isCancel){
                window.location = "<?php echo $link2;?>logout";
            }
    });
}
</script>
</html>