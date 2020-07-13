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
<?php 
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = Session::get('adminID');
    $check = $ad->update_admin_pass($_POST,$id);
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