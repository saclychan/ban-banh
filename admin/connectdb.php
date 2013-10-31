<?
	$cnn = mysql_connect("localhost","root","");
	/*if(!$cnn){
		die("Could not connect: ". mysql_error());
	}else{*/
		mysql_select_db("bakeryshop",$cnn);
		mysql_query("SET NAMES 'UTF8'",$cnn);
	//}
	//session_start();
	function redirect($url){
		echo('<script type="text/javascript">location.href = "'. $url . '";</script>');
		}
?>
