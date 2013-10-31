<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
		$UserAd=$_SESSION["UserAd"];
?>		


<div id="page">
	<div id="header">








<div id="loginadmin">
	<table width="100%" height="100%" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="26%" align="left" valign="middle" style="color: #333333"><span style="font-size:12px; font-family:'Times New Roman', Times, serif">Quản trị viên</span></td>
		<td width="74%" align="left" valign="middle" style="font-size:11px; font-weight:bold"><? echo $_SESSION['UserAd'];?></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<ul>
				<li><a href="log/logout.php">Đăng xuất</a></li>
				<li><a href="admin.php?go=admin_editinfo&action=edit">Sửa thông tin</a></li>
				<li><a href="admin.php?go=admin_changepass">Đổi mật khẩu</a></li>
			</ul>
		</td>
	  </tr>
  </table>
</div>


<div id="menuicon">	
		<ul id="dropdown_menu">
			<li class="menu" id="trangchu"><a href="admin.php">Trang chủ</a></li>
<?php		
		$SelectFuntion = "SELECT * FROM adminFunction,admin WHERE admin.IDAd = adminFunction.IDAd and admin.UserAd = '".$UserAd."'";

		$ResultFuntion=mysql_query($SelectFuntion);
		while($rowFuntion=mysql_fetch_array($ResultFuntion))
		{		
?>		
			
			<?php
				if($rowFuntion['FID'] == 1)
					{
			?>
						<li  class="menu" id="qlbanh"><a href="admin.php?go=product_list">QL Bánh</a>
							<ul class="links">
								<li><a href="admin.php?go=product_list">Danh sách tất cả sản phẩm</a></li>
								<li><a href="admin.php?go=product_add">Thêm sản phẩm</a></li>
								<li><a href="admin.php?go=category_list">Danh sách nhóm sản phẩm</a></li>
								<li><a href="admin.php?go=category_add">Thêm nhóm sản phẩm</a></li>
							</ul>
						</li>
			<?php
					}
				if($rowFuntion['FID'] == 2)
					{
			?>
						<li class="menu" id="hoadon"><a href="admin.php?go=order_list&ostatus=2">Hóa đơn</a>
							<ul class="links">
								<li><a href="admin.php?go=order_list&ostatus=2">Xem tất cả hóa đơn</a></li>
								<li><a href="admin.php?go=order_list&ostatus=3">Hóa đơn trong ngày</a></li>
								<li><a href="admin.php?go=order_list&ostatus=1">Hóa đơn chưa xử lý</a></li>
								<li><a href="admin.php?go=order_list&ostatus=0">Hóa đơn đã xử lý</a></li>
							</ul>
						</li>
			<?php
					}
				if($rowFuntion['FID'] == 3)
					{
			?>
						<li class="menu" id="khachhang"><a href="admin.php?go=customer_list&sid=2">Khách hàng</a></li>
			<?php
					}
				if($rowFuntion['FID'] == 4)
					{
			?>
						<li class="menu" id="tintuc"><a href="admin.php?go=news_list">Tin tức</a>
							<ul class="links">
								<li><a href="admin.php?go=news_list">Danh sách bản tin</a></li>
								<li><a href="admin.php?go=news_add">Thêm mới bản tin</a></li>
								<li><a href="admin.php?go=promotion_list">Danh sách tin khuyến mại</a></li>
								<li><a href="admin.php?go=promotion_add">Thêm mới tin khuyến mại</a></li>
							</ul>
						</li>
			<?php
					}
				if($rowFuntion['FID'] == 5)
					{
			?>
						<li class="menu" id="ykien"><a href="admin.php?go=comment_list&status=2">Ý kiến</a></li>
			<?php
					}
				if($rowFuntion['FID'] == 6)
					{
			?>
						<li class="menu" id="meovat"><a href="admin.php?go=leading_list&lstatus=2">Mẹo vặt</a></li>
			<?php
					}
		}
?>
		</ul>
</div>














	</div><!--End #header-->
	<div id="main">
		<div id="content">
			<?
				require ("content2.php");
			?>
		</div>

	</div>
	<!--End #main-->
	<div id="footer">
		<br />
		<?
			require ("footer.php");
		?>
	</div><!--End #footer-->
</div>
