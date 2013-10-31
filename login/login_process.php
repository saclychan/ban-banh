<?php
	$CusUser=$_REQUEST['CusUser'];
	$Pass=$_REQUEST['CusPass'];
	$CusPass=md5($Pass);
	$sql="Select * from customer where CusUser='".$CusUser."' and CusPass='".$CusPass."'";
	$rs=mysql_query($sql,$cnn);
	$res=mysql_fetch_array($rs);
	$flag=false;
	$row=mysql_num_rows($rs);
	if($row>0)
	{
	session_register("CusUser");
	
		echo $row;
		$_SESSION["flag"] 		= "true";
		$_SESSION["CusUser"] 	=$_REQUEST["CusUser"];
		$_SESSION['CusID']=$res['CusID'];
		$flag=true;
	}
	if($flag)
	{
		Redirect('index.php?go=login_success');
	}
	else
	{	
		echo("<script>alert('Đăng nhập thực hiện không thành công !')</script>");
		Redirect('index.php?go=login_1');
	}	
?>
