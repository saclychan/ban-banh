	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  type="text/javascript" src="js/js.js">	</script>
<?php
if($_SESSION["CusUser"]==""){
	Redirect('index.php?go=shoppingcart_login');
}
?>

<div class="defaul-new-content">
	<div class="title-account"><span>Mua hàng</span></div>
	<div class="content-defaul-new-product"><br /><br />
			<form name="frmsendcart" method="post" action="index.php?go=shoppingcart_2" onSubmit=" return CheckOrder(this);">
			<?php
				//read information customer
				$sql="Select * from customer where CusUser='".$_SESSION["CusUser"]."'";
				$res=mysql_query($sql,$cnn);
				$row=mysql_fetch_array($res);
			?>
			<fieldset>
			<legend><strong>&nbsp;Thông tin khách hàng&nbsp;</strong></legend>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
					<td></td>
				</tr>		
			  <tr>
				<td width="200" align="right">Tên khách hàng: </td>
				<td><? echo($row['CusName'])?></td>
			  </tr>
			  <tr>
				<td align="right">Địa chỉ: </td>
				<td><? echo($row['CusAdd'])?></td>
			  </tr>
			  <tr>
				<td align="right">Số Điện thoại: </td>
				<td><? echo($row['CusPhone'])?></td>
			  </tr>
			  <tr>
				<td align="right">Email: </td>
				<td><? echo($row['CusEmail'])?></td>
			  </tr>
			  <tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			</table>
			</fieldset>
			<fieldset>
			<legend><strong>&nbsp;Ngày giao hàng và phương thức thanh toán&nbsp;</strong></legend>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
					<td></td>
				</tr>
				<tr>
				  <td width="40%">
					<input  class="buttonbutton" type="button" value="Ngày giao hàng"  onclick="popUpCalendar(this, document.forms.frmsendcart.OrdShipDate, 'yyyy-mm-dd', -100)" />
				  <input  class="tablebox" name="OrdShipDate" type="text" size="10" onKeyPress="popUpCalendar(this, document.forms.frmsendcart.OrdShipDate, 'yyyy-mm-dd', 0)"  readonly="true" style="color:#990000" onclick="popUpCalendar(this, document.forms.frmsendcart.OrdShipDate, 'yyyy-mm-dd', -100)" onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"  id="OrdShipDate"/>      </td>
				  <?php
				//read information payment
				$sql="Select * from payment";
				$res=mysql_query($sql,$cnn);	
			?>
				  <td>Phương thức:
				  <?php while($row=mysql_fetch_array($res)){?>
					  <input name="PayID" type="radio" value="<?php echo($row['PayID'])?>" checked="checked">
						<?php echo($row['PayType'])?>
				  <? }?>	 </td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
		    </table>
			</fieldset>
			<fieldset>
			<legend><strong>&nbsp;Thông tin người nhận&nbsp;<strong></legend>
			
			  <table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
					<td></td>
				</tr>			  
				<tr>
				  <td width="25%" align="right">Tên người nhận:</td>
				  <td width="40%"><input  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" class="tablebox" name="OrdName" type="text" id="OrdName" size="30"></td>
				  <td width="35%">&nbsp; <span id="checkOrdName" style="color:#0000FF"></span></td>
				</tr>
				<tr>
				  <td width="25%" align="right">Địa chỉ:</td>
				  <td width="40%"><input  onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'" class="tablebox"  name="OrdAdd" type="text" id="OrdAdd" size="30" ></td>
				  <td width="35%">&nbsp; <span id="checkOrdAdd" style="color:#0000FF"></span></td>
				</tr>
				<tr>
				  <td width="25%" align="right">Số Điện thoại:</td>
				  <td width="40%"><input onFocus="style.backgroundColor='#F0F0F0'" onBlur="style.backgroundColor='white'"  class="tablebox" name="OrdPhone" type="text" id="OrdPhone" size="30" ></td>
				  <td width="35%">&nbsp; <span id="checkOrdPhone" style="color:#0000FF"></span></td>
				</tr>
				<tr>
				  <td width="25%" align="right">&nbsp;</td>
				  <td width="40%">&nbsp;</td>
				  <td width="35%">&nbsp;</td>
				</tr>				
		    </table>
			</fieldset>
			
			
			<p align="center"><br />
			  <input  class="buttonbutton" type="button" name="back" value="Quay lại" onClick="history.back();">
			<input  class="buttonbutton" type="submit" name="submit" value="Gửi"  >
			</p>
			
			</form><br /><br /><br />				
	</div>
	<div class="bottom-default"></div>
</div>	
	


