<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.style1 {
	font-size: 24px;
	font-weight: bold;
	color: #FF0066;
	margin:0px 350px;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
.over{
	background: #FECBE9;
}
.out{
	background:#FFFFFF;
}
</style>
<p><span class="style1">THỐNG KÊ NHANH</span></p>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="8">
  <tr>
    <td width="50%" valign="top">
			<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#FF0066">
				<tr class="trhover">
					<td colspan="2" bgcolor="#FF0066"><span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hóa đơn</span></td>
				</tr>
				<?php
								$date = date("Y-m-d");
								$sql_ord="select * from orders";
								$re_ord=mysql_query($sql_ord,$cnn);
								//$num_ord=mysql_num_rows($re_ord);
								$i = 0;
								while ($res= mysql_fetch_array($re_ord))
									{
										$sqldate = strtotime($res['Date']);
										$dateship = date('Y-m-d', $sqldate);
										if( $dateship == $date)
											{
												$i ++;
											}
									}
							?>
				<tr onclick="location.href='admin.php?go=order_list&ostatus=3'" onmouseover="this.className='over'" onmouseout="this.className='out'">
					<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hóa đơn trong ngày </td>
					<td width="40%" align="center">Có <span style="font-weight:bold"> <? echo "$i"?> </span> hóa đơn </td>
				</tr>
		<?
							$sql_ord1="select * from orders where OrdStatus=1";
							$re_ord1=mysql_query($sql_ord1,$cnn);
							$num_ord1=mysql_num_rows($re_ord1);
						?>
			
			<tr onclick="location.href='admin.php?go=order_list&ostatus=1'" onmouseover="this.className='over'" onmouseout="this.className='out'">
				<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hóa đơn chưa xử lý </td>
				<td width="40%" align="center">Có <span style="font-weight:bold"><? echo "$num_ord1"?></span> hóa đơn </td>
			</tr>
					
							<?
							$sql_ord2="select * from orders where OrdStatus=0";
							$re_ord2=mysql_query($sql_ord2,$cnn);
							$num_ord2=mysql_num_rows($re_ord2);
						?>
			
			<tr onclick="location.href='admin.php?go=order_list&ostatus=0'" onmouseover="this.className='over'" onmouseout="this.className='out'">
				<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hóa đơn đã xử lý </td>		
				<td width="40%" align="center">Có <span style="font-weight:bold"> <? echo "$num_ord2"?></span> hóa đơn </td>
			</tr>
			
			</table>
	</td>
    <td width="50%" valign="top">
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#FF0066">
		  <tr class="trhover">
			<td colspan="2" bgcolor="#FF0066"><span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm </span></td>
		  </tr>
								<?
									$sql_pro="select * from product";
									$re_pro=mysql_query($sql_pro,$cnn);
									$num_pro=mysql_num_rows($re_pro);
								?>
				
		  <tr onclick="location.href='admin.php?go=product_list'" onmouseover="this.className='over'" onmouseout="this.className='out'">
			<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tất cả sản phẩm </td>
			<td width="40%" align="center" >Có <span style="font-weight:bold"><? echo $num_pro ?></span> sản phẩm </td>
		  </tr>
								<?
									$sql_pro1="select * from product where ProStatus=1";
									$re_pro1=mysql_query($sql_pro1,$cnn);
									$num_pro1=mysql_num_rows($re_pro1);
								?>
				
		  <tr onclick="location.href='admin.php?go=product_list_yes'" onmouseover="this.className='over'" onmouseout="this.className='out'">
			<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số sản phẩm đang bày bán </td>
			<td width="40%" align="center" >Có <span style="font-weight:bold"><? echo $num_pro1 ?></span> sản phẩm </td>
		  </tr>
			<?
									$sql_pro2="select * from product where ProStatus=0";
									$re_pro2=mysql_query($sql_pro2,$cnn);
									$num_pro2=mysql_num_rows($re_pro2);
								?>
		  <tr onclick="location.href='admin.php?go=product_list_no'" onmouseover="this.className='over'" onmouseout="this.className='out'">
			<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Số sản phẩm đang tạm dừng bán </td>
			<td width="40%" align="center">Có <span style="font-weight:bold"><? echo $num_pro2 ?></span> sản phẩm </td>
		  </tr>
	
		</table>
	</td>
  </tr>
  <tr>
    <td valign="top">
			<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#FF0066">
				<tr class="trhover">
				  <td colspan="2" bgcolor="#FF0066"><span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ý kiến khách hàng </span></td>
				</tr
								><?
									$sql_com2="select * from comment where Status=1";
									$re_com2=mysql_query($sql_com2,$cnn);
									$num_com2=mysql_num_rows($re_com2);
								?>
				<tr onclick="location.href='admin.php?go=comment_list&status=1'" onmouseover="this.className='over'" onmouseout="this.className='out'">
				  <td width="70%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ý kiến phản hồi của khách hàng chưa đọc </td>
				  <td width="30%" align="center">Có <span style="font-weight:bold"><? echo $num_com2 ?></span> ý kiến </td>
				</tr>
								<?
									$sql_com1="select * from comment where Status=0";
									$re_com1=mysql_query($sql_com1,$cnn);
									$num_com1=mysql_num_rows($re_com1);
								?>
				<tr onclick="location.href='admin.php?go=comment_list&status=0'" onmouseover="this.className='over'" onmouseout="this.className='out'">
				  <td width="70%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ý kiến phản hồi của khách hàng đã đọc </td>
				  <td width="30%" align="center">Có <span style="font-weight:bold"><? echo $num_com1 ?></span> ý kiến </td>
				</tr>
			  </table>
	</td>
    <td  width="50%" valign="top">
				<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#FF0066">
				  <tr class="trhover">
					<td colspan="2" bgcolor="#FF0066"><span class="style2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khách hàng </span></td>
				  </tr>
					<?
									$sql_cus="select * from customer where CusStatus=0";
									$re_cus=mysql_query($sql_cus,$cnn);
									$num_cus=mysql_num_rows($re_cus);
								?>
				  <tr onclick="location.href='admin.php?go=customer_list&sid=0'" onmouseover="this.className='over'" onmouseout="this.className='out'">
					<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khách hàng bị khóa tài khoản </td>
					<td width="40%" align="center">Có <span style="font-weight:bold"><? echo $num_cus ?></span> khách hàng </td>
				  </tr>
					<?
									$sql_cus1="select * from customer where CusStatus=1";
									$re_cus1=mysql_query($sql_cus1,$cnn);
									$num_cus1=mysql_num_rows($re_cus1);
								?>      <tr onclick="location.href='admin.php?go=customer_list&sid=1'" onmouseover="this.className='over'" onmouseout="this.className='out'">
			
					<td width="60%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khách hàng được phép mua hàng </td>
					<td width="40%" align="center">Có <span style="font-weight:bold"><? echo $num_cus1 ?></span> khách hàng </td>
				  </tr>
				</table>
		</td>
  </tr>
</table>
<p>&nbsp;</p>