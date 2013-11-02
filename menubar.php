<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#wrapper{
		margin: 0 auto;
		width:1000px;
		height:40px;
		font-size:15px;
	}
	ul#nav{
		list-style: none;
		float:left;
		height:40px;
		width:1000px;
	}
	ul#nav li{
		overflow: hidden;
		float:left;
		height:40px;
		width:166.6px;
	}
	ul#nav a, ul#nav span{
		font-weight: bold;
		padding:10px 20px;
		float: left;
		clear:both;
		color:#eabd42;
		font-family:Comic Sans MS, Helvetica, sans-serif;
		text-decoration:none;
		line-height: 20px;
		width:100%;
		height:20px;
		background: url(images/1.png) no-repeat top left;
	}	
	ul#nav a{
		color:#8d0e0e;
		background-position: left bottom;
	}
	ul#nav span{
		background-position:left top;
	}
	
</style>
<script type="text/javascript">
	$(document).ready(function(){
		var $navLi=$('#nav li');
		$('<span></span>').insertBefore('#nav li a');
		
		$navLi.each(function(){
			var linkText = $(this).find('a').text();
			$(this).find('span').show().text(linkText);	
		//alert(linkText);
		});
		$navLi.hover(function() {
			$(this)
			.find('span')
			.stop()
			.animate({marginTop: '-40px'}, 300);
			},function(){
				$(this)
				.find('span')
				.stop()
				.animate({marginTop: '0px'},300);
			});
	});
</script>

<div id="wrapper">
	<ul id="nav">
		<li><a href="index.php">TRANG CHỦ</a></li>
		<li><a href="index.php?go=account">TÀI KHOẢN</a></li>
		<li><a href="index.php?go=shoppingcart">GIỎ HÀNG</a></li>
		<li><a href="index.php?go=promotion_list">KHUYẾN MẠI</a></li>
		<li><a href="index.php?go=register">ĐĂNG KÝ</a></li>
		<li><a href="index.php?go=about">GIỚI THIỆU</a></li>
	</ul>
</div>