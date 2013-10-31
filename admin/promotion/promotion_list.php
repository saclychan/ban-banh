<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />


<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=promotion_list";
	$sqlPromotion="SELECT * FROM promotion order by PromoID desc";
	$ResultPromotion=mysql_query($sqlPromotion,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultPromotion) / $record_per_page);
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

<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
	<td width="30%" height="40">
		<input class="buttonbutton" id="btadd" name="submit" type="submit" onclick="window.location ='admin.php?go=promotion_add'" value="Thêm tin khuyến mại" />			</td>
	<td width="70%"><span class="style1">DANH SÁCH TIN KHUYẾN MẠI </span></td>
  </tr>
</table><br />
<div class="table2">
		<table width="100%" border="0" cellpadding="5" cellspacing="0">
		  <tr>
		  		<td width="54" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
				<td width="88" align="center" bgcolor="#FF0066"><span class="style2">Mã tin </span></td>
				<td width="275" align="center" bgcolor="#FF0066"><span class="style2">Ảnh tiêu đề</span></td>
				<td width="276" align="center" bgcolor="#FF0066"><span class="style2">Tiêu đề tin khuyến mại </span></td>
				<td width="154" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái </span></td>
				<td width="100" align="center" bgcolor="#FF0066"><span class="style2">Sửa</span></td>
				<td width="100" align="center" bgcolor="#FF0066"><span class="style2">Xóa</span></td>
			  </tr>
			
			  <?
				$t=0;
				while($rowPromotion=mysql_fetch_array($ResultPromotion))
				{
					$t++;
			  ?>
			  <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
				<td align="center" height="43" onclick="location.href='admin.php?go=promotion_detail&action=detail&pid=<? echo $rowPromotion['PromoID']; ?>'"><div align="center"><?php echo($t);?></div></td>
				<td align="center" onclick="location.href='admin.php?go=promotion_detail&action=detail&pid=<? echo $rowPromotion['PromoID']; ?>'">
					<?
						echo $rowPromotion['PromoID'];
					?>	</td>
				<td align="center" onclick="location.href='admin.php?go=promotion_detail&action=detail&pid=<? echo $rowPromotion['PromoID']; ?>'">
				<img width="150" height="100" src="../promotionpicture/<? echo $rowPromotion['PromoIcon']; ?>"/>	</td>
				<td align="center" onclick="location.href='admin.php?go=promotion_detail&action=detail&pid=<? echo $rowPromotion['PromoID']; ?>'"><?
						echo $rowPromotion['PromoTitle'];
					?></td>
				<td align="center"><select class="tableboxinput" name="select" onchange="location.href='admin.php?go=promotion_list&action=update&pid=<? echo $rowPromotion['PromoID']; ?>&status='+this.value">
				  <?
						if($rowPromotion['PromoStatus']==1)
						{
					?>
				  <option value="1">Hiển thị</option>
				  <option value="0">Ẩn</option>
				  <?
						}else{	
					?>
				  <option value="0">Ẩn</option>
				  <option value="1">Hiển thị</option>
				  <?
						}
					?>
				</select></td>
				<td width="100" align="center"><a href="admin.php?go=promotion_edit&action=edit&pid=<? echo $rowPromotion['PromoID']; ?>">Sửa</a></td>
				<td width="100" align="center">
					<a href="admin.php?go=promotion_list&action=del&pid=<? echo $rowPromotion['PromoID'] ?>" onclick="if(confirm('Bạn có chắc chắc muốn xóa tin khuyến mại này không?')) return true; else return false;">Xóa</a>	</td>
			  </tr>
			  <tr style="font-size:12px; font-weight:bold">
				<td colspan="7" align="center" ><hr color="#999999" size="2" /></td>
			  </tr>
			  <?
			  }
			  ?>
			  
			  <tr style="font-size:12px; font-weight:bold">
				<td colspan="7" align="center" ><?
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
					?></td>
		  </tr>
		</table>
		<br />
</div><br />




<?
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$PromoID=$_REQUEST['pid'];
	$PromoStatus=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE `bakeryshop`.`promotion` SET PromoStatus=".$PromoStatus." WHERE PromoID=".$PromoID;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái tin khuyến mại thành công')</script>");
			echo("<script>window.location='admin.php?go=promotion_list';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM promotion WHERE `promotion`.`PromoID`=".$_REQUEST['pid'];
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa loại tin khuyến mại thành công')</script>");
				echo("<script>window.location='admin.php?go=promotion_list';</script>");	
			}
	}

?>
