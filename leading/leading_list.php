<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	$record_per_page = 5;
	$pagenum = $_GET["page"];
	$page = "index.php?go=leading_list";
	$sqlLeading="SELECT * FROM leadings order by LeadID desc";
	$ResultLeading=mysql_query($sqlLeading,$cnn);
	$totalpage =ceil( mysql_num_rows($ResultLeading) / $record_per_page);
	if(!$pagenum || $pagenum <=0 || $pagenum > $totalpage){
		$pagenum = 1;
	} 
	if($pagenum == 1){
		$from = 0;
	}else{
		$from = ($pagenum-1)*$record_per_page;
	}
	$sqlLeading =$sqlLeading." LIMIT ".$from.",".$record_per_page;
	$ResultLeading=mysql_query($sqlLeading,$cnn);
	$self = $page;
?>
	<div class="defaul-new-content">
		<div class="content-defaul-new-product-lead">

				<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				
				</table><br />
				<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
						<?
							while($rowLeading=mysql_fetch_array($ResultLeading))
							{
						  ?>
				  <tr>
					 <td>
						
							<table width="100%" border="0" cellpadding="5" cellspacing="0">
							  <tr>
								<td width="45%" align="center">
									<a class="a-box-leading"  href="index.php?go=leading_detail&lid=<? echo $rowLeading['LeadID']?>">
										<img src="leadingpicture/<? echo $rowLeading['LeadImage'] ?>" width="250" height="160"/>
									</a>
								</td>
								<td width="55%" align="left" valign="top"><br />
									<a href="index.php?go=leading_detail&lid=<? echo $rowLeading['LeadID']?>">
										<span style="color:#ca1f6e; font-size:16px; font-weight:bold;">
											<? echo $rowLeading['LeadName']; ?>
										</span>
									</a>
									<br /><br />
									<span style="color:#000000">
										<? echo $rowLeading['LeadNote']; ?>
									</span>
								</td>
							  </tr>
							  <tr align="center">
								<td colspan="2"><hr style="color:#FFFFFF" width="100%" /></td>
				  			</tr>
						</table>
					</td>
				  </tr>
					  <?
					  }
					  ?>
				  <tr align="center">
					<td colspan="2" style="font-weight:bold">
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
		<div class="bottom-default-lead"></div>
	</div>	

