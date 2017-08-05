<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>Login</h2>
	<form method="post">
		<table>
			<tr>
				<td>user name</td>
				<td><input type="text" name="user_name"/></td>
			</tr>
			<tr>
				<td>password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td/>
				<td align="right"><input type="Submit" name="button_login" value="Login"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="checkbox" name="remember"/>remember me</td>
			</tr>
		</table><br/><br/>
		<label><?php echo $message;?></label>
	</form>
</body>
</html>