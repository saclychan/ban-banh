<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$leadid=$_REQUEST['leadid'];
	if($action=='detail')
		$sql=mysql_query("select * from leadings where LeadId = " . $leadid . "",$cnn);
	$row=mysql_fetch_array($sql)
?>



<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style><br />
<p class="style1" align="center">CHI TIẾT  MẸO VẶT &amp; HƯỚNG DẪN </p>
<br /><br />

<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td width="20%" align="right"><span class="style3">Tiêu đề: </span></td>
    <td width="40%"><div class="border1"><? echo($row['LeadName']);?></div></td>
    <td width="40%" rowspan="3" align="center" valign="middle">
			<table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề</strong></div></td>
			  </tr>
			  <tr>
			   <td bgcolor="#68EEF9" width="200" height="200"  >
			   <img width="200" height="200"  src="../leadingpicture/<? echo $row['LeadImage'] ?>"/></td>
			  </tr>
	  </table></td>
  </tr>
  <tr>
    <td align="right"><span class="style3">Tóm tắt nội dung </span></td>
    <td width="40%"><span class="border1"><? echo($row['LeadNote']);?></span></td>
  </tr>
  <tr>
  <td width="20%" height="300" align="right" valign="top" ><span class="style3">Nội dung:</span></td>
	<td width="40%" align="left" valign="top" bgcolor="#00FFCC">
		<? echo($row['LeadContent']);?>	</td>
  </tr>
  
  <tr>
    <td align="right"><span class="style3">Trạng thái:</span></td>
    <td width="40%" align="left">
		<?
			if($row['LeadStatus']==1){
			echo("Hiển thị");
			}else{
			echo("Ẩn");
			}
		?>	</td>
    <td width="40%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">
	<br />
		<input class="buttonbutton" type="button" name="button" value="Quay lại danh sách tin tức" onclick="window.location='admin.php?go=leading_list&lstatus=2'" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="button" name="button" value="Sửa mục hướng dẫn" onclick="window.location='admin.php?go=leading_edit&action=edit&leadid=<? echo($row['LeadID']);?>'" />	</td>
  </tr>
</table>
<br /><br />

