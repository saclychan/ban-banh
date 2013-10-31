<?
	$go=$_REQUEST['go'];
	switch($go)
	{
		case "admin_editinfo":
			require("admin/admin_editinfo.php");
			break;
		case "admin_changepass":
			require("admin/admin_changepass.php");
			break;	
		
		case "category_list":
			require("category/category_list.php");
			break;
		case "category_add":
			require("category/category_add.php");
			break;	
		case "category_edit":
			require("category/category_edit.php");
			break;
		case "product_list":
			require("product/product_list.php");
			break;
		case "product_list_yes":
			require("product/product_list_yes.php");
			break;
		case "product_list_no":
			require("product/product_list_no.php");
			break;
		case "product_add":
			require("product/product_add.php");
			break;
		case "product_detail":
			require("product/product_detail.php");
			break;
		case "product_edit":
			require("product/product_edit.php");
			break;
		case "order_list":
			require("order/order_list.php");
			break;	
		case "order_detail":
			require("order/order_detail.php");
			break;	
			
			
			
		case "news_list":
			require("news/news_list.php");
			break;
		case "news_add":
			require("news/news_add.php");
			break;
		case "news_edit":
			require("news/news_edit.php");
			break;
		case "news_detail":
			require("news/news_detail.php");
			break;		
		case "promotion_list":
			require("promotion/promotion_list.php");
			break;
		case "promotion_detail":
			require("promotion/promotion_detail.php");
			break;
		case "promotion_add":
			require("promotion/promotion_add.php");
			break;
		case "promotion_edit":
			require("promotion/promotion_edit.php");
			break;
		case "customer_list":
			require("customer/customer_list.php");
			break;
		case "customer_detail":
			require("customer/customer_detail.php");
			break;
		case "comment_list":
			require("comment/comment_list.php");
			break;
		case "comment_detail":
			require("comment/comment_detail.php");
			break;
		
		case "leading_list":
			require("leading/leading_list.php");
			break;
		case "leading_add":
			require("leading/leading_add.php");
			break;
		case "leading_edit":
			require("leading/leading_edit.php");
			break;
		case "leading_detail":
			require("leading/leading_detail.php");
			break;
		
					
		default:
			require("default2.php");
			break;
		
	}
?>