<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2><?php echo $name; ?></h2>
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
		<label style="position: absolute; left: 150px; top: 200px;"></label>
		<table border="1" style="position: absolute;left: 150px;top: 230px;">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Salary</th>
			<th>% of Total Salary Cost</th>
		</tr>
		<?php foreach ($employees as $emp){ ?>
		<tr>
			<td><?php echo $emp['id']; ?></td>
			<td><?php echo $emp['name'];?></td>
			<td><?php echo $emp['designation'];?></td>
			<td><?php echo $emp['salary'];?></td>
			<td><?php echo $emp['percent'];?></td>
		</tr>
		<?php } ?>
	</table>
	</form>
</body>
</html>



