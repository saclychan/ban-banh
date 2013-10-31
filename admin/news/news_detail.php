<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$newsid=$_REQUEST['nid'];

	if($action=='detail')
		$sql=mysql_query("select * from news where NewsId = " . $newsid . "",$cnn);
	$row=mysql_fetch_array($sql)
?>



<br />
<p class="style1" align="center">XEM NỘI DUNG  TIN TỨC </p>
<br /><br />

<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td width="20%" align="right" valign="top"><span class="style3">Tiêu đề tin: </span></td>
    <td width="20%" colspan="2"><div class="border1"><? echo($row['NewsTitle']);?></div></td>
    <td width="30%" rowspan="2" align="center" valign="middle">
			<table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề </strong></div></td>
			  </tr>
			  <tr>
			   <td bgcolor="#68EEF9" width="200" height="200" >
			   <img width="200" height="200" name="NewsImage" id="NewsImage" src="../newspicture/<? echo $row['NewsImage'] ?>" alt="Ảnh tiêu đề"/></td>
			  </tr>
	  </table></td>
  </tr>
  <tr>
  <td width="20%" height="300" align="right" valign="top" ><span class="style3">Nội dung:</span></td>
	<td width="20%" colspan="2" align="left" valign="top" bgcolor="#00FFCC">
		<? echo($row['NewsContent']);?>	</td>
  </tr>
  
  <tr>
    <td align="right" valign="top"><span class="style3">Trạng thái:</span></td>
    <td width="15%" align="left">
		<?
			if($row['NewsStatus']==1){
			echo("Hiển thị");
			}else{
			echo("Ẩn");
			}
		?>	</td>
    <td width="35%" align="left"><span class="style3">Ngày đăng tin:</span>&nbsp;&nbsp;<? echo($row['NewsDate']);?></td>
    <td width="30%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center">
	<br />
		<input  class="buttonbutton"  type="button" name="button" value="Quay lại danh sách tin tức" onclick="window.location='admin.php?go=news_list'" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input   class="buttonbutton" type="button" name="button" value="Sửa tin tức" onclick="window.location='admin.php?go=news_edit&action=edit&nid=<? echo $newsid; ?>'" />	</td>
  </tr>
</table>
<br /><br />

