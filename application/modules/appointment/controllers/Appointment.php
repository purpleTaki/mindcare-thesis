<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends MY_Controller
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
		} else if ($this->session->usertype == 2) {
			redirect(base_url() . 'dashboard/index', 'refresh');
		}

		$model_list = [
			'appointment/Appointment_model' => 'aModel',
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
		$this->data['appointments'] = $this->aModel->get_appointments();
		$this->data['appointments_c'] = $this->aModel->get_appointments_c();
		$this->data['content'] = 'index';
		$this->load->view('layout', $this->data);
	}
}
