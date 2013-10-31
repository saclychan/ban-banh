<?
	$cart = $_SESSION["CART"];
	$action = $_REQUEST["action"];
	switch($action)
	{
		case "add": //Thêm một sản phẩm vào giỏ hàng
				$pid = $_REQUEST["pid"];//lấy mã sp từ url	
				if($cart){
					if(array_key_exists($pid,$cart))
					{
						$cart[$pid] +=1;
					}else{
						$cart[$pid]=1;
					}
				}else{
					$cart[$pid]=1;
				}
				$_SESSION["CART"] = $cart;
				Redirect('index.php?go=shoppingcart');
			break;
		//Cập nhật lại giỏ hàng khi có thay đổi về số lượng mua	
		case "update":	
			foreach(array_keys($cart) as $pid){
				if($_REQUEST["Qty_".$pid] >0)
				$cart[$pid] = $_REQUEST["Qty_".$pid];
			}
			$_SESSION["CART"] = $cart;
			break;
		//Xóa một sản phẩm trong giỏ hàng
		case "del":
			$pid = $_REQUEST["pid"];//lấy tử url
			if($cart)
			{
				foreach(array_keys($cart) as $key){
					if($key != $pid){
						$newcart[$key] = $cart[$key];
					}
				}
				$_SESSION["CART"] = $newcart;	
				$cart=$newcart;
			}
			Redirect('index.php?go=shoppingcart');
			break;	
		//Xóa toàn bộ giỏ hàng	
		case "delall":
			$_SESSION["CART"]='';
			Redirect('index.php?go=shoppingcart');
			break;
	}
	function GetQuantity($pid){
		$cart = $_SESSION["CART"];
		$quantity=0;
		foreach(array_keys($cart) as $value){
			if($value == $pid){
				$quantity = $cart[$pid];
				break;
			}
		}
		return $quantity;	
		}
?>