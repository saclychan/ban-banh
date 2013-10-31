<?
	session_start();
	require("connectdb.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	$UserAd=$_SESSION["UserAd"];
  
	if($UserAd=='')
	{
		redirect('log/login.php');
	}

	$slLevel = "SELECT LevelAD FROM admin WHERE UserAD = '".$UserAd."'";
	$row_slLevel=mysql_fetch_array(mysql_query($slLevel));
	$level = $row_slLevel['LevelAD'];
	
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="styleadmin.css" />
	
	<script src="JavaScript/PopCalendar.js"></script>
	<script type="text/javascript" src="JavaScript/ckeditor/ckeditor.js" ></script>
</head>

<body>
	<?php
		if($level == 1){
			require("AdminFunction.php");
		}else{
			require("AdminSubFunction.php");
		}
	?>
</body>
</html>
