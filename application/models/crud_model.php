<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	
	function admin_login($email , $password)
	{
		$query = $this->db->get_where('admin', array('email'	=> $this->input->post('email'),
													'password'	=> $this->input->post('password')));
		if($query->num_rows()>0)
        {
            $row   = $query->row();
            $this->session->set_userdata('admin_login','1');
            $this->session->set_userdata('login_type','admin');
            $this->session->set_userdata('admin_id',$row->admin_id);
            $this->session->set_userdata('level',$row->level);
			return TRUE;
        }
		else return FALSE;
	}
	
	function get_settings()
	{
		$query	=	$this->db->get('settings' );
		return $query->result_array();
	}
	
	////////STUDENT/////////////
	function get_students($class_id)
	{
		$query	=	$this->db->get_where('student' , array('class_id' => $class_id));
		return $query->result_array();
	}
	
	function get_student_info($student_id)
	{
		$query	=	$this->db->get_where('student' , array('student_id' => $student_id));
		return $query->result_array();
	}
	/////////TEACHER/////////////
	function get_teachers()
	{
		$query	=	$this->db->get('teacher' );
		return $query->result_array();
	}
	function get_teacher_name($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	function get_teacher_info($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		return $query->result_array();
	}
	
	//////////SUBJECT/////////////
	function get_subjects()
	{
		$query	=	$this->db->get('subject' );
		return $query->result_array();
	}	
	function get_subject_info($subject_id)
	{
		$query	=	$this->db->get_where('subject' , array('subject_id' => $subject_id));
		return $query->result_array();
	}
	function get_subjects_by_class($class_id)
	{
		$query	=	$this->db->get_where('subject' , array('class_id' => $class_id));
		return $query->result_array();
	}
	////////////CLASS///////////
	function get_class_name($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	
	function get_class_name_numeric($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name_numeric'];
	}
	
	function get_classes()
	{
		$query	=	$this->db->get('class' );
		return $query->result_array();
	}	
	function get_class_info($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		return $query->result_array();
	}
	
	//////////EXAMS/////////////
	function get_exams()
	{
		$query	=	$this->db->get('exam' );
		return $query->result_array();
	}	
	function get_exam_info($exam_id)
	{
		$query	=	$this->db->get_where('exam' , array('exam_id' => $exam_id));
		return $query->result_array();
	}	
	
	
	//////////GRADES/////////////
	function get_grades()
	{
		$query	=	$this->db->get('grade' );
		return $query->result_array();
	}	
	function get_grade_info($grade_id)
	{
		$query	=	$this->db->get_where('grade' , array('grade_id' => $grade_id));
		return $query->result_array();
	}	
	function get_grade($mark_obtained)
	{
		$query	=	$this->db->get('grade' );
		$grades	=	$query->result_array();
		foreach($grades as $row)
		{
			if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				return $row;
		}
	}
	
	////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else if($type == 'student')
		{
			$tables = array('tables'	=>	array('student'));
			$file_name	=	'student_personal_information';
		}
		else if($type == 'mark')
		{
			$tables = array('tables'	=>	array('mark'));
			$file_name	=	'student_academic_result';
		}
		else if($type == 'teacher')
		{
			$tables = array('tables'	=>	array('teacher'));
			$file_name	=	'teacher_personal_information';
		}
		else if($type == 'subject')
		{
			$tables = array('tables'	=>	array('subject'));
			$file_name	=	'subject_information';
		}
		else if($type == 'class')
		{
			$tables = array('tables'	=>	array('class'));
			$file_name	=	'class_information';
		}
		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
	
	
	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
			$this->db->truncate('student');
			$this->db->truncate('mark');
			$this->db->truncate('teacher');
			$this->db->truncate('subject');
			$this->db->truncate('class');
			$this->db->truncate('exam');
			$this->db->truncate('grade');
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
	
	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}
}

