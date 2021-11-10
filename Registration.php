<!DOCTYPE html>
<html>
<head> 

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">

	<title>Registration Form</title>
	
</head>
<body class="register"> 
		
<div class="wrapper">
	
	<div class="registration_form">
		<div class="title">
			<label class="logo" style="font-size: 35px; font-family: 'Montserrat', sans-serif;"> XYT COMPANY </label>
			<label style="font-family: 'Quicksand', sans-serif;">Registration Form</label>
		</div>

		<form action="RegisterUser.php" method="POST">
			<div class="form_wrap">
				<div class="input_grp">
					
					<div class="input_wrap">
						<label for="fname">First Name*</label>
						<input type="text" id="fname" name="fname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
					</div>
					<div class="input_wrap">
						<label for="lname">Last Name*</label>
						<input type="text" id="lname" name="lname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
					</div>
				</div>

				<div class="input_wrap">
					<label for="email">Email Address*</label>
					<input type="text" id="email" name="email">
				</div>

				<div class="input_grp">
				<div class="input_wrap">
					<label for="email">Username*</label>
					<input type="text" id="email" name="username">
				</div>
					<div class="input_wrap">
						<label>Department</label>
						<select name="type" id="type" required>

							<option value="Admin"> </option>
							<option value="Sales Department">Sales</option>
							<option value="Warehouse Department">Warehouse</option>
							<option value="Logistic Department">Logistic</option>
							<option value="Purchasing Department">Purchasing</option>
							<option value="Accounting Department">Accounting</option>
						</select>
					</div>	
				</div>

				<div class="input_grp">
					<div class="input_wrap">
						<label for="city">Password*</label>
						<input type="password" id="pass1" name="pass1">
						<span toggle="#pass1" class="fa fa-fw fa-eye field-icon toggle-password"/>
					</div>
					<div class="input_wrap">
						<label for="country">Confirm Password*</label>
						<input type="password" id="pass2" name="pass2">
						<span toggle="#pass2" class="fa fa-fw fa-eye field-icon toggle-password"/>
					</div>
				</div>

				<div class="input_wrap">
					<input type="submit" value="Register Now" class="submit_btn" name="submit">
					
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script>
$(".toggle-password").click(function() {
 
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});    
</script>

<style type="text/css">
*{
margin: 0;
padding: 0;
box-sizing: border-box;
list-style: none;
}

body{
	background: #296d98;
}
 
.wrapper{
	min-height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;

}

.titlename{
	text-align: center;
	font-size: 40px;
	margin-left: 590px;
}

.registration_form{
	background: white;
	padding: 25px;
	border-radius: 10px;
	width: 400px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.registration_form .title{
	text-align: center;
	font-size: 20px;
	text-transform: uppercase;
	font-weight: 700;
}

.redistration_form .title .name{
	font-size: 50px;
}

.form_wrap{
	margin-top: 35px;
	text-align: center;
}

.form_wrap .input_wrap{
	margin-bottom: 15px;
	font-family: 'Quicksand', sans-serif;
}

.form_wrap .input_wrap:last-child{
	margin-bottom: 0;
}

.form_wrap .input_wrap label{
	display: block;
	margin-bottom: 3px;
}

.form_wrap .input_grp{
	display: flex;
	justify-content: space-between;
}

.form_wrap .input_grp  input[type="text"]{
	width: 165px;
}

select {
width: 170px;
margin-left: 15px;

}

select:focus {
min-width: 150px;
width: auto;
}    

.form_wrap  input[type="text"]{
	width: 100%;
	height: 40px;
	border-radius: 3px;
	border: 1px solid #296d98;
	padding: 10px;
	outline: none;
	border-radius: 8px;
}

.form_wrap select[name="type"]{
	width: 165px;
	height: 40px;
	border-radius: 3px;
	border: 1px solid #296d98;
	padding: 10px;
	outline: none;
	border-radius: 8px;s
}

.form_wrap .input_grp  input[type="Password"]{
	width: 165px;
	height: 40px;
	border-radius: 8px;
}

.form_wrap  input[type="Password"]{
	width: 100%;
	height: 40px;
	border-radius: 3px;
	border: 1px solid #296d98;
	padding: 10px;
	outline: none;
}

.form_wrap  input[type="text"]:focus{
	border-color: #296d98;
}

.form_wrap  input[type="Password"]:focus{
	border-color: #296d98;
}

.form_wrap input[type="submit"]{
	margin-top: 10px;
}

.form_wrap ul{
	background: #fff;
	padding: 8px 10px;
	border-radius: 3px;
	display: flex;
	justify-content: center;
}

.form_wrap ul li:first-child{
	margin-right: 15px;
}

.form_wrap ul .radio_wrap{
	position: relative;
	margin-bottom: 0;
}

.form_wrap ul .radio_wrap .input_radio{
	position: absolute;
	top: 0;
	right: 0;
	opacity: 0;
}

.form_wrap ul .radio_wrap span{
	display: inline-block;
	font-size: 14px;
	padding: 3px 20px;
	border-radius: 3px;
	color: #545871;
}

.form_wrap .input_radio:checked ~ span{
	background: #ebd0ce;
}

.form_wrap .submit_btn{
	width: 100%;
	color: white;
	background: #4f9ecf;
	padding: 10px;
	border: 0;
	border-radius: 8px;
	text-transform: uppercase;
	letter-spacing: 3px;
	cursor: pointer;
 	box-shadow: 0px 1px 0px 0px #171617;
}

.form_wrap .submit_btn:hover{
	background: #296d98/*#4f9ecf*/;
}

.field-icon {

  float: right;
  margin-left: -25px;
  margin-top: 12px;
  position: relative;
  z-index: 2;
}




</style>