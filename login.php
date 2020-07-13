<?php 
	include "inc/header.php";
?>
<?php 
// neu khach hang da dang nhap thi cho toi trang order
 $logincheck = Session::get('customer_login');
 if($logincheck){
   header('Location:mycart.php');// luc truoc o day la order.php
 }
?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
    $logincustomer = $cs->login_customer($_POST);
}
?>
	<div class="containlogin">
		<div class="loginform">
        	<h3>ĐĂNG NHẬP</h3>
        	<?php 
        	if(isset($logincustomer)){
        	    echo $logincustomer;
        	}
        	?>
        	<form action="" method="post" id="member">
                	<input type="text" name="phone" value="" placeholder="Số điện thoại"><br />
                    <input type="password" name="pass" value="" placeholder="Mật khẩu"><br />
                    <input type="submit" name="login" value="Đăng nhập">
             </form>
               <!--  <p class="note">Nếu bạn quên mật khẩu nhấn vào <a href="#">đây</a></p> --> 

         </div>
	</div>
<?php 
	include "inc/footer.php";
?>