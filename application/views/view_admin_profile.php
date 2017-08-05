<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>Profile</h2>
	<form method="post">
		<input type="submit" name="button_logout" value="Logout" style="position: absolute; left: 1200px; top: 50px;">
		<table style="position: absolute; left: 150px; top: 120px;">
			<tr>
				<td><input type="button" name="button_profile" value="Profile" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_new_employee" value="Add New Employee" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_employee_list" value="List of Employees" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_reports" value="Reports" style="width: 150px;height: 50px;"/></td>
			</tr>
		</table>
		<table style="position: absolute; left: 150px; top: 200px;">
			<tr>
				<td><b>ID</b></td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td><b>Name</b></td>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<td><b>Contact Number</b></td>
				<td><?php echo $contact_number; ?></td>
			</tr>
			<tr>
				<td><b>E-mail</b></td>
				<td><?php echo $email_address; ?></td>
			</tr>
			<tr>
				<td><b>Address</b></td>
				<td><?php echo $address; ?></td>
			</tr>
			<tr>
				<td><b>Age</b></td>
				<td><?php echo $age; ?></td>
			</tr>
			<tr>
				<td><b>Blood Group</b></td>
				<td><?php echo $blood_group; ?></td>
			</tr>
			<tr>
				<td><b>Nationality</b></td>
				<td><?php echo $nationality; ?></td>
			</tr>
			<tr>
				<td><b>Department</b></td>
				<td><?php echo $department; ?></td>
			</tr>
			<tr>
				<td/>
				<td align="right"><input type="submit" name="button_edit" value="Edit"/></td>
			</tr>
		</table>
	</form>
</body>
</html>



