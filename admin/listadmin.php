<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
?>
	<div class="main">
		<div class="topmain">Danh sách người dùng</div>
		<div class="centmain">
			<table class="listUser">
					<tr>
					<td><b>ID</b></td>
					<td><b>Họ Tên</b></td>
					<td><b>Mail</b></td>
					<td><b>Tên đăng nhập</b></td>
					<td colspan="2"><b>Quản lý</b></td>
					</tr>
					<tr>
					<td>0</td>
					<td>Tam Tran</td>
					<td>tam@gmail.com</td>
					<td>tamtran</td>
					<td><a href="#">Sửa</a></td>
					<td><a href="#">Xóa</a></td>
					</tr>
					<tr>
					<td>1</td>
					<td>Thao</td>
					<td>12345</td>
					<td><a href="#">Sửa</a></td>
					<td><a href="#">Xóa</a></td>
					</tr>
			</table>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>