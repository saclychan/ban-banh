<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$date = date("y-m-d");
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$ostatus=$_REQUEST['ostatus'];
	$page = "admin.php?go=order_list&ostatus=".$ostatus;
	if($ostatus==2){
		$sql_order="SELECT * FROM orders,orderdetail,customer WHERE orders.OrdID=orderdetail.OrdID and customer.CusID=orders.CusID Group By orders.OrdID,Date,OrdStatus,OrdShipDate order by orders.OrdID desc";
	}else if($ostatus==3){
		$sql_order="SELECT * FROM orders,orderdetail,customer WHERE orders.OrdID=orderdetail.OrdID and customer.CusID=orders.CusID and orders.Date='".$date."' Group By orders.OrdID,Date,OrdStatus,OrdShipDate order by orders.OrdID desc";
	}else{
		$sql_order="SELECT * FROM orders,orderdetail,customer WHERE orders.OrdID=orderdetail.OrdID and customer.CusID=orders.CusID and OrdStatus=".$ostatus." Group By orders.OrdID,Date,OrdStatus,OrdShipDate order by orders.OrdID desc";
	}	
	$re_order=mysql_query($sql_order,$cnn);
	$totalpage =ceil( mysql_num_rows($re_order) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sql_order =$sql_order." LIMIT ".$from.",".$record_per_page;
	$re_order=mysql_query($sql_order,$cnn);


  // Xu ly thay doi trang thai
	$action=$_REQUEST['action'];
	$orderid=$_REQUEST['orderid'];
	$orderstatus=$_REQUEST['orderstatus'];
	if($action=='delete')
		{
		$sql_del="DELETE FROM orders WHERE OrdID=".$orderid;
		if(mysql_query($sql_del,$cnn))
			{
			echo("<script>alert('Xóa hóa đơn thành công')</script>");
			echo("<script>window.location='admin.php?go=order_list&ostatus=$ostatus';</script>");	
			}
		}
	if($action=='update')
		{
		$sql_upd="UPDATE `bakeryshop`.`orders` SET OrdStatus =".$orderstatus." WHERE OrdID =".$orderid;
		if(mysql_query($sql_upd,$cnn))
			{
			echo("<script>alert('Thay đổi trạng thái hóa đơn thành công')</script>");
			echo("<script>window.location='admin.php?go=order_list&ostatus=$ostatus';</script>");	
			}
		}
?>


		<table width="100%" border="0" cellpadding="5" cellspacing="0">
		  <tr>
		    <td width="30%"   bgcolor="#F0F0F0">
				<span style="font-weight:bold">&nbsp;&nbsp;Trạng thái:</span>
              	<select class="tableboxinput" name="SelectOrder" id="SelectOrder" onchange="location.href='admin.php?go=order_list&ostatus='+this.value">
						<?
							if($ostatus==2)
							{
						?>
							<option value="2">Xem tất cả hóa đơn</option>
							<option value="1">Hóa đơn chưa xử lý</option>
							<option value="0">Hóa đơn đã xử lý</option>
							<option value="3">Hóa đơn mới trong ngày</option>
						<?
							}else if($ostatus==1){
						?>
							<option value="2">Xem tất cả hóa đơn</option>
							<option value="1" selected="selected">Hóa đơn chưa xử lý</option>
							<option value="0">Hóa đơn đã xử lý</option>
							<option value="3">Hóa đơn mới trong ngày</option>
						<?
							}else if($ostatus==0){
						?>
							<option value="2">Xem tất cả hóa đơn</option>
							<option value="1">Hóa đơn chưa xử lý</option>
							<option value="0" selected="selected">Hóa đơn đã xử lý</option>
							<option value="3">Hóa đơn mới trong ngày</option>
						<?
							}else if($ostatus==3){
						?>
							<option value="2">Xem tất cả hóa đơn</option>
							<option value="1">Hóa đơn chưa xử lý</option>
							<option value="0">Hóa đơn đã xử lý</option>
							<option value="3" selected="selected">Hóa đơn mới trong ngày</option>
						<?
							}
						?>
				</select>	
			</td>
		    <td width="7%" align="left">					</td>
		    <td width="50%" align="left"><span class="style1">DANH SÁCH HÓA ĐƠN </span></td>
		  </tr>
	  </table><br />

<div class="table2">
  <table width="100%"  cellspacing="0" cellpadding="5" >
    <tr bgcolor="#333333">
	  <td width="5%" align="center" bgcolor="#FF0066"><span align="center" class="style2">STT</span></td>
	  <td width="5%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Mã</span></td>
      <td width="45%" align="center" bgcolor="#FF0066"><span class="style2">Tên khách hàng</span></td>
	  <td width="15%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Ngày lập</span></td>
	  <td width="15%" align="center" bgcolor="#FF0066"><span class="style2">Ngày giao hàng </span></td>
	  <td width="10%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Trạng thái</span></td>
      <td width="5%" align="center" bgcolor="#FF0066"><span align="center" class="style2">Xóa</span></td>
    </tr>
	<?
	$t=0;
	while($row_order=mysql_fetch_array($re_order))
	{
	$t++;
	?>
    <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
	  <td width="5%" align="center" valign="top" onclick="location.href='admin.php?go=order_detail&action=detail&orderid=<? echo($row_order['OrdID']);?>'"><?php echo($t);?></td>
      <td width="5%" align="center" valign="top" onclick="location.href='admin.php?go=order_detail&action=detail&orderid=<? echo($row_order['OrdID']);?>'"><? echo($row_order['OrdID']);?></td>
      <td width="45%" align="center" onclick="location.href='admin.php?go=order_detail&action=detail&orderid=<? echo($row_order['OrdID']);?>'"><? echo($row_order['CusUser']);?></td>
	  <td width="15%" align="center" onclick="location.href='admin.php?go=order_detail&action=detail&orderid=<? echo($row_order['OrdID']);?>'"><? echo($row_order['Date']);?></td>
	  <td width="15%" align="center" onclick="location.href='admin.php?go=order_detail&action=detail&orderid=<? echo($row_order['OrdID']);?>'"><? echo($row_order['OrdShipDate']);?></td>
	  <td width="10%" align="center">
        <select class="tableboxinput" name="selectstatus" onchange="location.href='admin.php?go=order_list&ostatus=<? echo $ostatus ?>&action=update&orderid=<? echo($row_order['OrdID']);?>&orderstatus='+this.value">
            <?
			if($row_order['OrdStatus']==1){
			?>
            <option value="1">Chưa xử lý</option>
			<option value="0">Đã xử lý</option>
			<?
			 }else if($row_order['OrdStatus']==0){
			?>
			<option value="0">Đã xử lý</option>
			<?
			}
			?>
      </select>      </td>
      <td width="5%" align="center">
	  		<?
				if($row_order['OrdStatus']==1)
				{
			?>
	  	<a href='admin.php?go=order_list&ostatus=<? echo $ostatus; ?>&action=delete&orderid=<? echo($row_order['OrdID']);?>' onClick="if(confirm('Bạn thực sự muốn xóa hóa đơn này?')) return true; else return false;">Xóa</a>
			<?
				}else echo("|||");
			?>		</td>
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
</table>
  <br /><br /></div>

