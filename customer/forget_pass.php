
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
	function check(frm)
		{
		// kiem tra username khong trong
		if(frm.CusUser.value=="")
			{
				document.getElementById("checkCusUser").innerHTML="Bạn chưa điền tên đăng nhập !";
				document.getElementById("checkCusQues").innerHTML="";
				document.getElementById("checkCusAns").innerHTML="";
				document.getElementById("checkCusPass").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.CusUser.focus();
				return false;
			}
		// kiem tra cau hoi bi mat
		if(frm.CusQues.value==0)
			{
				document.getElementById("checkCusQues").innerHTML="Bạn chưa điền câu hỏi bí mật !";
				document.getElementById("checkCusUser").innerHTML="";
				document.getElementById("checkCusAns").innerHTML="";
				document.getElementById("checkCusPass").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.CusQues.focus();
				return false;
			}
		// kiem tra cau tra loi
		if(frm.CusAns.value=="")
			{
				document.getElementById("checkCusAns").innerHTML="Bạn chưa điền câu trả lời !";
				document.getElementById("checkCusUser").innerHTML="";
				document.getElementById("checkCusQues").innerHTML="";
				document.getElementById("checkCusPass").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.CusAns.focus();
				return false;
			}
		// kiem tra new pass va reg pass
		str=frm.CusPass.value;
			if(str.length< 6)
			{
				document.getElementById("checkCusPass").innerHTML="Mật khẩu phải có ít nhất 6 ký tự !";
				document.getElementById("checkCusUser").innerHTML="";
				document.getElementById("checkCusQues").innerHTML="";
				document.getElementById("checkCusAns").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.CusPass.focus();
				return false;
			}
			if(frm.CusPass.value=="")
			{
				document.getElementById("checkCusPass").innerHTML="Bạn chưa điền mật khẩu !";
				document.getElementById("checkCusUser").innerHTML="";
				document.getElementById("checkCusQues").innerHTML="";
				document.getElementById("checkCusAns").innerHTML="";
				document.getElementById("checkRegPass").innerHTML="";
				frm.CusPass.focus();
				return false;
			}
			if((frm.CusRegPass.value!=frm.CusPass.value)||(frm.CusRegPass.value==""))
			{
				document.getElementById("checkRegPass").innerHTML="Mật khẩu nhập lại không chính xác !";
				document.getElementById("checkCusUser").innerHTML="";
				document.getElementById("checkCusQues").innerHTML="";
				document.getElementById("checkCusAns").innerHTML="";
				document.getElementById("checkCusPass").innerHTML="";
				frm.CusRegPass.select();
				return false;
			}
		}
</script>


<div class="defaul-new-content">
	<div class="title-account"><span>Khôi phục tài khoản</span></div>
	<div class="content-defaul-new-product">

			<form onSubmit="return check(this);" action="index.php?go=forget_pass&action=change" method="post" name="frmrestorepass" id="frmrestorepass">
			<table width="100%" border="0" cellpadding="5" cellspacing="0">
				<tr>
				<td colspan="2" align="center" valign="middle"><br /></td>
			  </tr>
				  <tr>
					<td colspan="2"  bgcolor="#F0F0F0"><span class="styletitle">Bạn cần nhập đầy đủ và chính xác các thông tin dưới đây:</span></td>
					</tr>
					<tr>
				  <td colspan="2">&nbsp;</td>
				  </tr>
				  <tr>
					<td width="40%" align="right">Tên đăng nhập :</td>
					<td width="60%">
					<input class="inputtext" name="CusUser" type="text" id="CusUser" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
				  </tr>
				  <tr>
				  <td colspan="1">&nbsp;</td>
				  <td colspan="1"><span class="errorcustomer" id="checkCusUser"></span></td>	
				  </tr>
				  <tr>
					<td width="40%" align="right">Câu hỏi bí mật :</td>
					<td width="60%">
					  <select class="inputtext" name="CusQues" id="CusQues" style="width:215px">
						  <option value="0" selected="selected">Lựa chọn câu hỏi bí mật...</option>
						  <option value="1">Bạn có người yêu chưa ?</option>
						  <option value="2">Người yêu của bạn tên là gì ?</option>
						  <option value="3">Ngoài người yêu ra thì bạn thích nhất ai ?</option>
						  <option value="4">Con vật mà bạn muốn nuôi nhất ?</option>
						  <option value="5">Suỵt ! Hỏi nhỏ tẹo, bạn có đẹp trai/xinh gái không ?</option>			
					</select></td>
				  </tr>
				  <tr>
				  <td colspan="1">&nbsp;</td>
				  <td colspan="1"><span class="errorcustomer" id="checkCusQues"></span></td>	
				  </tr>
				  <tr>
					<td width="40%" align="right">Câu trả lời :</td>
					<td width="60%">
					<input class="inputtext" name="CusAns" type="text" id="CusAns" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
				  </tr>
				  <tr>
				  <td colspan="1">&nbsp;</td>
				  <td colspan="1"><span class="errorcustomer" id="checkCusAns"></span></td>	
				  </tr>
				  <tr>
					<td width="40%" align="right">Mật khẩu mới :</td>
					<td width="60%">
					<input class="inputtext" name="CusPass" type="password" id="CusPass" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
				  </tr>
				  <tr>
				  <td colspan="1">&nbsp;</td>
				  <td colspan="1"><span class="errorcustomer" id="checkCusPass" ></span></td>	
				  </tr>
				  <tr>
					<td width="40%" align="right">Nhập lại mật khẩu mới :</td>
					<td width="60%">
					<input class="inputtext" name="CusRegPass" type="password" id="CusRegPass" size="30" maxlength="50" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></td>
				  </tr>
				  <tr>
				  <td colspan="1">&nbsp;</td>
				  <td colspan="2"><span class="errorcustomer" id="checkRegPass"></span></td>	
				  </tr>
					<tr>
				<td colspan="3"><hr /></td>
			  </tr>
				  <tr>
					<td> </td>
					<td><input class="buttonbutton" type="submit" name="Submit" value="Khôi phục mật khẩu !"></td>
				  </tr>
				</table><br /><br /><br /><br /><br /><br /><br /><br /><br />
			</form>

				
	</div>
	<div class="bottom-default"></div>
</div>	


<?php
	$action=$_REQUEST['action'];
	if($action=='change')
	{
		$CusUser=$_REQUEST['CusUser'];
		$CusQues=$_REQUEST['CusQues'];
		$CusAns	=$_REQUEST['CusAns'];
		$pass=$_REQUEST['CusPass'];
		$CusPass=md5($pass);
		
		
		//check data
		$sql="select * from customer where CusUser ='".$CusUser."'";
		$res=mysql_query($sql,$cnn);
		$nums = mysql_num_rows($res);
		if($nums == 0)
			{
				echo("<script>alert('User chưa được đăng ký, bạn có thể đăng ký mới tại  Register ! ')</script>");
				echo("<script>window.location='index.php?go=forget_pass'</script>");
			}
			else{
		$row = mysql_fetch_array($res);
			if($row['CusQues']==$CusQues && $row['CusAns']==$CusAns)
				{
					$sql_newpass="update customer set CusPass='".$CusPass."' where CusUser='".$CusUser."'";
						if(mysql_query($sql_newpass,$cnn))
							{
							echo("<script>alert('Bạn có thể đăng nhập với mật khẩu mới !');</script>");
							redirect("index.php");
							}
						else
						{
					echo("<script>alert('Quá trình thay đổi không thể thực hiện, hãy kiểm tra lại ')</script>");
					echo("<script>window.location='index.php?go=forget_pass'</script>");
						}	
				}
			else
				{
					echo("<script>alert('Câu hỏi bí mật và câu trả lời không khớp ! ')</script>");
					echo("<script>window.location='index.php?go=forget_pass'</script>");
				}		
	}	
		}
	
?>