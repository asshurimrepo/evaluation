<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	
*	@author : Joyonto Roy
*	date	: 26 March, 2013
*	University Of Dhaka, Bangladesh
*	Ekattor School & College Management System
*	http://codecanyon.net/user/joyontaroy
*/


class Install extends CI_Controller {

	function __construct()
    {
        parent::__construct();	
		$this->load->helper('url');
		$this->load->helper('file');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	}
	
	function index()
	{
		
		$this->load->view('install/index');
	}
	
	
	/*****INSTALL THE SCRIPT HERE *****/
	function do_install()
	{
		$db_verify	=	$this->check_db_connection();
		if($db_verify == true)
		{
			///////replace the database settings//////////
			$data = read_file('./application/config/database.php');
			$data = str_replace('db_name',		$this->input->post('db_name'),		$data);
			$data = str_replace('db_uname',		$this->input->post('db_uname'),		$data);
			$data = str_replace('db_password',	$this->input->post('db_password'),	$data);						
			$data = str_replace('db_hname',		$this->input->post('db_hname'),		$data);
			write_file('./application/config/database.php', $data);
			
			///////replace new default routing controller/////
			$data2 = read_file('./application/config/routes.php');
			$data2 = str_replace('install','login',$data2);
			write_file('./application/config/routes.php', $data2);
			
			
			///////run the installer sql schema//////////			
			$this->load->database();
			
			$schema = read_file('./uploads/schoolmanager.sql');
  		
			$query = rtrim( trim($schema), "\n;");
			$query_list = explode(";", $query);
			
			foreach($query_list as $query)
				 $this->db->query($query);
				 
			///////replace the admin login credentials and site's info///////////
			$this->db->where('admin_id' , 1);
			$this->db->update('admin' , array('email'	=>	$this->input->post('email'),
												'password'	=>	$this->input->post('password')));
												
			$this->db->update('settings' , array('institute_name'	=>	$this->input->post('institute_name'),
													'page_title'	=>	$this->input->post('institute_name')));
			
			///////redirect to login page after completing installation
			$this->session->set_flashdata('installation_result' , 'success');
			redirect(base_url() , 'refresh');
		}
		else 
		{
			$this->session->set_flashdata('installation_result' , 'failed');
			redirect(base_url() , 'refresh');
		}
	}
	
	
	/*****DB VALIDATION FROM USER INPUT SETTINGS*********/
	function check_db_connection()
	{
		$link	=	@mysql_connect($this->input->post('db_hname'),
						$this->input->post('db_uname'),
							$this->input->post('db_password'));
		if(!$link)
		{
			@mysql_close($link);
		 	return false;
		}
		
		$db_selected	=	mysql_select_db($this->input->post('db_name'), $link);
		if (!$db_selected)
		{
			@mysql_close($link);
		 	return false;
		}
		
		@mysql_close($link);
		return true;
	}
	

	function setup($step=1)
	{	
		if(!$GLOBALS['is_installed'])
		{
			if($step==1)
			{
				$this->load->view('install/setup_step'.$step.'_view');
			}
			else if($step==2)
			{
				$this->load->view('install/setup_step'.$step.'_view');
			}
			else if($step==3)
			{
				if(isset($_POST))
				{

					$this->form_validation->set_message('required', 'Required');
					$this->form_validation->set_rules('db_name', 'Database Name', 'required');
					$this->form_validation->set_rules('db_uname', 'Database User Name', 'required');
					$this->form_validation->set_rules('db_password','Database Password', 'required');
					$this->form_validation->set_rules('db_hname','Database Host Name', 'required');
					$this->form_validation->set_rules('db_tabprefix','Database Table Prefix', 'required');
							
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('install/setup_step2_view');
					}
					else
					{
					
						if($this->check_db_connection()=="DBCONNFAIL")
						{
							$this->load->view('install/setup_step2_view',array('db_error'=>"Can not connect using provided settings"));
						}
						else if($this->check_db_connection()=="DBNOTEXIST")
						{
							$this->load->view('install/setup_step2_view',array('db_error'=>"Can not select Database"));
						}
						else if($this->check_db_connection()=="SUCCESS")
						{
							$data = read_file('./system/application/config/database.php');
							$data = str_replace('db_name',$this->input->post('db_name'),$data);
							$data = str_replace('db_uname',$this->input->post('db_uname'),$data);
							$data = str_replace('db_password',$this->input->post('db_password'),$data);						
							$data = str_replace('db_hname',$this->input->post('db_hname'),$data);
						    $data = str_replace('db_tabprefix',$this->input->post('db_tabprefix'),$data);

							if ( ! write_file('./system/application/config/database.php', $data))
							{
								 echo 'Unable to write the file.Please check your directory permission';
								 //redirect('install/setup/'.$step,'refresh');
							}
							$this->load->database();
							$schema = read_file('./install_config/vidplanet.sql');
				
							$schema = str_replace('db_tabprefix',$this->input->post('db_tabprefix'),$schema);			
							$query = rtrim( trim($schema), "\n;");
							$query_list = explode(";", $query);
							
							foreach($query_list as $query)
								 $this->db->query($query);
								 
							$this->load->view('install/setup_step'.$step.'_view');		
						}			
					}
				}
			}
			if($step==4)
			{
				if(isset($_POST))
				{
					$this->form_validation->set_message('required', 'Required');
					$this->form_validation->set_rules('name', 'Site Name', 'required');			//site name
					$this->form_validation->set_rules('title', 'Site title', 'required');		//site title
					$this->form_validation->set_rules('username', 'User Name', 'required');		//admin	
					$this->form_validation->set_rules('password', 'User Password', 'required');	//admin
					$this->form_validation->set_rules('email','User Email', 'required');		//admin
					$this->form_validation->set_rules('youtube_id', 'Youtube id', 'required');		//youtube id	
					$this->form_validation->set_rules('youtube_password', 'Youtube Password', 'required');	//youtube pass
					$this->form_validation->set_rules('youtube_developer_key','Youtube developer key', 'required');		//youtube dev key
								
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('install/setup_step3_view');
					}
					else
					{
						$this->load->database();
						$this->load->model('crud_model');
						$data = array(	'name' 					=> $this->input->post('name'),
										'title' 				=> $this->input->post('title'),
										'youtube_id' 			=> $this->input->post('youtube_id'),
										'youtube_password' 		=> $this->input->post('youtube_password'),
										'youtube_developer_key' => $this->input->post('youtube_developer_key'));
						$this->crud_model->update_site_info($data);
						
						/*Writing the youtube account info in library file*/
						$data3 = read_file('./system/application/libraries/ClassYouTubeAPI.php');
						$data3 = str_replace('youtube_developer_key',	$this->input->post('youtube_developer_key'),$data3);
						$data3 = str_replace('youtube_id',				$this->input->post('youtube_id'),$data3);
						$data3 = str_replace('youtube_password',		$this->input->post('youtube_password'),$data3);	
						write_file('./system/application/libraries/ClassYouTubeAPI.php', $data3);
						
						$data2 = array('username' => $this->input->post('username'),
										'password' => $this->input->post('password'),
										'email' => $this->input->post('email'));
						$this->crud_model->update_admin($data2);

						$data = read_file('./install_config/install_config.php');			//making the global installer true
						$data = str_replace('GLOBALS[\'is_installed\'] = false','GLOBALS[\'is_installed\'] = true',$data);
						if ( ! write_file('./install_config/install_config.php', $data))
						{
							 echo 'Unable to write the file.Please check your directory permission';
							 redirect('install/setup/'.$step,'refresh');
						}
						
						$data = read_file('./system/application/config/routes.php');			//making the default installer home
						$data = str_replace('install','video',$data);
						if ( ! write_file('./system/application/config/routes.php', $data))
						{
							 echo 'Unable to write the file.Please check your directory permission';
							 redirect('install/setup/'.$step,'refresh');
						}
						
						$this->load->view('install/setup_step'.$step.'_view');
					}
				}
			}

		}
		else
			echo "Already installed";
	}
	
}

/* End of file install.php */
/* Location: ./system/application/controllers/install.php */