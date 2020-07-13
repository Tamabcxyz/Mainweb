<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/customer.php';
?>
<?php 
 $cus = new Customer();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $insercustomer = $cus->insert_customer($_POST);
}
?>
	<div class="main">
		<div class="topmain">Thêm khách hàng</div>
		<div class="centmain">
		<?php 
		if(isset($insercustomer)){
		    echo $insercustomer;
		}
		?>
			<form action="addcustomer.php" method="post">
				<table class="form">			
                	<tr>
					<td>Họ tên:</td>
					<td><input type="text" value="" name="name"></td>
					<td></td>
					</tr>
					<tr>
					<td>Địa chỉ:</td>
					<td><input type="text" value="" name="adress"></td>
					<td></td>
					</tr>
					<tr>
					<td>SĐT:</td>
					<td><input type="text" value="" name="numphone"></td>
					<td></td>
					</tr>
					<tr>
					<td>Mail:</td>
					<td><input type="text" value="" name="mail"></td>
					<td></td>
					</tr>
					<tr>
					<td>Mật khẩu:</td>
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