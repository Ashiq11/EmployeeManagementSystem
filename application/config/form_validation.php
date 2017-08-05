<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'edit_profile' => array(
					array(
						'field' => 'name',
						'label' => 'Full Name',
						'rules' => 'required'
						),
					array(
						'field' => 'contact_number',
						'label' => 'Contact Number',
						'rules' => 'required|numeric'
						),
					array(
						'field' => 'email_address',
						'label' => 'Email Address',
						'rules' => 'required|valid_email'
						),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'required'
						),
					array(
						'field' => 'age',
						'label' => 'Age',
						'rules' => 'required|numeric|greater_than[20]|less_than[60]'
						),
					array(
						'field' => 'nationality',
						'label' => 'Nationality',
						'rules' => 'required'
						),
					array(
						'field' => 'user_name',
						'label' => 'User name',
						'rules' => 'required|is_uniqe[user_login.user_name]'
						),
					array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required|min_length[8]'
						),
					array(
						'field' => 'confirm_password',
						'label' => 'Confirm Password',
						'rules' => 'required|matches[password]'
						)
					),
		'new_employee' => array(
					array(
						'field' => 'name',
						'label' => 'Full Name',
						'rules' => 'required'
						),
					array(
						'field' => 'contact_number',
						'label' => 'Contact Number',
						'rules' => 'required|numeric'
						),
					array(
						'field' => 'email_address',
						'label' => 'Email Address',
						'rules' => 'required|valid_email'
						),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'required'
						),
					array(
						'field' => 'age',
						'label' => 'Age',
						'rules' => 'required|numeric|greater_than[20]|less_than[60]'
						),
					array(
						'field' => 'nationality',
						'label' => 'Nationality',
						'rules' => 'required'
						),
					array(
						'field' => 'department',
						'label' => 'Department',
						'rules' => 'required'
						),
					array(
						'field' => 'designation',
						'label' => 'Designation',
						'rules' => 'required'
						),
					array(
						'field' => 'salary',
						'label' => 'Salary',
						'rules' => 'required|numeric|greater_than[499]'
						),
					array(
						'field' => 'balance',
						'label' => 'Account Balance',
						'rules' => 'required|numeric|greater_than[499]'
						),
					array(
						'field' => 'user_name',
						'label' => 'User name',
						'rules' => 'required|is_uniqe[user_login.user_name]'
						),
					array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required|min_length[8]'
						),
					array(
						'field' => 'confirm_password',
						'label' => 'Confirm Password',
						'rules' => 'required|matches[password]'
						)
					),
		'edit_employee' => array(
					array(
						'field' => 'name',
						'label' => 'Full Name',
						'rules' => 'required'
						),
					array(
						'field' => 'contact_number',
						'label' => 'Contact Number',
						'rules' => 'required|numeric'
						),
					array(
						'field' => 'email_address',
						'label' => 'Email Address',
						'rules' => 'required|valid_email'
						),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'required'
						),
					array(
						'field' => 'age',
						'label' => 'Age',
						'rules' => 'required|numeric|greater_than[20]|less_than[60]'
						),
					array(
						'field' => 'nationality',
						'label' => 'Nationality',
						'rules' => 'required'
						),
					array(
						'field' => 'department',
						'label' => 'Department',
						'rules' => 'required'
						),
					array(
						'field' => 'designation',
						'label' => 'Designation',
						'rules' => 'required'
						),
					array(
						'field' => 'salary',
						'label' => 'Salary',
						'rules' => 'required|numeric|greater_than[499]'
						),
					array(
						'field' => 'balance',
						'label' => 'Account Balance',
						'rules' => 'required|numeric|greater_than[499]'
						)
					)

	);