<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/employee.php';
?>
<?php 
 $em = new Employee();
 if(!isset($_GET['employeeid']) || $_GET['employeeid'] == NULL){
     echo "<script>window.location='listemployee.php';</script>";
 }else{
     $employeeid = $_GET['employeeid'];
 }
 
 if($_SERVER['REQUEST_METHOD']==='POST'){
     $ht = $_POST['userEmployer'];
     $cv = $_POST['positionEmployer'];
     $dc = $_POST['addressEmployer'];
     $sdt = $_POST['phonerEmployer'];
     $updateemployee = $em->update_employee($ht,$cv,$dc,$sdt,$employeeid);
 }
?>
	<div class="main">
		<div class="topmain">Thêm nhân viên</div>
		<div class="centmain">
		<?php 
		if(isset($updateemployee)){
		    echo $updateemployee;
		}
		?>
		<?php 
		$getemployeebyid = $em->getemployeebyid($employeeid);
		if($getemployeebyid){
		    while($result = $getemployeebyid->fetch_assoc()){
		        
		   
		?>
			<form action="" method="post">
				<table class="form">	
					<tr>
					<td>Họ và tên:</td>
					<td><input type="text" value="<?php echo $result['HoTenNV']?>" name="userEmployer"></td>
					<td></td>
					</tr>
					
					<tr>
					<td>Chức vụ:</td>
					<td><input type="text" value="<?php echo $result['ChucVu']?>" name="positionEmployer"></td>
					<td></td>
					</tr>
					
					<tr>
					<td>Địa chỉ:</td>
					<td><input type="text" value="<?php echo $result['DiaChi']?>" name="addressEmployer"></td>
					<td></td>
					</tr>
					<tr>
					<td>Số điện thoại:</td>
					<td><input type="text" value="<?php echo $result['SoDienThoai']?>" name="phonerEmployer"></td>
					<td></td>
					</tr>				
				 	<tr>
                    <td>
                    </td>
                    <td><input type="submit" name="submit" Value="Sửa" /></td>
                	</tr>
            	</table>
			</form>
			<?php 
		              }
		         }
			?>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>
