<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$record_per_page = 9;
	$pagenum = $_GET["page"];	
	$CateID=$_REQUEST['cid']; //lay ma loai tu URL
	$_SESSION['url']="index.php?go=product&page=".$pagenum." &cid=".$CateID;
	$page = "index.php?go=product&cid=".$CateID;
	if($CateID==-1)
		{
			$sqlpro="SELECT * FROM product WHERE ProStatus=1  order by ProID desc"; 
		}else{
			$sqlpro="SELECT * FROM product WHERE ProStatus=1 and CateID='".$CateID."' order by ProID desc";
		}
	$Resultpro=mysql_query($sqlpro);  //Duyet tung dong va hien thi ben duoi
	$numberrow=mysql_num_rows($Resultpro);
	
	$totalpage =ceil($numberrow/ $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlpro =$sqlpro." LIMIT ".$from.",".$record_per_page;
	$Resultpro=mysql_query($sqlpro); 
?>





<div class="defaul-new-content">
	<div class="title-product"><span><? echo $numberrow; ?></span></div>
	<div class="content-defaul-new-product">
	<div class="search-div">
		<form action="index.php?go=searchadvance" method="post" name="frm_product_icon_search" id="frm_product_icon_search">Tùy chọn 
			<select class="tablebox" name="proprice1" id="proprice1">
					<option value="0">Giá từ ..</option>
					<option value="0">0</option>
					<option value="200000">200.000</option>
					<option value="400000">400.000</option>
					<option value="600000">600.000</option>
					<option value="800000">800.000</option>
					<option value="1000000">1.000.000</option>
					<option value="1200000">1.200.000</option>
					<option value="1400000">1.400.000</option>
			</select>&nbsp;
			<select  class="tablebox" name="proprice2" id="proprice2">
					<option value="0">Giá đến ..</option>
					<option value="400000">400.000</option>
					<option value="600000">600.000</option>
					<option value="800000">800.000</option>
					<option value="1000000">1.000.000</option>
					<option value="1200000">1.200.000</option>
					<option value="1400000">1.400.000</option>
					<option value="1400000">1.400.000</option>
					<option value="-1">Trở lên...</option>		
	    	</select>
			<select  class="tablebox" name="propricedesc" id="propricedesc">
					<option value="0">Giá tăng dần</option>
					<option value="1">Giá giảm dần</option>		
	    	</select>
			<input class="buttonbutton" name="submit" type="submit" value="Tìm kiếm" />
		</form>		
	</div>
	
	<?
		if(mysql_num_rows($Resultpro))
		{
			$i=0;
			while($rowpro=mysql_fetch_array($Resultpro))
			{
			$i++;
	?>	
			<div class="box-product">
				<a href="index.php?go=product_detail&pid=<? echo $rowpro['ProID']; ?>" title="Chi tiết sản phẩm <? echo $rowpro['ProName'];?>"><img src="pic-product/<? echo $rowpro['ProImage']; ?>" width="164" height="152" /></a>
				<span class="name-product" onclick="location.href='index.php?go=product_detail&pid=<? echo $rowpro['ProID']; ?>'" title="Chi tiết sản phẩm <? echo $rowpro['ProName'];?>"><? echo $rowpro['ProName'];?></span><br />
				<span class="price-product">Giá: <strong><? echo number_format($rowpro['ProPrice']); ?></strong> (VND)</span>
				<div class="buy-detail">
					<a class="buy-button" href="index.php?go=shoppingcart&action=add&pid=<? echo $rowpro['ProID']; ?>"></a>
					<a class="detail-button" href="index.php?go=product_detail&pid=<? echo $rowpro['ProID']; ?>"></a>
				</div>
			</div>
		<?
			if($i1%3==0) echo '</tr>';
			}
		}else{
			echo "Sản phẩm đang cập nhật"; 
		}
		?>
		
		
		
		<table width="100%" border="0" cellpadding="5" cellspacing="0">
		  <tr style="font-size:12px; font-weight:bold">
			<td align="center"><hr/>
					<?
						/*
						Vong lap de tao ra cac link lien ket den cac trang du lieu.
						Output: 	1 | 2 | 3 | 4 
						*/
						for($i =1; $i<=$totalpage;$i++)
						{
							if ($i==1){
								echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
							}else{
							if($pagenum==$i)			
								echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
							else
								echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
							}
						}
						echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
					?>	</td>
		  </tr>
		</table><br /><br />					
	</div>
	<div class="bottom-default"></div>
</div>
