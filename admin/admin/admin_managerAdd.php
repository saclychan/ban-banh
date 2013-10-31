<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styleadmin.css" type="text/css" />

<script>
	function checkadd()
	{
		//Ten san pham
		if(document.frmadd.UserAdmin.value=="")
			{
			document.getElementById('err1').innerHTML="Nhập tài khoản!";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.frmadd.UserAdmin.focus();
			return false;
			}
		//Nhom san pham
		if(document.frmadd.PassAd.value==0)
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="Nhập mật khẩu!";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.frmadd.PassAd.focus();
			return false;
			}
		//Thong tin	
		if(document.frmadd.NameAd.value=="")
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="Nhập tên chủ tài khoản";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="";
			document.frmadd.NameAd.focus();
			return false;
			}
			
		//so dien thoai
		var str=document.frmadd.PhoneAd.value;
		var re1=/^(0|84)(9[0-8])|(120|121|122|123|124|165|167|168|169)[0-9]{7}$/i;
		var re2=/^(0|84)(120|121|122|123|124|165|167|168|169)[0-9]{7}$/i;
		if(!re1.test(str)&!re1.test(str))
		{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="Nhập số điện thoại";
			document.getElementById('err5').innerHTML="";
			document.frmadd.PhoneAd.focus();
		return false;
		}
		
		//email
			var stremail=document.frmadd.EmailAd.value;
			var reemail=(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			if(!reemail.test(stremail))	
			{
			document.getElementById('err1').innerHTML="";
			document.getElementById('err2').innerHTML="";
			document.getElementById('err3').innerHTML="";
			document.getElementById('err4').innerHTML="";
			document.getElementById('err5').innerHTML="Nhập email";
			document.frmadd.EmailAd.focus();
			return false;
			}
		
		//chuc nang
		
		else return true;
	}
</script>


<?
		//Lấy dữ liệu trên form		
	if($_REQUEST['action'] == "add")
	{
		$UserAdmin=$_REQUEST['UserAdmin'];
		$PassAd = md5($_REQUEST['PassAd']);
		$NameAd = $_REQUEST['NameAd'];
		$PhoneAd = $_REQUEST['PhoneAd'];
		$EmailAd=$_REQUEST['EmailAd'];
		$StatusAd = $_REQUEST['StatusAd'];
		
		$FunctionID= $_REQUEST['FunctionID'];
			
		//Tạo truy vấn thêm
		$sqladmin = "insert into admin(LevelAD,UserAd,PassAd,NameAd,PhoneAd,EmailAd,StatusAd) 															values(2,'$UserAdmin','$PassAd','$NameAd','$PhoneAd','$EmailAd','$StatusAd')";
		
		if(mysql_query($sqladmin)){
			$sqlselectID="SELECT IDAd FROM admin WHERE UserAd = '".$UserAdmin."'";
			$row_selectID=mysql_fetch_array(mysql_query($sqlselectID));
			$selectIDAdmin = $row_selectID['IDAd'];	
			
			if(mysql_query($sqlselectID)){
				$sqladmin2 = "insert into adminfunction(IDAd,FID) values('$selectIDAdmin','$FunctionID')";
				
				if(mysql_query($sqladmin2))
				{
					echo("<script>alert('Thêm tài khoản thành công !');</script>");
					echo("<script>window.location='admin.php?go=admin_manager'</script>");
				}	
			}		
		}

	}
?>

<p class="style1" align="center">THÊM MỚI TÀI KHOẢN QUẢN TRỊ </p>
<br>
<form  action="admin.php?go=admin_managerAdd&action=add" method="post" id="frmadd" name="frmadd">
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="35%" align="right"><span class="style3">Tài khoản: </span></td>
    <td width="35%">
	  <input class="tableboxinput" name="UserAdmin" type="text" id="UserAdmin" size="40"  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" />	</td>
    <td width="30%"><div class="st1" id="err1"></div></td>
    </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Mật khẩu </span></td>
    <td width="35%"><input class="tableboxinput" name="PassAd" type="password" id="PassAd" size="40"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="30%"><div class="st1" id="err2"></div></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Tên chủ tài khoản: </span></td>
    <td width="35%"><input class="tableboxinput" name="NameAd" type="text" id="NameAd" size="40"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="30%"><div class="st1" id="err3"></div></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Số Điện Thoại: </span></td>
    <td width="35%"><input class="tableboxinput" name="PhoneAd" type="text" id="PhoneAd" size="40"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="30%"><div class="st1" id="err4"></div></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Email: </span></td>
    <td width="35%"><input class="tableboxinput" name="EmailAd" type="text" id="EmailAd" size="40"  onfocus="style.backgroundColor='#F0F0F0'" onblur="style.backgroundColor='white'" /></td>
    <td width="30%"><div class="st1" id="err5"></div></td>
  </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Quản lý chức năng: </span></td>
    <td width="35%">
		<select name="FunctionID" id="FunctionID" style="width:140px">
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
	  </select>	</td>
  
		  <td width="30%"><div  class="st1" id="err6"></div></td>
    </tr>
  <tr>
    <td width="35%" align="right"><span class="style3">Trạng thái:</span></td>
    <td width="35%" align="left">
		<select name="StatusAd" id="StatusAd" style="width:50px">
            <option value="1" selected="selected">Sử dụng</option>
            <option value="0">Khóa</option>
        </select>	</td>
    <td width="30%" align="left">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" align="center"><input class="buttonbutton" type="submit" name="submit" value="Hoàn tất"  onClick="return checkadd();" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="reset" name="reset" value="Thao tác lại" />
&nbsp;&nbsp;&nbsp;
<input class="buttonbutton" type="button" name="button" value="Trở lại danh sách" onclick="window.location='admin.php?go=admin_manager'" /></td>
  </tr>
</table>
<br /><br />
</form>
