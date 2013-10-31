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
	if($action=="add")
	{
		$conName=$_REQUEST['conName'];
		$conPhone=$_REQUEST['conPhone'];
		$conYahoo=$_REQUEST['conYahoo'];				
		$conStatus=$_REQUEST['conStatus'];
		//3.Tạo truy vấn thêm
		$sqlAdd="Insert counselors(conName,conPhone,conYahoo,conStatus)
			values('$conName','$conPhone','$conYahoo','$conStatus')";
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sqlAdd)) //nếu thực thi thành công
		{
				echo("<script>alert('Thêm tài khoản thành công')</script>");
				echo("<script>window.location='admin.php?go=chat_manager';</script>");	
		}
	}
?>


<p>&nbsp;</p>
<form action="admin.php?go=chat_manager_add&action=add" method="post" id="frmadd" name="frmadd">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">THÊM NHÂN VIÊN TƯ VẤN </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Tên nhân viên: </span></td>
    <td width="35%"><input class="tableboxinput" name="conName" type="text" id="conName" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><div  class="st1" id="err1"></div></td>
  </tr>
<tr>
    <td width="35%" align="right"><span class="style3">Nick chat Yahoo : </span></td>
    <td width="35%"><input class="tableboxinput" name="conYahoo" type="text" id="conYahoo" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><div  class="st1" id="err2"></div></td>
  </tr>
<tr>
    <td width="35%" align="right"><span class="style3">Số điện thoại: </span></td>
    <td width="35%"><input class="tableboxinput" name="conPhone" type="text" id="conPhone" size="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
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
    <td width="35%"><input class="buttonbutton" type="submit" name="Submit" value="Thêm mới" onClick="return checkadd();" />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="buttonbutton" type="button" value="Quay về danh sách" onClick="window.location='admin.php?go=chat_manager'" />
	</td>
    <td width="30%">&nbsp;</td>
  </tr>
</table>
</form>
<br /><br /><br /><br /><br /><br />



