<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if(isset($_POST['ok_upload']))
{
 $num=$_GET['file'];
 $cnn=mysql_connect("localhost","root","") or die("can't connect your database");
 mysql_select_db("images",$cnn);
 for($i=0; $i< $num; $i++)
 {
  move_uploaded_file($_FILES['img']['tmp_name'][$i],"data/".$_FILES['img']['name'][$i]);
  $url="data/".$_FILES['img']['name'][$i];
  $name=$_FILES['img']['name'][$i];
  $sql="insert into images(imgUrl,imgName) values('$url','$name')";
  mysql_query($sql);
  echo "Upload Thanh cong file <b>$name</b><br />";
  echo "<img src='$url' width='120' /><br />";
  echo "Images URL: <input type='text' name='link' value='$url' size='35' /><br />";
  echo "Copy code :<br />";
  echo "http://localhost:8888/Project-C1007M-Nhom2/upload/$url <br />";
 }
 mysql_close($cnn);
}
else
{
 echo "Vui long chon hinh truoc khi truy cap vao trang nay";
}
?>

