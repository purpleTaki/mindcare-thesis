<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);
		
        if(is_empty_object($this->session)){
        	redirect(base_url().'login/authentication', 'refresh');
        }
        if($this->session->usertype==0){
			redirect(base_url().'mobile/index?ID='.$this->session->ID, 'refresh');
		}


		$model_list = [
			'admin/Admin_model' => 'aModel',
		];
		$this->load->model($model_list);
	}

	/** load main page */
	public function index()
	{
		// if (
		// 	!check_permission($this->session->Role, ['Admin'])
		// ) {
		// 	redirect(base_url() . 'login', 'refresh');
		// }

		$this->data['session'] =  $this->session;
		$this->data['content'] = 'index';
		$this->load->view('layout', $this->data);
	}

	public function get_students(){
		$this->data['session'] =  $this->session;
		$this->data['users'] = $this->aModel->get_users();
		$this->data['content'] = 'grid/load_students';
		$this->load->view('layout', $this->data);
	}

	public function load_chart(){
		$this->aModel->userID = $this->input->get('ID');
		$this->data['mood_stat'] = $this->aModel->mood_stat();
		$this->data['warning'] = $this->aModel->mood_threshold();
		$this->data['content'] = 'grid/load_chart';
		$this->load->view('layout', $this->data);
	}

}
