<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />
<?
	$action=$_REQUEST['action'];
	$productid=$_REQUEST['pid'];
	if($action=='detail')
		$sql=mysql_query("select * from product where ProID = " . $productid . "",$cnn);
?>
<?
	while($row=mysql_fetch_array($sql)){
?>

<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td colspan="4" align="right"><p class="style1" align="center">CHI TIẾT SẢN PHẨM </p></td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Tên sản phẩm: </span></td>
    <td colspan="2" align="left"><div class="border1">
		<? echo($row['ProName']);?>	</div></td>
    <td width="35%" align="center"><span class="style3">Ảnh sản phẩm:</span></td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Loại sản phẩm: </span></td>
    <td colspan="2" align="left">
		<?
			$sql_category="SELECT * FROM category,product WHERE product.CateID=category.CateID and product.ProID=".$productid;
			$re_category=mysql_query($sql_category,$cnn);
			while($row_category=mysql_fetch_array($re_category)){
		?>
		
			<? echo($row_category['CateName'])?>			
		<?
			}
		?>	</td>
    <td width="35%" rowspan="5" align="center" valign="top">
		<img src="../pic-product/<? echo $row['ProImage'] ?>" height="200" width="200" />	</td>
  </tr>
  <tr>
    <td width="25%" height="100" align="right" valign="top"><span class="style3">Thông tin: </span></td>
    <td colspan="2" align="left" valign="top" bgcolor="#00FFCC">
		<? echo($row['ProDesc']);?>	</td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Ngày sản xuất: </span></td>
    <td width="15%" align="left"><? echo($row['ProDate']);?></td>
    <td width="25%" align="left"><span class="style3">Hạn dùng:</span>
		<? echo($row['ProWarranty']);?>&nbsp;&nbsp;<span class="style2">ngày</span></td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Giá: </span></td>
    <td width="15%" align="left"><? echo(number_format($row['ProPrice']));?>&nbsp;&nbsp;<span class="style3">VND</span></td>
    <td width="25%" align="left"><span class="style3">Số lượng:</span>&nbsp;&nbsp;<? echo($row['ProQty']);?></td>
  </tr>
  <tr>
    <td width="25%" align="right" valign="top"><span class="style3">Trạng thái: </span></td>
    <td colspan="2" align="left">
		<?
			if($row['ProStatus']==1){
			echo("Hiển thị");
			}else{
			echo("Ẩn");
			}
		?>	</td>
  </tr>
  <tr>
    <td height="100" colspan="4" align="center" valign="top"><br />
		<input class="buttonbutton" type="button" name="button" value="Trở lại danh sách sản phẩm" onclick="window.location='admin.php?go=product_list'" />&nbsp;
		<input class="buttonbutton" type="button" name="button" value="Sửa thông tin sản phẩm" onclick="window.location='admin.php?go=product_edit&action=edit&pid=<? echo $productid; ?>'" />
	</td>
  </tr>
  <?
  }
  ?>
  
</table><br /><br />
