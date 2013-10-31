<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<?
	$action=$_REQUEST['action'];
	$PromoID=$_REQUEST['pid'];
	if($action=="edit")
	{
		$sqlPromotion=mysql_query("SELECT * FROM promotion WHERE PromoID=".$PromoID."");
		$row=mysql_fetch_array($sqlPromotion);
	}
	if($action=="update")				//Xu ly thay doi
	{
		$PromoTitle=$_REQUEST['PromoTitle'];
		$PromoContent=$_REQUEST['PromoContent'];
		$PromoIcon = $_REQUEST['PromoIcon'];		
		$PromoStatus=$_REQUEST['PromoStatus'];
		if($PromoContent!=''){
		$sqlupdate=" UPDATE `bakeryshop`.`promotion` SET `PromoTitle` = '$PromoTitle', `PromoContent` = '$PromoContent', `PromoIcon` = '$PromoIcon', `PromoStatus` = '$PromoStatus' WHERE `PromoID` = ".$PromoID."";
		}else{
					echo("<script>alert('Bạn chưa nhập nội dung tin !');</script>");
						echo("<script>window.location='admin.php?go=promotion_edit&action=edit&pid=$PromoID  ';</script>");
					}
					
		if(mysql_query($sqlupdate))
			{
				echo("<script>alert('Sửa tin khuyến mại thành công')</script>");
				Redirect("admin.php?go=promotion_list");	
			}
	}

?>

<p>&nbsp;</p>
<form action="admin.php?go=promotion_edit&action=update&pid=<? echo $PromoID; ?>" method="post" id="frmpromoedit" name="frmpromoedit">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">SỬA TIN KHUYẾN MẠI </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Tiêu đề mới: </span></td>
    <td width="50%">
	  <input class="tableboxinput" name="PromoTitle" type="text" id="PromoTitle" size="50" value="<? echo $row['PromoTitle'] ?>"onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'"/>	</td>
    <td width="25%" rowspan="4" align="center" valign="top">
		<span class="style3">Ảnh Tiêu đề cũ: </span><br>
		<img width="150" height="100" src="../promotionpicture/<? echo $row['PromoIcon']; ?>"/>
		<br /><br />
		<span class="style3">Ảnh Tiêu đề mới: </span><br>
		<img width="200" height="200" name="PromoIcon" id="PromoIcon" src="../promotionpicture/<?=$anh?>" alt=""/><br /><br>
			<div align="center"><input class="tableboxinput" name="PromoIcon" id="PromoIcon" type="text" size="20" onclick="window.open('upload.php?Thumuc=../promotionpicture&form=frmpromoedit&input=PromoIcon&anh=PromoIcon','','width=400,height=300');"/>
				<input class="buttonbutton" name="upload" type="button" id="upload" value="Upload Ảnh" onclick="window.open('upload.php?Thumuc=../promotionpicture&form=frmpromoedit&input=PromoIcon&anh=PromoIcon','','width=400,height=300');"/>
			</div>			
	
	</td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Nội dung mới:</span></td>
    <td width="50%">
		  <?php
		echo "<textarea class=\"ckeditor\" cols=\"40\" id=\"editor1\" name=PromoContent rows=\"50\">" . $row['PromoContent'] . "</textarea><br><br>\n";   
		?>	</td>
    </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Trạng thái mới: </span></td>
    <td>
	<select class="tableboxinput" name="PromoStatus" id="PromoStatus" >
		<?
			if($row['PromoStatus']==1)
			{
		?>
		  <option value="1">Hiển thị</option>
		  <option value="0">Ẩn</option>
		  <?
		}else{		
		?>
			<option value="0">Ẩn</option>
			<option value="1">Hiện</option>
		<?
		}
		?>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="buttonbutton" type="button" value="Upload ảnh nội dung" onclick="window.open('../upload/upload.php');"/>	</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input class="buttonbutton" type="submit" name="Submit" value="Hoàn thành" />      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input class="buttonbutton" type="button" value="Quay lại danh sách" onclick="window.location='admin.php?go=promotion_list'" />	</td>
    </tr>
</table>
</form><br />
