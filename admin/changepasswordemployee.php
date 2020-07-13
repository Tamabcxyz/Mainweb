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
<?php 
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = Session::get('employeeID');
    $check = $em->update_employee_pass($_POST,$id);
}


?>
	<div class="main">
		<div class="topmain">Thay đổi mật khẩu</div>
		<div class="centmain">
		<?php 
		if(isset($check)){
		    echo $check;
		}
		?>
			<form action="" method="post">
				<table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu cũ..."  name="oldpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu mới..." name="newpass" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Cập nhật" />
                    </td>
                </tr>
            </table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>
