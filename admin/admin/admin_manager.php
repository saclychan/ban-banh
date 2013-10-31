<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$sqlManager="SELECT * FROM admin WHERE LevelAD > '1' order by IDAd desc";
	$ResultManager=mysql_query($sqlManager);
?>


<table width="100%" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="6" align="center">
		<table width="100%" border="0" cellspacing="0">
		  <tr>
			<td width="30%" height="40">
				<input class="buttonbutton" id="btadd" name="submit" type="submit" onClick="window.location ='admin.php?go=admin_managerAdd'" value="Thêm tài khoản quản trị" />			</td>
			<td width="70%"><span class="style1">DANH SÁCH TÀI KHOẢN QUẢN TRỊ </span></td>
		  </tr>
	  </table>
        <p>&nbsp;</p></td>
  </tr>
  <tr>
  	<td>
	  
	  
<table width="100%" cellpadding="10">
  <tr>
	<?
		$t=0;
		while($rowManager=mysql_fetch_array($ResultManager))
		{
			$t++;
	?>  
    	<td align="center" valign="top">
		<div class="table2-box">
			<div class="table2-box-head">
				<table width="100%" border="0">
				  <tr>
					<td width="10%">ID:<strong><? echo $rowManager['IDAd']; ?></strong></td>
					<td width="50%"><i>Tài khoản: </i><strong style="font-size:14px;"><? echo $rowManager['UserAd']; ?></strong></td>
					<td width="20%">
							<select class="tableboxinput" name="select" onChange="location.href='admin.php?go=admin_manager&action=update&id=<? echo $rowManager['IDAd']; ?>&status='+this.value">
								<?
									if($rowManager['StatusAd']==1)
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
							</select>					
					
					</td>
				    <td width="20%">
						<a style="color:#FF0066" href="admin.php?go=admin_managerEdit&action=edit&id=<? echo $rowManager['IDAd']; ?>">Sửa</a>
						&nbsp;&nbsp;&nbsp;
						<a style="color:#FF0066" href="admin.php?go=admin_manager&action=del&id=<? echo $rowManager['IDAd'] ?>" onClick="if(confirm('Bạn có chắc chắc muốn xóa tài khoản này không?')) return true; else return false;">Xóa</a>
					</td>
				  </tr>
				</table>
			</div>
			
			<div class="table2-box-content"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
				  <tr>
					<td width="30%" align="right"><strong>Tên:</strong></td>
					<td width="70%"> <? echo $rowManager['NameAd']; ?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Phone:</strong></td>
					<td width="70%"><? echo $rowManager['PhoneAd']; ?></td>
				  </tr>
				  <tr>
					<td width="30%" align="right"><strong>Email:</strong></td>
					<td width="70%"><? echo $rowManager['EmailAd']; ?></td>
				  </tr>
			  </table><hr style="color:#FFFFFF;" />
			</div>
			
			<div class="table2-box-func">
			
					<table width="100%" border="0" cellpadding="0" cellspacing="5">
					  <tr>
						<td colspan="3" align="center" valign="top">
							<span style="font-weight:bold; font-size:13px;">CHỨC NĂNG QUẢN LÝ</span>
							<hr style="width:50%; margin:0 auto; color:#FFFFFF" />	
						</td>
					  </tr>
					  
						<?
							$sqlSelectFunc= "SELECT function.FID, function.FName FROM function, adminfunction
												WHERE adminfunction.IDAd = ". $rowManager['IDAd'] ." 
												AND adminfunction.FID = function.FID order by function.FName desc";
							$ResultSelectFunc=mysql_query($sqlSelectFunc);
							while($rowSelectFunc=mysql_fetch_array($ResultSelectFunc))
								{	
						?>		  
						  <tr>
							<td width="10%">&nbsp;</td>
							<td width="60%">+ <? echo $rowSelectFunc['FName']; ?></td>
							<td width="30%"><a href="admin.php?go=admin_manager&action=deleteFunc&id=<? echo $rowManager['IDAd'] ?>&funcID=<? echo $rowSelectFunc['FID']; ?>">Xóa</a></td>
						  </tr>
						<?
								}
						?>							  
						  <tr>
						  	<td colspan="3"><hr style="width:90%; margin:0 auto; color:#FFFFFF" /></td>
						  </tr>
						  <tr>
						    <td colspan="3" align="right">
								Chọn thêm chức năng:
								  <select name="FunctionID" id="FunctionID" onChange="location.href='admin.php?go=admin_manager&action=addFunc&id=<? echo $rowManager['IDAd']; ?>&funcID='+this.value">
									<option value="0" selected="selected">Chức năng  &nbsp;&nbsp;</option>
										  <?
													$sqlFunction="Select * From function";
													$ResultFunction=mysql_query($sqlFunction);
													while($rowFunction=mysql_fetch_array($ResultFunction))
													{
											?>
									<option value="<? echo($rowFunction['FID']);?>"> <? echo($rowFunction['FName']);?> </option>
										  <?
												}
											?>
							</select></td>
				      </tr>	  
			  </table>
			</div>
		</div>
		</td>
	<?
		if($t % 2 ==0)
			{
				echo "</tr>";
			}
		}
	?>		
  </tr>
</table>



		




 
  	</td>
  </tr>
</table>
<br /><br />


<?
	//Xu ly xoa va thay doi trang thai
	$action=$_REQUEST['action'];
	$AdId=$_REQUEST['id'];
	$StatusAd=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE admin SET StatusAd=".$StatusAd." WHERE IDAd=".$AdId;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái tài khoản thành công')</script>");
			echo("<script>window.location='admin.php?go=admin_manager';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM admin WHERE IDAd=".$AdId;
		$sqldel2="DELETE FROM adminfunction WHERE IDAd=".$AdId;
		if(mysql_query($sqldel)&&mysql_query($sqldel2))
			{
				echo("<script>alert('Xóa tài khoản thành công')</script>");
				echo("<script>window.location='admin.php?go=admin_manager';</script>");	
			}
	}
	
//Xu ly them, xoa chuc nang
	$funcID=$_REQUEST['funcID'];
	
	if($action=="addFunc")
	{
		$sqladdfunc="INSERT INTO adminfunction(IDAd, FID) values('$AdId','$funcID')";
		if(mysql_query($sqladdfunc))
		{
			echo("<script>alert('Thêm chức năng thành công')</script>");
			echo("<script>window.location='admin.php?go=admin_manager';</script>");
		}
	}	
	
	if($action=="deleteFunc")
	{
		$sqldelFunc="DELETE FROM adminfunction WHERE IDAd=".$AdId." and FID=".$funcID;
		if(mysql_query($sqldelFunc))
			{
				echo("<script>alert('Xóa chức năng thành công')</script>");
				echo("<script>window.location='admin.php?go=admin_manager';</script>");	
			}
	}

?>
