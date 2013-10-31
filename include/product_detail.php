<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$proid=$_REQUEST['pid'];
	$sqlpro=mysql_query("SELECT * FROM product,category WHERE product.CateID=category.CateID and ProID=".$proid.""); //tao truy van chon du lieu tu bang
	$row=mysql_fetch_array($sqlpro);  //Duyet tung dong va hien thi ben duoi
?>

<div class="defaul-new-content">
	<div class="title-account"><span><? echo($row['ProName']);?></span></div>
	<div class="content-defaul-new-product"><br /><br />
<table width="96%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="55%" align="center">
		<img style="border:1px solid #909090; padding:2px 2px;" src="pic-product/<? echo $row['ProImage'] ?>" />    </td>
    <td width="45%" valign="top">
		<span style="color:#ca1f6e; font-size:16px; font-weight:bold;"><? echo($row['ProName']);?></span><br />
		<br />
		Loại bánh: <em><? echo($row['CateName']);?></em>	<br /><br />
      Giá: <span style="color:#ca1f6e; font-size:16px; font-weight:bold;"> <? echo number_format(($row['ProPrice']) , 0, '.', ' ');?></span>&nbsp;VND<br /><br /> 
      Tình trạng: 
	    <?
			if($row['ProStatus']==1){
			echo("Còn hàng");
			}else{
			echo("Hết hàng");
			}
		?><br /><br />
   	<div class="muahang"><a href="index.php?go=shoppingcart&action=add&pid=<? echo $row['ProID']; ?>"></a></div>
	</td>
  </tr>
  
  <tr>
    <td colspan="2"><br /><span class="titlecommenttitle">Thông tin sản phẩm:</span></td>
  </tr>
  <tr>
    <td colspan="2" ><? echo($row['ProDesc']);?></td>
  </tr>
    <?php
		$record_per_page = 5;
		$pagenum = $_GET["page"];	
		$proid=$_REQUEST['pid']; //lay ma loai tu URL
		
		$page = "index.php?go=product_detail&pid=".$proid;
		$sql = "select * from comment,customer where ProID = '".$proid."'and comment.CusID= customer.CusID";
		$res = mysql_query($sql,$cnn);
		$num_res=mysql_num_rows($res);
		
		$totalpage =ceil($num_res/ $record_per_page);
		if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
			$pagenum = 1;
		} 
		if($pagenum == 1){
			$from = 0;
		}else{
			$from = ($pagenum-1)*$record_per_page;
		}
		$sql =$sql." LIMIT ".$from.",".$record_per_page;
		$res = mysql_query($sql,$cnn);
	?>
</table>


<br /><br /><hr /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="titlecommenttitle"><? echo $num_res; ?> Bình luận</span><br /><br />
<?
	if($num_res >= 1)
	{
?>
<table width="96%" border="0" align="center" cellpadding="5" cellspacing="0">
	<?
		$i=0;
		while($rows = mysql_fetch_array($res))
		{	
		$i++;
	?>
  <tr>
    <td width="15%" align="left" valign="top"><img class="tablebox" name="CusImage" id="CusImage" height="80" width="80" src="customer-avartar/<? echo $rows['CusImage'] ?>"/></td>
    <td width="81%" valign="top">
		<div class="tableboxcomment" >
		
<table width="100%" border="0" cellpadding="0" cellspacing="10">
  <tr>
    <td><?php echo $rows['Content'];?></td>
  </tr>
  <tr>
    <td align="right">
			<span class="usercommentstyle">
				<?php echo $rows['CusUser'];?>			</span>&nbsp;
			<span class="datecommentstyle">
				(&nbsp;<?php echo $rows ['DateSend']?>&nbsp;)			</span>	</td>
  </tr>
</table>
		</div>
	</td>
  </tr>
  <tr>
  	<td></td>
  </tr>
  <?php
  	}
  ?>
</table>
<table width="96%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr  style="font-size:12px; font-weight:bold">
    <td align="center">
			<?
				/*
				Vong lap de tao ra cac link lien ket den cac trang du lieu.
				Output: 	1 | 2 | 3 | 4 
				*/
				for($i =1; $i<=$totalpage;$i++)
				{
					if ($i==1){
						echo "<a href='".$page."&page=".$i."' >".$i."</a>"	;	
					}else{
					if($pagenum==$i)			
						echo " | <a href='".$page."&page=".$i."'><B><font color=red><u>".$i."</u></font></B></a>";
					else
						echo " | <a href='".$page."&page=".$i."'>".$i."</a>";
					}
				}
				echo("<font color=red>  &nbsp; &nbsp;(Page: &nbsp; ".$pagenum."&nbsp;/&nbsp;".$totalpage.")");
			?>
	</td>
  </tr>
</table><hr /><br /><br />
<?
	}
  	else
	{
		echo "<br/>";  
  	}
?>



<?php
	if($_SESSION['CusID']!='')
	{
?>
<form name="post" method="post" action="index.php?go=comment&pid=<? echo $row['ProID']; ?>" onSubmit=" return checkEmpty(this);"> 
<TABLE width="96%" align="center" cellPadding=0 cellSpacing=0>

<tr >
      <td><label>Viết bình luận mới: </label></td>
      <td width="10%" rowspan="2" valign="bottom"><span class="row1" style="border-left: 0px">
        <input name="Submit" type="submit"  value="Gửi bình luận" /><br /><br />
      </span><span class="row1" style="border-left: 0px"><span class="row1" style="border-left: 0px">
    <input name="Reset"  type="reset" value="Xóa" />
  </span></span></td>
</tr>
<tr >
  <td><textarea class="tablecus-comment" name="Content" cols="50" rows="4" id="Content"></textarea></td>
  </tr>
  </table><br /><br />
</form>
<script>
function removespace(str)
	{
		var re1 = /^\s+/;
		var re2=/\s+$/;
		str = str.replace (re1,"");
		str= str.replace(re2,"");
		return str;
	}
	
function checkEmpty(str)
	{	
		str = document.getElementById('Content').value;
		str = removespace(str)
		str =  splitByLength(str,50);
		if(str.length==0)
		{
			alert("Nội dung nhập không được để rỗng");
			return false;
		}
		else
		{
			return true; 
		}
	}

</script>
<?php
	}else{ echo '';}
?>
<br /><br />
	</div>
	<div class="bottom-default"></div>
</div>	



 