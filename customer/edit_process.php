<?php
$action = $_REQUEST['action'];
$CusName= $_REQUEST['CusName'];
$CusAdd = $_REQUEST['CusAdd'];
$CusPhone = $_REQUEST['CusPhone'];
$CusEmail = $_REQUEST['CusEmail'];
$CusGender = $_REQUEST['CusGender'];
$CusImage = $_REQUEST['txtanh'];
if($action= edit)
	{
	$del ="update customer set CusEmail ='None' where CusID='".$_SESSION['CusID']."'";
	mysql_query($del);
	$sql="SELECT * from customer WHERE CusEmail='".$CusEmail."'";
	$res=mysql_query($sql,$cnn);
	$row=mysql_num_rows($res);
	if ($row>=1)
		{
			echo("<script>alert('Email đã được sử dụng !');</script>");
			echo("<script>window.location='index.php?go=edit';</script>");
		}
	else
		{
		$edit = "update customer set CusName ='".$CusName."',CusGender ='".$CusGender."',CusAdd='" . $CusAdd . "', CusPhone = '".$CusPhone."', CusEmail='".$CusEmail."',CusImage = '".$CusImage."' where CusID= '" .$_SESSION['CusID']."'";
		if(mysql_query($edit,$cnn))
			{
			echo("<script>alert('Cập nhật thông tin cá nhân hoàn tất !')</script>");
			redirect("index.php?go=account");	
			}			
		}		
			
	}

?>