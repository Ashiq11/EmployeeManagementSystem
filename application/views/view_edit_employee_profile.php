<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>Edit Profile</h2>
		<?php //echo form_error('accname'); ?>
	<form method="post">
		<input type="submit" name="button_logout" value="Logout" style="position: absolute; left: 1200px; top: 50px;">
		<table style="position: absolute; left: 150px; top: 120px;">
			<tr>
				<td><input type="submit" name="button_profile" value="Profile" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_employee_list" value="List of Employees" style="width: 150px;height: 50px;"/></td>
			</tr>
		</table>
		<table style="position: absolute; left: 150px; top: 200px;">
			<tr>
				<td>Full Name</td>
				<td><input type="text" name="name" value="<?php echo $user['name'] ?>" /></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td><input type="text" name="contact_number" value="<?php echo $user['contact_number'] ?>"/></td>
			</tr>
			<tr>
				<td>E-mail Address</td>
				<td><input type="text" name="email_address" value="<?php echo $user['email_address'] ?>"/></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $user['address'] ?>"/></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $user['age'] ?>"/></td>
			</tr>
			<tr>
				<td>Blood Group</td>
				<td>
					<select name="blood_group" id="blood_group">
						<option value="o+" <?php if ($user['blood_group']=="o+"){echo "selected";}?>>O+</option>
						<option value="o-" <?php if ($user['blood_group']=="o-"){echo "selected";}?>>O-</option>
						<option value="a+" <?php if ($user['blood_group']=="a+"){echo "selected";}?>>A+</option>
						<option value="a-" <?php if ($user['blood_group']=="a-"){echo "selected";}?>>A-</option>
						<option value="b+" <?php if ($user['blood_group']=="b+"){echo "selected";}?>>B+</option>
						<option value="b-" <?php if ($user['blood_group']=="b-"){echo "selected";}?>>B-</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nationality</td>
				<td><input type="text" name="nationality" value="<?php echo $user['nationality'] ?>"/></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="user_name" value="<?php echo $user['user_name'] ?>"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="password" name="confirm_password"/></td>
			</tr>
			<tr>
				<td/>
				<td align="right">
					<input type="submit" name="button_save" value="Save">
					<input type="submit" name="button_cancel" value="Cancel">
				</td>
			</tr>
			
		</table>
		<label style="position: absolute; left: 500px; top: 200px;"><?php echo $message; ?></label>
	</form>
</body>
</html>