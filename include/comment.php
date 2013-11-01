<?php
	$cnn = mysql_connect("localhost","root","");
	if(!$cnn){
		die("Could not connect: ". mysql_error());
	}else{
		mysql_select_db("bakeryshop",$cnn);
			mysql_query("SET NAMES 'UTF8'",$cnn);
	}	
?>

<?php
		$ProID=$_REQUEST['pid'];
		$Content= $_REQUEST['Content'];	
		

		
	$sql="INSERT INTO comment (CusID, ProID, DateSend, Content) VALUES ('".$_SESSION['CusID']."','".$ProID."',NOW(),'".$Content."')";
		$res = mysql_query($sql,$cnn);
		echo("<script>window.location='index.php?go=product_detail&pid=$ProID  ';</script>");
		
		//'".$CusID."'

?>