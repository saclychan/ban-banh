<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script language="javascript">
	function checkadd()
	{
			if(document.frmnewadd.NewsTitle.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tiêu đề!";
				document.getElementById('err2').innerHTML="";
				document.frmnewadd.NewsTitle.focus();
				return false;
			}
			/*if(document.frmnewadd.NewsContent.value=="")
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="Nhập nội dung!";
				document.frmnewadd.NewsContent.focus();
				return false;
			}
			if(document.frmnewadd.NewsImage.value=="")
			{
				document.getElementById('err3').innerHTML="Upload ảnh!";
				document.frmnewadd.NewsImage.focus();
				return false;
			}*/
		else return true;
	}
</script>

<br />
<p class="style1" align="center">THÊM MỚI TIN TỨC </p>
<br /><br />
<!--<form action="admin.php?go=news_add&action=add" method="post" id="frmnewadd" name="frmnewadd" onsubmit="return checkaddnew();">-->
<form action="admin.php?go=news_add&action=add" method="post" id="frmnewadd" name="frmnewadd">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%" align="right"><span class="style3">Tiêu đề tin: </span></td>
    <td width="30%" colspan="2"><input  class="tableboxinput" name="NewsTitle" type="text" id="NewsTitle" size="50"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="15%" align="center" valign="top"><div class="st1" id="err1"></div></td>
    <td width="35%" rowspan="2" align="left" valign="middle">
			<table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề </strong></div></td>
			  </tr>
			  <tr>
				<td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200" name="NewsImage" id="NewsImage" src="../newspicture/<?=$anh?>" alt="Ảnh tiêu đề"/></td>
			  </tr>
			</table>	</td>
  </tr>
  <tr>
  <td width="20%" align="right"><span class="style3">Nội dung:</span></td>
	<td width="30%" colspan="2">
		<div align="left"  >
		<?php
		echo "<textarea class=\"ckeditor\" cols=\"40\" id=\"editor1\" name=NewsContent rows=\"50\">" . $NewsContent . "</textarea><br><br>\n";   
		?>
	  </div>	</td>
	<td width="15%" align="center" valign="middle"><div class="st1" id="err2"></div></td>
  </tr>
  
  <tr>
    <td align="right"><span class="style3">Trạng thái:</span></td>
    <td width="20%" align="left">
		<select class="tableboxinput"  name="NewsStatus" id="NewsStatus" style="width:50px">
		  <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
      </select>	</td>
    <td width="10%" align="right"><input class="buttonbutton" type="button" value="Upload ảnh nội dung" onclick="window.open('../upload/upload.php');"/></td>
    <td width="50%" colspan="2" align="center">
		<input  class="tableboxinput" name="NewsImage" type="text" id="NewsImage" value="<?=$anh?>" size="30" onclick="window.open('upload.php?Thumuc=../newspicture&form=frmnewadd&input=NewsImage&anh=NewsImage','upload','width=400,height=200');"/>
      <input   class="buttonbutton" name="upload" type="button" id="upload" value="Upload ảnh icon" onclick="window.open('upload.php?Thumuc=../newspicture&form=frmnewadd&input=NewsImage&anh=NewsImage','upload','width=400,height=200');"/>	</td>
  </tr>
  <tr>
    <td colspan="5" align="center">
	<br />
			<input   class="buttonbutton" type="submit" name="submit" value="Thêm mới" onClick="return checkadd();" />
		&nbsp;&nbsp;&nbsp;
		<input  class="buttonbutton"  type="reset" name="reset" value="Thao tác lại" />
		&nbsp;&nbsp;&nbsp;
		<input   class="buttonbutton" type="button" name="button" value="Quay lại danh sách" onclick="window.location='admin.php?go=news_list'" />	</td>
  </tr>
</table>
<br /><br />
</form>

<?
		//Lấy dữ liệu trên form
		$action=$_REQUEST['action'];
		$newstitle = $_REQUEST['NewsTitle'];
		$newscontent = $_REQUEST['NewsContent'];
		$newstatus = $_REQUEST['NewsStatus'];
		$anh = $_REQUEST['NewsImage'];
	if($action == 'add'){
		//Tạo truy vấn thêm
		if($newscontent!=""){
		$sql_news = "insert into news(NewsContent,NewsTitle,NewsDate,NewsImage,NewsStatus) 
					values('$newscontent','$newstitle',NOW(),'$anh','$newstatus')";
					}else{
					echo("<script>alert('Bạn chưa nhập nội dung tin !');</script>");}
		
		
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sql_news))
		{
			echo("<script>alert('Thêm tin mới thành công !');</script>");
			echo("<script>window.location='admin.php?go=news_list';</script>");
		}
	}
?>
