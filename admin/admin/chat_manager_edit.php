<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script language="javascript">
	function checkadd()
	{
			if(document.frmadd.conName.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tên nhân viên!";
				document.getElementById('err2').innerHTML="";
				document.getElementById('err3').innerHTML="";
				document.frmadd.conName.focus();
				return false;
			}
			if(document.frmadd.conYahoo.value=="")
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="Nhập nick Yahoo!";
				document.getElementById('err3').innerHTML="";
				document.frmadd.conYahoo.focus();
				return false;
			}
			if(document.frmadd.conPhone.value=="")
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="";
				document.getElementById('err3').innerHTML="Nhập số điện thoại";
				document.frmadd.conPhone.focus();
				return false;
			}						
		else return true;
	}
</script>

<?
	//2.Lấy dữ liệu trên form
	$action=$_REQUEST['action'];
	$conID=$_REQUEST['id'];
	$conName=$_REQUEST['conName'];
	$conPhone=$_REQUEST['conPhone'];
	$conYahoo=$_REQUEST['conYahoo'];				
	$conStatus=$_REQUEST['conStatus'];
	
	if($action=="edit")
	{
		$sqlrow=mysql_query("SELECT * FROM counselors WHERE conID=".$conID."");
		$row=mysql_fetch_array($sqlrow);
	}
	if($action=="update")
	{
		$sqlupdate=" UPDATE counselors SET `conName` = '$conName', `conPhone` = '$conPhone', `conYahoo` = '$conYahoo', `conStatus` = '$conStatus' WHERE `conID` = ".$conID."";
		if(mysql_query($sqlupdate))
			{
				echo("<script>alert('Sửa tài khoản thành công')</script>");
				Redirect("admin.php?go=chat_manager");	
			}
	}	
?>


<p>&nbsp;</p>
<form action="admin.php?go=chat_manager_edit&action=update&id=<? echo $row['conID'] ?>" method="post" id="frmadd" name="frmadd">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">SỬA THÔNG TIN NHÂN VIÊN TƯ VẤN </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Tên nhân viên: </span></td>
    <td width="35%"><input class="tableboxinput" name="conName" type="text" id="conName" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" value="<? echo $row['conName'] ?>" /></td>
    <td width="30%"><div  class="st1" id="err1"></div></td>
  </tr>
<tr>
    <td width="35%" align="right"><span class="style3">Nick chat Yahoo : </span></td>
    <td width="35%"><input class="tableboxinput" name="conYahoo" type="text" id="conYahoo" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" value="<? echo $row['conYahoo'] ?>" /></td>
    <td width="30%"><div  class="st1" id="err2"></div></td>
  </tr>
<tr>
    <td width="35%" align="right"><span class="style3">Số điện thoại: </span></td>
    <td width="35%"><input class="tableboxinput" name="conPhone" type="text" id="conPhone" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" value="<? echo $row['conPhone'] ?>" /></td>
    <td width="30%"><div  class="st1" id="err3"></div></td>
  </tr>    
  <tr>
    <td width="35%" align="right"><span class="style3">Trạng thái: </span></td>
    <td colspan="2">
	<select class="tableboxinput" name="conStatus" id="conStatus" >
      <option value="1" selected>Sử dụng</option>
      <option value="0">Khóa</option>
    </select>    </td>
  </tr>
  <tr>
    <td width="35%">&nbsp;</td>
    <td width="35%"><input class="buttonbutton" type="submit" name="Submit" value="Hoàn tất" onClick="return checkadd();" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="buttonbutton" type="button" value="Quay về danh sách" onClick="window.location='admin.php?go=chat_manager'" />
	</td>
    <td width="30%">&nbsp;</td>
  </tr>
</table>
</form>
<br /><br /><br /><br /><br /><br />



