<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  language="javascript" src="js/checkcustomer.js"></script>

<?
	$sql_customer="select * from customer where CusUser = '".$_SESSION['CusUser'] ."'";
	$re_customer = mysql_query($sql_customer,$cnn);
	$row_customer=mysql_fetch_array($re_customer)
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Thay đổi thông tin</span></div>
	<div class="content-defaul-new-product">
			<form id="frmcustomer_edit" name="frmcustomer_edit" method="post" action="index.php?go=edit_process&action=edit" style="margin:0px" onsubmit="return checkEmpty(this);">
			<table width="100%" border="0" cellpadding="8" cellspacing="0">
			  <tr>
				<td colspan="4" align="center" valign="middle">
				  <hr /><br /></td>
			  </tr>
			  <tr>
				<td colspan="4"></td>
			  </tr>
			  <tr>
				<td colspan="4" align="left" bgcolor="#F0F0F0"><span class="styletitle">Thông tin cá nhân: </span></td>
			  </tr>
			   <tr>
				<td colspan="4"></td>
			  </tr>
			  <tr>
				<td width="30%" align="right">Họ tên: </td>
				<td width="40%"><input class="inputtext" type="text" name="CusName" id="CusName" value="<? echo $row_customer['CusName'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
				<td width="30%" colspan="2" rowspan="9" align="left" valign="top">
					<img class="tablebox" name="CusImage" id="CusImage" height="120" width="120" src="customer-avartar/<? echo $row_customer['CusImage'] ?>"/>      
						<br />
						<br />
						<input class="tablebox" name="txtanh" id="txtanh" type="text" size="15" value="<? echo $row_customer['CusImage'] ?>" onclick="window.open('upload.php?Thumuc=customer-avartar&form=frmcustomer_edit&input=txtanh&anh=CusImage','','width=200,height=200');" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" />      
						<br /><br />
				  <input class="buttonbutton" name="upload" type="button" id="upload" value="Upload Avartar" onclick="window.open('upload.php?Thumuc=customer-avartar&form=frmcustomer_edit&input=txtanh&anh=CusImage','','width=200,height=200');"/></td>
				</tr>
			  <tr>
				<td colspan="2" align="right"><span id="checkCusName" class="errorcustomer"></span></td>
				</tr>
			  <tr>
				<td width="30%" align="right">Địa chỉ:</td>
				<td width="40%"><input class="inputtext" type="text" name="CusAdd" id="CusAdd" value="<? echo $row_customer['CusAdd'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
				</tr>
			  <tr>
				<td colspan="2" align="right"><span id="checkCusAdd" class="errorcustomer"></span></td>
				</tr>
			  <tr>
				<td width="30%" align="right">Số điện thoại:</td>
				<td width="40%"><input class="inputtext" type="text" name="CusPhone" id="CusPhone" value="<? echo $row_customer['CusPhone'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
				</tr>
			  <tr>
				<td colspan="2" align="right"><span id="checkCusPhone" class="errorcustomer"></span></td>
				</tr>
			  <tr>
				<td width="30%" align="right">Email:</td>
				<td width="40%"><input class="inputtext" type="text" name="CusEmail" id="CusEmail" value="<? echo $row_customer['CusEmail'] ?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" /></td>
				</tr>
			  <tr>
				<td colspan="2" align="right"><span id="checkCusEmail" class="errorcustomer"></span></td>
				</tr>
			  <tr>
				<td width="30%" align="right">Giới tính: </td>
				<?php
					if($row_customer['CusGender']==0)
					{
				?>
				<td width="40%">
			
					<input name="CusGender" type="radio" value="1"  />Nam
					<input name="CusGender" type="radio" value="0"  checked="checked"/> Nữ	
				</td>
				<?php
				}
				?>
				<?php
					if($row_customer['CusGender']==1)
					{
				?>
				<td width="40%">
			
					<input name="CusGender" type="radio" value="1"  checked="checked"/>Nam
					<input name="CusGender" type="radio" value="0"  /> Nữ	
				</td>
				<?php
				}
				?>
				</tr>
			   <tr>
				<td colspan="5"><hr /></td>
			  </tr>
			  <tr>
				<td colspan="4" align="center">
					<input class="buttonbutton" type="submit" name="Submit" value="Hoàn tất"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="buttonbutton" type="button" value="Làm lại" />	</td>
			  </tr>
			</table><br /><br /><br /><br /><br /><br />
			</form>			
	</div>
	<div class="bottom-default"></div>
</div>	


<script type="text/javascript">
function checkEmpty(frm)
	{
		flag = true;
		if(frm.CusName.value=="")
		{
			document.getElementById('checkCusName').innerHTML='Tên người dùng không được để trống!';
			document.getElementById('checkCusAdd').innerHTML='';
			document.getElementById('checkCusPhone').innerHTML='';
			document.getElementById('checkCusEmail').innerHTML='';
			frm.CusName.focus();
			flag = false;
		}
		
	 	if(frm.CusAdd.value=="")
		{
			document.getElementById('checkCusAdd').innerHTML='Địa chỉ không được để trống!';
			document.getElementById('checkCusName').innerHTML='';
			document.getElementById('checkCusPhone').innerHTML='';
			document.getElementById('checkCusEmail').innerHTML='';
			frm.CusAdd.focus();
			flag = false;
		}
		
		if(frm.CusPhone.value=="")
		{
			document.getElementById('checkCusPhone').innerHTML='Số điện thoại không được để trống!';
			document.getElementById('checkCusAdd').innerHTML='';
			document.getElementById('checkCusName').innerHTML='';
			document.getElementById('checkCusEmail').innerHTML='';
			frm.CusPhone.focus();
			flag = false;
		}
		re= /^(84|0)(9[0-8]|12[0-9]|16[1-9])\d{7}$/g;
	 	if(!re.test(frm.CusPhone.value))
		{
		document.getElementById("checkCusPhone").innerHTML="Số điện thoại nhập chưa đúng định dạng";
		document.getElementById('checkCusName').innerHTML='';
		document.getElementById('checkCusAdd').innerHTML='';
		document.getElementById('checkCusEmail').innerHTML='';
		frm.CusPhone.focus();
		flag =false;
		}
				
		if(frm.CusEmail.value=="")
		{
			document.getElementById('checkCusEmail').innerHTML='Email không được để trống !';
			document.getElementById('checkCusAdd').innerHTML='';
			document.getElementById('checkCusPhone').innerHTML='';
			document.getElementById('checkCusName').innerHTML='';
			frm.CusEmail.focus();
			flag = false;
		}
		re1=/^[a-z][a-z0-9_]*@[a-z]+(\.[a-z]+){1,2}$/;
		if(!re1.test(frm.CusEmail.value))
		{
			document.getElementById("checkCusEmail").innerHTML ="Ex : yourname@hostname.com";
			document.getElementById('checkCusName').innerHTML='';
			document.getElementById('checkCusPhone').innerHTML='';
			document.getElementById('checkCusAdd').innerHTML='';
			frm.CusEmail.focus();
			flag=false;		
		}
		if(frm.txtanh.value=="")	
		{
			document.getElementById('txtanh').value='default';
		}		
		return flag;
	}

</script>