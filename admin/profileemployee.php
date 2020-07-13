<?php
include_once "inc/headernv.php";
include_once '../classes/employee.php';
?>
<?php 
    $em= new Employee();
?>
<?php 
// neu nguoi dung chua dang nhap nhung ho co the danh profile.php tren url thi cho ho quay lai trang login
    $logincheck = Session::get('employeelogin');
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
			 $id = Session::get('employeeID');
			     $showemployeebyid = $em->show_employee_by_id($id);
			     if($showemployeebyid){
			         while ($result = $showemployeebyid->fetch_assoc()){
			      
			?>
				<tr>
					<td class="profilebold">Tên tài khoản:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['HoTenNV']?></td>
				</tr>
				<tr>
					<td class="profilebold">Chức vụ:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['ChucVu']?></td>
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
