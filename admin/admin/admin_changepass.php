<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />


<form id="frmadminchangepass" name="frmadminchangepass" method="post" action="admin.php?go=admin_changepass&action=update" onsubmit="return check(this);">
<div class="table1">
	<table width="100%" border="0" align="center" cellpadding="8" cellspacing="5">
	  <tr>
		<td colspan="3" align="center"><span class="style1">THAY ĐỔI MẬT KHẨU </span></td>
		<br />
	  </tr>
	  	<td colspan="3"><hr />
		</td>
	  <tr>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Mật khẩu cũ:</strong></td>
		<td width="35%"><input class="tableboxinput" type="password" size="40" id="oldPass" name="OldPass" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
        <td width="30%"><span id="checkOldPass"></span></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Mật khẩu mới:</strong></td>
		<td width="35%"><input class="tableboxinput" type="password" size="40" id="PassAd" name="PassAd" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
        <td width="30%"><span id="checkPassAd"></span></td>
	  </tr>
	  <tr>
		<td width="35%" align="right"><strong>Xác nhận mật khẩu mới:</strong></td>
		<td width="35%"><input class="tableboxinput" type="password" size="40" id="RePassAd" name="RePassAd" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
        <td width="30%"><span id="checkRePassAd"></span></td>
	  </tr>
	     <tr>
      <td>&nbsp;</td>
      <td>
      <div align="left"><? echo($err);?></div></td>
    </tr>
	  <tr>
	    <td width="35%" align="right">&nbsp;</td>
	    <td colspan="2"><input class="buttonbutton" type="submit" name="Submit" value="Cập nhật thông tin" />
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="buttonbutton" name="button" type="button" onClick="location.href='admin.php'" value="Quay lại" /></td>
      </tr>
	
  </table>
  <br />
 </div><br />
</form>


<script>
	function check (frm)
		{
			// kiem tra pass cu
				if(frm.OldPass.value=="")
					{
						document.getElementById('checkOldPass').innerHTML="Mật khẩu cũ không được để trống !"
						frm.OldPass.focus();
						return false;
					}
					
				//kiem tra newpass
					if(frm.PassAd.value=="")
						{
							document.getElementById('checkPassAd').innerHTML="Mật khẩu mới không được để trống";
							frm.PassAd.focus();
							return false;
						}	
					
					str=frm.PassAd.value;
					if(str.length<6)
						{
							document.getElementById('checkPassAd').innerHTML="Mật khẩu phải có ít nhất 6 ký tự";
							frm.PassAd.focus();
							return false;
						}	
						
				//kiem tra newpass va regnewpass
				if(frm.PassAd.value!=frm.RePassAd.value)
					{
					document.getElementById('checkRePassAd').innerHTML="Mật khẩu nhập lại không khớp";
					frm.RePassAd.focus();
					return false;
					}
						
		}


</script>

<?php
$action=$_REQUEST['action'];
	if($action==update)
	{
	$sql="SELECT PassAd FROM admin WHERE UserAd ='".$_SESSION['UserAd']."'";
	$res=mysql_query($sql,$cnn);
	$row=mysql_fetch_array($res);
	if(isset($_REQUEST['OldPass']))
	{
		$a=md5($_REQUEST['OldPass']);
			if($a==$row['PassAd'])
			{
	
				$reg_pass=md5($_REQUEST['PassAd']);
				$sql_pass="update admin set PassAd='" . $reg_pass . "' where UserAd= '" .$_SESSION['UserAd']."'" ;
				if(mysql_query($sql_pass,$cnn))
				{
					echo("<script>alert('Đổi mật khẩu thành công  !')</script>");
					redirect("admin.php");
				}
			}
		else
		{
			echo("Mật khẩu cũ không đúng !");
		}
	}
	}
?>