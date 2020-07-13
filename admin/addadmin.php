<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/employee.php';
?>
<?php 
 $em = new Employee();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $ht = $_POST['userEmployer'];
    $cv = $_POST['positionEmployer'];
    $dc = $_POST['addressEmployer'];
    $sdt = $_POST['phonerEmployer'];
    $mk = md5($_POST['pass']);
    $insertemployee = $em->insert_employee($ht,$cv,$dc,$sdt,$mk);
}
?>
	<div class="main">
		<div class="topmain">Thêm nhân viên</div>
		<div class="centmain">
		<?php 
		if(isset($insertemployee)){
		    echo $insertemployee;
		}
		?>
			<form action="addemployee.php" method="post">
				<table class="form">	
					<tr>
					<td>Họ và tên:</td>
					<td><input type="text" value="" name="userEmployer"></td>
					<td></td>
					</tr>
					
					<tr>
					<td>Email:</td>
					<td><input type="text" value="" name="positionEmployer"></td>
					<td></td>
					</tr>
					
					<tr>
					<td>Tên đăng nhập:</td>
					<td><input type="text" value="" name="addressEmployer"></td>
					<td></td>
					</tr>
					<tr>
					<td>Mật khẩu:</td>
					<td><input type="text" value="" name="phonerEmployer"></td>
					<td></td>
					</tr>
					<tr>
					<td>Loại:</td>
					<td><input type="text" value="" name="pass"></td>
					<td></td>
					</tr>				
				 	<tr>
                    <td>
                    </td>
                    <td><input type="submit" name="submit" Value="Thêm" /></td>
                	</tr>
            	</table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>	