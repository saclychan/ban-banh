<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$record_per_page = 5;
	$pagenum = $_GET["page"];
	$page = "index.php?go=promotion_list";
	$sqlPromotion="SELECT * FROM promotion WHERE PromoStatus = 1 order by PromoID desc";
	$ResultPromotion=mysql_query($sqlPromotion,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultPromotion) / $record_per_page);
	if($totalpage==0){
	$totalpage = 1;
	}
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlPromotion =$sqlPromotion." LIMIT ".$from.",".$record_per_page;
	$ResultPromotion=mysql_query($sqlPromotion,$cnn);
	$self = $page;
?>

<div class="defaul-new-content-promo">
	<div class="title-promo"></div>
	<div class="content-defaul-new-product-promo">
		<br />
		<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
					<?
						while($rowPromotion=mysql_fetch_array($ResultPromotion))
						{
					  ?>
		  <tr>
			<td valign="middle">
			
				<table width="100%" border="0" align="center" cellpadding="5">
					 <tr>
					   <td width="45%" align="center">
					   		<a class="a-box-leading"  href="index.php?go=promotion_detail&pid=<? echo $rowPromotion['PromoID']?>">
								<img src="./promotionpicture/<? echo $rowPromotion['PromoIcon']; ?>" width="250px" height="160px" />
							</a>
					   </td>
			           <td width="55%" align="left" valign="top"><br />
					   		<a href="index.php?go=promotion_detail&pid=<? echo $rowPromotion['PromoID']?>">
								<span style="color:#ca1f6e; font-size:16px; font-weight:bold;"><? echo $rowPromotion['PromoTitle']; ?></span></a>
							<br /><br />
					   		<span style="color:#000000"><? echo $rowPromotion['PromoNote']; ?></span>					   </td>
				  </tr>
					 <tr>
					   <td colspan="2" align="center">
					   	<hr style="color:#FFFFFF" width="100%" />
					   </td>
	              </tr>
		    </table>
			</a>
			</td>
		  </tr> 
		  <? 
		  }
		  ?>
		  <tr>
			<td colspan="2" align="center" style="font-weight:bold; color: black">
							<?
								/*
								Vong lap de tao ra cac link lien ket den cac trang du lieu.
								Output: 	<< < 1 | 2 | 3 | 4 > >> 
								*/
								$nghiemtuc = $pagenum - 1;
								$khongnghiemtuc = $pagenum - 1 + 2*1;
								echo "<a href='".$page."&page=" . 1 . "'> << </a>";
								
							
								echo " <a href='".$page."&page=".$nghiemtuc."'><font color=black> < </a>";
								
								for($i =1; $i<=$totalpage;$i++)
								{
									
									if ($i==1){
										echo "<a href='".$page."&page=".$i."' ><font color=black>".$i."</a>"	;	
									}else{
									if($pagenum==$i)			
										echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
									else
										echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
									}
								}
								echo("<font color=black>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
								
								echo "<a href='".$page."&page=".$khongnghiemtuc ."'><font color=black> > </a>";
								echo "<a href='".$page."&page=" . $totalpage . "'> >> </a>";
							?>	</td>
		  </tr>
		</table><br /><br /><br />
			
	</div>
	<div class="bottom-default"></div>
</div>	
	
