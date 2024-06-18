<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);

		if (is_empty_object($this->session)) {
			redirect(base_url() . 'login/authentication', 'refresh');
		}
		if ($this->session->usertype == 0) {
			redirect(base_url() . 'mobile/index?ID=' . $this->session->ID, 'refresh');
		}


		$model_list = [
			'user/User_model' => 'uModel',
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

	public function get_students()
	{
		$this->data['session'] =  $this->session;
		$this->data['users'] = $this->uModel->get_users();
		$this->data['content'] = 'grid/load_students';
		$this->load->view('layout', $this->data);
	}

	public function get_staff()
	{
		$this->data['session'] =  $this->session;
		$this->data['users'] = $this->uModel->get_users_staff();
		$this->data['content'] = 'grid/load_staff';
		$this->load->view('layout', $this->data);
	}

	public function load_chart()
	{
		$this->uModel->userID = $this->input->get('ID');
		$this->data['mood_stat'] = $this->uModel->mood_stat();
		$this->data['warning'] = $this->uModel->mood_threshold();
		$this->data['content'] = 'grid/load_chart';
		$this->load->view('layout', $this->data);
	}

	public function load_full()
	{
		// $this->uModel->userID = $this->input->get('ID');
		$this->data['mood_stat'] = $this->uModel->mood_stat_full();
		// $this->data['warning'] = $this->uModel->mood_threshold();
		$this->data['content'] = 'grid/load_full';
		$this->load->view('layout', $this->data);
	}
}
