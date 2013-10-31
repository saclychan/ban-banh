<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script>
	function checkaddproduct()
	{
		//Ten san pham
		if(document.frmproductadd.ProName.value=="")
			{
			document.getElementById('err1').innerHTML="Nhập tên sản phẩm!";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProName.focus();
			return false;
			}
		//Nhom san pham
		if(document.frmproductadd.CateID.value==0)
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="Chọn nhóm sản phẩm!";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.CateID.focus();
			return false;
			}
		//Thong tin	
		if(document.frmproductadd.ProDesc.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="Nhập thông tin";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProDesc.focus();
			return false;
			}
		//so luong
		re_pqty=/^[0-9]+$/;
		if(!re_pqty.test(document.frmproductadd.ProQty.value) || document.frmproductadd.ProQty.value<0)
		{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="Nhập số lượng";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProQty.select();
		return false;
		}
		//ngay san xuat
		if(document.frmproductadd.ProDate.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="Nhập ngày sản xuất";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProDate.focus();
			return false;
			}
		
		//gia banh
		re_pprice=/^[0-9]+$/;
		if(document.frmproductadd.ProPrice.value=="" ||!re_pprice.test(document.frmproductadd.ProPrice.value))
		{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="Nhập giá";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProPrice.select();
		return false;
		}	
		//Han dung
		if(document.frmproductadd.ProWarranty.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="Nhập hạn dùng";
			document.getElementById('err6').innerHTML="";
			document.frmproductadd.ProWarranty.focus();
			return false;
			}
		//Anh san pham
		if(document.frmproductadd.ProImage.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="Upload ảnh";
			document.frmproductadd.ProImage.focus();
			return false;
			}
		else return true;
	}
</script>

<?
		//Lấy dữ liệu trên form
		$ProName = $_REQUEST['ProName'];
		$CateID=$_REQUEST['CateID'];
		$ProDesc = $_REQUEST['ProDesc'];
		$ProQty = $_REQUEST['ProQty'];
		$ProPrice = $_REQUEST['ProPrice'];
		$ProDate=$_REQUEST['ProDate'];
		$ProStatus = $_REQUEST['ProStatus'];
		$ProWarranty= $_REQUEST['ProWarranty'];
		$ProImage = $_REQUEST['ProImage'];
	if($_REQUEST['action'] == 'add'){
		//Tạo truy vấn thêm
		$sql_product = "insert into product(ProName,ProDesc,ProDate,ProQty,ProPrice,ProImage,ProWarranty,ProStatus,CateID) 															values('$ProName','$ProDesc','$ProDate','$ProQty','$ProPrice','$ProImage','$ProWarranty','$ProStatus','$CateID')";
		$ProID = mysql_insert_id();
		//Thực thi câu lệnh truy vấn thêm
		if(mysql_query($sql_product))
		{
			echo("<script>alert('Thêm sản phẩm mới thành công !');</script>");
			echo("<script>window.location='admin.php?go=product_list'</script>");
		}
	}
?>
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
<p class="style1" align="center">THÊM MỚI SẢN PHẨM</p>
<br>
<form enctype="multipart/form-data" action="admin.php?go=product_add&action=add" method="post" id="frmproductadd" name="frmproductadd">
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="20%" align="right"><span class="style3">Tên sản phẩm: </span></td>
    <td width="32%">
	  <input class="tableboxinput" name="ProName" type="text" id="ProName" size="40"  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" />	</td>
    <td width="18%"><div class="st1" id="err1"></div></td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Nhóm sản phẩm: </span></td>
    <td width="32%">
		<select class="tableboxinput" name="CateID" id="CateID" style="width:140px">
		  <option value="0" selected="selected">Nhóm sản phẩm  &nbsp;&nbsp;</option>
		  <?
					$sqlCate="Select * From category where CateStatus=1";
					$ResultCate=mysql_query($sqlCate);
					while($rowCate=mysql_fetch_array($ResultCate))
					{
				?>
		  <option value="<? echo($rowCate['CateID']);?>"> <? echo($rowCate['CateName']);?> </option>
				<?
				}
				?>
	  </select>	</td>
  
		  <td width="18%"><div  class="st1" id="err2"></div></td>
		  <td width="30%" rowspan="3" align="left" valign="middle">
		    <table>
			<tr>
	 	   		<td><div align="center"><strong>Ảnh sản phẩm </strong></div></td>
	 		</tr>
		 	<tr>
				<td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200" name="ProImage" id="ProImage" src="../pic-product/<?=$anh?>" alt=""/></td>
			</tr>
      </table></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Thông tin: </span></td>
    <td width="32%">		
	  <textarea class="tableboxtextarea" name="ProDesc" cols="33" rows="10" id="ProDesc" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"></textarea></td>
    <td width="18%"><div  class="st1" id="err3"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Số lượng: </span></td>
    <td width="32%">
	<input class="tableboxinput" name="ProQty" type="text" id="ProQty" style="width:30px" size="10" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
	&nbsp;&nbsp;<span class="style3">Ngày sản xuất:</span>
	<input class="tableboxinput" name="ProDate" type="text" id="ProDate" size="8" maxlength="12" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" onclick="popUpCalendar(this,document.forms.frmproductadd.ProDate, 'yyyy-mm-dd', -100)" readonly="true"/>
	<img src="images/calendar.jpg" onclick="popUpCalendar(this,document.forms.frmproductadd.ProDate, 'yyyy-mm-dd', -100)"/>	</td>
    <td width="18%"><div  class="st1" id="err4"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Giá: </span></td>
    <td width="32%">
		<input class="tableboxinput" name="ProPrice" type="text" style="width:50px" id="ProPrice" size="10" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
		(VND) &nbsp;&nbsp;&nbsp;	
		<span class="style3">Hạn dùng:</span>
		<input class="tableboxinput" name="ProWarranty" type="text" id="ProWarranty" style="width:30px" size="10" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
	  (Ngày)	</td>
    <td width="18%"><div  class="st1" id="err5"></div></td>
    <td width="30%" align="left">
		<div align="center"><input class="tableboxinput" name="ProImage" id="ProImage" type="text" size="20" onclick="window.open('upload.php?Thumuc=../pic-product&form=frmproductadd&input=ProImage&anh=ProImage','','width=400,height=200');"/>
    <input class="buttonbutton" name="upload" type="button" id="upload" value="Upload Ảnh" onclick="window.open('upload.php?Thumuc=../pic-product&form=frmproductadd&input=ProImage&anh=ProImage','','width=400,height=200');"/>
      </div>	</td>
  </tr>
  <tr>
    <td align="right"><span class="style3">Trạng thái:</span></td>
    <td width="50%" colspan="2" align="left">
		<select class="tableboxinput" name="ProStatus" id="ProStatus" style="width:50px">
            <option value="1" selected="selected">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>	</td>
    <td width="30%" align="center"><div  class="st1" id="err6"></div></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input class="buttonbutton" type="submit" name="submit" value="Hoàn tất" onClick="return checkaddproduct();" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="reset" name="reset" value="Thao tác lại" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="button" name="button" value="Trở lại danh sách sản phẩm" onclick="window.location='admin.php?go=product_list'" /></td>
  </tr>
</table>
<br /><br />
</form>
