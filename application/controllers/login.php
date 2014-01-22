<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
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
		if($this->session->userdata('admin_login') == 1)
			redirect(base_url().'index.php/admin/dashboard' , 'refresh');
		if($this->session->userdata('teacher_login') == 1)
			redirect(base_url().'index.php/teacher/dashboard' , 'refresh');
			
		if($this->session->userdata('admin_login')==1)redirect(base_url().'index.php/admin/dashboard' , 'refresh');
			$config = array(
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required|xss_clean|valid_email'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'required|xss_clean|callback__validate_login'
                  )
            );

		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('_validate_login', ucfirst($this->input->post('login_type')).' Login failed!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			if($this->session->userdata('admin_login') == 1)
				redirect(base_url().'index.php/admin/dashboard' , 'refresh');
			if($this->session->userdata('teacher_login') == 1)
				redirect(base_url().'index.php/teacher/dashboard' , 'refresh');
		}
		
	}

	/***validate login****/
	function _validate_login($str)
	{
		$query = $this->db->get_where($this->input->post('login_type') , array('email'	=> $this->input->post('email'),
													'password'	=> $this->input->post('password')));
		if($query->num_rows()>0)
        {
            $row   = $query->row();
			if($this->input->post('login_type') == 'admin')
			{
				$this->session->set_userdata('admin_login','1');
				$this->session->set_userdata('login_type','admin');
				$this->session->set_userdata('admin_id',$row->admin_id);
				$this->session->set_userdata('name',$row->name);
				$this->session->set_userdata('level',$row->level);
			}
			if($this->input->post('login_type') == 'teacher')
			{
				$this->session->set_userdata('teacher_login','1');
				$this->session->set_userdata('login_type','teacher');
				$this->session->set_userdata('teacher_id',$row->teacher_id);
				$this->session->set_userdata('name',$row->name);
			}
			return TRUE;
        }
		else return FALSE;
	}
	/*******LOGOUT FUNCTION *******/
	function logout()
	{
		$this->session->unset_userdata();
      	$this->session->sess_destroy();
		$this->session->set_flashdata('logout_notification', 'logged_out');
		redirect(base_url().'index.php/login' , 'refresh');
	}
	
	
	/***EMAIL SENDER CUSTOM****/
	function do_email($text=NULL, $sub=NULL, $to=NULL, $from='admin@school.com')
	{
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->email->from($from, 'Creative Item');
		$this->email->to($to);
		$this->email->subject($sub);
		
		$msg	=	'<center><div style="border:1px solid #CCCCCC; font-family: tahoma;-webkit-box-shadow: 0 0 8px #D0D0D0;-moz-box-shadow: 0 0 8px #D0D0D0; -webkit-box-shadow: 0 0 8px #D0D0D0; box-shadow: 0 0 8px #D0D0D0; position:relative;width:700px; min-height:400px; background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;text-overflow:ellipsis;"><div style="position:absolute;top:0px;background-color:#333; text-align:center; height:75px; width:700px; vertical-align:middle;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;"></div><div style="position:absolute;top:75px; padding:10px;text-align:left;">'.$text.'</div></div><div style="font-family:tahoma;color:#999;font-size:12px;">&copy; 2013 creativeitem marketplace</div></center>';
		$this->email->message($msg);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
}

