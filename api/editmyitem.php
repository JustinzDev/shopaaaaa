<?php

    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('./setlink.php');

    if(isset($_POST["itemid"])){  
        $itemprice = 0;
        $itemname = 0;
        $output = '';  
        $query = "SELECT * FROM products WHERE product_id = '".$_POST["itemid"]."'";  
        $result = mysqli_query($conn, $query);  
        $output .= ' 
        <form action="'.$vps.'api/confirmeditmyitem.php?itemid='.$_POST["itemid"].'" method="POST"> 
            <div class="table-responsive">  
                <table class="table table-bordered table-hover">';  
        while($row = mysqli_fetch_array($result))  
        {  
            $output .= '  
                    <center><img width="50%" src="'.$vps.$row["product_img"].'"/></div></center>
                    <tr>  
                        <td width="20%"><label>ชื่อสินค้า</label></td>  
                        <td width="80%"><input style="padding: 5px 10px; width:60%; border: 1px solid rgba(189, 189, 189, 0.5);" name="productname" value="'.$row["product_name"].'" require></td>
                    </tr>  
                    <tr>  
                        <td width="20%"><label>ราคาสินค้า</label></td>  
                        <td width="80%"><input style="padding: 5px 10px; width:60%; border: 1px solid rgba(189, 189, 189, 0.5);" name="productprice" value="'.$row["product_price"].'" require> บาท</td>
                    </tr>  
                    <tr>  
                        <td width="20%"><label>รายละเอียด</label></td>  
                        <td width="80%"><textarea style="padding: 5px 10px; width:60%; border: 1px solid rgba(189, 189, 189, 0.5); resize:none;" name="productdetails" rows="10" cols="43" require>'.$row["product_details"].'</textarea></td>
                    </tr> 
                    <tr>  
                        <td width="20%"><label>จำนวนสินค้าในคลัง</label></td> 
                        <td width="80%"><input style="padding: 5px 10px; width:60%; border: 1px solid rgba(189, 189, 189, 0.5);" name="productcount" value="'.$row["product_count"].'" require> ชิ้น</td> 
                    </tr>
                    <tr>  
                        <td width="20%"><label>จำนวนที่ขายได้</label></td>  
                        <td width="80%">'.$row["product_countsell"].' ชิ้น</td>  
                    </tr>
                    ';  
        }  
        $output .= "</table></div>";  
        $output .= '<div class="modal-footer">
                        <button id="buyitem2" type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                    </form>';
        echo $output; 
    }

?>