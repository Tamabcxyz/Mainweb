		function CheckUser(input){
			var userFormat=/^[a-zA-Z]+\S$/;
			if(input.match(userFormat)){
				return true;
			}
		}
		function CheckPass(input){
			var passFormat=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,15}$/;
			if(input.match(passFormat)){
				return true;
			}
		}
		function confirm(input1, input2){
			if(input1 == input2){
				return true;
			}
		}
		function CheckPhoneNumber(input){
			var numberFormat=/(09|03|07|08|05)+[0-9]{8}$/;
			if(input.match(numberFormat)){
				return true;
			}
		}
		function CheckMail(input){
			var mailFormat=/^[a-z]\w+@gmail\.com$/;
			if(input.match(mailFormat)){
				return true;
			}
		}
		function Check(){
			var name=document.form1.name.value;
			var pass=document.form1.pass.value;
			var repass=document.form1.repass.value;
			var lastname=document.form1.lastname.value;
			var firstname=document.form1.firstname.value;
			var mail=document.form1.mail.value;
			var phone=document.form1.phonenumber.value;
			if(name!="" && pass!="" && repass!="" && lastname!="" && firstname!="" && mail!="" && phone!=""){
				if(!CheckUser(name)){
					document.getElementById("errorname").innerHTML="Tên phải bắt đầu bằng chữ cái và không có khoảng trống";
				}else{
					document.getElementById("errorname").innerHTML="";	
				}
				if(!CheckPass(pass)||pass.indexOf(name)!=-1){
					document.getElementById("errorpass").innerHTML="Mật khẩu phải đủ 8 ki tu và không quá 16, phải bao gồm số, chữ hoa, chữ thường, kí tự đặt biệt và không chứa tên người dùng";
				}else{
					document.getElementById("errorpass").innerHTML="";
				}
				if(!confirm(pass,repass)){
					document.getElementById("errorrepass").innerHTML="Xác nhận mật khẩu sai nhập lại";
				}else{
					document.getElementById("errorrepass").innerHTML="";
				}
				if(!CheckMail(mail)){
					document.getElementById("errormail").innerHTML="Mail phải có dạng user.@gmail.com";
				}else{
					document.getElementById("errormail").innerHTML="";
				}
				if(!CheckPhoneNumber(phone)){
					document.getElementById("errorphonenumber").innerHTML="Số điện thoại phải có 12 kí số và bắt đầu bằng 03|05|07|08|09";
				}else{
					document.getElementById("errorphonenumber").innerHTML="";
				}
				
			}else{
				alert("Phải điền đầy đủ thông tin");
			}
		}
			function CheckRegister(){
				var flag=true;
				// name adress numphone mail pass
				var name=document.form1.name.value;
				var adress=document.form1.adress.value;
				var phone=document.form1.numphone.value;
				var mail=document.form1.mail.value;
				var pass=document.form1.pass.value;
				var repass=document.form1.reenterpass.value;
				
				if(name!="" && pass!="" && mail!="" && phone!=""){
					if(!CheckUser(name)){
						document.getElementById("errorname").innerHTML="Tên phải bắt đầu bằng chữ cái và không có khoảng trống";
						flag=false;
					}else{
						document.getElementById("errorname").innerHTML="";	
					}
					if(!CheckPass(pass)||pass.indexOf(name)!=-1){
						document.getElementById("errorpass").innerHTML="Mật khẩu phải đủ 8 ki tu và không quá 16, phải bao gồm số, chữ hoa, chữ thường, kí tự đặt biệt và không chứa tên người dùng";
						flag=false;
					}else{
						document.getElementById("errorpass").innerHTML="";
					}
					if(!confirm(pass,repass)){
						document.getElementById("errorreenterpass").innerHTML="Xác nhận mật khẩu sai nhập lại";
					}else{
						document.getElementById("errorreenterpass").innerHTML="";
					}
					if(!CheckMail(mail)){
						document.getElementById("errormail").innerHTML="Mail phải có dạng user.@gmail.com";
						flag=false;
					}else{
						document.getElementById("errormail").innerHTML="";
					}
					if(!CheckPhoneNumber(phone)){
						document.getElementById("errorphonenumber").innerHTML="Số điện thoại phải có 10 kí số và bắt đầu bằng 03|05|07|08|09";
						flag=false;
					}else{
						document.getElementById("errorphonenumber").innerHTML="";
					}
					
				}
				else{
					alert("Các trường không được trống!");
				}
				return flag;
			}