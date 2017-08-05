<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('employeemodel');
		$this->load->database();
	}

	public function index()
	{
		$data['employees'] = $this->employeemodel->getAll();
		$this->load->helper('url');
		redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
	}

	public function login()
	{
		$error = array('message' => '');
		if(! $this->input->get_post('button_login'))
		{
			$this->load->view('view_login', $error);
			return;
		}

		$user['user_name'] = $this->input->get_post('user_name');
		$user['password'] = $this->input->get_post('password');
		$data['users'] = $this->employeemodel->getUsers($user);
		if ($data['users']==null) {

			$error['message']='Incorrect username or password';
			$this->load->view('view_login', $error);
			return;
		}

		$this->session->set_userdata('id', $data['users'][0]['id']);

		redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');	
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
	}

	public function profile()
	{
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_logout')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_profile')) {
			return;
		}
		elseif ($this->input->get_post('button_new_employee')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_employee_list')) {
			$this->load->helper('url');
			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_reports')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/reports');
			return;
		}
		elseif ($this->input->get_post('button_edit')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/edit_profile', 'refresh');
			return;
		}
		else
		{
			$user = $this->employeemodel->getById($this->session->userdata('id'));
			
			if(!$user)
			{
				echo "No record found";
			}
			
			else
			{
				if ($user['user_type']=="admin") {
					$this->load->view('view_admin_profile', $user);
				}
				else if ($user['user_type']=="employee") {
					$this->load->view('view_employee_profile', $user);
				}
				
			}
		}
	}

	public function edit_profile()
	{
		$data['message'] = '';
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		else{
			$data['user'] = $this->employeemodel->getById($this->session->userdata('id'));
		
			if ($this->input->get_post('button_logout')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_profile')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_new_employee')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_employee_list')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_reports')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/reports');
				return;
			}
			elseif ($this->input->get_post('button_save')) {
				if($this->form_validation->run('edit_profile') == false)
				{
					$data['message'] = validation_errors();
					if ($data['user']['user_type']=="admin") {
						$this->load->view('view_edit_admin_profile', $data);
					}
					elseif ($data['user']['user_type']=="employee") {
						$this->load->view('view_edit_employee_profile', $data);
					}
					return;
				}
				$emp['id']=$this->session->userdata('id');
				$emp['name']=$this->input->get_post('name');
				$emp['contact_number']=$this->input->get_post('contact_number');
				$emp['email_address']=$this->input->get_post('email_address');
				$emp['address']=$this->input->get_post('address');
				$emp['age']=$this->input->get_post('age');
				$emp['blood_group']=$this->input->get_post('blood_group');
				$emp['nationality']=$this->input->get_post('nationality');
				$emp['department']=$data['user']['department'];
				$emp['designation']=$data['user']['designation'];
				$emp['salary']=$data['user']['salary'];
				$result=$this->employeemodel->getUserId($this->session->userdata('id'));
				$login['user_id']=$result[0]['user_id'];
				$login['user_name']=$this->input->get_post('user_name');
				$login['password']=$this->input->get_post('password');

				$this->employeemodel->updateUserLogin($login);
				$this->employeemodel->updateEmployees($emp);
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_cancel')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			else
			{
				if ($data['user']['user_type']=="admin") {
					$this->load->view('view_edit_admin_profile', $data);
				}
				elseif ($data['user']['user_type']=="employee") {
					$this->load->view('view_edit_employee_profile', $data);
				}
			}
		}
	}

	public function new_employee()
	{
		$data['message']='';
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_logout')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_profile')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_new_employee')) {
			return;
		}
		elseif ($this->input->get_post('button_employee_list')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_reports')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/reports');
			return;
		}
		elseif ($this->input->get_post('button_save')) 
		{
			if($this->form_validation->run('new_employee') == false)
			{
				$data['message'] = validation_errors();
				$this->load->view('view_new_employee', $data);
				return;
			}
			$emp['name']=$this->input->get_post('name');
			$emp['contact_number']=$this->input->get_post('contact_number');
			$emp['email_address']=$this->input->get_post('email_address');
			$emp['address']=$this->input->get_post('address');
			$emp['age']=$this->input->get_post('age');
			$emp['blood_group']=$this->input->get_post('blood_group');
			$emp['nationality']=$this->input->get_post('nationality');
			$emp['department']=$this->input->get_post('department');
			$emp['designation']=$this->input->get_post('designation');
			$emp['salary']=$this->input->get_post('salary');
			$acc['balance']=$this->input->get_post('balance');
			$login['user_name']=$this->input->get_post('user_name');
			$login['password']=$this->input->get_post('password');

			$this->employeemodel->insertIntoUserLogin($login);
			$result = $this->employeemodel->lastInsertedUser();
			$emp['user_id']=$result[0]['id'];

			$this->employeemodel->insertIntoAccounts($acc);
			$result = $this->employeemodel->lastInsertedAccount();
			$emp['account_id']=$result[0]['id'];

			$result = $this->employeemodel->insertIntoEmployees($emp);

			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');

			return;
		}
		elseif ($this->input->get_post('button_cancel')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
			return;
		}
		else
		{
			$this->load->view('view_new_employee', $data);
		}
	}

	public function employee_list()
	{
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		else{
			$user = $this->employeemodel->getById($this->session->userdata('id'));
			if ($this->input->get_post('button_logout')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_search')) {
				$str = $this->input->get_post('search');
				$data['employees'] = $this->employeemodel->search($str);
				if ($user['user_type']=="admin") {
					$this->load->view('view_admin_list', $data);
					return;
				}
				elseif ($user['user_type']=="employee") {
					$this->load->view('view_employee_list', $data);
				}
				
			}
			elseif ($this->input->get_post('button_profile')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_new_employee')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_employee_list')) {
				return;
			}
			elseif ($this->input->get_post('button_reports')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/reports');
				return;
			}
			else
			{
				$data['employees'] = $this->employeemodel->getEmployees();
				if ($user['user_type']=="admin") {
					$this->load->view('view_admin_list', $data);
				}
				else if ($user['user_type']=="employee") {
					$this->load->view('view_employee_list', $data);
				}
			}
		}
	}

	public function details($id)
	{
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_logout')) {
			return;
		}
		elseif ($this->input->get_post('button_profile')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_new_employee')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_employee_list')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_reports')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/reports');
			return;
		}
		elseif ($this->input->get_post('button_back')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_edit')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/edit_employee/'.$id, 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_delete')) {
			
			$result=$this->employeemodel->getUserId($id);
			$uid=$result[0]['user_id'];
			
			$result=$this->employeemodel->getAccountId($id);
			$aid=$result[0]['account_id'];

			$this->employeemodel->removeEmployee($id);
			$this->employeemodel->removeUser($uid);
			$this->employeemodel->removeAccount($aid);

			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		else
		{
			if($id == 0)
			{
				echo "Invalid id";
				return ;
			}

			$employee = $this->employeemodel->getById($id);
			
			if(!$employee)
			{
				echo "No record found";
			}
			else
			{
				$this->load->view('view_details', $employee);
			}
		}
		
	}

	public function edit_employee($id)
	{
		$data['message']='';
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		else{
			$data['employee'] = $this->employeemodel->getById($id);
	
			if ($this->input->get_post('button_logout')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_profile')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_new_employee')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_employee_list')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_reports')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/reports');
				return;
			}
			elseif ($this->input->get_post('button_cancel')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/details/'.$id, 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_save')) 
			{
				if($this->form_validation->run('edit_employee') == false)
				{
					$data['message'] = validation_errors();
					$this->load->view('view_edit_employee', $data);
					return;
				}
				$emp['id']=$id;
				$emp['name']=$this->input->get_post('name');
				$emp['contact_number']=$this->input->get_post('contact_number');
				$emp['email_address']=$this->input->get_post('email_address');
				$emp['address']=$this->input->get_post('address');
				$emp['age']=$this->input->get_post('age');
				$emp['blood_group']=$this->input->get_post('blood_group');
				$emp['nationality']=$this->input->get_post('nationality');
				$emp['department']=$this->input->get_post('department');
				$emp['designation']=$this->input->get_post('designation');
				$emp['salary']=$this->input->get_post('salary');

				$result=$this->employeemodel->getAccountId($id);
				$acc['account_id']=$result[0]['account_id'];
				$acc['balance']=$this->input->get_post('balance');

				$this->employeemodel->updateAccounts($acc);
				$this->employeemodel->updateEmployees($emp);
				redirect('http://localhost/EmployeeManagementSystem/employee/details/'.$id, 'refresh');
				return;
			}
			else
			{
				$this->load->view('view_edit_employee', $data);
			}
		}
	}

	public function reports()
	{
		//$data['message']='';
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		else{
			$data['employees'] = $this->employeemodel->getEmployees();
		
			if ($this->input->get_post('button_logout')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_profile')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_new_employee')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_employee_list')) {
				redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
				return;
			}
			elseif ($this->input->get_post('button_reports')) {
				return;
			}
			else
			{
				$data = $this->salary_cost();
				$this->load->view('view_reports', $data);
			}
		}
	}

	public function department_salary($name)
	{
		//$data['message']='';
		//$data['employees'] = $this->employeemodel->getEmployees();
		if (!$this->session->userdata('id')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/login', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_logout')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/logout', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_profile')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/profile', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_new_employee')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/new_employee', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_employee_list')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/employee_list', 'refresh');
			return;
		}
		elseif ($this->input->get_post('button_reports')) {
			redirect('http://localhost/EmployeeManagementSystem/employee/reports', 'refresh');
			return;
		}
		else
		{
			$data = $this->department_salary_cost($name);
			$this->load->view('view_department_report', $data);
		}
	}

	public function salary_cost()
	{
		$data['employees'] = $this->employeemodel->getEmployees();
		$data['departments'] = array( array('name' => '','total' => 0, 'percent' => 0.0));
		$data['total'] = 0;
		$dep = $this->employeemodel->getDepartments();
		echo count($dep);

		for ($i =0; $i<count($dep); $i++) 
		{
			$data['departments'][$i]['name'] = $dep[$i]['department'];
			$data['departments'][$i]['total'] = 0;
			foreach ($data['employees'] as $employee) 
			{
				if ($dep[$i]['department']==$employee['department']) {
					$data['departments'][$i]['total'] += $employee['salary'];
					$data['total'] += $employee['salary'];
				}
			}		
		}
		for ($i =0; $i<count($dep); $i++) 
		{
			$data['departments'][$i]['percent'] = (100/$data['total'])*$data['departments'][$i]['total'];	
		}

		return $data;
	}

	public function department_salary_cost($name)
	{
		$emp = $this->employeemodel->getEmployees();
		$data['employees'] = array( array('id' => 0, 'name' => "", 'designation' => "", 'salary' => 0, 'percent' => 0.0));
		$data['name']=$name;

		$total=0;
		$j=0;
		for ($i =0; $i<count($emp); $i++) 
		{
			if ($emp[$i]['department']==$name) {
				$data['employees'][$j]['id'] = $emp[$i]['id'];
				$data['employees'][$j]['name'] = $emp[$i]['name'];
				$data['employees'][$j]['designation'] = $emp[$i]['designation'];
				$data['employees'][$j]['salary'] = $emp[$i]['salary'];
				$j++;
			}
			$total+=$emp[$i]['salary'];
		}
			
		for ($i =0; $i<count($data['employees']); $i++) 
		{
			$data['employees'][$i]['percent'] = (100/$total)*$data['employees'][$i]['salary'];
		}		

		return $data;
	}
	
}