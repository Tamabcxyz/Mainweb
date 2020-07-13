<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
?>
	<div class="main">
		<div class="topmain">Thêm đơn hàng</div>
		<div class="centmain">
			<form action="#">
				<table class="formaddorder">					
                <tr>
                    <td>
                        <label>Tên khách hàng:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Tên khách hàng.."  name="title" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Tên nhân viên:</label>
                    </td>
                    <td>
						<select>
						<option>Dao</option>
						<option>Hoa</option>
						<option>Cuc</option>
						<option>Luu</option>
						</select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ngày lập:</label>
                    </td>
                    <td>
						<input type="text" placeholder="ngay/thang/nam"  name="title" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tình trạng:</label>
                    </td>
                    <td>
						<select>
						<option>Duyệt</option>
						<option>Bỏ qua</option>
						</select>
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm đơn hàng" />
                    </td>
                </tr>
            </table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>