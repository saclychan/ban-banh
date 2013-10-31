<pre style="background:#053; color:#fff">
<? 
echo "N?i dung bi?n \$_REQUEST:<br>";
print_r($_REQUEST); ?>
</pre>

<?
	$go=$_REQUEST['go'];
	switch($go)
	{
		//case regiter
		case 'register':
			require("customer/register.php");
			break;
			
		case 'register_successful':
			require("customer/register_successful.php");
			break;	
		
		//case login	
		case 'login_process':
			require("login/login_process.php");
			break;
			
		case 'login_success':
			require("login/login_success.php");
			break;
			
		case 'login_1':
			require("login/login_1.php");
			break;	
			
		case 'logout':
			require("login/logout_process.php");
			break;
			
		//case shopping cart							
		case 'shoppingcart':
			require("shoppingcart/shoppingcart.php");		
			break;
		
		case 'shoppingcart_1':
			require('shoppingcart/shoppingcart_1.php');
			break;
		
		case 'shoppingcart_2':
			require('shoppingcart/shoppingcart_2.php');
			break;
			
		case 'shoppingcart_3':
			require('shoppingcart/shoppingcart_3.php');
			break;		
		
		case 'shoppingcart_login':
			require('shoppingcart/shoppingcart_login.php');			
			break;	
			
		//trang about
		case 'about':
			require("include/about.php");
			break;	
		//Product
		case 'product':
			require("include/product_icon.php");
			break;
		case 'product_detail':
			require("include/product_detail.php");
			break;
		case 'comment':
			require ("include/comment.php");
			break;	
		//Account
		case 'account':
			require("customer/account.php");
			break;
		case 'change_pass':
			require("customer/change_pass.php");
			break;	
		case 'forget_pass':
			require("customer/forget_pass.php");
			break;		
		case 'edit':
			require("customer/edit.php");
			break;	
		case 'edit_process':
			require('customer/edit_process.php');
			break;
		case 'control_customer':
			require('customer/control_customer.php');
			break;	
		//trang tin tuc - news	
		case 'news_list':
			require('news/news_list.php');
			break;
		case 'news_detail':
			require('news/news_detail.php');
			break;
		//trang promotion - list
		case 'promotion_list':
			require('promotion/promotion_list.php');
			break;
		case 'promotion_detail':
			require('promotion/promotion_detail.php');
			break;
		//trang leading - list
		case 'leading_list':
			require('leading/leading_list.php');
			break;
		case 'leading_detail':
			require('leading/leading_detail.php');
			break;
		//Search
		case 'search':
			require('search/search.php');
			break;
		case 'searchadvance':
			require('search/searchadvance.php');
			break;
		//About
		case 'about':
			require('include/about.php');
			break;
		//Default			
		default:
			require("include/default.php");
			break;
	}
?>