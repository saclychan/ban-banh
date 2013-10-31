<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$promoid=$_REQUEST['pid'];
	if($action=='detail')
		$sql=mysql_query("select * from promotion where PromoID = " . $promoid . "",$cnn);
	$row=mysql_fetch_array($sql)
?>


<p>&nbsp;</p>
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">XEM NỘI DUNG TIN  KHUYẾN MẠI </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="30%" align="right"><span class="style3">Tiêu đề: </span></td>
    <td><div class="border1"><? echo($row['PromoTitle']);?></div></td>
    <td align="center"><span class="style3">Ảnh Tiêu đề: </span></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="200"><span class="style3">Nội dung:</span></td>
    <td width="50" valign="top" bgcolor="#00FFCC">
		 <? echo($row['PromoContent']);?>	</td>
    <td width="20%" align="center" valign="top"><img width="150" height="100" src="../promotionpicture/<? echo $row['PromoIcon']; ?>"/></td>
  </tr>
  <tr>
    <td width="30%" align="right"><span class="style3">Trạng thái: </span></td>
    <td colspan="2">
		<?
			if($row['PromoStatus']==1){
			echo("Hiển thị");
			}else{
			echo("Ẩn");
			}
		?>	</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input class="buttonbutton" name="button" type="button" onClick="window.location='admin.php?go=promotion_list'" value="Quay về danh sách" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input class="buttonbutton" type="submit" name="Submit" value="Sửa tin khuyến mại" onClick="window.location='admin.php?go=promotion_edit&action=edit&pid=<? echo $promoid; ?>'" /></td>
    </tr>
</table>
<br />


