<?php 
	include "inc/header.php";
?>
<?php 
// neu nguoi dung chua dang nhap nhung ho co the danh profile.php tren url thi cho ho quay lai trang login
    $logincheck = Session::get('customer_login');
    if($logincheck==FALSE){
        header('Location:login.php');
    }
?>
	<div class="contentdetail">
		<div class="topboxsp"><h3>Thông tin khách hàng</h3></div>
		<div class="profile">
			<table>
			<?php 
			 $id = Session::get('customer_id');
			     $showcustomer = $cs->show_customer($id);
			     if($showcustomer){
			         while ($result = $showcustomer->fetch_assoc()){
			      
			?>
				<tr>
					<td class="profilebold">Tên tài khoản:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['HoTenKH']?></td>
				</tr>
				<tr>
					<td class="profilebold">Địa chỉ:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['DiaChi']?></td>
				</tr>
				<tr>
					<td class="profilebold">Số điện thoại:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['SoDienThoai']?></td>
				</tr>
				<tr>
					<td class="profilebold">Mail:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['email']?></td>
				</tr>
				<tr>
					<td colspan="3" class="profilebold"><center><a href="editprofile.php"><i>Thay đổi thông tin</i></a></center></td>
				</tr>
			<?php 
			         }
			     }
			?>
			</table>
		</div>
	</div>
<?php 
	include "inc/footer.php";
?>

