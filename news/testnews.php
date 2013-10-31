<?php
require("../connectdb.php");	
?>

<script type="text/javascript" src="scroll_image.js"></script>
<script type="text/javascript" src="tooltip.js"></script>

<div id="tooltip" class="tooltip" ></div>
<script type="text/javascript">
	var ie = document.all ? true : false;
	var offset = 20;
	var tooltip = document.getElementById('tooltip');
	var n=0;
	var pausecontent = new Array();
	function scrollimage(txt){
		//alert(txt);
		pausecontent[n]= txt; 
		n += 1;
	}
</script>


<?php
$sql_bookimg="Select * from news order by NewsId desc 0,20";
$res=mysql_query($sql_bookimg,$cnn);
$result = array();
while($img=mysql_fetch_array($res))
{
	$cid = '<div class= "photoScrollerItem "><img src=" images/<?php echo $img["NewsImage"]; ?>" ></div>';
	
?>
	<script>scrollimage("<? echo ($cid)?>")</script>
<?
	}
?>

<table width="200" border="1">
  <tr>
    <td>
		<div style="height:300px; width:300px">
		<script>
			var photoScroller = new pausescroller(pausecontent, "photoScrollerDiv", "photoScroller", 3000);
		</script>
		</div>
	
	</td>
  </tr>
</table>
