<?php
	require('cart.php');
?>
<script>
	var a = true;
function IsNumeric(txt)
{
	sText = txt.value;
	var IsNumber=true;
	var s1=String(sText);
	
	var re=/\ /;
	if(s1=='')
	{
		alert('chua nhap so luong');
		txt.focus();
		IsNumber=false;
		a=false;
	}
	else
		if(isNaN(s1))
		{
			alert('số lượng đặt phải là số');
			txt.focus();
			IsNumber=false;
			a=false;
		}else
			if(re.test(s1))
			{
				alert('số lượng đặt phải là số');
				txt.focus();
				IsNumber=false;
				a=false;
			}else
			{
				
				s2=parseInt(s1);
				if(s2<=0 || s2!=eval(s1))
				{
					alert('số lượng đặt phải là số nguyên dương');
					txt.value=s2;
					IsNumber=false;
					a=false;			
				}
			}
	a=IsNumber;	
	return IsNumber;
}
function testform()
{
	if(a){
		return true;}
	else
	{
		alert('Kiem tra lai');
		return false;
	}
}
function ShoppingCartSend()
{
	if(a){
		document.location='index.php?go=shoppingcart_1';
		return true;
	}
	else
	{
		alert('Kiem tra lai');
		return false;
	}
}
</script>
<style type="text/css">
<!--
.style1 {color: #990000}
.style3 {color: #990000; font-weight: bold; }
-->
</style>
<br />

<div class="defaul-new-content">
	<div class="title-account"><span>Giỏ hàng</span></div>
	<div class="content-defaul-new-product">
			<br /><br />
			<form action="index.php?go=shoppingcart" method="post" name="frmcart" id="frmcart" onsubmit="return testform();">
			<input type="hidden" id="action" name="action" value="update" />
			  <p align="center"><span class="titlename">CÁC SẢN PHẨM TRONG GIỎ HÀNG CỦA BẠN</span></p><hr /><br />
			  <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<tr class="carttitle">
				  <th bgcolor="#F0F0F0" >Mã sp</th>
				  <th bgcolor="#F0F0F0" >Ảnh sp</th>
				  <th bgcolor="#F0F0F0" >Tên</th>
				  <th bgcolor="#F0F0F0" >Số lượng</th>
				  <th bgcolor="#F0F0F0" >Giá</th>
				  <th bgcolor="#F0F0F0" >Tổng tiền</th>
				  <th bgcolor="#F0F0F0" >Thao tác</th>
				</tr>
			<?
				if($cart)
				{
					$idlist = "";
					$total=0;
					foreach(array_keys($cart) as $value)
					{
						$idlist = $idlist.$value.",";
					}
					$idlist = $idlist."0";
					$sql = "SELECT * FROM product WHERE ProID IN (".$idlist.")";
					$rscart = mysql_query($sql,$cnn);
					$stt=0;
					while($row = mysql_fetch_array($rscart))
					{
						$stt++;
			?>
				<tr>
				  <td align="center" valign="middle"><? echo($stt);?></td>
				  <td align="center">&nbsp;
				  <img src="pic-product/<?php
					echo($row['ProImage']);
				  ?>" width="50" height="50"/>  	  </td>
				  <td align="center">
				  <?php
					echo($row['ProName']);
				  ?>	  </td>
				  <td align="center">
				  <input class="tablebox" name="Qty_<? echo $row["ProID"]?>" type="text" id="Qty_<? echo $row["ProID"]?>" value="<? echo GetQuantity($row["ProID"])?>" size="3" maxlength="3" onChange="return IsNumeric(this)"  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"/>	  </td>
				  <td align="center">
				  <?php
					echo(number_format($row['ProPrice']))
				  ?> <span class="style1">VND</span> </td>
				  <td align="center">
				  <?php
					echo(number_format($row['ProPrice']*GetQuantity($row['ProID'])));
					
					$total +=$row['ProPrice']*GetQuantity($row['ProID']);
				  ?> <span class="style1">VND</span> </td>
				  <td align="center">
				  <a href="index.php?go=shoppingcart&action=del&pid=<? echo($row['ProID'])?>" onClick="if(confirm('Xac nhan xoa')) return true;else return false;">Xóa</a></td>
				</tr>
			   
			<?php
			}
			?>
			 <tr>
				  <td colspan="5" align="right">Total:</td>
				  <td colspan="2" align="left"><span class="style3"><?php echo(number_format($total))?> VND </span></td>
			</tr>
			<tr height="30" valign="middle" align="center">
			<td align="center" colspan="7">
			<hr></td>
			</tr>
			
			<tr height="30" valign="middle" align="center">
			<td align="center" colspan="7">
			<input class="buttonbutton" type="button" name="Continue" value="Tiếp tục mua hàng" onClick="location.href='<? echo($_SESSION['url'])?>'">
			<input class="buttonbutton" type="submit" name="update" value="Tính tiền">
			<input class="buttonbutton" type="button" name="delete" value="Xóa giỏ hàng" onClick="if(confirm('Xac nhan xoa')) {location.href='index.php?go=shoppingcart&action=delall';}else return false;">
			<input class="buttonbutton"  type="button" name="shoppingcartsend" value="Gửi hóa đơn" onClick="ShoppingCartSend();"></td>
			</tr>
			
			<?PHP
			}else{
			?>
			<tr height="30" valign="middle" align="left">
			<td align="center" colspan="7"><br /><br />
			<span class = "cartnote">Giỏ hàng trống...</span><br /><br /></td>
			</tr>
			<tr height="30" valign="middle" align="center">
			<td align="center" colspan="7">
			<input class="buttonbutton" type="button" name="Continue" value="Tiếp tục mua hàng" onClick="location.href='<? echo($_SESSION['url'])?>'"></td>
			</tr>
			
			<?php
			}
			?>
			  </table><br /><br /><br /><br /><br />
			</form>			
				
	</div>
	<div class="bottom-default"></div>
</div>	


