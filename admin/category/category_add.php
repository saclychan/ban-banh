<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script language="javascript">
	function checkadd()
	{
			if(document.frmcategoryadd.CateName.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tên nhóm sản phẩm!";
				document.frmcategoryadd.CateName.focus();
				return false;
			}
		else return true;
	}
</script>

<?
	//2.Lấy dữ liệu trên form
	$action=$_REQUEST['action'];
	if($action=="add")
	{
		$CateName=$_REQUEST['CateName'];
		$CateStatus=$_REQUEST['CateStatus'];
		//3.Tạo truy vấn thêm
		$sqlCateAdd="Insert category(CateName,CateStatus)
			values('$CateName','$CateStatus')";
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sqlCateAdd)) //nếu thực thi thành công
		{
				echo("<script>alert('Thêm nhóm sản phẩm thành công')</script>");
				echo("<script>window.location='admin.php?go=category_list';</script>");	
		}
	}
?>


<p>&nbsp;</p>
<form action="admin.php?go=category_add&action=add" method="post" id="frmcategoryadd" name="frmcategoryadd">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">THÊM NHÓM SẢN PHẨM </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Tên nhóm: </span></td>
    <td width="35%"><input class="tableboxinput" name="CateName" type="text" id="CateName" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><div  class="st1" id="err1"></div></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Trạng thái: </span></td>
    <td colspan="2"><select class="tableboxinput" name="CateStatus" id="CateStatus" >
      <option value="1" selected>Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>    </td>
  </tr>
  <tr>
    <td width="35%">&nbsp;</td>
    <td width="35%"><input class="buttonbutton" type="submit" name="Submit" value="Thêm mới" onClick="return checkadd();" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="buttonbutton" type="button" value="Quay về danh sách" onclick="window.location='admin.php?go=category_list'" />
	</td>
    <td width="30%">&nbsp;</td>
  </tr>
</table>
</form>
<br /><br /><br /><br /><br /><br />



