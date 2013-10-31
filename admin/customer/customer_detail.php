<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />
<?
	$action=$_REQUEST['action'];
	$CusID=$_REQUEST['cid'];
	if($action=='detail')
		$sql=mysql_query("select * from customer where CusID = " . $CusID . "",$cnn);
?>
<?
	while($rowCus=mysql_fetch_array($sql)){
?>


<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td colspan="3" align="right"><p class="style1" align="center">CHI TIẾT KHÁCH HÀNG </p></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Tên khách hàng: </span></td>
    <td width="40%" align="left"><div class="border1"><? echo $rowCus['CusName']; ?></div></td>
    <td width="35%" align="center"><span class="style3">Ảnh hiển thị:</span></td>
  </tr>
  <tr>
    <td width="25%" height="50" align="right" valign="top"><span class="style3">Địa chỉ:</span></td>
    <td width="40%" align="left" valign="top"><? echo $rowCus['CusAdd']; ?> </td>
    <td width="35%" rowspan="7" align="center" valign="top">
		<img class="borderyes" src="../customer-avartar/<? echo $rowCus['CusImage'] ?>"/>	</td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Email: </span></td>
    <td width="40%" align="left" valign="top"><? echo $rowCus['CusEmail']; ?></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Số điện thoại:</span></td>
    <td width="40%" align="left"><? echo $rowCus['CusPhone']; ?></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Giới tính:</span></td>
    <td width="40%" align="left">
      <?
			if($rowCus['CusGender']==1){
			echo("Nam");
			}else{
			echo("Nữ");
			}
		?>
    </td>
  </tr>
  <tr>
    <td align="right"><span class="style3">Tên đăng nhập:</span></td>
    <td width="40%" align="left"><? echo $rowCus['CusUser']; ?></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Mật khẩu: </span></td>
    <td width="40%" align="left"><? echo $rowCus['CusPass']; ?></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Trạng thái : </span></td>
    <td width="40%" align="left">
		<?
			if($rowCus['CusStatus']==1){
			echo("Được sử dụng");
			}else{
			echo("Bị khóa");
			}
		?>	</td>
  </tr>
  <tr>
    <td height="100" colspan="3" align="center" valign="top"><br />
		<input class="buttonbutton" type="button" name="button" value="Trở lại danh sách khách hàng" onclick="window.location='admin.php?go=customer_list&sid=2'" /></td>
  </tr>
  <?
  }
  ?>
</table>
<br /><br />
