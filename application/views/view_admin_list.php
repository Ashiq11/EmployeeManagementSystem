<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>List of Employees</h2>
	<form method="post">
	<input type="submit" name="button_logout" value="Logout" style="position: absolute; left: 1200px; top: 50px;">
	<table style="position: absolute;left: 150px;top: 120px;">
		<tr>
			<td><input type="submit" name="button_profile" value="Profile" style="width: 150px;height: 50px;"/></td>
			<td><input type="submit" name="button_new_employee" value="Add New Employee" style="width: 150px;height: 50px;"/></td>
			<td><input type="button" name="button_employee_list" value="List of Employees" style="width: 150px;height: 50px;"/></td>
			<td><input type="submit" name="button_reports" value="Reports" style="width: 150px;height: 50px;"/></td>
		</tr>	
	</table>
	<input type="text" name="search" style="position: absolute;left: 150px; top: 200px; width: 550px"/>
	<input type="submit" name="button_search" value="Search" style="position: absolute; left: 707px; top: 200px"/>
	</form>
	<table border="1" style="position: absolute;left: 150px;top: 230px;">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Contact Number</th>
			<th>E-mail</th>
			<th>Department</th>
			<th>Designation</th>
			<th>Salary</th>
		</tr>
		<?php foreach ($employees as $employee){ ?>
		<tr>
			<td><a href="http://localhost/EmployeeManagementSystem/employee/details/<?php echo $employee['id']; ?>"><?php echo $employee['id']; ?></a></td>
			<td><?php echo $employee['name'];?></td>
			<td><?php echo $employee['contact_number'];?></td>
			<td><?php echo $employee['email_address'];?></td>
			<td><?php echo $employee['department'];?></td>
			<td><?php echo $employee['designation'];?></td>
			<td><?php echo $employee['salary'];?></td>
		</tr>
		<?php } ?>
	</table>
	</body>
</html>