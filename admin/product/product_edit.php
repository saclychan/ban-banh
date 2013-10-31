<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script>
	function checkeditproduct()
	{
		//Ten san pham
		if(document.frmproductedit.ProNameid.value=="")
			{
			document.getElementById('err1').innerHTML="Nhập tên sản phẩm!";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProNameid.focus();
			return false;
			}
		//Nhom san pham
		if(document.frmproductedit.CateIDid.value==0)
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="Chọn nhóm sản phẩm!";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.CateIDid.focus();
			return false;
			}
		//Thong tin	
		if(document.frmproductedit.ProDescid.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="Nhập thông tin";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProDescid.focus();
			return false;
			}
		//so luong
		re_pqty=/^[0-9]+$/;
		if(!re_pqty.test(document.frmproductedit.ProQtyid.value) || document.frmproductedit.ProQtyid.value<0)
		{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="Nhập số lượng";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProQtyid.focus();
		return false;
		}
		//ngay san xuat
		if(document.frmproductedit.ProDateid.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="Nhập ngày sản xuất";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProDateid.focus();
			return false;
			}
		
		//gia banh
		re_pprice=/^[0-9]+$/;
		if(document.frmproductedit.ProPriceid.value=="" ||!re_pprice.test(document.frmproductedit.ProPriceid.value))
		{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="Nhập giá";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProPriceid.focus();
		return false;
		}	
		//Han dung
		if(document.frmproductedit.ProWarrantyid.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="Nhập hạn dùng";
			document.getElementById('err6').innerHTML="";
			document.frmproductedit.ProWarrantyid.focus();
			return false;
			}
		//Anh san pham
		if(document.frmproductedit.txtanh.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.getElementById('err6').innerHTML="Upload ảnh";
			document.frmproductedit.txtanh.focus();
			return false;
			}
		else return true;
	}
</script>


<?
		//Lấy dữ liệu trên form
		$action=$_REQUEST['action'];
		$productid=$_REQUEST['pid'];
		
		$ProName = $_REQUEST['ProNameid'];
		$CateID=$_REQUEST['CateIDid'];
		$ProDesc = $_REQUEST['ProDescid'];
		$ProQty = $_REQUEST['ProQtyid'];
		$ProPrice = $_REQUEST['ProPriceid'];
		$ProDate=$_REQUEST['ProDateid'];
		$ProStatus = $_REQUEST['ProStatusid'];
		$ProWarranty= $_REQUEST['ProWarrantyid'];
		$anh = $_REQUEST['txtanh'];
	if($action == 'update'){
		//Tạo truy vấn sửa
		$sql_update = ("UPDATE `bakeryshop`.`product` SET `ProName`='$ProName',
														`ProDesc`='$ProDesc',
														`ProDate`='$ProDate',
														`ProQty`='$ProQty',
														`ProPrice`='$ProPrice',
														`ProImage`='$anh',
														`ProWarranty`='$ProWarranty',
														`ProStatus`='$ProStatus',
														`CateID`='$CateID'
						 WHERE `ProID` = " . $productid . "");
		
		//Thực thi câu lệnh truy vấn sửa
		if(mysql_query($sql_update))
		{
			echo("<script>alert('Sửa thông tin sản phẩm thành công !');</script>");
			echo("<script>window.location='admin.php?go=product_detail&action=detail&pid=$productid'</script>");
		}
	}
?>

<br />
<p class="style1" align="center">SỬA THÔNG TIN SẢN PHẨM</p>
<br />
<form enctype="multipart/form-data" action="admin.php?go=product_edit&action=update&pid=<? echo($pid);?>" method="post" id="frmproductedit" name="frmproductedit" >
<table width="100%" border="0" cellpadding="8" cellspacing="0">
			  <!--Lấy dữ liệu từ trang product_list theo pid-->
				<?
					
					if($action=='edit')
						$sql=mysql_query("select * from product where ProID = " . $productid . "");
				?>
				<?
					while($row=mysql_fetch_array($sql)){
				?>
  <tr>
    <td width="20%" align="right"><span class="style3">Tên sản phẩm mới: </span></td>
    <td width="32%">
	  <input class="tableboxinput" name="ProNameid" type="text" value="<? echo($row['ProName']);?>" id="ProNameid" size="42"  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" />	</td>
    <td width="18%"><div class="st1" id="err1"></div></td>
    <td width="30%" rowspan="5" align="left">
		<table>
			<tr>
	 	   		<td><div align="center"><strong>Ảnh sản phẩm cũ </strong></div></td>
	 		</tr>
		 	<tr>
				<td bgcolor="#68EEF9" width="200" height="200" ><img src="../pic-product/<? echo $row['ProImage'] ?>" height="200" width="200" /></td>
			</tr>
		</table>
		<br />	
		<table>
			<tr>
	 	   		<td><div align="center"><strong>Ảnh sản phẩm mới </strong></div></td>
	 		</tr>
		 	<tr>
				<td bgcolor="#68EEF9" width="200" height="200" ><img width="200" height="200" name="ProImageid" id="ProImageid" src="../pic-product/<?=$anh?>" alt=""/></td>
			</tr>
		</table></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Nhóm sản phẩm mới: </span></td>
    <td width="32%">
		<select class="tableboxinput" name="CateIDid" id="CateIDid" style="width:140px">
		  <option value="0">-- Nhóm sản phẩm --</option>
		  <?
					$sqlCate="Select * From category where CateStatus=1";
					$ResultCate=mysql_query($sqlCate,$cnn);
					while($rowCate=mysql_fetch_array($ResultCate)){
					if($row['CateID'] == $rowCate['CateID'])
					{
				?>
		  <option value="<? echo($rowCate['CateID']);?>" selected="selected"> 
		  		<? echo($rowCate['CateName']);?>		  </option>
				<?
				}else{
				?>
		  <option value="<? echo($rowCate['CateID']);?>"> 
		  		<? echo($rowCate['CateName']);?>		  </option>
		  <?
				}
			}
		  ?>
	  </select>	  </td>
    <td width="18%"><div  class="st1" id="err2"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Thông tin mới: </span></td>
    <td width="32%">		
	  <textarea class="tableboxtextarea" name="ProDescid" cols="33" rows="10" id="ProDescid" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"><? echo($row['ProDesc']);?></textarea>	</td>
    <td width="18%"><div class="st1" id="err3"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Số lượng mới: </span></td>
    <td width="32%">
	<input class="tableboxinput" name="ProQtyid" type="text" id="ProQtyid" style="width:30px" size="10" value="<? echo($row['ProQty']);?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
	<span class="style3">Ngày sản xuất:</span>
	<input class="tableboxinput" name="ProDateid" type="text" id="ProDateid" size="8" maxlength="12" value="<? echo($row['ProDate']);?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" onclick="popUpCalendar(this,document.forms.frmproductedit.ProDateid, 'yyyy-mm-dd', -100)" readonly="true"/>
	<img src="images/calendar.jpg" onclick="popUpCalendar(this,document.forms.frmproductedit.ProDateid, 'yyyy-mm-dd', -100)"/>	</td>
    <td width="18%"><div class="st1" id="err4"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Giá mới: </span></td>
    <td width="32%">
		<input class="tableboxinput" name="ProPriceid" type="text" style="width:50px" id="ProPriceid" size="10" value="<? echo($row['ProPrice']);?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
		(VND)
		<span class="style3">Hạn dùng :</span>
		<input class="tableboxinput" name="ProWarrantyid" type="text" id="ProWarrantyid" style="width:30px" size="10" value="<? echo($row['ProWarranty']);?>" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>
		(Ngày)</td>
    <td width="18%"><div  class="st1" id="err5"></div></td>
  </tr>
  <tr>
    <td width="20%" align="right"><span class="style3">Trạng thái mới:</span></td>
    <td width="32%" align="left">
		<select class="tableboxinput" name="ProStatusid" id="ProStatusid">
				<?
					if($row['ProStatus']==1)
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
    <td width="18%" align="right"><div  class="st1" id="err6"></div></td>
    <td width="30%" align="center">
		<div><input class="tableboxinput" name="txtanh" id="txtanh" type="text" value="<? echo $row['ProImage'] ?>" size="15" onclick="window.open('upload.php?Thumuc=../pic-product&form=frmproductedit&input=txtanh&anh=ProImageid','','width=400,height=200');"/>
    <input class="buttonbutton" name="upload" type="button" id="upload" value="Upload ảnh mới" onclick="window.open('upload.php?Thumuc=../pic-product&form=frmproductedit&input=txtanh&anh=ProImageid','','width=400,height=200');"/>
	    </div>	</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input class="buttonbutton" type="submit" name="submit" value="Hoàn tất" onClick="return checkeditproduct();" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="reset" name="reset" value="Thao tác lại" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="button" name="button" value="Trở lại danh sách sản phẩm" onclick="window.location='admin.php?go=product_list'" /></td>
  </tr>
  <?
  }
  ?>
</table>
<br /><br /><br />
</form>





