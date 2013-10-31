<? 
 session_start();
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminitrastor login</title>

<style type="text/css">
#pagelogin{
	margin: 0 auto;
	width:580px;
	height:560px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:80%;
}
#pagelogin #headermainpagelogin{
	width:580px;
	height:460px;
	background:url(../images/bg.png) no-repeat;
	position:absolute;
}
#pagelogin #footerpagelogin{
	height:100px;
	width:580px;
	margin:460px 0px;
	position:absolute;
}
.inp{
	border: medium none;
	height:17px;
	width:220px;
	position:absolute;
}
#inputusername{
	height:25px;
	width:250px;
	margin:283px 180px;
	position:absolute;
}
#inputpassword{
	height:25px;
	width:250px;
	margin:320px 180px;
	position:absolute;
}
#buttonlogin{
	height:32px;
	width:170px;
	position:absolute;
	margin:320px 450px;
	
}
#alert{
	height:25px;
	width:190px;
	position:absolute;
	margin:275px 430px;
	left: 15px;
	top: 8px;
}
#Layer1 {
	position:absolute;
	left:460px;
	top:379px;
	width:116px;
	height:35px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:168px;
	top:428px;
	width:227px;
	height:37px;
	z-index:2;
}
</style>
</head>
<?php
	require('../connectdb.php');
	if($_REQUEST["login"]==true)
	{
	$useradmin=$_REQUEST['UserAd'];
	$passadmin=md5($_REQUEST['PassAd']);
	$sql = "SELECT UserAd FROM admin where UserAd='".$useradmin."' and PassAd='".$passadmin."' and StatusAd=1";
	//echo($sql);
	$re=mysql_query($sql,$cnn);
	//die();
  	if(mysql_num_rows($re)>=1)
	{
		$_SESSION["UserAd"]=$useradmin;
		 
		//die();
		redirect('../admin.php');		
	}
	else
	{
		$_SESSION["UserAd"]='';
		redirect('login.php?err=loi');
		}
	}
?>


<body>

<div id="pagelogin">
  <div id="headermainpagelogin">
<form ="frmlogin" name="frmlogin" method="post" action="login.php?login=true">
			<div id="inputusername">
				<input class="inp" type="text" id="UserAd" name="UserAd" tabindex="102"  style="display: inline;" size="30" width="200" />
			</div>
			<div id="inputpassword">
				<input class="inp" id="PassAd" name="PassAd" type="password"  style="display: inline;" tabindex="102" />
			</div>
			<div id="buttonlogin">
				<input type="submit" value="Đăng nhập"/>
			
		
	  </div>
		<div id="alert">
			  <?
				  	if($_REQUEST['err']!='')
				{	
			  echo 'Sai tài khoản hoặc mật khẩu'; 
				  	}	?></div>
    </form>
	</div>
			
	<div id="footerpagelogin">
		<table width="100%" border="0" align="center" cellspacing="0">
		  <tr>
			<td colspan="2" align="center"><p>Website bán bánh trực tuyến<br />
				Thiết kế : Nhóm 2 - CĐ Tin5- ĐH BK Hà Nội
			 </td>
		  </tr>
		  <tr>
		  	<td width="18%" style="font-size:14px">&nbsp;</td>
		    <td width="82%" style="font-size:14px; color:#666666">Phone : 0982 269250<br>
Email : duongnguyendesigner@gmail.com</td>
		  </tr>
		</table>

	</div>
</div>
</body>
</html>
