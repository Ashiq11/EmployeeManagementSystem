<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Employee Management System</h1>
	<h2>Report</h2>
	<form method="post">
		<input type="submit" name="button_logout" value="Logout" style="position: absolute; left: 1200px; top: 50px;">
		<table style="position: absolute; left: 150px; top: 120px;">
			<tr>
				<td><input type="submit" name="button_profile" value="Profile" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_new_employee" value="Add New Employee" style="width: 150px;height: 50px;"/></td>
				<td><input type="submit" name="button_employee_list" value="List of Employees" style="width: 150px;height: 50px;"/></td>
				<td><input type="button" name="button_reports" value="Reports" style="width: 150px;height: 50px;"/></td>
			</tr>
		</table>
		<label style="position: absolute; left: 150px; top: 200px;">Total Salary Cost: <?php echo $total;?></label>
		<table border="1" style="position: absolute;left: 150px;top: 230px;">
		<tr>
			<th>Department</th>
			<th>Total Salary Cost</th>
			<th>% of Total Salary Cost</th>
		</tr>
		<?php foreach ($departments as $department){ ?>
		<tr>
			<td><a href="http://localhost/EmployeeManagementSystem/employee/department_salary/<?php echo $department['name']; ?>"><?php echo $department['name']; ?></a></td>
			<td><?php echo $department['total'];?></td>
			<td><?php echo $department['percent'];?></td>
		</tr>
		<?php } ?>
	</table>
	</form>
</body>
</html>



