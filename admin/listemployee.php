<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/employee.php';
?>
<?php 
    $em = new Employee();
 
    $delemployee="";
    if(isset($_GET['delemployeeid'])){
        $id = $_GET['delemployeeid'];
        $delemployee = $em->delete_employee($id);
    }

?>
	<div class="main">
		<div class="topmain">Danh sách nhân viên</div>
		<div class="centmain">
		<?php 
		if($delemployee){
		    echo $delemployee;
		}
		?>
			<table class="listCustomer">
					<tr>
					<td><b>Họ tên</b></td>
					<td><b>Địa chỉ</b></td>
					<td><b>Số điện thoại</b></td>
					<td><b>Chức vụ</b></td>
					<td colspan="2"><b>Quản lý</b></td>
					</tr>
					<?php 
					   $show_employee = $em->show_employee();
					   if($show_employee){
					       $i=0;
					       while($result = $show_employee->fetch_assoc()){
					        $i++;   
					  
					?>
					<tr>
					<td><?php echo $result['HoTenNV']?></td>
					<td><?php echo $result['DiaChi']?></td>
					<td><?php echo $result['SoDienThoai']?></td>
					<td><?php echo $result['ChucVu']?></td>
					<td><a href="employeeedit.php?employeeid=<?php echo $result['MSNV'] ?>">Sửa</a></td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?delemployeeid=<?php echo $result['MSNV'] ?>">Xóa</a></td>
					</tr>
					<?php 
					       }
					   }
					?>
			</table>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>