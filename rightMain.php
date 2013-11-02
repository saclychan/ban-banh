<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<div id="rightMain-online">
		<div id="yahoo-online">
			<div id="chat-top"></div>
			<div id="chat-middle">
				<?
					$sqlonline="SELECT * FROM counselors WHERE conStatus=1 order by conID asc";
					$Resultonline=mysql_query($sqlonline);
					while($rowonline=mysql_fetch_array($Resultonline))
					{
				?>		
					<a id="nickyahoo" href="ymsgr:sendim?<? echo $rowonline['conYahoo']; ?>">
						<img border="0" src="http://opi.yahoo.com/yahooonline/u=<? echo $rowonline['conYahoo']; ?>/m=g/t=5/l=us/opi.jpg">
						<? echo $rowonline['conName']; ?>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;Mobile:<strong> <? echo $rowonline['conPhone']; ?></strong></p><br />
					</a>					
				<?
					}
				?>
			</div>
			<div id="chat-bottom"></div>
		</div>
	</div>
	
	
	<div id="rightMain-center">
		<div id="rightMain-center-top" onclick="location.href='index.php?go=news_list'"></div>
		<div id="rightMain-center-content">
				<?
					$sqlNews="SELECT * FROM news WHERE NewsStatus=1 order by NewsId desc limit 0,5";
					$ResultNews=mysql_query($sqlNews,$cnn);
					while($rowNews=mysql_fetch_array($ResultNews))
					{
				?>
					<div class="box-lead-right">
						<!--<div class="a-img" onclick="location.href='index.php?go=news_detail&nid=<!--? echo $rowNews['NewsId']?>'"><img width="60" height="50" src="newspicture/<!--? echo $rowNews['NewsImage'] ?>"/></div-->
						<div class="a-link" onclick="location.href='index.php?go=news_detail&nid=<? echo $rowNews['NewsId']?>'"><? echo $rowNews['NewsTitle']; ?></div>
					</div>
						<span>-------------------------------</span>
				<?
				}
				?>
		</div>
		<div id="rightMain-center-bottom"></div>
	</div>
	
	
	<div id="rightMain-bottom">
		<div id="rightMain-center-top-lead" onclick="location.href='index.php?go=leading_list'"></div>
		<div id="rightMain-center-content">
			<?
				$sql="SELECT * FROM leadings WHERE LeadStatus=1 order by LeadID desc limit 0,5";
				$res=mysql_query($sql,$cnn);
				while($rows=mysql_fetch_array($res))
				{				
			?>
					<div class="box-lead-right">
						<!--div class="a-img" onclick="location.href='index.php?go=leading_detail&lid=<!--? echo $rows['LeadID']?>'"><img width="60" height="50" src="leadingpicture/<!--? echo $rows['LeadImage'] ?>"/></div-->
						<div class="a-link" onclick="location.href='index.php?go=leading_detail&lid=<? echo $rows['LeadID']?>'"><? echo $rows['LeadName']; ?></div>
					</div>
						<span>-------------------------------</span>
				<?
				}
				?>
		</div>
		<div id="rightMain-center-bottom"></div>
	</div>

