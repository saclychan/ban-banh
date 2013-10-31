<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$comid=$_REQUEST['comid'];
	if($action=='detail')
		$sql_comment=mysql_query("select * from comment where ComID = " . $comid . "",$cnn);
?>
<?
	while($row_comment=mysql_fetch_array($sql_comment)){
?>


<form id="frmcomdetail" name="frmcomdetail" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
    <td colspan="3" align="right"><p class="style1" align="center">CHI TIẾT Ý KIẾN </p></td>
	 
    </tr>
</table><br />
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="35%" align="right" valign="top"><span class="style3">&Yacute; ki&#7871;n v&#7873; sản phẩm :&nbsp;&nbsp;&nbsp; </strong></td>
      <td width="45%" colspan="2">
		<?
			$sql="Select * from comment,product where product.ProID=comment.ProID and comment.ComID=".$comid;
				$re=mysql_query($sql,$cnn);
				while($row=mysql_fetch_array($re)){
		?>
          <? echo($row['ProName']);?>
		 <?
		 }
		 ?>     </td>
    </tr>
    <tr>
      <td width="35%" align="right" valign="top"><span class="style3">&Yacute; ki&#7871;n c&#7911;a :&nbsp;&nbsp;&nbsp; </strong></td>
      <td>
	  <?
			$sql_customer="Select * from comment,customer where customer.CusID=comment.CusID and comment.ComID=".$comid;
				$re_customer=mysql_query($sql_customer,$cnn);
				while($row_customer=mysql_fetch_array($re_customer)){
		?>
        <div class="border1"><? echo($row_customer['CusName']);?></div>
		 <?
		 }
		 ?>	  </td>
      <td>&nbsp;</td>
    </tr>
    <tr height="80">
      <td width="35%" align="right" valign="top"><span class="style3">Nội dung :&nbsp;&nbsp;&nbsp; </strong></td>
      <td width="55%" valign="top" bgcolor="#00FFCC">
      <? echo($row_comment['Content'])?>      </td>
      <td width="10%" valign="top">&nbsp;</td>
    </tr>

    <tr>
      <td width="35%" align="right" valign="top"><span class="style3">Ng&agrave;y &#273;&#432;a &yacute; ki&#7871;n :&nbsp;&nbsp;&nbsp; </strong></td>
      <td colspan="2">
        <? echo($row_comment['DateSend'])?>      </td>
    </tr>
    <tr>
      <td width="35%" align="right" valign="top"><span class="style3">Tr&#7841;ng th&aacute;i :&nbsp;&nbsp;&nbsp; </strong></td>
      <td colspan="2">
		  	<?
			if($row_comment['Status']==1){
			echo("Chưa đọc");
			}else{
            echo("Đã đọc");
			}
			?>     </td>
    </tr>
	<tr>
		<td colspan="2" align="center">
			<input class="buttonbutton" type="button" value="Quay lại danh sách" onclick="location.href='admin.php?go=comment_list&status=2'" />	  </td>
	</tr>
  </table>
  <br /><br />
</form>
<?
	}
?>