<!doctype html>
<html>
	<head>
<meta charset='utf-8'>
<title>Kassasüsteemi sisselogimine</title>
<style>
body {}
a {color: #000;}
h1,h2,h3,h4 {margin:0;padding:0;}
label {width: 70px; display:inline-block; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px;}
#loginTbl {
	border: 1px solid #000;
	box-shadow: 0 0 10px #000;
}
.styledForm {
	border: 1px solid #000;
	outline:none;
	padding-left: 2px;
	font-weight: bold;
}
.styledSubmit {
	background: #000;
	color: #fff;
	border:0;
	padding: 4px;
	cursor:pointer;
}
.lb {padding: 10px 0 10px 0;}
</style>
</head>
<body>
	<table width='450' align='center' id='loginTbl'>
		<tr>
	<td align='center'><h1>Kassasüsteem</td>
	</tr>


	<form name='login' method='post' action='<?php echo URL?>login/go'>
		<tr>
			
			<td colspan='2' align='center' class='lb'><span><b>Kassasüsteemi sisselogimine</b></span></td>
		</td>
		<tr>
		<tr>
		<td colspan='2' align='center' class='lb' style='color: blue;'><span style='color:red;'>Vaata demo.</span> Kasutaja: test Parool: test</td> 
		</tr>
			<td align='center'><label for='uName'>Kasutaja:</label>
				<input type='text' id='uName' class='styledForm' name='username'></td>
			</tr>
			<tr>
			<td align='center'><label for='pWord'>Parool:</label>
				<input type='password' id='pWord' class='styledForm' name='password'></td>
			</tr>
				<tr>
				<td align='center'><input type='submit' class='styledSubmit' value='Sisene'></td>
				</tr>	
</form>
</table>
</body>
</html>
