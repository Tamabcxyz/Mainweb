<?php 
	include "inc/header.php";
?>
 <?php 
 // neu nguoi dung nhan vao dang xuat thi cho den trang login
 $logincheck = Session::get('customer_login');
 if($logincheck==FALSE){
     header('Location:login.php');
 }
 ?>
<style>
<!--
.notfound{
    font-size:30px;
    font-weight: bold;
    margin:10px 0px 0px 20px;
}
-->
</style>
	<div class="contentdetail">
    			<div class="notfound">order page </div>
 	</div>
<?php 
	include "inc/footer.php";
?>