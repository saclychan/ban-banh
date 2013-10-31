<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$sqlSelect="SELECT * FROM counselors order by conID desc";
	$ResultSelect=mysql_query($sqlSelect);
?>


<table width="100%" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="6" align="center">
		<table width="100%" border="0" cellspacing="0">
		  <tr>
			<td width="30%" height="40">
				<input class="buttonbutton" id="btadd" name="submit" type="submit" onClick="window.location ='admin.php?go=chat_manager_add'" value="Thêm tư vấn Online" />			</td>
			<td width="70%"><span class="style1">DANH SÁCH NHÂN VIÊN TƯ VẤN ONLINE </span></td>
		  </tr>
	  </table>
        <p>&nbsp;</p></td>
  </tr>
  <tr><td>
	  <div class="table2">
	  		
				<table width="100%" border="0" cellpadding="5" cellspacing="0">
				  <tr>
					<td width="5%" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
					<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Mã ID </span></td>
					<td align="center" bgcolor="#FF0066"><span class="style2">Tên nhân viên </span></td>
					<td align="center" bgcolor="#FF0066"><span class="style2">Nick Yahoo </span></td>
					<td align="center" bgcolor="#FF0066"><span class="style2">Số Điện Thoại </span></td>
					<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái </span></td>
					<td width="5%" align="center" bgcolor="#FF0066"><span class="style2">Sửa</span></td>
					<td width="5%" align="center" bgcolor="#FF0066"><span class="style2">Xóa</span></td>
				  </tr>
				
				  <?
					$t=0;
					while($row=mysql_fetch_array($ResultSelect))
					{
						$t++;
				  ?>
				  <tr onMouseOver="this.className='over'" onMouseOut="this.className='out'">
					<td width="5%" height="43" align="center"><div align="center"><?php echo($t);?></div></td>
					<td width="10%" align="center">
						<? echo $row['conID']; ?>	
					</td>
					<td align="center"><? echo $row['conName']; ?></td>
					<td align="center"><? echo $row['conYahoo']; ?></td>
					<td align="center"><? echo $row['conPhone']; ?></td>
					<td width="10%" align="center">
					  <select class="tableboxinput" name="select" onChange="location.href='admin.php?go=chat_manager&action=update&id=<? echo $row['conID']; ?>&status='+this.value">
						<?
							if($row['conStatus']==1)
							{
						?>
							<option value="1">Sử dụng</option>
							<option value="0">Khóa</option>
						<?
							}else{	
						?>
							<option value="0">Khóa</option>
							<option value="1">Sử dụng</option>
						<?
							}
						?>
					</select>    </td>
					<td width="5%" align="center"><a href="admin.php?go=chat_manager_edit&action=edit&id=<? echo $row['conID']; ?>">Sửa</a></td>
					<td width="5%" align="center">
						<a href="admin.php?go=chat_manager&action=del&id=<? echo $row['conID'] ?>" onClick="if(confirm('Bạn có chắc chắc muốn xóa không?')) return true; else return false;">Xóa</a> 
					</td>
				  </tr>
				  <tr>
					<td colspan="8" align="center" ><hr color="#999999" size="2" /></td>
				  </tr>
				  <?
				  }
				  ?>

		</table>
				<br />
	  </div>  
  </td></tr>
</table>
<br /><br />


<?
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$id=$_REQUEST['id'];
	$status=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE counselors SET conStatus=".$status." WHERE conID=".$id;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái thành công')</script>");
			echo("<script>window.location='admin.php?go=chat_manager';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM counselors WHERE conID=".$id;
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa tài khoản thành công')</script>");
				echo("<script>window.location='admin.php?go=chat_manager';</script>");	
			}
	}

?>
