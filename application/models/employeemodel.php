<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeemodel extends CI_Model {

	public function getAll()
	{
		$sql = "SELECT * FROM employees";
		
		$result = $this->db->query($sql);
		
		return $result->result_array();


	}

	public function getUsers($user)
	{
		$sql = "SELECT * FROM (SELECT e.id, e.status, u.user_name, u.password FROM employees as e JOIN user_login as u ON e.user_id=u.user_id) as a WHERE user_name='".$user['user_name']."' AND password='".$user['password']."' AND status=1";
		
		$result = $this->db->query($sql);
		
		return $result->result_array();


	}

	public function getById($id)
	{
		$sql = "SELECT * FROM (SELECT e.id, e.name, e.contact_number, e.email_address, e.address, e.age, e.blood_group, e.nationality, e.department, e.designation, e.salary, e.account_id, e.status, u.user_name, u.password, u.user_type, a.balance FROM (employees as e JOIN user_login as u ON e.user_id=u.user_id) JOIN accounts as a ON e.account_id=a.account_id) as g WHERE id=$id";
		$result = $this->db->query($sql);
		return $result->row_array();

	}

	public function getEmployees()
	{
		$sql = "SELECT e.id, e.name, e.contact_number, e.email_address, e.address, e.age, e.blood_group, e.nationality, e.department, e.designation, e.salary, e.account_id, e.status, u.user_name, u.password, u.user_type FROM employees as e JOIN user_login as u ON e.user_id=u.user_id";
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function insertIntoAccounts($acc)
	{
		$sql = "INSERT INTO accounts VALUES (null, $acc[balance])";
		return $this->db->query($sql);
	}

	public function lastInsertedAccount()
	{
		$sql = "SELECT MAX(account_id) AS id FROM accounts";
		return $this->db->query($sql)->result_array();
	}

	public function insertIntoUserLogin($login)
	{
		$sql = "INSERT INTO user_login VALUES (null, '".$login['user_name']."', '".$login['password']."', 'employee')";
		return $this->db->query($sql);
	}

	public function lastInsertedUser()
	{
		$sql = "SELECT MAX(user_id) AS id FROM user_login";
		return $this->db->query($sql)->result_array();
	}

	public function insertIntoEmployees($emp)
	{
		$sql = "INSERT INTO employees VALUES (null, ".$emp['user_id'].", '".$emp['name']."', '".$emp['contact_number']."', '".$emp['email_address']."', '".$emp['address']."', ".$emp['age'].", '".$emp['blood_group']."', '".$emp['nationality']."', '".$emp['department']."', '".$emp['designation']."', ".$emp['salary'].", ".$emp['account_id'].", 1)";
		return $this->db->query($sql);
	}

	public function updateUserLogin($login)
	{
		$sql = "UPDATE user_login SET user_name='".$login['user_name']."', password='".$login['password']."' WHERE user_id=".$login['user_id'];
		return $this->db->query($sql);
	}

	public function updateEmployees($emp)
	{
		$sql = "UPDATE employees SET name='".$emp['name']."', contact_number='".$emp['contact_number']."', email_address='".$emp['email_address']."', address='".$emp['address']."', age=".$emp['age'].", blood_group='".$emp['blood_group']."', nationality='".$emp['nationality']."', department='".$emp['department']."', designation='".$emp['designation']."', salary='".$emp['salary']."' WHERE id=".$emp['id'];
		return $this->db->query($sql);
	}

	public function updateAccounts($acc)
	{
		$sql = "UPDATE accounts SET balance=".$acc['balance']." WHERE account_id=".$acc['account_id'];
		return $this->db->query($sql);
	}

	public function getUserId($id)
	{
		$sql = "SELECT user_id FROM employees WHERE id=$id";
		return $this->db->query($sql)->result_array();
	}

	public function getAccountId($id)
	{
		$sql = "SELECT account_id FROM employees WHERE id=$id";
		return $this->db->query($sql)->result_array();
	}

	public function removeEmployee($id)
	{
		$sql = "DELETE FROM employees WHERE id=$id";
		return $this->db->query($sql);
	}
	public function removeAccount($id)
	{
		$sql = "DELETE FROM accounts WHERE account_id=$id";
		return $this->db->query($sql);
	}
	public function removeUser($id)
	{
		$sql = "DELETE FROM user_login WHERE user_id=$id";
		return $this->db->query($sql);
	}

	public function search($str)
	{
		$sql = "SELECT * FROM employees WHERE id LIKE '%".$str."%' OR name LIKE '%".$str."%' OR contact_number LIKE '%".$str."%' OR email_address LIKE '%".$str."%' OR department LIKE '%".$str."%' OR designation LIKE '%".$str."%'";
		return $this->db->query($sql)->result_array();
	}

	public function getDepartments()
	{
		$sql = "SELECT DISTINCT department FROM employees";
		return $this->db->query($sql)->result_array();
	}

	public function getEmployeesByDepartment($name)
	{
		$sql = "SELECT * FROM employees WHERE department = '".$name."'";
		return $this->db->query($sql)->result_array();
	}
}