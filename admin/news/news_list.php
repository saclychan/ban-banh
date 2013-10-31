<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$page = "admin.php?go=news_list";
	$sqlNews="SELECT * FROM news order by Newsid desc";
	$ResultNews=mysql_query($sqlNews,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultNews) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlNews =$sqlNews." LIMIT ".$from.",".$record_per_page;
	$ResultNews=mysql_query($sqlNews,$cnn);
	$self = $page;
?>


<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td><input  class="buttonbutton" id="newadd" name="submit" type="submit" onclick="window.location ='admin.php?go=news_add'" value="Thêm mới bản tin" /></td>
    <td><p class="style1">QUẢN LÝ BẢN TIN </p>	</td>
  </tr>
</table>
<br />
<div class="table2">
		<table width="100%" border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td width="77" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
				<td width="107" align="center" bgcolor="#FF0066"><span class="style2">Mã</span></td>
				<td width="316" align="center" bgcolor="#FF0066"><span class="style2">Tiêu đề </span></td>
				<td width="198" align="center" bgcolor="#FF0066"><span class="style2">Ảnh hiển thị</span></td>
				<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái</span></td>
				<td width="10%" align="center" valign="middle" bgcolor="#FF0066"><span class="style2">Sửa</span></td>
				<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Xóa</span></td>
			  </tr>
			   <?
				$count=0;
				while($rowNews=mysql_fetch_array($ResultNews))
				{
					$count++;
			  ?>
			  <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
				<td width="77" align="center" valign="middle" onclick="location.href='admin.php?go=news_detail&action=detail&nid=<? echo $rowNews['NewsId']; ?>'"><?php echo($count);?></td>
				<td width="107" align="center" valign="middle" onclick="location.href='admin.php?go=news_detail&action=detail&nid=<? echo $rowNews['NewsId']; ?>'"><? echo $rowNews['NewsId']; ?></td>
				<td valign="middle" onclick="location.href='admin.php?go=news_detail&action=detail&nid=<? echo $rowNews['NewsId']; ?>'"><? echo $rowNews['NewsTitle']; ?></td>
				<td align="center" valign="middle" onclick="location.href='admin.php?go=news_detail&action=detail&nid=<? echo $rowNews['NewsId']; ?>'"><img alt="Chưa có ảnh" src="../newspicture/<? echo $rowNews['NewsImage'] ?>" width="120" height="120" /></td>
				<td width="10%" align="center" valign="middle">
					<select class="tableboxinput" name="status" onchange="location.href='admin.php?go=news_list&action=update&nid=<? echo $rowNews['NewsId']; ?>&status='+this.value">
								<?
									if($rowNews['NewsStatus']==1)
									{
								?>
								<option value="1">Hiển Thị</option>
								<option value="0">Ẩn</option>
								<?
								 }else{
								 ?>
								<option value="0">Ẩn</option>
								<option value="1">Hiển Thị</option>
								<?
								 }
								?>
				</select></td>
				<td width="10%" align="center" valign="middle"><a href="admin.php?go=news_edit&action=edit&nid=<? echo $rowNews['NewsId']; ?>">Sửa</a></td>
				<td width="10%" align="center" valign="middle"><a href="admin.php?go=news_list&action=del&nid=<? echo $rowNews['NewsId'] ?>" onclick="if(confirm('Bạn có chắc chắc muốn xóa tin tức này không?')) return true; else return false;">Xóa</a></td>
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
		</table><br />
</div><br />

<?
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$NewsId=$_REQUEST['nid'];
	$NewsStatus=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE `bakeryshop`.`news` SET NewsStatus=".$NewsStatus." WHERE NewsId=".$NewsId;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái tin tức thành công')</script>");
			echo("<script>window.location='admin.php?go=news_list';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM news WHERE `news`.`NewsId`=".$NewsId;
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa tin thành công')</script>");
				echo("<script>window.location='admin.php?go=news_list';</script>");	
			}
	}

?>
