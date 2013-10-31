<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<br />
<form action="admin.php?go=promotion_add&action=add" method="post" id="frmpromoadd" name="frmpromoadd" onsubmit=" return checkEmpty(this)">
<table width="100%" border="0" align="center" cellpadding="7" cellspacing="5">
  <tr>
    <td colspan="3" align="center"><p class="style1">THÊM TIN KHUYẾN MẠI </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Tiêu đề: </span></td>
    <td width="50%"><input class="tableboxinput" name="PromotionTitle" type="text" id="PromotionTitle" size="50" onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'"/></td>
    <td width="25%" align="center"><span class="style3">Ảnh Tiêu đề: </span></td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Nội dung:</span></td>
    <td width="50%">
		  <?php
		echo "<textarea class=\"ckeditor\" cols=\"40\" id=\"editor1\" name=PromotionContent rows=\"50\">" . $PromotionContent . "</textarea><br><br>\n";   
		?>	
	</td>
    <td width="25%" rowspan="4" valign="top">
		<img width="200" height="200" name="PromoIcon" id="PromoIcon" src="../promotionpicture/<?=$anh?>" alt=""/><br />
			<div align="center"><input class="tableboxinput" name="PromoIcon" id="PromoIcon" type="text" size="20" onclick="window.open('upload.php?Thumuc=../promotionpicture&form=frmpromoadd&input=PromoIcon&anh=PromoIcon','','width=400,height=200');"/>
				<input class="buttonbutton" name="upload" type="button" id="upload" value="Upload Ảnh" onclick="window.open('upload.php?Thumuc=../promotionpicture&form=frmpromoadd&input=PromoIcon&anh=PromoIcon','','width=400,height=200');"/>
			</div>	
	</td>
  </tr>
  <tr>
    <td width="25%" align="right"><span class="style3">Trạng thái: </span></td>
    <td><select class="tableboxinput" name="PromotionStatus" id="PromotionStatus" >
      <option value="1" selected>Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>&nbsp; &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;    &nbsp;       
		<input class="buttonbutton" type="button" value="Upload ảnh nội dung" onclick="window.open('../upload/upload.php');"/>	</td>
    </tr>
  <tr>
    <td colspan="2" align="center" valign="top"><input class="buttonbutton" type="submit" name="Submit" value="Thêm mới" />      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input class="buttonbutton" type="button" value="Quay về danh sách" onclick="window.location='admin.php?go=promotion_list'" />	</td>
    </tr>
  <tr>
    <td colspan="2" align="right" valign="top">&nbsp;</td>
  </tr>
</table>
</form><br />

<script>
 function checkEmpty(frm)
 	{
		if(frm.PromotionTitle.value == 0)
			{
				alert ('Bạn chưa nhập tiêu đề tin !');
					return false;
			}
	}

</script>

<?
	//2.Lấy dữ liệu trên form
	$action=$_REQUEST['action'];
	if($action=="add")
	{
		$PromotionTitle=$_REQUEST['PromotionTitle'];
		$PromotionContent=$_REQUEST['PromotionContent'];
		$PromotionStatus=$_REQUEST['PromotionStatus'];
		$PromoIcon = $_REQUEST['PromoIcon'];		
		
		//3.Tạo truy vấn thêm
		if($PromotionContent!=''){
		$sqlPromotionAdd="Insert promotion(PromoTitle,PromoContent,PromoIcon,PromoStatus)
			values('$PromotionTitle','$PromotionContent','$PromoIcon','$PromotionStatus')";
			}else{
					echo("<script>alert('Bạn chưa nhập nội dung tin !');</script>");}
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sqlPromotionAdd)) //nếu thực thi thành công
		{
				echo("<script>alert('Thêm tin khuyến mại thành công')</script>");
				echo("<script>window.location='admin.php?go=promotion_list';</script>");	
		}
	}
?>

