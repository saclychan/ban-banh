<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" href="css/style.css" />

				<div id="logo">
					<div id="logoIcon">
					</div>				
				</div><!--End #logo-->
				
				<div id="headerMainright">
					<div id="searchlogin">
						<form action="index.php?go=search" method="post" id="frm_product_list" >
							<div id="search">
								<ul>
									<li>
										<div  class="inputBox" id="searchBox">
											<input type="text" name="txtSearch" id="txtSearch"  style="display: inline;" tabindex="102" onfocus="if(this.value=='search...') this.value='';" onblur="if(this.value=='') this.value='search...'"  alt="Search" value="<? echo $_REQUEST['txtSearch'];?>" />
											
										</div>
									</li>
									<li>
										<input type="image" src="images/searchButton.png" title="Tìm kiếm tên sản phẩm" onclick="frm_product_list.submit()" />
									</li>
								</ul>
							</div>
						</form>	
							<div id="login">
								<? 
									if(!isset($_SESSION["CusUser"] ))
										{
									
											include_once("login/login.php");
										}	
									else
										{	
											include("login/logout.php");
										}	
								 ?>
							</div>

					</div>
					<!--<div id="banner">
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="680" height="1250">
			  <param name="movie" value="images/banner.swf" />
			  <param name="quality" value="high" />
			  <embed src="images/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="680" height="150"></embed>
			</object>

					</div>--><!--End #banner-->
				</div><!--End #headerMainright-->						
					


