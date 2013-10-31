<?php
session_start();
require("connectdb.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bakery shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/PopCalendar.js"></script>
<script type="text/javascript" src="js/kull-scollmenu.js"></script>
</head>


<body>
	<div id="allpage">
		<div id="headerMain">
			<?
				require("header.php");
			?>
		</div><!--End #headerMain-->
		<div id="pageWrap">
			<div id="main">
				<div id="menu">
						<?
							require ("menubar.php");
						?>				
				</div><!--End #menu-->
				<div id="contentMain">
					<div id="leftMain">
						<?
							require ("leftMain.php");
						?>
					</div><!--End #leftMain-->
					
					<div id="centerMain">
						<div id="centerMain-top">
							

						</div>
						<div id="centerMain-content">
							<?
								require("content.php");
							?>
						</div>
					</div>
					<!--End #centerMain-->
					
					<div id="rightMain">
						<?
							require ("rightMain.php");
						?>
					</div><!--End #rigntMain-->
					
				</div><!--End #Main-->

			</div><!--End #contentMain-->
			
			<div id="footer">
				<?
					require ("footer.php");
				?>
			</div><!--End #footer-->
			<div id="footeradd">
			</div>
		</div><!--End #pageWrap-->
	</div><!--End #Allpage-->
</body>
</html>
