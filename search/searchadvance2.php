<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?
	$action=$_REQUEST['action'];
	$proprice1=$_REQUEST['proprice1'];
	$proprice2=$_REQUEST['proprice2'];
	$propricedesc=$_REQUEST['propricedesc'];
	$record_per_page = 9;
	$pagenum = $_GET["page"];
	$page = "index.php?go=searchadvance&page=1";
	if($propricedesc==0)
	{
		if(($proprice1<$proprice2)&&(($proprice2!=-1)&&($proprice2!=0)))
		{
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice between ".$proprice1." and ".$proprice2.") Order by product.ProPrice asc";
		}else if(($proprice1>$proprice2)&&(($proprice1!=0)&&($proprice2!=-1))){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice between ".$proprice2." and ".$proprice1.") Order by product.ProPrice asc";
		}else if((($proprice1==0)&&($proprice2==0))||(($proprice1==0)&&($proprice2==-1))){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID Order by product.ProPrice asc";
		}else if($proprice2==-1){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice >=".$proprice1." ) Order by product.ProPrice asc";
		}else if($proprice1==$proprice2){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID  And (product.ProPrice <0) Order by product.ProPrice asc";
		}
		
		
	}else if($propricedesc==1)
	{
		if(($proprice1<$proprice2)&&(($proprice2!=-1)&&($proprice2!=0)))
		{
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice between ".$proprice1." and ".$proprice2.") Order by product.ProPrice desc";
		}else if(($proprice1>$proprice2)&&(($proprice1!=0)&&($proprice2!=-1))){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice between ".$proprice2." and ".$proprice1.") Order by product.ProPrice desc";
		}else if((($proprice1==0)&&($proprice2==0))||(($proprice1==0)&&($proprice2==-1))){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID Order by product.ProPrice desc";
		}else if($proprice2==-1){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID And (product.ProPrice >=".$proprice1." ) Order by product.ProPrice desc";
		}else if($proprice1==$proprice2){
			$sqlpro = "SELECT * FROM product,category where product.ProStatus=1 and product.CateID=category.CateID  And (product.ProPrice <0) Order by product.ProPrice desc";
		}
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
<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td><form action="index.php?go=searchadvance" method="post" name="frm_product_icon_search" id="frm_product_icon_search">Tùy chọn 
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
		</form>	</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FF0066">
		<? 
			if(($proprice1<$proprice2)&&(($proprice2!=-1)&&($proprice2!=0)))
			{
		?>	
				<span style="color:#FFFFFF">Có <? echo $numberrow;?> sản phẩm phù hợp với giá '<span style="font-style:italic; color: #FFFF00"><? echo $proprice1; ?> - <? echo $proprice2; ?> </span>' VND</span>
		<?	
			}else if(($proprice1>$proprice2)&&(($proprice1!=0)&&($proprice2!=-1))){
		?>
				<span style="color:#FFFFFF">Có <? echo $numberrow;?> sản phẩm phù hợp với giá '<span style="font-style:italic; color: #FFFF00"><? echo $proprice2; ?> - <? echo $proprice1; ?> </span>' VND</span>
		<?
			}else if((($proprice1==0)&&($proprice2==0))||(($proprice1==0)&&($proprice2==-1))){	
		?>
				</span><span style="color:#FFFFFF">Có tất cả <span style="font-style:italic; color: #FFFF00"><? echo $numberrow;?></span> sản phẩm</span>
		<?
			}else if($proprice1==$proprice2){	
		?>
				</span><span style="color:#FFFFFF">Không có sản phẩm nào phù hợp</span>
		<?
			}else if($proprice2==-1){	
		?>
				<span style="color:#FFFFFF">Có <? echo $numberrow;?> sản phẩm phù hợp với giá '<span style="font-style:italic; color: #FFFF00"><? echo $proprice1; ?>' </span>trở lên</span>
		<?
			}
		?>
	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="5">
	<?
		if(mysql_num_rows($Resultpro))
		{
	?>
  <tr>
  	<?
		$i=0;
		while($rowpro=mysql_fetch_array($Resultpro))
		{
		$i++;
	?>
    <td>
		<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tablebox">
		  <tr>
			<td align="center">
				<a href="index.php?go=product_detail&pid=<? echo $rowpro['ProID']; ?>" title="Chi tiết sản phẩm"><img src="pic-product/<? echo $rowpro['ProImage']; ?>" width="150" height="150" />			</td>
		  </tr>
		  <tr>
			<td align="center" class="styletitle">
				<? echo $rowpro['ProName'];?>
			</td>
		  </tr>
		  <tr>
			<td align="center">Giá: 
				<? 
					echo number_format($rowpro['ProPrice']); 
				?> (VND)			</td>
		  </tr>
		  <tr>
			<td align="center" style="float:left">
	      <tr>
					<td>
						<div id="floaticon">
							<ul>
								<li id="mua"><a href="index.php?go=shoppingcart&action=add&pid=<? echo $rowpro['ProID']; ?>"></a></li>
								<li id="chitiet"><a href="index.php?go=product_detail&pid=<? echo $rowpro['ProID']; ?>"></a></li>
							</ul>
						</div>
					</td>
		  </tr>
			</td>
		  </tr>
		  <tr>
		  	<td></td>
		  </tr>
	  </table><br />
	</td>
  		<?
		if($i%3==0) echo '</tr><tr>';
		}
		?>
		<?
			}else{
		?>  
  <tr>
		<td align="center" style="color:#999999"><br /><br />Sản phẩm đang cập nhật...<br /><br /></td>
  </tr>
	<?
	}
	?>
</table>
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

