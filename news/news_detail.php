<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
	$newsid=$_REQUEST['nid'];
	$sql=mysql_query("select * from news where NewsId = " . $newsid . "",$cnn);
	$row=mysql_fetch_array($sql)
?>
<div class="defaul-new-content">
	<div class="title-news"></div>
	<div class="content-news">

		<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
			
		</table>
		<div >
		<table width="94%" border="0" align="center" cellpadding="5" cellspacing="0">
		  <tr>
			<td colspan="2" align="right" style="color:#999999; font-size:11px;"><strong>Ngày đăng tin:</strong> <em><? echo($row['NewsDate']);?></em></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center"><span style="font-size:30px; font-weight:bold;"><? echo($row['NewsTitle']);?></span></td>
	      </tr>
		  <tr>
			<td colspan="2">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="2"><? echo($row['NewsContent']);?></td>
		  </tr>
		  <tr>
			<td>
				<br /><br />			</td>
		  </tr>
		</table>
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
			<td>&nbsp;<br /><br /></td>
		  </tr>
		</table>
			
	</div>
	<div class="bottom-default"></div>
</div>	

