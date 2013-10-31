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
function Redirect($url)
{
?>
<script type="text/javascript">
window.location = "<?=$url?>";
</script>
<?
}
?>

