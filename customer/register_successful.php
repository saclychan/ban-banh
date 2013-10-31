
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
&nbsp;


<?
	$sql_customer="select * from customer where CusUser = '".$_SESSION['CusUser'] ."'";
	$re_customer = mysql_query($sql_customer,$cnn);
	$row_customer=mysql_fetch_array($re_customer);
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Thông tin tài khoản</span></div>
	<div class="content-defaul-new-product"><br /><br /><br />
		<p align="center"><strong>Website bán bánh trực tuyến Nhóm 2 - Tin5 ĐH BK Hà Nội<br>
		    Chúc bạn một ngày tốt lành</strong></p><br /><br />
		
		<fieldset class="ledgenfielset" style="border-color:#FFFFFF"><legend><b>Bạn vừa đăng ký làm thành viên chính thức của website</b></legend>	
			<table width="100%" border="0" cellpadding="8" cellspacing="0">
			  <tr>
				<td colspan="3" align="center" valign="middle">
				<br /></td>
			  </tr>
			  <tr>
				<td colspan="3" align="left" bgcolor="#F0F0F0"><span class="styletitle">Thông tin tài khoản</span></td>
			  </tr>
			  <tr>
				<td colspan="3"></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Tên đăng nhập: </td>
				<td width="65%"><? echo $row_customer['CusUser'] ?></td>
				<td width="25%"><img class="tablebox" height="120" width="120" src="customer-avartar/<? echo $row_customer['CusImage'] ?>"/></td>
			  </tr>
			  <tr>
				<td colspan="3"></td>
			  </tr>
			  <tr>
				<td colspan="3" align="left" bgcolor="#F0F0F0"><span class="styletitle">Thông tin khách hàng</span></td>
			  </tr>
			   <tr>
				<td colspan="3"></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Tên chủ tài khoản: </td>
				<td width="65%" colspan="2"><? echo $row_customer['CusName'] ?></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Số điện thoại: </td>
				<td width="65%" colspan="2"><? echo $row_customer['CusPhone'] ?></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Địa chỉ: </td>
				<td width="65%" colspan="2"><? echo $row_customer['CusAdd'] ?></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Email:</td>
				<td width="65%" colspan="2"><? echo $row_customer['CusEmail'] ?></td>
			  </tr>
			  <tr>
				<td width="35%" align="right">Giới tính: </td>
				<td width="65%" colspan="2">
					<?
						if($row_customer['CusGender']==1){
						echo("Nam");
						}else{
						echo("Nữ");
						}
					?>	</td>
			  </tr>
			   <tr>
				<td colspan="4"><hr /></td>
			  </tr>
			  <tr>
				<td colspan="3" align="center">
					<input class="buttonbutton" type="submit" name="Submit" value="Đổi mật khẩu"  onclick="location.href='index.php?go=change_pass'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="buttonbutton" type="button" value="Thay đổi thông tin" onclick="location.href='index.php?go=edit'" />	</td>
			  </tr>
			</table><br /><br />
			</fieldset>			
	</div>
	<div class="bottom-default"></div>
</div>	
