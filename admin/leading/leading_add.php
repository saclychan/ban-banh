<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script language="javascript">
	function checkadd()
	{
			if(document.frmleadadd.LeadTitle.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tiêu đề!";
				document.getElementById('err2').innerHTML="";
				document.frmleadadd.LeadTitle.focus();
				return false;
			}
		/*	if(document.frmleadadd.LeadContent.value=="")
			{
				document.getElementById('err1').innerHTML="";
				document.getElementById('err2').innerHTML="Nhập nội dung!";
				document.frmleadadd.LeadContent.focus();
				return false;
			}*/
			
		else return true;
	}
</script>

<br />
<p class="style1" align="center">THÊM MỚI MẸO VẶT &amp; HƯỚNG DẪN </p>
<br /><br />
<form action="admin.php?go=leading_add&action=add" method="post" id="frmleadadd" name="frmleadadd">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%" align="right"><span class="style3">Tiêu đề : </span></td>
    <td width="30%" colspan="2"><input class="tableboxinput" name="LeadTitle" type="text" id="LeadTitle" size="50"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="15%" align="center" valign="top"><div class="st1" id="err1"></div></td>
    <td width="35%" rowspan="3" align="left" valign="middle">
			<table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề</strong></div></td>
			  </tr>
			  <tr>
				<td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200" name="LeadImage" id="LeadImage" src="../leadingpicture/<?=$anh?>"/></td>
			  </tr>
			</table>	</td>
  </tr>
  <tr>
    <td align="right"><span class="style3">Tóm tắt nội dung</span></td>
    <td width="30%" colspan="2"><input class="tableboxinput" name="LeadNote" type="text" id="LeadTitle2" size="50"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="15%" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
  <td width="20%" align="right"><span class="style3">Nội dung:</span></td>
	<td width="30%" colspan="2">
		<div align="left">
		  <?php
		echo "<textarea class=\"ckeditor\" cols=\"40\" id=\"editor1\" name=LeadContent rows=\"50\">" . $LeadContent . "</textarea><br><br>\n";   
		?>
	  </div>	</td>
	<td width="15%" align="center" valign="middle"><div class="st1" id="err2"></div></td>
  </tr>
  
  <tr>
    <td align="right"><span class="style3">Trạng thái:</span></td>
    <td width="20%" align="left">
		<select class="tableboxinput" name="LeadStatus" id="LeadStatus" style="width:50px">
		  <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
      </select>	</td>
    <td width="10%" align="right"><input class="buttonbutton" type="button" value="Upload ảnh nội dung" onclick="window.open('../upload/upload.php');"/></td>
    <td width="50%" colspan="2" align="center">
		<input  class="tableboxinput" name="LeadImage" type="text" id="LeadImage" value="<?=$anh?>" size="40" onclick="window.open('upload.php?Thumuc=../leadingpicture&form=frmleadadd&input=LeadImage&anh=LeadImage','upload','width=400,height=200');"/>
      <input class="buttonbutton" name="upload" type="button" id="upload" value="Upload ảnh" onclick="window.open('upload.php?Thumuc=../leadingpicture&form=frmleadadd&input=LeadImage&anh=LeadImage','upload','width=400,height=200');"/>	</td>
  </tr>
  <tr>
    <td colspan="5" align="center">
	<br />
			<input class="buttonbutton" type="submit" name="submit" value="Thêm mới" onClick="return checkadd();" />
		&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="reset" name="reset" value="Thao tác lại" />
		&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="button" name="button" value="Quay lại danh sách" onclick="window.location='admin.php?go=leading_list&lstatus=2'" />	</td>
  </tr>
</table>
<br /><br />
</form>

<?
		//Lấy dữ liệu trên form
		$action=$_REQUEST['action'];
		
		$leadtitle = $_REQUEST['LeadTitle'];
		$LeadNote = $_REQUEST['LeadNote'];
		$leadcontent = $_REQUEST['LeadContent'];
		$leadstatus = $_REQUEST['LeadStatus'];
		$anh = $_REQUEST['LeadImage'];
	if($action == 'add'){
			if($leadcontent!=""){
		//Tạo truy vấn thêm
		$sql_lead = "insert into leadings(LeadName,LeadNote,LeadContent,LeadImage,LeadStatus) 
					values('$leadtitle','$LeadNote','$leadcontent','$anh','$leadstatus')";
					}else{
					echo("<script>alert('Bạn chưa nhập nội dung tin !');</script>");			}
		
		
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sql_lead))
		{
			echo("<script>alert('Thêm mới thành công !');</script>");
			echo("<script>window.location='admin.php?go=leading_list&lstatus=2';</script>");
		}
	}
?>
