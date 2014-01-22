<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	
*	@author : Joyonto Roy
*	date	: 20 April, 2013
*	University Of Dhaka, Bangladesh
*	Ekattor School & College Management System
*	http://codecanyon.net/user/joyontaroy
*/

class Admin extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->model('crud_model');
		$this->load->database();
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		if($this->session->userdata('admin_login') == 1)redirect(base_url().'index.php/admin/dashboard' , 'refresh');
		else redirect(base_url().'index.php/admin/login' , 'refresh');
	}

	/***ADMIN DASHBOARD***/
	function dashboard()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_name']	=	'admin/dashboard';
		$page_data['page_title']=	'Admin Dashboard';
		$page_data['page_info']	=	'Admin dashboard';
		$this->load->view('index' , $page_data);
	}
	
	
	/*ENTRY OF A NEW STUDENT*/

	
	/****MANAGE STUDENTS CLASSWISE*****/
	function students($param1 = '' , $param2 = '' , $param3 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'class_id',			
						'label'=>'Class',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['birthday']		=	$this->input->post('birthday');
			$data['sex']			=	$this->input->post('sex');
			$data['religion']		=	$this->input->post('religion');
			$data['blood_group']	=	$this->input->post('blood_group');
			$data['address']		=	$this->input->post('address');
			$data['phone']			=	$this->input->post('phone');
			$data['email']			=	$this->input->post('email');
			$data['father_name']	=	$this->input->post('father_name');
			$data['mother_name']	=	$this->input->post('mother_name');
			$data['class_id']		=	$this->input->post('class_id');
			$data['roll']			=	$this->input->post('roll');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW STUDENT
			{
				$this->db->insert('student' , $data);
				/****IMAGE UPLOAD OF THE STUDENT*********/
				$student_id		=	mysql_insert_id();
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$student_id.'.jpg');
				
				$this->session->set_flashdata('student_message', 'Student created');
				redirect(base_url().'index.php/admin/students/'.$data['class_id'] , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING STUDENT
			{
				$this->db->where('student_id' , $param3);
				$this->db->update('student' , $data);
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$param3.'.jpg');
				
				$this->session->set_flashdata('student_message', 'Student edited');
				redirect(base_url().'index.php/admin/students/'.$param1.'/'.$param2.'/'.$param3 , 'refresh');
			}
		}
		if($param2 == 'personal_profile')
		{
			$page_data['personal_profile']	=	true;
			$page_data['current_student_id']=	$param3;
		}
		if($param2 == 'academic_result')
		{
			$page_data['academic_result']	=	true;
			$page_data['current_student_id']=	$param3;
		}
		if($param2 == 'edit')
		{
			$page_data['edit']				=	true;
			$page_data['edit_student_id']	=	$param3;
		}
		if($param2 == 'delete')
		{
			$this->db->where('student_id' , $param3);
			$this->db->delete('student');
			$this->session->set_flashdata('student_message', 'Student deleted');
			redirect(base_url().'index.php/admin/students/'.$param1 , 'refresh');
		}
		
		if($param1 != "")
		{
			$page_data['current_class_id']	=	$param1;
			$page_data['students']			=	$this->crud_model->get_students($param1);
			$page_data['page_info']			=	'students of class '.$this->crud_model->get_class_name($param1);
		}
		$page_data['page_name']				=	'admin/students';
		$page_data['page_title']			=	'Students';
		$this->load->view('index' , $page_data);
	}
	
	function browse_student_by_class()
	{
		redirect( base_url().'index.php/admin/students/'.$this->input->post('class_id') , 'refresh');
	}
	
	
	

	
	/****MANAGE TEACHERS*****/
	function teachers($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'email',			
						'label'=>'Email',
						'rules'=>'required|xss_clean|valid_email'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['birthday']		=	$this->input->post('birthday');
			$data['sex']			=	$this->input->post('sex');
			$data['religion']		=	$this->input->post('religion');
			$data['blood_group']	=	$this->input->post('blood_group');
			$data['address']		=	$this->input->post('address');
			$data['phone']			=	$this->input->post('phone');
			$data['email']			=	$this->input->post('email');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW TEACHER
			{
				$this->db->insert('teacher' , $data);
				/****IMAGE UPLOAD OF THE TEACHER*********/
				$teacher_id		=	mysql_insert_id();
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/'.$teacher_id.'.jpg');
				
				$this->session->set_flashdata('teacher_message', 'Teacher created');
				redirect(base_url().'index.php/admin/teachers' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING TEACHER
			{
				$this->db->where('teacher_id' , $param2);
				$this->db->update('teacher' , $data);
				/****IMAGE UPLOAD OF THE TEACHER*********/
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/'.$param2.'.jpg');
				
				$this->session->set_flashdata('teacher_message', 'Teacher edited');
				redirect(base_url().'index.php/admin/teachers/'.$param1.'/'.$param2 , 'refresh');
			}
			

		}
		if($param1 == 'personal_profile')
		{
			$page_data['personal_profile']	=	true;
			$page_data['current_teacher_id']=	$param2;
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_teacher_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('teacher_id' , $param2);
			$this->db->delete('teacher');
			$this->session->set_flashdata('teacher_message', 'Teacher deleted');
			redirect(base_url().'index.php/admin/teachers/' , 'refresh');
		}
		


		$page_data['page_info']	=	'Teacher list';

		$page_data['page_name']	=	'admin/teachers';
		$page_data['page_title']=	'Teacher list';
		$this->load->view('index' , $page_data);
	}
	
	
	/***********************************************************************************************************/
	

		
	/****MANAGE SUBJECTS*****/
	function subjects($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'class_id',						
						'label'=>'Class',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['class_id']		=	$this->input->post('class_id');
			$data['teacher_id']		=	$this->input->post('teacher_id');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW SUBJECT
			{
				$this->db->insert('subject' , $data);
				$this->session->set_flashdata('subject_message', 'New subject created!');
				redirect(base_url().'index.php/admin/subjects' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING SUBJECT
			{
				$this->db->where('subject_id' , $param2);
				$this->db->update('subject' , $data);
				$this->session->set_flashdata('subject_message', 'Subject edited');
				redirect(base_url().'index.php/admin/subjects/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_subject_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('subject_id' , $param2);
			$this->db->delete('subject');
			$this->session->set_flashdata('subject_message', 'Subject deleted');
			redirect(base_url().'index.php/admin/subjects/' , 'refresh');
		}
		
		$page_data['page_info']	=	'Subject list';
		
		$page_data['page_name']	=	'admin/subjects';
		$page_data['page_title']=	'Manage subjects';
		$this->load->view('index' , $page_data);
	}
	
	
	

		
	/****MANAGE CLASSES*****/
	function classes($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['name_numeric']	=	$this->input->post('name_numeric');
			$data['teacher_id']		=	$this->input->post('teacher_id');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW CLASS
			{
				$this->db->insert('class' , $data);
				$this->session->set_flashdata('class_message', 'New class created!');
				redirect(base_url().'index.php/admin/classes' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING CLASS
			{
				$this->db->where('class_id' , $param2);
				$this->db->update('class' , $data);
				$this->session->set_flashdata('class_message', 'Class edited');
				redirect(base_url().'index.php/admin/classes/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_class_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('class_id' , $param2);
			$this->db->delete('class');
			$this->session->set_flashdata('class_message', 'Class deleted');
			redirect(base_url().'index.php/admin/classes/' , 'refresh');
		}
		$page_data['page_info']	=	'Class list';
		
		$page_data['page_name']	=	'admin/classes';
		$page_data['page_title']=	'Class list';
		$this->load->view('index' , $page_data);
	}
	

	/****MANAGE EXAMS*****/
	function exams($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['date']			=	$this->input->post('date');
			$data['comment']		=	$this->input->post('comment');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW EXAM
			{
				$this->db->insert('exam' , $data);
				$this->session->set_flashdata('exam_message', 'New exam created!');
				redirect(base_url().'index.php/admin/exams' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING EXAM
			{
				$this->db->where('exam_id' , $param2);
				$this->db->update('exam' , $data);
				$this->session->set_flashdata('exam_message', 'Exam edited');
				redirect(base_url().'index.php/admin/exams/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_exam_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('exam_id' , $param2);
			$this->db->delete('exam');
			$this->session->set_flashdata('exam_message', 'Exam deleted');
			redirect(base_url().'index.php/admin/exams/' , 'refresh');
		}
		
		$page_data['page_info']	=	'Exam list';
		
		$page_data['page_name']	=	'admin/exams';
		$page_data['page_title']=	'Manage exams';
		$this->load->view('index' , $page_data);
	}
	
	
	/****MANAGE EXAM MARKS*****/
	function marks($exam_id = '' , $class_id = '' , $subject_id = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($this->input->post('operation') == 'selection')
		{
			$page_data['exam_id']	=	$this->input->post('exam_id');
			$page_data['class_id']	=	$this->input->post('class_id');
			$page_data['subject_id']=	$this->input->post('subject_id');
			
			if($page_data['exam_id'] >0 && $page_data['class_id'] >0 && $page_data['subject_id'] >0  )
			{
				redirect(base_url().'index.php/admin/marks/'.$page_data['exam_id'].'/'.$page_data['class_id'].'/'.$page_data['subject_id'] , 'refresh');
			}
			else
			{
				$this->session->set_flashdata('mark_message' , 'Choose exam, class and subject');
				redirect(base_url().'index.php/admin/marks/' , 'refresh');
			}
		}		
		if($this->input->post('operation') == 'update')
		{
			$data['mark_obtained']	=	$this->input->post('mark_obtained');
			$data['attendance']		=	$this->input->post('attendance');
			$data['comment']		=	$this->input->post('comment');
			
			$this->db->where('mark_id' , $this->input->post('mark_id'));
			$this->db->update('mark' , $data);

			redirect(base_url().'index.php/admin/marks/'.$this->input->post('exam_id').'/'.$this->input->post('class_id').'/'.$this->input->post('subject_id') , 'refresh');
		}
		$page_data['exam_id']	=	$exam_id;
		$page_data['class_id']	=	$class_id;
		$page_data['subject_id']=	$subject_id;
			
		$page_data['page_info']	=	'Exam marks';
		
		$page_data['page_name']	=	'admin/marks';
		$page_data['page_title']=	'Manage exam marks';
		$this->load->view('index' , $page_data);
	}
	
	
	/****MANAGE GRADES*****/
	function grades($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'name',						
						'label'=>'Name',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']			=	$this->input->post('name');
			$data['grade_point']	=	$this->input->post('grade_point');
			$data['mark_from']		=	$this->input->post('mark_from');
			$data['mark_upto']		=	$this->input->post('mark_upto');
			$data['comment']		=	$this->input->post('comment');
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW EXAM
			{
				$this->db->insert('grade' , $data);
				$this->session->set_flashdata('grade_message', 'New grade created!');
				redirect(base_url().'index.php/admin/grades' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING EXAM
			{
				$this->db->where('grade_id' , $param2);
				$this->db->update('grade' , $data);
				$this->session->set_flashdata('grade_message', 'Grade edited');
				redirect(base_url().'index.php/admin/grades/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_grade_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('grade_id' , $param2);
			$this->db->delete('grade');
			$this->session->set_flashdata('grade_message', 'Grade deleted');
			redirect(base_url().'index.php/admin/grades/' , 'refresh');
		}
		
		$page_data['page_info']	=	'Grade list';
		
		$page_data['page_name']	=	'admin/grades';
		$page_data['page_title']=	'Manage grades';
		$this->load->view('index' , $page_data);
	}
	
	/*****BACKUP / RESTORE / DELETE DATA PAGE**********/
	function backup_restore($operation = '' , $type = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($operation == 'create')
		{
			$this->crud_model->create_backup($type);
		}
		if($operation == 'restore')
		{
			$this->crud_model->restore_backup();
			$this->session->set_flashdata('backup_message', 'Backup Restored');
			redirect(base_url().'index.php/admin/backup_restore/' , 'refresh');
		}
		if($operation == 'delete')
		{
			$this->crud_model->truncate($type);
			$this->session->set_flashdata('backup_message', 'Data removed');
			redirect(base_url().'index.php/admin/backup_restore/' , 'refresh');
		}
		
		$page_data['page_info']	=	'Create backup / restore from backup';
		$page_data['page_name']	=	'admin/backup_restore';
		$page_data['page_title']=	'Create backup / restore from backup';
		$this->load->view('index' , $page_data);
	}
	
	
	/******SITE ANS SYSTEM SETTINGS HERE*********/
	function settings()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($_POST)
		{
			$data['institute_name']		=	$this->input->post('institute_name');
			$data['address']			=	$this->input->post('address');
			$data['phone_number']		=	$this->input->post('phone_number');
			$data['page_title']			=	$this->input->post('page_title');
			$data['page_meta_tag']		=	$this->input->post('page_meta_tag');
			
			$this->db->update('settings' , $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
			$this->session->set_flashdata('settings_message', 'Settings Updated');
			redirect(base_url().'index.php/admin/settings/' , 'refresh');			
		}
		$page_data['page_info']	=	'System settings';
		$page_data['page_name']	=	'admin/settings';
		$page_data['page_title']=	'Manage system settings';
		$this->load->view('index' , $page_data);
	}
	
	
	/********CHANGE PASSWORD FOR ADMIN*********/
	function change_password()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($_POST)
		{
			$query	=	$this->db->get_where('admin' , array('password' => $this->input->post('password_old')));
			
			if($query->num_rows()>0  && $this->input->post('password_new') == $this->input->post('password_re'))
			{
				$this->db->update('admin' , array('password' => $this->input->post('password_new')));
				$this->session->set_flashdata('change_password_message', 'Password Updated successfully!');
			}
			else
			{
				$this->session->set_flashdata('change_password_message', 'Password Updated failed!');
			}
						
			redirect(base_url().'index.php/admin/change_password/' , 'refresh');			
		}
		$page_data['page_info']	=	'Change password';
		$page_data['page_name']	=	'admin/change_password';
		$page_data['page_title']=	'Change admin password';
		$this->load->view('index' , $page_data);
	}
	
	
	/*********RESULTSHEET OF INDIVIDUAL STUDENTS WITH GRAPH CHART ANALYSIS************/
	function result()
	{
		$page_data['page_info']	=	'Student Result';
		$page_data['page_name']	=	'admin/result';
		$page_data['page_title']=	'Student Result';
		$this->load->view('index' , $page_data);
	}
	
	
}

