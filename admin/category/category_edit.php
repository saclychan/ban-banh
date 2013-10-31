<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$CateID=$_REQUEST['cid'];
	if($action=="edit")
	{
		$sqlCate=mysql_query("SELECT * FROM category WHERE CateID=".$CateID."");
		$row=mysql_fetch_array($sqlCate);
	}
	if($action=="update")				//Xu ly thay doi
	{
		$CateName=$_REQUEST['CateName'];
		$CateStatus=$_REQUEST['CateStatus'];
		$sqlupdate=" UPDATE `bakeryshop`.`category` SET `CateName` = '$CateName', `CateStatus` = '$CateStatus' WHERE `CateID` = ".$CateID."";
		if(mysql_query($sqlupdate))
			{
				echo("<script>alert('Sửa nhóm sản phẩm thành công')</script>");
				Redirect("admin.php?go=category_list");	
			}
	}

?>


<script language="javascript">
	function checkedit()
	{
			if(document.frmcategoryedit.CateName.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tên nhóm sản phẩm!";
				document.frmcategoryedit.CateName.focus();
				return false;
			}
		else return true;
	}
</script>

<form action="admin.php?go=category_edit&action=update&cid=<? echo $row['CateID']; ?>" id="frmcategoryedit" name="frmcategoryedit" method="post">

	<table width="100%" border="0" align="center" cellpadding="8" cellspacing="5">
	  <tr>
		<td colspan="3" align="center"><span class="style1">SỬA NHÓM SẢN PHẨM </span></td><br />
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Tên nhóm sản phẩm mới:</strong></td>
		<td ><input class="tableboxinput" type="text" size="50" id="CateName" name="CateName" value="<? echo $row['CateName'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
	    <td width="30%" ><div class="st1" id="err1"></div></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Trạng thái mới:</strong></td>
		<td colspan="2">
			<select class="tableboxinput" name="CateStatus" id="CateStatus" >
				<?
					if($row['CateStatus']==1)
					{
				?>
					<option value="1">Hiện</option>
					<option value="0">Ẩn</option>
				<?
				}else{		
				?>
					<option value="0">Ẩn</option>
					<option value="1">Hiện</option>
				<?
						}
				?>
			</select>		</td>
	  </tr>
	  <tr>
		<td width="35%">&nbsp;</td>
		<td width="35%"><input class="buttonbutton" type="submit" name="Submit" value="Hoàn tất" onClick="return checkedit();" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="button" value="Quay lại danh sách" onclick="location.href='admin.php?go=category_list'" />		</td>
		<td width="30%">&nbsp;		</td>
	  </tr>
  </table>
  <br /><br />
  <br />
</form>

