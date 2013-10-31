<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class="defaul-new-content">
	<div class="title-defaul-new-product"></div>
	<div class="content-defaul-new-product">
	
	   <?
			$sqlPro="SELECT * FROM product,category WHERE product.CateID=category.CateID and ProStatus=1 order by ProID desc limit 0,6";
			$ResultPro=mysql_query($sqlPro);
			$i1=0;
			while($rowpro=mysql_fetch_array($ResultPro))
			{
			$i1++;
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
		?>			
	</div>
	<div class="bottom-default"></div>
</div>

<div class="defaul-new-content">
	<div class="title-defaul-leading"></div>
	<div class="content-defaul-new-product">
	
		<?
			$sqlLeading="SELECT * FROM leadings order by LeadID desc limit 0,4";
			$ResultLeading=mysql_query($sqlLeading,$cnn);
			$i2=0;
			while($rowLeading=mysql_fetch_array($ResultLeading))
			{	$i2++;
		?>		
			<div class="box-leading">
				<a class="a-box-leading" href="index.php?go=leading_detail&lid=<? echo $rowLeading['LeadID']; ?>" title="<? echo $rowLeading['LeadName'] ?>">
					<img src="leadingpicture/<? echo $rowLeading['LeadImage'] ?>" width="250" height="160"/>
				</a>
				<a class="a-title-leading" href="index.php?go=leading_detail&lid=<? echo $rowLeading['LeadID']; ?>" title="<? echo $rowLeading['LeadName'] ?>">
					<? echo $rowLeading['LeadName']; ?>
				</a><br />
				<span><? echo $rowLeading['LeadNote']; ?></span><br />				
			</div>
		<?
			if($i2%2==0) echo '</tr>';
			}
		?>
		
	</div>
	<div class="bottom-default"></div>	
</div>

<div class="defaul-new-content">
	<div class="title-account"><span>Tin khuyến mãi</span></div>
	<div class="content-defaul-new-product">
	
	   <?
			$sqlPromotion="SELECT * FROM promotion WHERE PromoStatus=1";
			$ResultPromotion=mysql_query($sqlPromotion);
			$rowpro=mysql_fetch_array($ResultPromotion);
		?>		
		
			<table width="94%" border="0" align="center" cellpadding="0" cellspacing="5">
				  <tr>
					<td>
						<a class="a-box-leading" href="index.php?go=promotion_detail&pid=<? echo $rowpro['PromoID']; ?>" title="<? echo $rowpro['PromoID'] ?>">
							<img src="promotionpicture/<? echo $rowpro['PromoIcon'] ?>" width="250" height="160"/>
						</a>	
					</td>
					<td align="left" valign="top">
						<a class="a-title-leading" href="index.php?go=promotion_detail&pid=<? echo $rowpro['PromoID']; ?>" title="<? echo $rowLeading['LeadName'] ?>">
							<? echo $rowpro['PromoTitle']; ?>						
						</a>
						<span><? echo $rowpro['PromoNote']; ?></span>					
					</td>
				  </tr>
	  </table>
	</div>
	<div class="bottom-default"></div>
</div>