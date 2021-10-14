<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $vps;?>assets/css/additemshop.css?v=<?=time();?>" rel="stylesheet">
    <title>Seller Center</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
</head>
<body>
	<div class="headtop">
        <h5>เพิ่มสินค้าลงร้านค้า</h5>
    </div>
    <div class="bodyadditem">
        <form action="<?php echo $vps;?>api/additemtoshop" method="POST" enctype="multipart/form-data">
            <label>ชื่อสินค้า</label><br>
            <input type="text" id="itemname" name="itemname" require><br>
            <label>จำนวนที่ลงขาย</label><br>
            <input type="text" id="itemcount" name="itemcount" require><br>
            <label>ราคาขาย/ชิ้น</label><br>
            <input type="text" id="itemprice" name="itemprice" require><br>
            <label>รายละเอียดสินค้า <font color="red">( ความยาวไม่เกิน 128 ตัวอักษร )</font></label><br>
            <textarea id="itemdetails" name="itemdetails" rows="10" cols="43" require></textarea><br>
            <label>รูปภาพสินค้า (หลายรูป รอการอัพเดท)</label><br>
            <div class="profileimg">
                <img id="output">
            </div>
            <div class="pbutton"><button type="button" class="buttonuploadimg">เลือกรูป</button></div>
            <input id="myfilepic" name="myfilepic" accept=".jpg,.jpeg,.png" onchange="loadFile(event)" type="file">
            <div class="infoimg">
                <span>ขนาดไฟล์: สูงสุด 5 MB</span>
                <span>ไฟล์ที่รองรับ: .JPEG, .PNG</span>
            </div>
            <div class="buttonsubmit"><button id="submitbutton" type="submit">เพิ่มสินค้า</button></div>
        </form>
    </div>
</body>
<script>

    $('.buttonuploadimg').click(function() {
        $('#myfilepic').click();
    });

    var itemname = document.getElementById("itemname");
    var itemcount = document.getElementById("itemcount");
    var itemprice = document.getElementById("itemprice");

    if(itemname.value == "" || itemcount.value == "" || itemprice.value == ""){
        document.getElementById("submitbutton").style.background="#C8C8C8";
        document.getElementById("submitbutton").style.cursor = "context-menu";
        document.getElementById("submitbutton").disabled = true;
    }

    $('#itemname, #itemcount, #itemprice, #output').on('change', function () {
        var image = document.getElementById('output').src;
        if(itemname.value != "" && itemcount.value != "" && itemprice.value != "" && image != ""){
            document.getElementById("submitbutton").style.background="#31CA00";
            document.getElementById("submitbutton").style.cursor="pointer";
            document.getElementById("submitbutton").disabled = false;
        }
        else{
            document.getElementById("submitbutton").style.background="#C8C8C8";
            document.getElementById("submitbutton").style.cursor = "context-menu";
            document.getElementById("submitbutton").disabled = true;
        }
    })
    
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        if(itemname.value != "" && itemcount.value != "" && itemprice.value != "" && image != ""){
            document.getElementById("submitbutton").style.background="#31CA00";
            document.getElementById("submitbutton").style.cursor="pointer";
            document.getElementById("submitbutton").disabled = false;
        }
        else{
            document.getElementById("submitbutton").style.background="#C8C8C8";
            document.getElementById("submitbutton").style.cursor = "context-menu";
            document.getElementById("submitbutton").disabled = true;
        }
    };
</script>
</html>