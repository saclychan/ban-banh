<div class="defaul-new-content">
<div style="margin: 1px; background:#053; color:#fff;">
content.php:
<pre style="font-family:Arial">
<? 
echo "Nội dung biến \$_REQUEST:<br>";
print_r($_REQUEST);
echo "<br> Nội dung biến \$_SESSION:<br>";
print_r($_SESSION);
print_r($test);
?>
</pre>
</div>
	<div class="title-account"><span>Mua hàng</span></div>
	<div class="content-defaul-new-product">
		<br /><br /><br /><div align="center" class="stylecl">Cám ơn quý khác đã mua hàng của chúng tôi, <br>
		  chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. <br>
		  Trân trọng cảm ơn </div>
		<div align="center">
		  <p>&nbsp;</p>
		  <p><a href="<? echo($_SESSION['url'])?>">Tiếp tục mua hàng</a> ||| <a href="index.php?go=logout">Kết thúc giao dịch </a></p>
		</div>
		<br /><br /><br /><br /><br /><br />			
	</div>
	<div class="bottom-default"></div>
</div>	


