
flag=true;
function ValidateCustomer(frm)
{
	Valid=true;
		if(frm.CusUser.value=='')
	{
		document.getElementById("checkUser").innerHTML ="Tên đăng nhập không được để trống ! ";
		Valid=false;		
	}
	re_space=/\ /;
	if(re_space.test(frm.CusUser.value))
	{
		document.getElementById("checkUser").innerHTML ="Tên đăng nhập không được dùng khoảng trắng !";
		Valid=false;
	}
	
	//CusAdd
	if(frm.CusAdd.value=='')
	{
		document.getElementById("checkCusAdd").innerHTML ="Hãy nhập vào địa chỉ của bạn !";
		frm.CusAdd.focus();
		Valid=false;		
	}
	//CusName
	if(frm.CusName.value=='')
	{
		document.getElementById("checkCusName").innerHTML ="Hãy nhập vào tên của bạn !";
		frm.CusName.focus();
		Valid=false;		
	}
	
	//CusEmail
	if(frm.CusEmail.value=='')
	{
		document.getElementById("checkCusEmail").innerHTML ="Hãy nhập vào địa chỉ Email !";
		frm.CusEmail.focus();
		Valid=false;		
	}
	//
	re=/^[a-z][a-z0-9_]*@[a-z]+(\.[a-z]+){1,2}$/;
	if(!re.test(frm.CusEmail.value))
	{
		document.getElementById("checkCusEmail").innerHTML ="Ex : yourname@hostname.com";
		frm.CusEmail.focus();
		Valid=false;		
	}	
	//CusPass
	if(frm.CusPass.value=='')
	{
		document.getElementById("checkCusPass").innerHTML ="Mật khẩu không được để trống !";
		frm.CusPass.focus();
		Valid=false;		
	}
	//CusPass
	str=frm.CusPass.value;
	if(str.length<6)
	{
		document.getElementById("checkCusPass").innerHTML ="Mật khẩu phải có ít nhất 6 ký tự !";
		frm.CusPass.focus();
		Valid=false;		
	}
	//CusRegPass
	if(frm.CusPass.value!=frm.CusPass_conf.value)
	{
		document.getElementById("checkCusPass_conf").innerHTML ="Xác nhận mật khẩu không đúng !";
		frm.CusPass_conf.focus();
		Valid=false;
	}
	
	//CusPhone
		if(frm.CusPhone.value=="")
			{
					document.getElementById("checkCusPhone").innerHTML="Số điện thoại không được để trống!";
					frm.CusPhone.focus();
					Valid=false;
				}
		 re= /^(84|0)(9[0-8]|12[0-9]|16[1-9])\d{7}$/g;
		 if(!re.test(frm.CusPhone.value))
			{
					document.getElementById("checkCusPhone").innerHTML="Số điện thoại nhập chưa đúng định dạng";
					frm.CusPhone.focus();
					Valid=false;
				}
	//CusQues	
		if(frm.CusQues.value=="0")
			{
				document.getElementById("checkCusQues").innerHTML="Bạn chưa chọn câu hỏi bí mật cho mình!";	
				frm.CusQues.focus();
				Valid=false;
			}
		//
		if(frm.CusAns.value=="")
			{
				document.getElementById("checkCusAns").innerHTML="Câu trả lời không được để trống !";
				frm.CusAns.focus();
				Valid=false;
			}
		
	
		
		
	
	//
		flag=Valid;	
		if(Valid==false)
		{
			alert('Dữ liệu đăng ký không đúng\nBạn hãy kiểm tra lại !');	
		}else
		if(existed==true)
		{
			alert('Tên tài khoản đã được đăng ký trước !');
			Valid=false;		
		}
			
		return Valid;


}

  
