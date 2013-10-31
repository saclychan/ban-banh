<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	if($action=='edit')
		$sql_admin="select * from admin where UserAd = '".$_SESSION['UserAd'] ."'";
		$re_admin = mysql_query($sql_admin,$cnn);

	if($action=='update')
		{
		$name=$_REQUEST['NameAd'];
		$phone=$_REQUEST['PhoneAd'];
		$email=$_REQUEST['EmailAd'];
		$sql_info="update admin set NameAd ='" . $name . "',PhoneAd ='" . $phone . "',EmailAd ='" . $email . "' where UserAd= '" .$_SESSION['UserAd']."'" ;
		if(mysql_query($sql_info,$cnn)){
				echo("<script>alert('Cập nhật thông tin thành công !');</script>");
				redirect("admin/admin_changesuccess.php");
			}
		}
?>
<?
if($action=='edit')
	{
	$row_admin=mysql_fetch_array($re_admin)
?>


<div class="table1">
<form action="admin.php?go=admin_editinfo&action=update" id="frmadminedit" name="frmadminedit" method="post">
	<table width="100%" border="0" align="center" cellpadding="8" cellspacing="5">
	  <tr>
		<td colspan="3" align="center"><span class="style1">THAY ĐỔI THÔNG TIN QUẢN TRỊ VIÊN </span></td>
		<br />
	  </tr>
	  <tr>
	  	<td colspan="3"><hr /><br /></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Họ và tên:</strong></td>
		<td width="32%"><input class="tableboxinput" type="text" size="50" id="NameAd" name="NameAd" value="<? echo $row_admin['NameAd'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
	    <td width="33%"><div id="err1"></div></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Số điện thoại:</strong></td>
		<td width="32%"><input class="tableboxinput" type="text" size="50" id="PhoneAd" name="PhoneAd" value="<? echo $row_admin['PhoneAd'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
	    <td width="33%"><div id="err2"></div></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Email:</strong></td>
		<td width="32%"><input class="tableboxinput" type="text" size="50" id="EmailAd" name="EmailAd" value="<? echo $row_admin['EmailAd'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
	    <td width="33%"><div id="err3"></div></td>
	  </tr>
	  <tr>
	    <td align="right">&nbsp;</td>
	    <td colspan="2"><input class="buttonbutton" type="submit" name="Submit" value="Cập nhật thông tin" onClick="return checkupdate();"/>
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="buttonbutton" name="button" type="button" onClick="location.href='admin.php'" value="Quay lại" /><br /></td>
      </tr>
  </table><br />
</form>
<?
	}
?>
</div><br /><br />

<script language="javascript">
	function checkupdate(){
		if(document.frmadminedit.NameAd.value=="")
		{
			document.getElementById('err1').innerHTML="Bạn chưa nhập tên!";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.frmadminedit.NameAd.focus();
			return false;
		}
		
		var str=document.frmadminedit.PhoneAd.value;
		var re1=/^(0|84)(9[0-8])|(120|121|122|123|124|165|167|168|169)[0-9]{7}$/i;
		var re2=/^(0|84)(120|121|122|123|124|165|167|168|169)[0-9]{7}$/i;
		if(!re1.test(str)&!re1.test(str))
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="Yêu cầu nhập lại SĐT!";
				document.getElementById('err3').innerHTML="";
				document.frmadminedit.PhoneAd.focus();
				return false;
			}
		var str=document.frmadminedit.EmailAd.value;
		var re=/^[a-z0-9_][a-z0-9_.]+@[a-z0-9]{2,6}\.[a-z]{2,4}$/;
		if(!re.test(str))
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="";
				document.getElementById('err3').innerHTML="Yêu cầu nhập lại Email!";
				document.frmadminedit.EmailAd.focus();
				return false;
			}
	else return true;
	}
</script>