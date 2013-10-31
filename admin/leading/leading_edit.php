<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script language="javascript">
	function checkedit()
	{
			if(document.frmleadedit.LeadName.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập tiêu đề!";
				document.frmleadedit.LeadName.focus();
				return false;
			}
			/*if(document.frmleadedit.LeadContent.value=="")
			{
				document.getElementById('err1').innerHTML="Nhập nội dung";
				document.frmleadedit.LeadContent.focus();
				return false;
			}*/
			
		else return true;
	}
</script>
<script>
	var xmlhttp;
	

	function showitem(str)
	{
		xmlhttp=GetXmlHttpObject();
		if (xmlhttp==null)
		{
		  alert ("Browser does not support HTTP Request");
		  return;
		}
		var url="product/product_list.php";
		url=url+"?ProID="+str;
		url=url+"&act=del";
		xmlhttp.onreadystatechange=stateChanged;
		xmlhttp.open("POST",url,true);
		xmlhttp.send(null);
	}
	

	function showdiv(){
		document.getElementById('product_add').style.display = 'inline';
	}
	
	function stateChanged()
	{
	if (xmlhttp.readyState==4)
	{
		document.getElementById("product_list").innerHTML=xmlhttp.responseText;
	}
	}
	
function GetXmlHttpObject()
	{
		if (window.XMLHttpRequest)
		  {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  return new XMLHttpRequest();
		  }
		if (window.ActiveXObject)
		  {
		  // code for IE6, IE5
		  return new ActiveXObject("Microsoft.XMLHTTP");
		  }
		return null;
	}
</script>


<?
		//Lấy dữ liệu trên form
		$action=$_REQUEST['action'];
		$LeadID=$_REQUEST['leadid'];
		$LeadName=$_REQUEST['LeadName'];
		$LeadNote=$_REQUEST['LeadNote'];		
		$LeadContent = $_REQUEST['LeadContent'];
		$anh = $_REQUEST['txtanh'];
		$LeadStatus = $_REQUEST['LeadStatus'];
	if($action == 'update'){
		//Tạo truy vấn sửa
		if($LeadContent!=''){
		$sql_update = ("UPDATE `bakeryshop`.`leadings` SET `LeadName`='$LeadName',
														`LeadNote`='$LeadNote',
														`LeadContent`='$LeadContent',
														`LeadImage`='$anh',
														`LeadStatus`='$LeadStatus'
						 WHERE `LeadID` = " . $LeadID . "");
						 }else{
					echo("<script>alert('Bạn chưa nhập nội dung tin !');</script>");
					echo("<script>window.location='admin.php?go=leading_edit&action=edit&leadid=$LeadID'</script>");
					
					}
		
		//Thực thi câu lệnh truy vấn sửa
		if(mysql_query($sql_update))
		{
			echo("<script>alert('Sửa mục thành công !');</script>");
			echo("<script>window.location='admin.php?go=leading_detail&action=detail&leadid=$LeadID'</script>");
		}
	}
?>


<br />
<p class="style1" align="center">SỬA MỤC MẸO VẶT &amp; HƯỚNG DẪN </p>
<br /><br />
		<?  //Lấy dữ liệu từ newslist để hiển thị thông tin cũ
			
			if($action=='edit')
				$sql=mysql_query("select * from leadings where LeadID = " . $LeadID . "");
		?>
		<?
			while($row=mysql_fetch_array($sql)){
		?>
		
		
<form action="admin.php?go=leading_edit&action=update&leadid=<? echo $LeadID;?>" method="post" id="frmleadedit" name="frmleadedit">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="22%" align="right"><span class="style3">Tiêu đề mới: </span></td>
    <td colspan="2"><input class="tableboxinput" name="LeadName" type="text" id="LeadName" value="<? echo($row['LeadName']);?>" size="50"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" />	</td>
    <td colspan="2" rowspan="6" align="left" valign="top" width="29%">
		<table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề cũ </strong></div></td>
			  </tr>
			  <tr>
			   <td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200"  src="../leadingpicture/<? echo $row['LeadImage'] ?>"/></td>
			  </tr>
	  </table><br /><br />
	  <table>
			  <tr>
				<td><div align="center"><strong>Ảnh tiêu đề mới </strong></div></td>
			  </tr>
			  <tr>
			   <td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200" name="Anhtin" id="Anhtin" src="../leadingpicture/<?=$anh?>"/></td>
			  </tr>
	  </table>	  </td>
  </tr>
  <tr>
  <td width="22%" align="right">&nbsp;</td>
	<td colspan="2"><div class="st1" id="err1"></div></td>
	</tr>
  <tr>
    <td align="right"><span class="style3">Tóm tắt nội dung mới: </span></td>
    <td colspan="2"><input class="tableboxinput" name="LeadNote" type="text" id="LeadNote" value="<? echo($row['LeadNote']);?>" size="50"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
  </tr>
  <tr>
    <td width="22%" align="right"><span class="style3">Nội dung mới:</span></td>
    <td colspan="2"><?php
		echo "<textarea class=\"ckeditor\" cols=\"40\" id=\"editor1\" name=LeadContent rows=\"50\">" . $row['LeadContent'] . "</textarea><br><br>\n";   
		?>	</td>
  </tr>
  <tr>
    <td width="22%" align="right"><span class="style3">Trạng thái mới:</span></td>
    <td width="12%">
	<select class="tableboxtextarea" name="LeadStatus" id="LeadStatus" style="width:50px">
		<?
			if($row['LeadStatus']==1)
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
    </select>	</td>
    <td width="37%"><input class="buttonbutton" type="button" value="Upload ảnh nội dung" onclick="window.open('../upload/upload.php');"/></td>
  </tr>
  <tr>
    <td colspan="3" align="right">
		<input class="buttonbutton" name="upload" type="button" id="upload" value="Upload ảnh mới" onclick="window.open('upload.php?Thumuc=../leadingpicture&form=frmleadedit&input=txtanh&anh=Anhtin','upload','width=400,height=200');"/>
	  <input class="tableboxinput" name="txtanh" type="text" id="txtanh" value="<? echo $row['LeadImage']?>" size="50" onclick="window.open('upload.php?Thumuc=../leadingpicture&form=frmleadedit&input=txtanh&anh=Anhtin','upload','width=400,height=200');"/></td>
    </tr>
  
  
  <tr>
    <td colspan="4" align="center">
	<br />
			<input class="buttonbutton" type="submit" name="submit" value="Hoàn thành" onClick="return checkedit();"/>
		&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="reset" name="reset" value="Thao tác lại" />
		&nbsp;&nbsp;&nbsp;
		<input class="buttonbutton" type="button" name="button" value="Quay lại danh sách" onclick="window.location='admin.php?go=leading_list&lstatus=2'" /></td>
  </tr>
  <?
  }
  ?>
</table>
<br /><br />
</form>

