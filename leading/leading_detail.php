<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$leadid=$_REQUEST['lid'];
	$sql=mysql_query("select * from leadings where LeadID = " . $leadid . "",$cnn);
	$row=mysql_fetch_array($sql)
?>
<div class="defaul-new-content">
	<div class="title-account-lead"><span>BÍ QUYẾT LÀM BÁNH</span></div>
	<div class="content-defaul-new-products-lead">
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
			  
			</table>
			<div class="pagecontentcontent">
			<table width="94%" border="0" align="center" cellpadding="5" cellspacing="0">
			  <tr>
				<td colspan="2" align="center"><br /><span style="color:#ca1f6e; font-size:20px; font-weight:bold;"><? echo($row['LeadName']);?></span></td>
			  </tr>
			  <tr>
				<td colspan="2">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="2"><? echo($row['LeadContent']);?></td>
			  </tr>
			</table><br /><br />
			</div>
			<div id="iconpageonline">
			<table width="50%" border="0" align="right" cellpadding="0" cellspacing="0">
			  <tr>
				<td align="right">
						<div class="linkpage" id="facebooklink"><a href="http://facebook.com"></a></div>
						<div class="linkpage" id="twisterlink"><a href="http://twitter.com"></a></div>	
						<div class="linkpage" id="zinglink"><a href="http://me.zing.vn"></a></div>
						<div class="linkpage" id="maillink"><a href="http://gmail.com"></a></div>
						<div class="linkpage" id="googlelink"><a href="http://google.com/bookmarks"></a></div>
						<div class="linkpage" id="linkhaylink"><a href="http://linkhay.com"></a></div>	
				</td>
			  </tr>
			</table>	
			</div>
			<table width="200" border="0" cellpadding="5" cellspacing="0">
			  <tr>
				<td>&nbsp;<br />&nbsp;</td>
			  </tr>
			</table>
			
	</div>
	<div class="bottom-default-lead"></div>
</div>	

