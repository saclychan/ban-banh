<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=category_list";
	$sqlCate="SELECT * FROM category order by CateID desc";
	$ResultCate=mysql_query($sqlCate,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultCate) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlCate =$sqlCate." LIMIT ".$from.",".$record_per_page;
	$ResultCate=mysql_query($sqlCate,$cnn);
	$self = $page;
?>


<table width="100%" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="6" align="center">
		<table width="100%" border="0" cellspacing="0">
		  <tr>
			<td width="30%" height="40">
				<input class="buttonbutton" id="btadd" name="submit" type="submit" onclick="window.location ='admin.php?go=category_add'" value="Thêm nhóm sản phẩm" />			</td>
			<td width="70%"><span class="style1">DANH SÁCH NHÓM SẢN PHẨM </span></td>
		  </tr>
	  </table>
        <p>&nbsp;</p></td>
  </tr>
  <tr><td>
	  <div class="table2">
	  		
				<table width="100%" border="0" cellpadding="5" cellspacing="0">
				  <tr>
					<td width="53" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
					<td width="103" align="center" bgcolor="#FF0066"><span class="style2">Mã loại </span></td>
					<td width="212" align="center" bgcolor="#FF0066"><span class="style2">Tên nhóm sản phẩm </span></td>
					<td width="130" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái </span></td>
					<td align="center" bgcolor="#FF0066"><span class="style2">Sửa</span></td>
					<td align="center" bgcolor="#FF0066"><span class="style2">Xóa</span></td>
				  </tr>
				
				  <?
					$t=0;
					while($rowCate=mysql_fetch_array($ResultCate))
					{
						$t++;
				  ?>
				  <tr onMouseOver="this.className='over'" onMouseOut="this.className='out'">
					<td align="center" height="43" onClick="location.href='admin.php?go=product_list&cid=<? echo $rowCate['CateID']; ?>'"><div align="center"><?php echo($t);?></div></td>
					<td align="center" onClick="location.href='admin.php?go=product_list&cid=<? echo $rowCate['CateID']; ?>'">
						<?
							echo $rowCate['CateID'];
						?>	</td>
					<td align="center" onClick="location.href='admin.php?go=product_list&cid=<? echo $rowCate['CateID']; ?>'">
						<?
							echo $rowCate['CateName'];
						?>	</td>
					<td align="center"><select class="tableboxinput" name="select" onChange="location.href='admin.php?go=category_list&action=update&cid=<? echo $rowCate['CateID']; ?>&status='+this.value">
						<?
							if($rowCate['CateStatus']==1)
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
					</select>    </td>
					<td width="76" align="center"><a href="admin.php?go=category_edit&action=edit&cid=<? echo $rowCate['CateID']; ?>">Sửa</a></td>
					<td width="71" align="center">
						<?
							$sql_check="SELECT * FROM product WHERE CateID=".$rowCate['CateID'];
							$re_check=mysql_query($sql_check,$cnn);
							$count=0;
							while($row_check=mysql_fetch_array($re_check))
								{
									$count=1;
								}
							if($count==1)
							{
								echo ("|||");
							}
							else{
						?>
						
						<a href="admin.php?go=category_list&action=del&cid=<? echo $rowCate['CateID'] ?>" onClick="if(confirm('Bạn có chắc chắc muốn xóa loại sản phẩm này không?')) return true; else return false;">Xóa</a>   
						<?
						}
						?>	</td>
				  </tr>
				  <tr style="font-size:12px; font-weight:bold">
					<td colspan="6" align="center" ><hr color="#999999" size="2" /></td>
				  </tr>
				  <?
				  }
				  ?>
				  
				  <tr style="font-size:12px; font-weight:bold">
					<td colspan="6" align="center" ><?
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
				</table><br />
	  </div>  
  </td></tr>
</table>
<br /><br />


<?
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$Cateid=$_REQUEST['cid'];
	$catstatus=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE `bakeryshop`.`category` SET CateStatus=".$catstatus." WHERE CateID=".$Cateid;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái loại sản phẩm thành công')</script>");
			echo("<script>window.location='admin.php?go=category_list';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM category WHERE `category`.`CateID`=".$_REQUEST['cid'];
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa loại sản phẩm thành công')</script>");
				echo("<script>window.location='admin.php?go=category_list';</script>");	
			}
	}

?>
