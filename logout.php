<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form action="index.php?go=logout" method="post" name="frmlogout" id="frmlogout" >
<div id="login-logout2">
	<div id="welcomecustomer">
		<ul>
			<!--<li><span id="tiltec">Xin chào:</span></li>-->
			<li><span id="informationc"><a href="index.php?go=account">&nbsp;<? echo $_SESSION['CusUser'];?></a></span></li> <!--Link đến tài khoản-->
			<li><span id="control"><a href="index.php?go=control_customer">&nbsp;Bảng điều khiển</a></span></li> <!--Link đến những trang có comment-->
		</ul>
		
	</div>
	<div id="logoutButton">
		<input type="image" src="images/Logoutbutton.png" onclick="location.href='index.php?go=logout'" />
	</div>
</div>
</form>
