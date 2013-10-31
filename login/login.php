<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<form action="index.php?go=login_process" method="post" name="frmlogin" id="frmlogin">
<div id="login-logout1">
	<ul>
		<li>
			<div class="inputBox" id="usernameBox">
				<input  id="CusUser"  name="CusUser" type="text" style="display: inline;" tabindex="102" onfocus="if(this.value=='user name') this.value='';" onblur="if(this.value=='') this.value='user name'" value="user name" alt="user name" name="username"/>
			</div>
		</li>
		<li>
			<div class="inputBox" id="passwordBox">
				<input id="CusPass"  name="CusPass" type="password" style="display: inline;" tabindex="102" onfocus="if(this.value=='password') this.value='';" onblur="if(this.value=='') this.value='password'" value="password" alt="password" name="password"/>
			</div>
		</li>
		<div id="loginButton">
			<input type="image" src="images/Loginbutton.png" onClick="location.href='index.php?go=login_process'" />
		</div>
		
	</ul>
</div>
</form>

