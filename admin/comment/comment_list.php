<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$statusid=$_REQUEST['status'];
	$page = "admin.php?go=comment_list&status=".$statusid;
	if($statusid==2){
		$sql_comment="SELECT * FROM comment,customer WHERE comment.CusID=customer.CusID order by ComID desc";
	}else{
		$sql_comment="SELECT * FROM comment,customer WHERE comment.CusID=customer.CusID AND Status=".$statusid." order by ComID desc";
	}	
	$re_comment=mysql_query($sql_comment,$cnn);
	$totalpage =ceil( mysql_num_rows($re_comment) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sql_comment =$sql_comment." LIMIT ".$from.",".$record_per_page;
	$re_comment=mysql_query($sql_comment,$cnn);


  // Xu ly thay doi trang thai
	$action=$_REQUEST['action'];
	$comid=$_REQUEST['comid'];
	$comstatus=$_REQUEST['comstatus'];
	if($action=='delete')
		{
		$sql_del="DELETE FROM comment WHERE ComID=".$comid;
		if(mysql_query($sql_del,$cnn))
			{
			echo("<script>alert('Xóa ý kiến phản hồi thành công')</script>");
			echo("<script>window.location='admin.php?go=comment_list&status=$statusid';</script>");	
			}
		}
	if($action=='update')
		{
		$sql_upd="UPDATE `bakeryshop`.`comment` SET Status =".$comstatus." WHERE ComID =".$comid;
		if(mysql_query($sql_upd,$cnn))
			{
			echo("<script>window.location='admin.php?go=comment_list&status=$statusid';</script>");	
			}
		}
?>

<table width="100%" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="8" align="center">
		<table width="100%" border="0" cellspacing="0">
		  <tr>
			<td width="33%" height="40"  bgcolor="#F0F0F0"><span style="font-weight:bold">&nbsp;&nbsp;Trạng thái:</span>
              <select class="tableboxinput" name="SelectCustomer" id="SelectCustomer" onchange="location.href='admin.php?go=comment_list&status='+this.value">
                <?
			if($statusid==2)
			{
			?>
                <option value="2">Xem tất cả ý kiến phản hồi</option>
                <option value="1">Các ý kiến chưa đọc</option>
                <option value="0">Các ý kiến đã đọc</option>
                <?
			}else if($statusid==1){
			?>
                <option value="2">Xem tất cả ý kiến phản hồi</option>
                <option value="1" selected="selected">Các ý kiến chưa đọc</option>
                <option value="0">Các ý kiến đã đọc</option>
                <?
			}else if($statusid==0){
			?>
                <option value="2">Xem tất cả ý kiến phản hồi</option>
                <option value="1">Các ý kiến chưa đọc</option>
                <option value="0" selected="selected">Các ý kiến đã đọc</option>
                <?
			}
			?>
              </select>			</td>
		    <td width="7%" align="left">&nbsp;</td>
		    <td width="60%" align="left"><span class="style1">DANH SÁCH Ý KIẾN KHÁCH HÀNG</span></td>
		  </tr>
	  </table>
        <p>&nbsp;</p></td>
  </tr></table>
  <div class="table2">
  <table width="100%"  cellspacing="0" cellpadding="5" >
    <tr bgcolor="#333333">
	  <td width="5%" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">STT</span></td>
	  <td width="5%" align="left" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">M&atilde;</span></td>
      <td width="35%" align="center" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">N&#7897;i dung </span></td>
	  <td width="25%" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">T&ecirc;n kh&aacute;ch h&agrave;ng &#273;&#432;a &yacute; ki&#7871;n </span></td>
      <td width="15%" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">Ng&agrave;y &#273;&#432;a &yacute; ki&#7871;n</span></td>
      <td width="10%" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">Tr&#7841;ng th&aacute;i</span></td>
      <td width="5%" valign="middle" bgcolor="#FF0066"><span align="center" class="style2">X&oacute;a</span></td>
    </tr>
	<?
	$t=0;
	while($row_comment=mysql_fetch_array($re_comment))
	{
	$t++;
	?>
    <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
	  <td width="5%" valign="middle" onclick="location.href='admin.php?go=comment_detail&action=detail&comid=<? echo($row_comment['ComID']);?>'"><?php echo($t);?></td>
      <td width="5%" align="left" valign="middle" onclick="location.href='admin.php?go=comment_detail&action=detail&comid=<? echo($row_comment['ComID']);?>'"><? echo($row_comment['ComID']);?></td>
      <td width="35%" align="center" valign="middle" onclick="location.href='admin.php?go=comment_detail&action=detail&comid=<? echo($row_comment['ComID']);?>'"><? echo($row_comment['Content']);?></td>
	  <td width="25%" valign="middle" onclick="location.href='admin.php?go=comment_detail&action=detail&comid=<? echo($row_comment['ComID']);?>'"><? echo($row_comment['CusName']);?></td>
      <td valign="middle" onclick="location.href='admin.php?go=comment_detail&action=detail&comid=<? echo($row_comment['ComID']);?>'"><? echo($row_comment['DateSend']);?></td>
      <td valign="middle">
        <select  class="tableboxinput" name="selectcomment" onchange="location.href='admin.php?go=comment_list&status=<? echo $statusid ?>&action=update&comid=<? echo($row_comment['ComID']);?>&comstatus='+this.value">
            <?
			if($row_comment['Status']==1){
			?>
            <option value="1">Chưa đọc</option>
            <option value="0">Đã đọc</option>
            <?
			 }else if($row_comment['Status']==0){
			?>
            <option value="0">Đã đọc</option>
            <option value="1">Chưa đọc</option>
            <?
			}
			?>
        </select>
      </td>
      <td valign="middle"><a href='admin.php?go=comment_list&status=<? echo $statusid ?>&action=delete&comid=<? echo($row_comment['ComID']);?>' onClick="if(confirm('Bạn thực sự muốn xóa ý kiến này?')) return true; else return false;">Xóa</a></td>
    </tr>
	<tr>
		<td colspan="7"><hr color="#999999" size="2" /></td>
	</tr>
	<?
	}
	?>
	<tr  style="font-size:12px; font-weight:bold">      
	  <td colspan="7" align="center" valign="bottom" >
	  <?
		/*
		Vong lap de tao ra cac link lien ket den cac trang du lieu.
		Output: 	1 | 2 | 3 | 4 
		*/
		for($i =1; $i<=$totalpage;$i++)
		{
			if ($i==1){
				echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
			}else{
			if($pagenum==$i)			
				echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
			else
				echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
			}
		}
		echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
		?>
	  </td>
    </tr>
</table><br />
  </div>
  <br /><br />

