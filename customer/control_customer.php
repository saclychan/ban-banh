<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?

		$record_per_page = 5;
		$pagenum = $_GET["page"];	
		$page = "index.php?go=control_customer";
		
		$sql_customer="select * from customer,comment,product where customer.CusID=comment.CusID and product.ProID=comment.ProID and CusUser = '".$_SESSION['CusUser'] ."'";
		$re_customer = mysql_query($sql_customer,$cnn);
		$num_res=mysql_num_rows($re_customer);
		
		$totalpage =ceil($num_res/ $record_per_page);
		if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
			$pagenum = 1;
		} 
		if($pagenum == 1){
			$from = 0;
		}else{
			$from = ($pagenum-1)*$record_per_page;
		}
		$sql_customer =$sql_customer." LIMIT ".$from.",".$record_per_page;
		$re_customer = mysql_query($sql_customer,$cnn);
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Bảng điều khiển</span></div>
	<div class="content-defaul-new-product">
		<table width="100%" border="0" cellpadding="8" cellspacing="0">
		  <tr>
			<td width="125%" align="center" valign="middle"><span class="titlename"><br />
			COMMENT VÀ CÁC CHỦ ĐỀ THEO DÕI:</span>
			  <hr /><br /></td>
		  </tr>
		  <tr>
			<td></td>
		  </tr>
		  <tr>
			<td align="left" bgcolor="#F0F0F0"><span class="styletitle">Các bài viết </span></td>
		  </tr>
		   <tr>
			<td>
				
				
				
				<table width="100%" border="0">
				  <?
								$i=0;
								while($row_customer = mysql_fetch_array($re_customer))
								{	
								$i++;
							?>
				  <tr>
					<td width="60%">
						<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
								<tr>
									<td width="15%" align="left" valign="top"><img class="tablebox" name="CusImage" id="CusImage" height="80" width="80" src="customer-avartar/<? echo $row_customer['CusImage'] ?>"/></td>
									<td valign="top" class="tableboxcomment" onClick="location.href='index.php?go=product_detail&pid=<? echo $row_customer['ProID']; ?>'" ><?php echo $row_customer['Content'];?><br />
										<br />
										<span class="usercommentstyle"></span>&nbsp;<span class="datecommentstyle">(&nbsp;<?php echo $row_customer ['DateSend']?>&nbsp;)</span> </td>
								</tr>
						</table>
					</td>
					
					<td width="40%">
						<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tablebox">
							<tr>
									<td align="center">
						<a href="index.php?go=product_detail&pid=<? echo $row_customer['ProID']; ?>" title="Chi tiết sản phẩm"><img src="pic-product/<? echo $row_customer['ProImage']; ?>" width="80" height="80" /></td>
									<td align="center"><span class="styletitle"><? echo $row_customer['ProName'];?></span></td>
							</tr>
				  
				  <tr>
					<td colspan="2"></td>
				  </tr>
			  </table>
					</td>
				  </tr> 
		<?php
		  }
		  ?>
				</table>
			  <table width="96%" border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr  style="font-size:12px; font-weight:bold">
			<td align="center">
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
		</table>	</td>
		  </tr>
		</table>
		<br /><br /><br /><br />			
	</div>
	<div class="bottom-default"></div>
</div>	

