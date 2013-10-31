<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$record_per_page = 10;
	$pagenum = $_GET["page"];
	$catid=$_REQUEST['cid'];
	$page = "admin.php?go=product_list_no&cid=".$catid;	
	if($catid==0){
		$sqlPro="select * from product,category where product.CateID=category.CateID and ProStatus=0 order by ProID desc";
	}else{
		$sqlPro="select * from product,category where product.CateID=category.CateID and ProStatus=0 and product.CateID=" .$catid. " order by ProID desc";
	}
	$ResultPro = mysql_query($sqlPro,$cnn);	
	
	$totalpage =ceil( mysql_num_rows($ResultPro) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlPro =$sqlPro." LIMIT ".$from.",".$record_per_page;
	$ResultPro=mysql_query($sqlPro,$cnn);
	
	$action=$_REQUEST['action'];
	$CATEID = -1;
	if($action=="ChooseSearch")
	{
		$txtSearch=$_REQUEST['txtSearch'];
		$sqlPro="SELECT * FROM product";  //truy van san pham bang product 
		if($CATEID!=-1)
			{
				$sqlPro=$sqlPro ." WHERE CateID = " .$catid;
				if($txtSearch!= '')	
					{
						$sqlPro=$sqlPro . " and ProName like '%".$txtSearch."%'" ;
					}
			}
		else if($txtSearch!= '')
			{
				$sqlPro=$sqlPro . " WHERE ProName like '%".$txtSearch."%'" ;
			}
		$ResultPro=mysql_query($sqlPro);
	}

	//Xu ly xoa va thay doi trang thai
	$proID=$_REQUEST['pid'];
	$prostatus=$_REQUEST['status'];
	if($action=="update")
	{
		$sqlupdate="UPDATE `bakeryshop`.`product` SET ProStatus=".$prostatus." WHERE ProID=".$proID;
		if(mysql_query($sqlupdate))
		{
			echo("<script>alert('Thay đổi trạng thái sản phẩm thành công')</script>");
			echo("<script>window.location='admin.php?go=product_list_no';</script>");
		}
	}
	if($action=="del")
	{
		$sqldel="DELETE FROM product WHERE `product`.`ProID`=".$proID;
		if(mysql_query($sqldel))
			{
				echo("<script>alert('Xóa sản phẩm thành công')</script>");
				echo("<script>window.location='admin.php?go=product_list_no';</script>");	
			}
	}

?>


<!--//-->


<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="35%" align="left"><input class="buttonbutton" type="button" name="Submit22" value="Thêm mới sản phẩm" onclick="window.location ='admin.php?go=product_add'"/></td>
    <td width="40%" align="center"><span class="style1">DANH SÁCH SẢN PHẨM</span></td>
    <td width="25%" align="right" valign="middle"><p class="style1">
      <input class="buttonbutton" type="button" name="buttonback" value="Danh sách nhóm sản phẩm" onclick="window.location='admin.php?go=category_list'" />
    </p></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
		<td bgcolor="#F0F0F0">
			<span style="font-weight:bold">Trạng thái:</span>
         	<select class="tableboxinput" name="prostatusid" id="prostatusid" onChange="location.href='admin.php?go=product_list&prostatusid='+this.value">
				<option value="0">Xem tất cả sản phẩm</option>
				<option value="1">Các sản phẩm đang bày bán</option>
				<option value="2" selected="selected">Các sản phẩm không bày bán</option>
          	</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span style="font-weight:bold">Xem theo loại:</span>
            <select class="tableboxinput" name="select" id="select" onchange="location.href='admin.php?go=product_list_no&cid='+this.value">
              <option value="0">--  Tất cả  --</option>
              <?
					$sql_Category="SELECT * FROM category"; //truy van bang category cho vao Select
					$ResultCategory=mysql_query($sql_Category,$cnn);
					while($rowCategory=mysql_fetch_array($ResultCategory)){
					if($rowCategory['CateID']==$catid)
					{
				?>
              <option value="<? echo($rowCategory['CateID']);?>" selected="selected"> <? echo($rowCategory['CateName']);?> </option>
              <?
				}else{
				?>
              <option value="<? echo($rowCategory['CateID']);?>"> <? echo($rowCategory['CateName']);?> </option>
              <?
					}
				}
				?>
            </select>	    </td>
			<form action="admin.php?go=product_list&action=ChooseSearch" method="post" id="frm_product_list_search" >
	    <td align="right">        	
					
					<span style="font-weight:bold">Tìm kiếm:</span>
					<input class="tableboxinput" type="text" name="txtSearch" id="txtSearch" value="<? if($action==ChooseSearch) {echo $txtSearch;} else echo ''?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/></td>
	    <td width="10%" align="right"><input class="buttonbutton" name="submit" type="submit" id="frm_product_list_search" onclick="frm_product_list_search.submit()" value="Tìm" /></td>
		</form>
	</tr>
</table>
<br />
<div class="table2">
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" id="category_list">
				<tr>
					<td width="3%" align="center" bgcolor="#FF0066"><span class="style2">STT</span></td>
					<td width="3%" align="center" bgcolor="#FF0066"><span class="style2">Mã </span></td>
					<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Ảnh</span></td>
					<td width="29%" align="center" bgcolor="#FF0066"><span class="style2">Tên sản phẩm </span></td>
					<td width="25%" align="center" bgcolor="#FF0066"><span class="style2">Loại sản phẩm </span></td>
				  <td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Tình trạng </span></td>
					<td width="10%" align="center" bgcolor="#FF0066"><span class="style2">Trạng thái</span></td>
					<td width="5%" align="center" bgcolor="#FF0066"><span class="style2">Sửa</span></td>
					<td width="5%" align="center" bgcolor="#FF0066"><span class="style3"><span class="style2">Xóa</span> </span></td>
				</tr>
			
				<?
				$t=0;
				while($rowPro=mysql_fetch_array($ResultPro))
				{
					$t++;
				?>
				<tr  onmouseover="this.className='over'" onmouseout="this.className='out'">
				  <td width="3%" align="center" onclick="location.href='admin.php?go=product_detail&action=detail&pid=<? echo($rowPro['ProID']);?>'"><?php echo($t);?></td>
					<td width="3%" align="center" onclick="location.href='admin.php?go=product_detail&action=detail&pid=<? echo($rowPro['ProID']);?>'">
						<? echo $rowPro['ProID']; ?></td>
					<td width="10%" align="center" onclick="location.href='admin.php?go=product_detail&action=detail&pid=<? echo($rowPro['ProID']);?>'"><img src="../pic-product/<? echo $rowPro['ProImage'] ?>" height="120" width="120" /></td>
					<td width="29%" align="center" onclick="location.href='admin.php?go=product_detail&action=detail&pid=<? echo($rowPro['ProID']);?>'"><? echo $rowPro['ProName']; ?></td>
					<td width="25%" align="center" onclick="location.href='admin.php?go=product_detail&action=detail&pid=<? echo($rowPro['ProID']);?>'"><? echo $rowPro['CateName']; ?></td>
					<td width="10%" align="center">
						<?
							if($rowPro['ProQty']==0){
							echo("Hết hàng");
							}else{
							echo("Còn lại ").($rowPro['ProQty']);
							}
						?>		</td>
					<td width="10%" align="center"><select class="tableboxinput" name="status" onchange="location.href='admin.php?go=product_list&action=update&pid=<? echo $rowPro['ProID']; ?>&status='+this.value">
						<?
							if($rowPro['ProStatus']==1)
							{
						?>
						  <option value="1">Hiển Thị</option>
						  <option value="0">Ẩn</option>
						 <?
						 }else{
						 ?>
						  <option value="0">Ẩn</option>
						  <option value="1">Hiển Thị</option>
						 <?
						 }
						 ?>
				  </select>    </td>
					<td width="5%" align="center"><a href="admin.php?go=product_edit&action=edit&pid=<? echo $rowPro['ProID']; ?>" >Sửa</a></td>
					<td width="5%" align="center">
							<?
								$sql_check="Select * from orderdetail where ProID=".$rowPro['ProID'];
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
						<a href="admin.php?go=product_list&action=del&pid=<? echo $rowPro['ProID'] ?>" onClick="if(confirm('Bạn có muốn xóa sản phẩm này không?')) return true; else return false;">Xóa</a>
						<?
						}
						?>
						</td>
			  </tr>
			  <tr>
					<td colspan="9" align="center" height="2"><hr color="#999999" size="2" /></td>
			  </tr>
			  <?
			  }
			  ?> 
			  <tr>
				<td colspan="9" align="center" style="font-weight:bold">
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
					?>	</td>
			  </tr>
  </table><br />
</div>
<br />
<?php
	if(isset($prostatusid))
	{
		if($prostatusid == 0)
		{
			echo "<script>location.href = 'admin.php?go=product_list'</script>";
			exit();
		}
		if($prostatusid == 1)
		{
			echo "<script>location.href = 'admin.php?go=product_list_yes'</script>";
			exit();
		}
		if($prostatusid == 2)
		{
			echo "<script>location.href = 'admin.php?go=product_list_no'</script>";
			exit();
		}
	}
?>
