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
<?php 
$id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])){
    $updatecustomer = $cs->update_customer($_POST,$id);
}
?>
	<div class="contentdetail">
		<div class="topboxsp"><h3>Cập nhật thông tin khách hàng</h3></div>
		<div class="profile">
		
			<form action="" method="post">
			<table>
			<tr>
				<?php 
				if(isset($updatecustomer)){
				    echo '<td colspan = "3">'.$updatecustomer.'</td>';
				}
				?>
			</tr>
			<?php 
			 $id = Session::get('customer_id');
			     $showcustomer = $cs->show_customer($id);
			     if($showcustomer){
			         while ($result = $showcustomer->fetch_assoc()){
			      
			?>
				<tr>
					<td class="profilebold">Tên tài khoản:</td>
					<td></td>
					<td><input type="text" name="name" value="<?php echo $result['HoTenKH']?>"></td>
				</tr>
				<tr>
					<td class="profilebold">Địa chỉ:</td>
					<td></td>
					<td><input type="text" name="adress" value="<?php echo $result['DiaChi']?>"></td>
				</tr>
				<tr>
					<td class="profilebold">Số điện thoại:</td>
					<td></td>
					<td><input type="text" name="phone" value="<?php echo $result['SoDienThoai']?>"></td>
				</tr>
				<tr>
					<td class="profilebold">Mail:</td>
					<td></td>
					<td><input type="text" name="mail" value="<?php echo $result['email']?>"></td>
				</tr>
				<tr>
					<td colspan="3" class="button"><center><input type="submit" name="save" value="Cập nhật"></center></td>
				</tr>
			<?php 
			         }
			     }
			?>
			</table>
			</form>
			
			
		</div>
	</div>
<?php 
	include "inc/footer.php";
?>

