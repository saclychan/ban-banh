<?php
require('cart.php');
if($_SESSION["CusUser"]==""){
Redirect('index.php?go=shoppingcart_login');
}
?>


<?php
	$cart = $_SESSION["CART"];	
	if($cart)
	{
	//request value in form
	$OrdShipDate=$_REQUEST['OrdShipDate'];
	$OrdName=$_REQUEST['OrdName'];
	$OrdAdd=$_REQUEST['OrdAdd'];
	$OrdPhone=$_REQUEST['OrdPhone'];
	$PayID=$_REQUEST['PayID'];
	$CusID = $_SESSION["CusID"];
		
	//Create new order
	$sql1= "INSERT INTO orders (Date,OrdShipDate,OrdName, OrdAdd,OrdPhone,OrdStatus,PayID,CusID) VALUES(Now(), '".$OrdShipDate."','".$OrdName."','".$OrdAdd."','".$OrdPhone."',1,'".$PayID."','".$CusID."')";
	$res1= mysql_query($sql1,$cnn);
				
	//Select Max(OrdID)		
	$sql = "SELECT OrdID FROM orders ORDER BY OrdID DESC LIMIT 0,1";
	$res = mysql_query($sql,$cnn);
	while($row = mysql_fetch_array($res))
	{
		$OrdID = $row['OrdID'];
	}
	//Insert into Order Detail
	$totalprincess = 0;
	foreach(array_keys($cart) as $value)
	{
		//Select ProPrice 
		$sql = "SELECT * FROM product WHERE ProID = ".$value;
		$res = mysql_query($sql,$cnn);
		while($row = mysql_fetch_array($res))
		{
			$ProPrice = $row["ProPrice"];
		}
		$totalprincess += $ProPrice * GetQuantity($value);

		//Insert into order detail
		$sql = "INSERT INTO orderdetail(OrdID,ProID,OdQty,OdPrice) VALUES('".$OrdID."','".$value."',".GetQuantity($value).",'".$ProPrice."')";
		mysql_query($sql,$cnn);
		$sql2 = "select * from product where ProID = '".$value."'";
		$res = mysql_query($sql2);
		$rows= mysql_fetch_array($res);
		
		$flag =  $rows['ProQty'] - GetQuantity($value);
		$sql3=  "update product set ProQty = '".$flag."' where ProID =".$value;
		mysql_query($sql3,$cnn);
	}
	//Update Customer TotalPurchase
		$sql = "SELECT TotalPurchase FROM customer WHERE CusID = '".$CusID."'";
		$original = mysql_query($sql);
		$rows1 = mysql_fetch_array($original); 
		$originalprincess = $rows1[0];
		$totalprincess += $originalprincess;
		//$test = $originalprincess;
		$sql = "UPDATE customer SET TotalPurchase = '".$totalprincess."' WHERE (CusID = '".$CusID."')";
		mysql_query($sql);
				
}

//Xoa shopping cart
	$_SESSION["CART"] = "";
	Redirect("index.php?go=shoppingcart_3&test='".$test."'");
?>