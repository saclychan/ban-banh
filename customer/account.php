<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$sql_customer="select * from customer where CusUser = '".$_SESSION['CusUser'] ."'";
	$re_customer = mysql_query($sql_customer,$cnn);
	$row_customer=mysql_fetch_array($re_customer);
	if($_SESSION['CusUser']!='')
	{
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Thông tin tài khoản</span></div>
	<div class="content-defaul-new-product">
			<table width="100%" border="0" cellpadding="8" cellspacing="0">
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
			</table>
			<br /><br /><br /><br />			
	</div>
	<div class="bottom-default"></div>
</div>


<?php
	}else{ 
?>

	<style type="text/css">
	<!--
	.stylecl {color: #FF0000}
	-->
	</style>
	<div class="defaul-new-content">
		<div class="title-account"><span>Thông tin tài khoản</span></div>
		<div class="content-defaul-new-product">
			<br /><br /><div align="center"><span class="stylecl"><strong>Bạn chưa đăng nhập vào hệ thống </strong><br><br />
			Vui lòng <a href="index.php?go=login_1">đăng nhập</a>  hoặc <a href="index.php?go=register">đăng ký</a> nếu bạn chưa có tài khoản tại<br /><br /><span style="text-align:center; font-size:16px" class="stylec1">_ _ _ BakeryShop _ _ _</span></span></div><br /><br /><br /><br />				
				<br /><br /><br /><br />			
		</div>
		<div class="bottom-default"></div>
	</div>	
<?php
	}
?>

