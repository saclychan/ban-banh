<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$OrdID=$_REQUEST['orderid'];
	$orderstatus=$_REQUEST['orderstatus'];
	if($action=='detail')
	{
		$sql=mysql_query("SELECT * FROM orders,orderdetail,customer,payment,product WHERE orders.OrdID=orderdetail.OrdID and orders.CusID=customer.CusID and orders.PayID=payment.PayID and orderdetail.ProID=product.ProID and orders.OrdID=".$OrdID,$cnn);
	}
  // Xu ly thay doi trang thai
	if($action=='update')
		{
		$sql_update="UPDATE orders SET OrdStatus =".$orderstatus." WHERE OrdID =".$OrdID;
		if(mysql_query($sql_update))
			{
			echo("<script>alert('Thay đổi trạng thái hóa đơn thành công')</script>");
			echo("<script>window.location='admin.php?go=order_detail&action=detail&orderid=$OrdID';</script>");
			}
		}
?>

<?
	$rowOrd=mysql_fetch_array($sql);
?>




<table width="100%" border="0" cellpadding="10" cellspacing="0">
  <tr>
    <td width="40%"><input class="buttonbutton" type="button" value="Quay lại danh sách hóa đơn" onclick="window.location ='admin.php?go=order_list&ostatus=2'"/></td>
    <td width="60%"><span class="style1">CHI TIẾT HÓA ĐƠN</span></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="8" cellspacing="0">
  <tr>
    <td colspan="3">
		<div class="table3">
			<table width="100%" border="0" cellpadding="8" cellspacing="0">
				  <tr>
					<td colspan="2" align="center" bgcolor="#FF0066"><span align="center" class="style2">THÔNG TIN HÓA ĐƠN </span></td>
					<td width="10%" align="center">&nbsp;</td>
					<td width="25%" align="center"><span style="font-size:13px;color:#FF0066;font-weight:bold">Ảnh thành viên</span></td>
				  </tr>
				  <tr>
					<td width="25%" align="right"><strong>Mã hóa đơn:</strong></td>
					<td width="40%"><? echo($rowOrd['OrdID']);?></td>
					<td>&nbsp;</td>
					<td width="25%" rowspan="5" align="center" valign="middle"><img class="borderyes" src="../customer-avartar/<? echo $rowOrd['CusImage'] ?>"/></td>
				  </tr>
				  <tr>
					<td width="25%" align="right"><strong>Ngày lập hóa đơn:</strong></td>
					<td width="40%"><? echo($rowOrd['Date']);?></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td width="25%" align="right"><strong>Ngày giao hàng:</strong></td>
					<td width="40%"><? echo($rowOrd['OrdShipDate']);?></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td width="25%" align="right"><strong>Trạng thái xử lý hóa đơn:</strong></td>
					<td width="40%">
						<select class="tableboxinput" name="selectstatus" onchange="location.href='admin.php?go=order_detail&action=update&orderid=<? echo $OrdID; ?>&orderstatus='+this.value">
							<?
							if($rowOrd['OrdStatus']==1){
							?>
							<option value="1">Chưa xử lý</option>
							<option value="0">Đã xử lý</option>
							<?
							 }else if($rowOrd['OrdStatus']==0){
							?>
							<option value="0">Đã xử lý</option>
							<option value="1">Chưa xử lý</option>
							<?
							}
							?>
					  </select>	</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td width="25%" align="right"><strong>Hình thức thanh toán:</strong></td>
					<td width="40%"><? echo($rowOrd['PayType']);?></td>
					<td>&nbsp;</td>
				  </tr>
			</table>
		</div>
<br>
</td>
  </tr>
  <tr>
    <td width="48%">
		<div class="table2">
				<table width="100%" border="0" cellpadding="8" cellspacing="0">
				  <tr>
					<td colspan="2" align="center" bgcolor="#FF0066"><span align="center" class="style2">THÔNG TIN KHÁCH HÀNG </span></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Họ tên:</strong></td>
					<td width="70%"><? echo($rowOrd['CusUser']);?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Địa chỉ:</strong></td>
					<td width="70%"><? echo($rowOrd['CusAdd']);?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Điện thoại:</strong></td>
					<td width="70%"><? echo($rowOrd['CusPhone']);?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Email:</strong></td>
					<td width="70%"><? echo($rowOrd['CusEmail']);?></td>
				  </tr>
				</table>
		</div>
	</td>
    <td width="2%">&nbsp;</td>
    <td width="48%">
			<div class="table2">
				<table width="100%" border="0" cellpadding="8" cellspacing="0">
				  <tr>
					<td colspan="2"align="center" bgcolor="#FF0066"><span align="center" class="style2">THÔNG TIN NGƯỜI NHẬN </span></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Họ tên:</strong></td>
					<td width="70%"><? echo($rowOrd['OrdName']);?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Địa chỉ:</strong></td>
					<td width="70%"><? echo($rowOrd['OrdAdd']);?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Điện thoại:</strong></td>
					<td width="70%"><? echo($rowOrd['OrdPhone']);?></td>
				  </tr>
					<tr>
					<td>&nbsp;</td>
				  </tr>
				</table>
			</div>
	</td>
	<br>
  </tr>
  <tr>
    <td colspan="3">
		<div id="contentcart">
			<br>
			<table width="98%" border="0" cellpadding="5" cellspacing="0" align="center">
			  <tr>
			  	
				<td colspan="2" align="center">&nbsp;</td>
			    <td colspan="6" align="left"><span style="font-size:18px; color:#FF0066">THÔNG TIN MUA HÀNG</span></td>
		      </tr>
			  <tr>
				<td colspan="8" height="5"></td>
			  </tr>
			  <tr >
				<td width="5%" align="center" bgcolor="#FF0033"><span class="style2">STT</span></td>
				<td width="12%" align="center" bgcolor="#FF0033"><span class="style2">Mã sản phẩm </span></td>
				<td width="32%" align="center" bgcolor="#FF0033"><span class="style2">Tên sản phẩm </span></td>
				<td width="8%" align="center" bgcolor="#FF0033"><span class="style2">Số lượng </span></td>
				<td width="3%" align="center" bgcolor="#FF0033">&nbsp;</td>
				<td width="15%" align="center" bgcolor="#FF0033"><span class="style2">Giá</span></td>
				<td width="3%" align="center" bgcolor="#FF0033">&nbsp;</td>
				<td width="27%" align="center" bgcolor="#FF0033"><span class="style2">Thành tiền </span></td>
			  </tr>
<?php
$i=0;
$totalmoney=0.0;
$sql=mysql_query("SELECT * FROM orders,orderdetail,customer,payment,product WHERE orders.OrdID=orderdetail.OrdID and orders.CusID=customer.CusID and orders.PayID=payment.PayID and orderdetail.ProID=product.ProID and orders.OrdID=".$OrdID,$cnn);
while($row=mysql_fetch_array($sql))
	{
		$i++;
		$totalmoney+=$row['OdPrice']*$row['OdQty'];
		$a= ($row['OdPrice']*$row['OdQty']);
?>			  
						
			  <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
				<td width="5%" align="center"><?php echo($i);?></td>
				<td width="12%" align="center"><? echo($row['ProID']);?></td>
				<td width="32%" align="center"><? echo($row['ProName']);?></td>
				<td width="8%" align="center"><? echo($row['OdQty']);?></td>
				<td width="3%" align="center"><strong>X</strong></td>
				<td width="15%" align="center"><? echo(number_format($row['OdPrice']));?><span> (VND)</span></td>
				<td width="3%" align="center"><strong>=</strong></td>
				<td width="27%" align="center"><strong><? echo number_format($a) ;?></strong><span> (VND)</span></td>
			  </tr>
<?php
}
?>
			  <tr>
				<td colspan="8"><hr color="#999999" size="2" /></td>
			  </tr>
			  <tr>
				<td colspan="7" align="right"><span style="color:#FF0033; font-weight:bold; font-size:14px">Tổng tiền</span></td>
				<td align="center"><div class="tdtotal"><span style="font-size:16; font-weight:bold; color:#0000FF"><?php echo(number_format($totalmoney));?></span><span> (VND)</span></div></td>
			  </tr>
			</table><br>
		</div>
	</td>
  </tr>
</table>
<br><br>
