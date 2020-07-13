<?php
include "inc/header.php";
?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $insertcustomer = $cs->insert_customer($_POST);
}
?>
	<div class="containlogin">
         <div class="registerform">
    		<h3>ĐĂNG KÝ TÀI KHOẢN</h3>
    		<?php 
    		if(isset($insertcustomer)){
    		    echo $insertcustomer;
    		}
    		?>
    		<form action="" method="post" name="form1">
    			<input type="text" name="name" value="" placeholder="Tên đăng nhập" ><br />
    			<span id="errorname" class="error"></span><br />
    			<input type="text" name="adress" value="" placeholder="Địa chỉ"><br />
    			<span id="emptyaddress" class="error"></span><br />
    			<input type="text" name="numphone" value="" placeholder="Số điện thoại" ><br />
    			<span id="errorphonenumber" class="error"></span><br />
    			<input type="text" name="mail" value="" placeholder="Email" ><br />
    			<span id="errormail" class="error"></span><br />
    			<input type="password" name="pass" value="" placeholder="Mật khẩu"><br />
    			<span id="errorpass" class="error"></span><br />
    			<input type="password" name="reenterpass" value="" placeholder="Nhập lại mật khẩu"><br />
    			<span id="errorreenterpass" class="error"></span><br />
    			<input type="submit" name="submit" value="Tạo tài khoản" onclick="return CheckRegister();"><br />
		    </form>
    	</div>
	</div>
<?php 
	include "inc/footer.php";
?>