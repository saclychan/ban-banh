<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$lstatus=$_REQUEST['lstatus'];
	$page = "admin.php?go=leading_list&lstatus=".$lstatus;
	if($lstatus==2){
		$sql_leading="SELECT * FROM leadings order by LeadID desc";
	}else{
		$sql_leading="SELECT * FROM leadings WHERE LeadStatus=".$lstatus." order by LeadID desc";
	}	
	$re_leading=mysql_query($sql_leading,$cnn);
	$totalpage =ceil( mysql_num_rows($re_leading) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sql_leading =$sql_leading." LIMIT ".$from.",".$record_per_page;
	$re_leading=mysql_query($sql_leading,$cnn);


  // Xu ly thay doi trang thai
	$action=$_REQUEST['action'];
	$leadid=$_REQUEST['leadid'];
	$leadstatus=$_REQUEST['leadstatus'];
	if($action=='delete')
		{
		$sql_del="DELETE FROM leadings WHERE LeadID=".$leadid;
		if(mysql_query($sql_del,$cnn))
			{
			echo("<script>alert('Xóa mục hướng dẫn thành công')</script>");
			echo("<script>window.location='admin.php?go=leading_list&lstatus=$lstatus';</script>");	
			}
		}
	if($action=='update')
		{
		$sql_upd="UPDATE `bakeryshop`.`leadings` SET LeadStatus =".$leadstatus." WHERE leadID =".$leadid;
		if(mysql_query($sql_upd,$cnn))
			{
			echo("<script>window.location='admin.php?go=leading_list&lstatus=$lstatus';</script>");	
			}
		}
?>

<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
	<td width="13%" height="40" >
	<input class="buttonbutton" type="button" value="Thêm mới" onclick="window.location ='admin.php?go=leading_add'" />			</td>
	<td width="30%"   bgcolor="#F0F0F0">
		<span style="font-weight:bold">&nbsp;&nbsp;Trạng thái:</span>
		<select class="tableboxinput" name="SelectLeading" id="SelectLeading" onchange="location.href='admin.php?go=leading_list&lstatus='+this.value">
				<?
				if($lstatus==2)
				{
				?>
					<option value="2">Xem tất cả các mục</option>
					<option value="1">Các mục hiện</option>
					<option value="0">Các mục ẩn</option>
					<?
				}else if($lstatus==1){
				?>
					<option value="2">Xem tất cả các mục</option>
					<option value="1" selected="selected">Các mục hiện</option>
					<option value="0">Các mục ẩn</option>
					<?
				}else if($lstatus==0){
				?>
					<option value="2">Xem tất cả các mục</option>
					<option value="1">Các mục hiện</option>
					<option value="0" selected="selected">Các mục ẩn</option>
					<?
				}
				?>
		</select>	
	</td>
	<td width="7%" align="left">					</td>
	<td width="50%" align="left"><span class="style1">HƯỚNG DẪN VÀ MẸO VẶT </span></td>
  </tr>
</table><br />
<div class="table2">
	<table width="100%"  cellspacing="0" cellpadding="5" >
		<tr bgcolor="#333333">
		  <td width="5%" align="center" bgcolor="#FF0066"><span align="center" class="style2">STT</span></td>
		  <td width="5%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Mã</span></td>
		  <td width="10%" align="left" bgcolor="#FF0066">&nbsp;</td>
		  <td width="50%" align="left" bgcolor="#FF0066"><span align="center" class="style2">Tiêu đề</span> </td>
		  <td width="16%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Trạng thái</span></td>
		  <td width="7%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Sửa</span></td>
		  <td width="7%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Xóa</span></td>
		</tr>
		<?
		$t=0;
		while($row_leading=mysql_fetch_array($re_leading))
		{
		$t++;
		?>
		<tr onmouseover="this.className='over'" onmouseout="this.className='out'">
		  <td width="5%" align="center" valign="top" onclick="location.href='admin.php?go=leading_detail&action=detail&leadid=<? echo($row_leading['LeadID']);?>'"><?php echo($t);?></td>
		  <td width="5%" align="center" valign="top" onclick="location.href='admin.php?go=leading_detail&action=detail&leadid=<? echo($row_leading['LeadID']);?>'"><? echo($row_leading['LeadID']);?></td>
		  <td width="10%" onclick="location.href='admin.php?go=leading_detail&action=detail&leadid=<? echo($row_leading['LeadID']);?>'">&nbsp;</td>
		  <td width="50%" onclick="location.href='admin.php?go=leading_detail&action=detail&leadid=<? echo($row_leading['LeadID']);?>'"><? echo($row_leading['LeadName']);?></td>
		  <td width="16%" align="center">
			<select class="tableboxinput" name="selectleading" onchange="location.href='admin.php?go=leading_list&lstatus=<? echo $lstatus ?>&action=update&leadid=<? echo($row_leading['LeadID']);?>&leadstatus='+this.value">
				<?
				if($row_leading['LeadStatus']==1){
				?>
				<option value="1">Hiển thị</option>
				<option value="0">Ẩn</option>
				<?
				 }else if($row_leading['LeadStatus']==0){
				?>
				<option value="0">Ẩn</option>
				<option value="1">Hiển thị</option>
				<?
				}
				?>
		  </select>      </td>
		  <td width="7%" align="center"><a href="admin.php?go=leading_edit&action=edit&leadid=<? echo($row_leading['LeadID']);?>">Sửa</a></td>
		  <td width="7%" align="center"><a href='admin.php?go=leading_list&lstatus=<? echo $lstatus; ?>&action=delete&leadid=<? echo($row_leading['LeadID']);?>' onClick="if(confirm('Bạn thực sự muốn xóa mục này?')) return true; else return false;">Xóa</a></td>
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
			?>	  </td>
		</tr>
	</table><br />
</div><br />

