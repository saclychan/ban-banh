<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$record_per_page = 5;
	$pagenum = $_GET["page"];
	$page = "index.php?go=news_list";
	$sqlNews="SELECT * FROM news order by Newsid desc";
	$ResultNews=mysql_query($sqlNews,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultNews) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlNews =$sqlNews." LIMIT ".$from.",".$record_per_page;
	$ResultNews=mysql_query($sqlNews,$cnn);
	$self = $page;
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Tin tức</span></div>
	<div class="content-defaul-new-product">
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
				<td  class="tableheadmoz">&nbsp;&nbsp;&nbsp;<a id="asingle" href="index.php?go=news_list"><span class="styletitle">TRANG NHẤT TIN TỨC</span></a></td>
			  </tr>
			</table><br /><br />
			<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
						<?
							while($rowNews=mysql_fetch_array($ResultNews))
							{
						  ?>					  
			  <tr>
				<td width="45%" rowspan="2" align="center" valign="top">	
					<a class="a-box-leading" href="index.php?go=news_detail&nid=<? echo $rowNews['NewsId']?>">
						<img src="newspicture/<? echo $rowNews['NewsImage'] ?>" width="250" height="160"/>					</a>				</td>
				<td width="55%" align="right" valign="top" height="20px">
						<span style="color:#999999; font-size:11px;"><? echo $rowNews['NewsDate']; ?></span>				</td>
			  </tr>
			  <tr>
			    <td align="left" valign="top">
					<a href="index.php?go=news_detail&nid=<? echo $rowNews['NewsId']?>">
						<span style="color:#ca1f6e; font-size:16px; font-weight:bold;">
							<? echo $rowNews['NewsTitle']; ?>					
						</span>
					</a>
					<br />
					<br />
			    	<span style="color:#000000"><? echo $rowNews['NewsNote']; ?></span>					
				</td>
		      </tr>
			  <tr>
				<td colspan="2"><hr /></td>
			  </tr>
			  <?
			  }
			  ?>
			  <tr>
				<td colspan="2" align="center" style="font-weight:bold">
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
								?>	</td>
			  </tr>
	  </table>
			<br /><br /><br />

		
	</div>
	<div class="bottom-default"></div>
</div>	
