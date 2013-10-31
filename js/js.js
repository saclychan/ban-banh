
	function CheckOrder(frm)
		{
		
			var date= new Date;
			var y=date.getFullYear();
			var m=date.getMonth()+1;
			var d=date.getDate();
			
			var str = document.getElementById('OrdShipDate').value;
			var arr=str.split("-");		
			
			if(eval(arr[0])<y)
				{
					document.getElementById('checkshipdate').innerHTML="Ngày nhận hàng không hợp lệ";
					return false;
				}		
				if(eval(arr[1])<m)
				{
					document.getElementById('checkshipdate').innerHTML="Ngày nhận hàng không hợp lệ";
					return false;
				}
				if(eval(arr[2])<d)
				{
					document.getElementById('checkshipdate').innerHTML="Ngày nhận hàng không hợp lệ";
					return false;
				}
			//check OrdDate
			if(frm.OrdShipDate.value == 0)
				{
					document.getElementById('checkshipdate').innerHTML = "Ngày giao hàng không được để trống !";
					document.getElementById('checkOrdName').innerHTML = "";
					document.getElementById('checkOrdAdd').innerHTML = "";
					document.getElementById('checkOrdPhone').innerHTML = "";
					return false;					
				}
				
			//check OrdName
			if(frm.OrdName.value==0)
				{
					document.getElementById('checkshipdate').innerHTML = "";
					document.getElementById('checkOrdName').innerHTML = "Bạn chưa nhập tên người nhận !";
					document.getElementById('checkOrdAdd').innerHTML = "";
					document.getElementById('checkOrdPhone').innerHTML = "";
					return false;					
				}
			
			//check OrdAdd
			if(frm.OrdAdd.value == 0)
				{
					document.getElementById('checkshipdate').innerHTML = "";
					document.getElementById('checkOrdName').innerHTML = "";
					document.getElementById('checkOrdAdd').innerHTML = "Địa chỉ người nhận chưa được nhập !";
					document.getElementById('checkOrdPhone').innerHTML = "";
					return false;
				}	
			
			//check OrdPhone
			if(frm.OrdPhone.value == 0)
				{
					document.getElementById('checkshipdate').innerHTML = "";
					document.getElementById('checkOrdName').innerHTML = "";
					document.getElementById('checkOrdAdd').innerHTML = "";
					document.getElementById('checkOrdPhone').innerHTML = "Số Phone còn thiếu  !";
					return false;
				}	
			re= /^(84|0)(9[0-8]|12[0-9]|16[1-9])\d{7}$/g;
			 if(!re.test(frm.OrdPhone.value))
				{
					document.getElementById('checkshipdate').innerHTML = "";
					document.getElementById('checkOrdName').innerHTML = "";
					document.getElementById('checkOrdAdd').innerHTML = "";
					document.getElementById('checkOrdPhone').innerHTML = "Số Phone nhập sai định dạng  !";
					return false;
				}				
		}				
