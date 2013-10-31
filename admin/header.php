<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="loginadmin">
	<table width="100%" height="100%" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="26%" align="left" valign="middle" style="color: #333333"><span style="font-size:12px; font-family:'Times New Roman', Times, serif">Quản trị viên</span></td>
		<td width="74%" align="left" valign="middle" style="font-size:12px; font-weight:bold"><i>
			<? echo $_SESSION['UserAd'];?></i>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="log/logout.php">Đăng xuất</a>
		</td>
	  </tr>
	  <tr>
		<td colspan="2">
			<ul>
				<li><a href="admin.php?go=admin_editinfo&action=edit">Sửa thông tin</a></li>
				<li><a href="admin.php?go=admin_changepass">Đổi mật khẩu</a></li>
				<li><a href="admin.php?go=admin_manager" id="quanlyuser">Quản lý User</a>/
					<a href="admin.php?go=chat_manager" id="quanlyuser">Chat</a>
				</li>
			</ul>
		</td>
	  </tr>
  </table>
</div>
<div id="menuicon">	
		<ul id="dropdown_menu">
			<li class="menu" id="trangchu"><a href="admin.php">Trang chủ</a></li>
			<li  class="menu" id="qlbanh"><a href="admin.php?go=product_list">QL Bánh</a>
				<ul class="links">
					<li><a href="admin.php?go=product_list">Danh sách tất cả sản phẩm</a></li>
					<li><a href="admin.php?go=product_add">Thêm sản phẩm</a></li>
					<li><a href="admin.php?go=category_list">Danh sách nhóm sản phẩm</a></li>
					<li><a href="admin.php?go=category_add">Thêm nhóm sản phẩm</a></li>
				</ul>
			</li>
			<li class="menu" id="hoadon"><a href="admin.php?go=order_list&ostatus=2">Hóa đơn</a>
				<ul class="links">
					<li><a href="admin.php?go=order_list&ostatus=2">Xem tất cả hóa đơn</a></li>
					<li><a href="admin.php?go=order_list&ostatus=3">Hóa đơn trong ngày</a></li>
					<li><a href="admin.php?go=order_list&ostatus=1">Hóa đơn chưa xử lý</a></li>
					<li><a href="admin.php?go=order_list&ostatus=0">Hóa đơn đã xử lý</a></li>
				</ul>
			</li>
			<li class="menu" id="khachhang"><a href="admin.php?go=customer_list&sid=2">Khách hàng</a></li>
			<li class="menu" id="tintuc"><a href="admin.php?go=news_list">Tin tức</a>
				<ul class="links">
					<li><a href="admin.php?go=news_list">Danh sách bản tin</a></li>
					<li><a href="admin.php?go=news_add">Thêm mới bản tin</a></li>
					<li><a href="admin.php?go=promotion_list">Danh sách tin khuyến mại</a></li>
					<li><a href="admin.php?go=promotion_add">Thêm mới tin khuyến mại</a></li>
				</ul>
			</li>
			<li class="menu" id="ykien"><a href="admin.php?go=comment_list&status=2">Ý kiến</a></li>
			<li class="menu" id="meovat"><a href="admin.php?go=leading_list&lstatus=2">Mẹo vặt</a></li>
		</ul>
</div>