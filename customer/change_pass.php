<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
	function check(frm)
		{
		//kiem tra OldPass
		if(frm.OldPass.value=="")
			{
				document.getElementById("checklOdlPass").innerHTML="Bạn chưa điền mật khẩu !";
				document.getElementById("checkCusPass").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.OldPass.focus();
				return false;
			}
		
		// kiem tra new pass va reg pass
		str=frm.CusPass.value;
			if(str.length< 6)
			{
				document.getElementById("checkCusPass").innerHTML="Mật khẩu phải có ít nhất 6 ký tự !";
				document.getElementById("checklOdlPass").innerHTML='';
				document.getElementById("checkRegPass").innerHTML='';
				frm.CusPass.focus();
				return false;
			}
			
			if(frm.CusPass.value=="")
			{
				document.getElementById("checkCusPass").innerHTML="Bạn chưa điền mật khẩu !";
				document.getElementById("checklOdlPass").innerHTML='';
				document.getElementById("checkRegPass").innerHTML='';
				frm.CusPass.focus();
				return false;
			}
			if((frm.CusRegPass.value!=frm.CusPass.value)||(frm.CusRegPass.value==""))
			{
				document.getElementById("checkRegPass").innerHTML="Mật khẩu nhập lại không chính xác !";
				document.getElementById("checklOdlPass").innerHTML='';
				document.getElementById("checkCusPass").innerHTML='';
				frm.CusRegPass.select();
				return false;
			}
		}
</script>
<div class="defaul-new-content">
	<div class="title-account"><span>Thay đổi mật khẩu</span></div>
	<div class="content-defaul-new-product">
			<form onSubmit="return check(this);" action="index.php?go=change_pass&action=update" method="post" name="frmchangepass" id="frmchangepass">
			<table width="100%" border="0" cellpadding="8" cellspacing="0">
					<tr>
						<td colspan="3" align="center" valign="middle">
					<hr /><br /></td>
				  </tr>
				  <tr>
					<td colspan="3" bgcolor="#F0F0F0"><span class="styletitle">Bạn cần nhập đầy đủ và chính xác các thông tin dưới đây:</span></td>
				</tr>
				<tr>
				<td colspan="3"><br /></td>
				</tr>
				  <tr>
					<td width="40%" align="right">Mật khẩu cũ :</td>
					<td width="60%">
					<input class="inputtext" name="OldPass" type="password" id="OldPass" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
			
				  </tr>
				  <tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2"><span class="errorcustomer" id="checklOdlPass"></span></td>
				</tr>
				  <tr>
					<td width="40%" align="right">Mật khẩu mới :</td>
					<td width="60%">
					  <input class="inputtext" name="CusPass" type="password" id="CusPass" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'">
				   </td>
				  </tr>
				   <tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2"><span class="errorcustomer" id="checkCusPass" ></span></td>
				</tr>
				  <tr>
					<td width="40%" align="right">Nhập lại mật khẩu mới :</td>
					<td width="60%">
					  <input class="inputtext" name="CusRegPass" type="password" id="CusRegPass" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'">
				   </td>
				  </tr>
				  <tr>
					<td> </td>
				  </tr>
				   <tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2"><span class="errorcustomer" id="checkRegPass"></span></td>
				</tr>
				<tr>
				<td colspan="2"><hr /></td>
			  </tr>
				  <tr>
					<td colspan="2" align="center">
					  <input class="buttonbutton" type="submit" name="Submit" value="Hoàn thành" id="submit"/>
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input class="buttonbutton" name="Reset" type="reset" id="Reset" value="Làm lại" />
				   </td>
				  </tr>
			  </table><br /><br /><br /><br /><br /><br />
			</form>		
	</div>
	<div class="bottom-default"></div>
</div>	



<?php
$action=$_REQUEST['action'];
if($action=update)
{
	$sql_customer="SELECT CusPass FROM customer WHERE CusUser ='".$_SESSION['CusUser']."'";
	$res=mysql_query($sql_customer,$cnn);
	$row=mysql_fetch_array($res);
	if(isset($_REQUEST['OldPass']))
	{
		$a=md5($_REQUEST['OldPass']);
			if($a==$row['CusPass'])
			{
	
				$reg_pass=md5($_REQUEST['CusPass']);
				$sql_pass="update customer set CusPass='" . $reg_pass . "' where CusID= '" .$_SESSION['CusID']."'" ;
				if(mysql_query($sql_pass,$cnn))
				{
					echo("<script>alert('Đổi mật khẩu thành công ! Hãy ghi nhớ mật khẩu cho lần đăng nhập sau của bạn !')</script>");
					redirect("index.php");
				}
			}
		else
		{
			echo("<script>alert('Mật khẩu cũ không chính xác !')</script>");
		}
	}
	}
?>