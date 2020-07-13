<?php 
	include "inc/header.php";
?>
	<div class="contain">
	<div class="br"></div>	
	<div class="containboxbrand1">
		<div class="topboxsp"><h3>Thương hiệu Apple</h3></div>
		<div class="listboxbrand">
		<?php 
		$Getproductbybrandapple = $pro->getproductbybrandnamenew('Apple');
		   if($Getproductbybrandapple){
		       while ($result = $Getproductbybrandapple->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result['Hinh']?>" >
				<b><?php echo $result['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
			
		</div>
	</div>
	<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Samsung</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandsamsung = $pro->getproductbybrandnamenew('Samsung');
		   if($Getproductbybrandsamsung){
		       while ($result1 = $Getproductbybrandsamsung->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result1['Hinh']?>" >
				<b><?php echo $result1['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result1['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result1['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
	<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Asus</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandsamsung = $pro->getproductbybrandnamenew('Asus');
		   if($Getproductbybrandsamsung){
		       while ($result2 = $Getproductbybrandsamsung->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result2['Hinh']?>" >
				<b><?php echo $result2['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result2['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result2['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Oppo</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandoppo = $pro->getproductbybrandnamenew('Oppo');
		   if($Getproductbybrandoppo){
		       while ($result3 = $Getproductbybrandoppo->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result3['Hinh']?>" >
				<b><?php echo $result3['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result3['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result3['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Huawai</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandhuawai = $pro->getproductbybrandnamenew('Huawei');
		   if($Getproductbybrandhuawai){
		       while ($result4 = $Getproductbybrandhuawai->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result4['Hinh']?>" >
				<b><?php echo $result4['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result4['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result4['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Sony</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandsony = $pro->getproductbybrandnamenew('Sony');
		   if($Getproductbybrandsony){
		       while ($result5 = $Getproductbybrandsony->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result5['Hinh']?>" >
				<b><?php echo $result5['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result5['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result5['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Nokia</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandnokia = $pro->getproductbybrandnamenew('Nokia');
		   if($Getproductbybrandnokia){
		       while ($result6 = $Getproductbybrandnokia->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result6['Hinh']?>" >
				<b><?php echo $result6['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result6['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result6['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Lenovo</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandlenovo = $pro->getproductbybrandnamenew('Lenovo');
		   if($Getproductbybrandlenovo){
		       while ($result7 = $Getproductbybrandlenovo->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result7['Hinh']?>" >
				<b><?php echo $result7['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result7['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result7['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Acer</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandacer = $pro->getproductbybrandnamenew('Acer');
		   if($Getproductbybrandacer){
		       while ($result8 = $Getproductbybrandacer->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result8['Hinh']?>" >
				<b><?php echo $result8['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result8['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result8['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Dell</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybranddell = $pro->getproductbybrandnamenew('Dell');
		   if($Getproductbybranddell){
		       while ($result9 = $Getproductbybranddell->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result9['Hinh']?>" >
				<b><?php echo $result9['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result9['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result9['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
		<div class="containboxbrand2">
		<div class="topboxsp"><h3>Thương hiệu Microsoft</h3></div>
		<div class="listboxbrand">
			<?php 
		 $Getproductbybrandmicrosoft = $pro->getproductbybrandnamenew('Microsoft');
		   if($Getproductbybrandmicrosoft){
		       while ($result10 = $Getproductbybrandmicrosoft->fetch_assoc()){
		           
		      
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result10['Hinh']?>" >
				<b><?php echo $result10['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result10['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result10['MSHH']?>">Xem chi tiết</a></span></div>
			</div>
		<?php 
		       }
		   }
		?>
		</div>
	</div>
	</div>
<?php 
	include "inc/footer.php";
?>
