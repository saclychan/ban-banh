<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#linkmenucategory{
	display: block;
	height:28px;
	width:110px;
	margin:4px 6px;
}
#leftMain-menubar-content tr{
	color: #000000;
	font-size:16px;
	background:url(images/leftmenu.png) left bottom no-repeat;
	font-weight:600;
	cursor:pointer;
}
#leftMain-menubar-content tr:hover{
	font-size:20px;
	//color: #FFFFFF;
	background:url(images/leftmenu.png) left top no-repeat;
	font-weight:600;
}
#linkpromotionlist{
	display:block;
	height:35px;
	width:130px;
	position:absolute;
	margin:5px 50px;
}
</style>

<?
	$sqlCate="SELECT * FROM category WHERE CateStatus=1 order by CateName";
	$ResultCate=mysql_query($sqlCate);
?>

<div id="leftMain-menubar">
	<div id="leftMain-menubar-top">
		<a id="linkmenucategory" href="index.php?go=product&cid=-1&page=1"></a>
	</div>
	<div id="leftMain-menubar-content">
		<div id="leftMain-menubar-content-menu">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				   <?
					while($rowCate=mysql_fetch_array($ResultCate))
					{
				  ?>
					  <tr height="50px" onclick="location.href='index.php?go=product&cid=<? echo $rowCate['CateID']; ?>&page=1'">
						<td align="center">
							<?
									echo $rowCate['CateName'];
								?>				</td>
					  </tr>
				  <?
				  }
				  ?>
			  </table>
	  </div>
	</div>	
	<div id="leftMain-menubar-bottom"></div>		
</div>
<div id="leftMain-area">
	<div id="leftMain-area-top" onclick="location.href='index.php?go=promotion_list'"></div>			
	<div id="rightMain-center-content"><br />
		<?
			$sql="SELECT * FROM promotion WHERE PromoStatus=1 order by PromoID desc limit 0,5";
			$res=mysql_query($sql);
			while($rows=mysql_fetch_array($res))
			{	
		?>
					<div class="box-lead-right">
						<div class="a-img" onclick="location.href='index.php?go=promotion_detail&pid=<? echo $rows['PromoID']?>'"><img width="60" height="50" src="promotionpicture/<? echo $rows['PromoIcon']; ?>"/></div>
						<div class="a-link" onclick="location.href='index.php?go=promotion_detail&pid=<? echo $rows['PromoID']?>'"><? echo $rows['PromoTitle']; ?></div>
					</div>
						<span>-------------------------------</span>
		<?
		}
		?>	
	</div>
	<div id="leftMain-area-bottom"></div>
</div>