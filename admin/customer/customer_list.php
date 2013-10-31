<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$statusid=$_REQUEST['sid'];
	$page = "admin.php?go=customer_list&sid=".$statusid;	
	if($statusid==2){
		$sqlCus="SELECT * FROM customer order by CusID desc";
	}else{
		$sqlCus="SELECT * FROM customer WHERE CusStatus=".$statusid." order by CusID desc";
	}
	$ResultCus = mysql_query($sqlCus,$cnn);	
	$totalpage =ceil( mysql_num_rows($ResultCus) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlCus =$sqlCus." LIMIT ".$from.",".$record_per_page;
	$ResultCus=mysql_query($sqlCus,$cnn);
	
	
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$CusID=$_REQUEST['cid'];
	$CusStatus=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE `bakeryshop`.`customer` SET CusStatus=".$CusStatus." WHERE CusID=".$CusID;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái tài khoản khách hàng thành công')</script>");
			echo("<script>window.location='admin.php?go=customer_list&sid=$statusid';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM `bakeryshop`.`customer` WHERE CusID=".$CusID;
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa tài khoản khách hàng thành công')</script>");
				echo("<script>window.location='admin.php?go=customer_list&sid=$statusid';</script>");	
			}
	}


?>

<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
	<td width="36%" height="40"  bgcolor="#F0F0F0">
		<span style="font-weight:bold">&nbsp;&nbsp;Trạng thái:</span>
	  <select class="tableboxinput" name="SelectCustomer" id="SelectCustomer" onchange="location.href='admin.php?go=customer_list&sid='+this.value">
	<?
	if($statusid==2)
	{
	?>
	<option value="2">Xem tất cả tài khoản khách hàng</option>
	<option value="1">Các tài khoản không bị khóa</option>
	<option value="0">Các tài khoản bị khóa</option>
	<?
	}else if($statusid==1){
	?>
	<option value="2">Xem tất cả tài khoản khách hàng</option>
	<option value="1" selected="selected">Các tài khoản không bị khóa</option>
	<option value="0">Các tài khoản bị khóa</option>
	<?
	}else if($statusid==0){
	?>
	<option value="2">Xem tất cả tài khoản khách hàng</option>
	<option value="1">Các tài khoản không bị khóa</option>
	<option value="0" selected="selected">Các tài khoản bị khóa</option>
	<?
	}
	?>
</select>			</td>
	<td width="5%" align="left">&nbsp;</td>
	<td width="59%" align="left"><span class="style1">DANH SÁCH KHÁCH HÀNG</span></td>
  </tr>
</table>
<br />
<div class="table2">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
  <td width="29" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
    <td width="24" align="center" bgcolor="#FF0066"><span class="style2">Mã</span></td>
    <td width="327" align="center" bgcolor="#FF0066"><span class="style2">Tên khách hàng</span></td>
    <td width="184" align="center" bgcolor="#FF0066"><span class="style2">Tên đăng nhập </span></td>
    <td width="328" align="center" bgcolor="#FF0066"><span class="style2">Email</span></td>
    <td width="81" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái </span></td>
    <td align="center" bgcolor="#FF0066"><span class="style2">Xóa</span></td>
  </tr>

  <?
  	$t=0;
  	while($rowCus=mysql_fetch_array($ResultCus))
	{
		$t++;
  ?>
  <tr onmouseover="this.className='over'" onmouseout="this.className='out'">
    <td align="center" height="25" onclick="location.href='admin.php?go=customer_detail&action=detail&cid=<? echo $rowCus['CusID']; ?>'"><?php echo($t);?></td>
    <td align="center" onclick="location.href='admin.php?go=customer_detail&action=detail&cid=<? echo $rowCus['CusID']; ?>'"><? echo $rowCus['CusID']; ?>	</td>
    <td align="center" onclick="location.href='admin.php?go=customer_detail&action=detail&cid=<? echo $rowCus['CusID']; ?>'"><? echo $rowCus['CusName']; ?></td>
    <td align="left" onclick="location.href='admin.php?go=customer_detail&action=detail&cid=<? echo $rowCus['CusID']; ?>'"><? echo $rowCus['CusUser']; ?></td>
    <td align="left" onclick="location.href='admin.php?go=customer_detail&action=detail&cid=<? echo $rowCus['CusID']; ?>'"><? echo $rowCus['CusEmail']; ?></td>
    <td align="center"><select class="tableboxinput" name="select" onchange="location.href='admin.php?go=customer_list&sid=<? echo $statusid ?>&action=update&cid=<? echo $rowCus['CusID']; ?>&status='+this.value">
		<?
	  		if($rowCus['CusStatus']==1)
			{
	  	?>
     		<option value="1">Sử dụng</option>
      		<option value="0">Khóa</option>
		<?
			}else{	
		?>
			<option value="0">Khóa</option>
      		<option value="1">Sử dụng</option>
		<?
			}
		?>
    </select>    </td>
    <td width="27" align="center">
					<?
					$sql_check="Select * from orders where CusID=".$rowCus['CusID'];
					$re_check=mysql_query($sql_check,$cnn);
					$ok=0;
					while($row_check=mysql_fetch_array($re_check))
					{
						$ok=1;
					}
					if($ok==1)
					{
						echo("||||");
					}
					else{
					?>
		<a href="admin.php?go=customer_list&sid=<? echo $statusid ?>&action=del&cid=<? echo $rowCus['CusID'] ?>" onClick="if(confirm('Bạn có muốn xóa tài khoản khách hàng này không?')) return true; else return false;">Xóa</a>	
					<?
						}
					?>
	</td>
  </tr>
  <tr style="font-size:12px; font-weight:bold">
    <td colspan="7" align="center" ><hr color="#999999" size="2" /></td>
  </tr>
  <?
  }
  ?>
  
  <tr style="font-size:12px; font-weight:bold">
    <td colspan="7" align="center" ><?
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
		?></td>
  </tr>
</table><br />
</div><br />

