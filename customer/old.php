<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.errorcustomer{
	color: #999999; 
	font-size:10px;
}
.style3{
	font-weight:bold;
}


</style>

<script language="javascript" src="js/ajax.js"></script>
<script  language="javascript" src="js/checkcustomer.js"></script>

<?php
	$action=$_REQUEST['action'];
	if($action=='add')
	{
			$CusUser=$_REQUEST['CusUser'];
			$pass=$_REQUEST['CusPass'];
			$CusPass=md5($pass);	
			$CusPass_conf=$_REQUEST['CusPass_conf'];
			$CusName=$_REQUEST['CusName'];
			$CusAdd=$_REQUEST['CusAdd'];
			$CusPhone=$_REQUEST['CusPhone'];
			$CusEmail=$_REQUEST['CusEmail'];
			$CusQues=$_REQUEST['CusQues'];
			$CusAns=$_REQUEST['CusAns'];
			$CusGender=$_REQUEST['CusGender'];
		//check data	
			
		//-------
			$sql_ck="SELECT * from customer WHERE CusEmail='".$CusEmail."'";
			$res_ck=mysql_query($sql_ck,$cnn);
			$row_ck=mysql_num_rows($res_ck);	
		
		if($row_ck>=1)
			{
				echo("<script>alert('Email đã được sử dụng !');</script>");
				echo("<script>window.location='index.php?go=register';</script>");
			}
		else
			{
				$sql_cus="insert into customer(CusName,CusAdd,CusPhone,CusEmail,CusUser,CusPass,CusAns,CusQues,CusGender) values ('".$CusName."','".$CusAdd."','".$CusPhone."','".$CusEmail."','".$CusUser."','".$CusPass."','".$CusAns."','".$CusQues."','".$CusGender."')";
				if(mysql_query($sql_cus,$cnn))
				{
				echo("<script>alert('Đăng ký tài khoản mới thành công Bạn có thể sử dụng tài khoản đăng nhập vào website !')</script>");
				$sql="select * from customer where CusStatus=1 order by CusID desc limit 0,1";
				$re=mysql_query($sql,$cnn);
				$row=mysql_fetch_array($re);
					$_SESSION['CusUser'] 		= $row['CusUser'];
					$_SESSION['CusName']	=$row['CusName'];
					$_SESSION['CusID']			=$row['CusID'];
					$_SESSION['CusPass']		=$row['CusPass'];
				redirect('index.php?go=register_successful');
				}
			}
		
	} 
?>

<script> 
existed=false;
Valid=true;
</script>





<form id="frmcustomer_registry" name="frmcustomer_registry" method="post" action="index.php?go=register&action=add" style="margin:0px" onsubmit="return ValidateCustomer(this);">
<input type="hidden" name="checkuseruniqe" value="false"/>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td colspan="3" align="center"><span class="titlename">ĐĂNG KÝ KHÁCH HÀNG </span><hr /><br></td>
  </tr>
  <tr>
    <td colspan="3" align="left" bgcolor="#F0F0F0"><span class="style3">Thông tin tài khoản </span></td>
  </tr>
  <tr>
  	<td colspan="3"> 
  	</td>
  </tr>
  <tr>
    <td width="30%" align="right" class="style2">Tên tài khoản:* </td>
    <td width="40%">
	  <input class="inputtext" name="CusUser" type="text" id="CusUser" size="30" onkeyup="if(changeUser(this));showHint(this.value)" onFocus="style.backgroundColor='#F0F0F0';changeIconFocus(this.id)" onBlur="if(changeUser(this));showHint(this.value);style.backgroundColor='white'" onChange="return changeUser(this);"/></td>
    <td width="30%"><span id="checkUser" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Mật khẩu:* </span></td>
    <td width="40%">
	  <input class="inputtext" name="CusPass" type="password" id="CusPass" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusPass" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Xác nhận mật khẩu:* </span></td>
    <td width="40%">
	  <input class="inputtext" name="CusPass_conf" type="password" id="CusPass_conf" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusPass_conf" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Email:*</span></td>
    <td width="40%">
	  <input class="inputtext" name="CusEmail" type="text" id="CusEmail" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusEmail" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Câu hỏi bí mật:*</span></td>
    <td width="40%">
		<select  class="inputtext" name="CusQues" id="CusQues" style="width:215px">
		  <option value="0" selected="selected">Lựa chọn câu hỏi bí mật...</option>
		  <option value="1">Bạn có người yêu chưa ?</option>
		  <option value="2">Người yêu của bạn tên là gì ?</option>
		  <option value="3">Ngoài người yêu ra thì bạn thích nhất ai ?</option>
		  <option value="4">Con vật mà bạn muốn nuôi nhất ?</option>
		  <option value="5">Suỵt ! Hỏi nhỏ tẹo, bạn có đẹp trai/xinh gái không ?</option>			
	  </select></td>
    <td width="30%"><span id="checkCusQues" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Trả lời:*</span></td>
    <td width="40%">
	  <input class="inputtext" name="CusAns" type="text" id="CusAns" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusAns" class="errorcustomer"></span></td>
  </tr>
  <tr>
  `	<td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="3" align="left" bgcolor="#F0F0F0"><span class="style3">Thông tin cá nhân</span></td>
  </tr>
  <tr>
  	<td colspan="3"></td>
  </tr>
  <tr>
    <td width="30%" align="right" class="style2">Họ tên:* </td>
    <td width="40%"><input class="inputtext" name="CusName" type="text" id="CusName" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusName" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Địa chỉ:* </span></td>
    <td width="40%"><input class="inputtext" name="CusAdd" type="text" id="CusAdd" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusAdd" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Số điện thoại: </span></td>
    <td width="40%"><input class="inputtext" name="CusPhone" type="text" id="CusPhone" size="30" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
    <td width="30%"><span id="checkCusPhone" class="errorcustomer"></span></td>
  </tr>
  
  <tr>
    <td width="30%" align="right"><span class="style2">Giới tính:</span></td>
    <td width="40%">
        <span class="style2">
        <input name="CusGender" type="radio" value="1" checked="checked" />
        Nam</span> 
		<span class="style2">
		<input name="CusGender" type="radio" value="0" />
	  Nữ</span></td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td width="30%" align="center">&nbsp;</td>
    <td width="40%" align="left">
		<input class="buttonbutton" name="Submit" type="submit" value="Đăng ký" />
      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input class="buttonbutton" name="Reset" type="reset" id="Reset" value="Hủy bỏ" /></td>
    <td width="30%" align="center">&nbsp;</td>
  </tr>
</table>
<script>
	frmcustomer_registry.CusUser.select();
</script>
</form>

