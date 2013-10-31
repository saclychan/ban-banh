<? 
	$cnn = mysql_connect("localhost","root","1234567");
	if(!$cnn){
		die("Could not connect: ". mysql_error());
	}else{
		mysql_select_db("bakeryshop",$cnn);
			mysql_query("SET NAMES 'UTF8'",$cnn);
	}	
?>
<?php
$CusUser = $_REQUEST['CusUser'];
$res = mysql_query("SELECT * FROM customer where CusUser='".$CusUser."'",$cnn);
$a=false;
while($row = mysql_fetch_array($res))
{
 		$a = true;
}
if($a) 
{
	echo "Tên đăng nhập đã tồn tại!";
}
?>

