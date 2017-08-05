<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>Details</h2>
		<?php //echo form_error('accname'); ?>
	<form method="post">
		<input type="submit" name="button_logout" value="Logout" style="position: absolute; left: 1200px; top: 50px;">
		<table style="position: absolute; left: 150px; top: 120px;">
			<tr>
				<td><input type="submit" name="button_profile" value="Profile" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_new_employee" value="Add New Employee" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_employee_list" value="List of Employees" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_reports" value="Reports" style="width: 150px;height: 50px;"/></td>
			</tr>
		</table>
		<table style="position: absolute; left: 150px; top: 200px;">
			<tr>
				<td>Id</td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $user_name; ?></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td><?php echo $contact_number; ?></td>
			</tr>
			<tr>
				<td>E-mail Address</td>
				<td><?php echo $email_address; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $address; ?></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><?php echo $age; ?></td>
			</tr>
			<tr>
				<td>Blood Group</td>
				<td><?php echo $blood_group; ?></td>
			</tr>
			<tr>
				<td>Nationality</td>
				<td><?php echo $nationality; ?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php echo $department; ?></td>
			</tr>
			<tr>
				<td>Designation</td>
				<td><?php echo $designation; ?></td>
			</tr>
			<tr>
				<td>Salary</td>
				<td><?php echo $salary; ?></td>
			</tr>
			<tr>
				<td>Account Balance</td>
				<td><?php echo $balance; ?></td>
			</tr>
			<tr>
				<td><input type="submit" name="button_back" value="Back"></td>
				<td align="right">
					<input type="submit" name="button_edit" value="Edit">
					<input type="submit" name="button_delete" value="Delete">
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>