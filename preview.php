 <?php 
	include "inc/header.php";
?>
<?php 
if(!isset($_GET['proid'])||$_GET['proid']==NULL){
    echo "<script>window.location='404.php'</script>";
}else{
    $proid = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $quality = $_POST['num'];
    $addtocart = $cart->insert_cart($quality,$proid);
}
?>
	<div class="contentdetail">
	<?php 
	   $getprodetail = $pro->getdetailproduct($proid);
	   if($getprodetail){
	       while ($result = $getprodetail->fetch_assoc()){ 
	           
	    
	?>
    			<div class="detailimg">
					<img src="admin/uploads/<?php echo $result['Hinh']?>" alt="img" />
				</div>
				<div class="detaildescription">
					<h2><?php echo $result['TenHH']?></h2>
					<p><?php echo $fm->textShorten($result['MoTaHH'],30)?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $fm->format_currency($result['Gia']).".VND"?></span></p>
						<p>Loại hàng: <span><?php echo $result['TenNhom']?></span></p>
						<p>Thương hiệu: <span><?php echo $result['TenTH']?></span></p>
					</div>
					<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="num" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
						<?php 
						if(isset($addtocart)){
						    echo "<span style='color:red; font-size:18px;'>Sản phẩm đã có trong giỏ hàng!</span>";
						    
						}
						?>
					</form>				
					</div>
				</div>
				<div class="clear"></div>
			<div class="productdescription">
			<h2>Giới thiệu sản phẩm</h2>
			<p><?php echo $result['MoTaHH']?></p>
	    </div>
	    <?php 
	       }
	   }
	    ?>
 	</div>
<?php 
	include "inc/footer.php";
?>