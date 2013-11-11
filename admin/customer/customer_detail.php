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

<div width="100%" style="overflow:auto;">
<table width="60%" border="0" cellpadding="8" cellspacing="0" style="float:left;">
  <tr>
    <td colspan="3" align="right"><p class="style1" align="center">CHI TIẾT KHÁCH HÀNG </p></td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Tên khách hàng: </span></td>
    <td align="left"><div class="border1"><? echo $rowCus['CusName']; ?></div></td>
  </tr>
  <tr>
    <td width="180px" align="right" valign="top"><span class="style3">Địa chỉ:</span></td>
    <td align="left" valign="top"><? echo $rowCus['CusAdd']; ?> </td>
  </tr>
  <tr>
    <td width="180px" align="right" valign="top"><span class="style3">Email: </span></td>
    <td align="left" valign="top"><? echo $rowCus['CusEmail']; ?></td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Số điện thoại:</span></td>
    <td align="left"><? echo $rowCus['CusPhone']; ?></td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Giới tính:</span></td>
    <td align="left">
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
    <td width="180px" align="right"><span class="style3">Tên đăng nhập:</span></td>
    <td align="left"><? echo $rowCus['CusUser']; ?></td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Ngày đăng ký: </span></td>
    <td align="left"><? echo strrev($rowCus['RegDate']); ?>
	</td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Trạng thái : </span></td>
    <td align="left">
		<?
			if($rowCus['CusStatus']==1){
			echo("Được sử dụng");
			}else{
			echo("Bị khóa");
			}
		?>	</td>
  </tr>
  <tr>
    <td width="180px" align="right"><span class="style3">Điểm tích luỹ: </span></td>
    <td align="left"><? echo $rowCus['TotalPurchase']; ?></td>
  </tr>
</table>
<img style="position:relative;left:50px;top:50px;" class="borderyes" src="../customer-avartar/<? echo $rowCus['CusImage'] ?>"/>
</div>
<p style="text-align:center;font-weight:bold;margin:10px;">Lịch sử mua hàng:</p>
<table border="1" style="margin-left:auto;margin-right:auto;text-align:center;">
	<tr>
		<th style="padding: 5px;">Mã hoá đơn</th>
		<th style="padding: 5px;">Ngày đặt hàng</th>
		<th style="padding: 5px;">Ngày chuyển hàng</th>
		<th style="padding: 5px;">Hình thức thanh toán</th>
		<th style="padding: 5px;">Tổng giá trị</th>
	</tr>
	<?
		// Get corresponding orders
		$cuoinguaxemhoa=1;
		$orders = mysql_query("SELECT * FROM orders WHERE CusID = ".$CusID."");
		while($order = mysql_fetch_array($orders)){
		// Get total price, reprocess dates and payment
		$princesses = mysql_query("SELECT OdPrice FROM orderdetail WHERE OrdID = ".$order['OrdID']."");
		$totalprincess = 0;
		$cuoinguaxemhoa=0;
		while($princess = mysql_fetch_array($princesses))
		{
			$totalprincess += $princess[0];
		}
		$order['Date'] = date("d-m-Y",strtotime($order['Date']));
		$order['OrdShipDate'] = date("d-m-Y",strtotime($order['OrdShipDate']));
		$princesspay = mysql_query("SELECT PayType FROM payment WHERE PayID = ".$order['PayID']."");
		$princesspay = mysql_fetch_array($princesspay);
		$order['PayID'] = $princesspay[0];
	?>
	<tr>
		<td><? echo $order['OrdID']; ?></td>
		<td><? echo $order['Date']; ?></td>
		<td><? echo $order['OrdShipDate']; ?></td>
		<td><? echo $order['PayID']; ?></td>
		<td style="text-align:right;padding-right:10px;"><? echo $totalprincess; ?></td>
	</tr>
<?
}
?>
</table>
<? if($cuoinguaxemhoa) echo"<div style=\"width:100%;text-align:center;\"><br>Khách hàng này chỉ cưỡi ngựa xem hoa, chưa mua gì.</div>"; ?>
<input style="display:block; margin: 50px auto 0 auto;" class="buttonbutton" type="button" name="button" value="Trở lại danh sách khách hàng" onclick="window.location='admin.php?go=customer_list&sid=2'" />
<?
}
?>