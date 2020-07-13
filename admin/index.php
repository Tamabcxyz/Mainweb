<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/admin.php';
?>
<?php 
    $ad= new Admin();
?>
<?php 
// neu nguoi dung chua dang nhap nhung ho co the danh profile.php tren url thi cho ho quay lai trang login
    $logincheck = Session::get('adminlogin');
    if($logincheck==FALSE){
        header('Location:login.php');
    }
?>
	<div class="main">
		<div class="topmain">Hồ sơ người dùng</div>
		<div class="centmain">
		<div class="profile">
			<table>
			<?php 
			 $id = Session::get('adminID');
			     $showadminbyid = $ad->show_admin_by_id($id);
			     if($showadminbyid){
			         while ($result = $showadminbyid->fetch_assoc()){
			      
			?>
				<tr>
					<td class="profilebold">Tên tài khoản:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['AdminName']?></td>
				</tr>
				<tr>
					<td class="profilebold">Mail:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['AdminMail']?></td>
				</tr>
				<tr>
					<td class="profilebold">Tên đăng nhập:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['AdminUser']?></td>
				</tr>
				
			<?php 
			         }
			     }
			?>
			</table>
		</div>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>