<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobile extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);
		
        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }
        // if($this->session->usertype==1 || $this->session->usertype==2){
		// 	redirect(base_url().'dashboard/index', 'refresh');
		// }


		$model_list = [
			'mobile/Mobile_model' => 'mModel',
			'mobile/service/Mobile_services_model' => 'msModel'
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


	public function student_profile(){
		$this->mModel->userID = $this->input->get('ID');
		// echo json_encode($this->mModel->userID);
		$this->data['userID'] = $this->mModel->userID;
		$this->data['student_prof'] = $this->mModel->get_student_profile();
		$this->data['content'] = 'student_profile';
		$this->load->view('layout', $this->data);
	}
	public function edit_student_profile(){
		$this->mModel->userID = $this->input->get('ID');
		$this->data['userID'] = $this->mModel->userID;
		$this->data['student_prof'] = $this->mModel->get_student_profile();
		$this->data['content'] = 'edit_student_profile';
		$this->load->view('layout', $this->data);
	}
	public function schedule_appointment(){
		$this->mModel->userID = $this->input->get('ID');
		$this->data['userID'] = $this->mModel->userID;
		$this->data['student_prof'] = $this->mModel->get_student_profile();
		$this->data['counselor'] = $this->mModel->get_counselor();
		$this->data['content'] = 'schedule_appointment';
		$this->load->view('layout', $this->data);
	}
	public function mood(){
		$this->mModel->userID = $this->input->get('ID');
		$this->msModel->userID = $this->input->get('ID');
		$this->data['userID'] = $this->mModel->userID;
		$this->data['mood'] = $this->mModel->get_current_mood();
		$this->data['warning'] = $this->msModel->mood_threshold();
		$this->data['history'] = $this->mModel->mood_history();
		// var_dump($this->msModel->mood_threshold());
		$this->data['mood_stat'] = $this->mModel->mood_stat();
		$this->data['content'] = 'mood';
		$this->load->view('layout', $this->data);
	}
	public function view_appointments(){
		$this->mModel->userID = $this->input->get('ID');
		$this->data['userID'] = $this->mModel->userID;
		$this->data['appointment'] = $this->mModel->view_appointments();
		$this->data['counselor_appointment'] = $this->mModel->view_counselor_appointments();
		// $this->data['counselor'] = $this->mModel->get_sched_counselor();
		$this->data['content'] = 'view_appointment';
		$this->load->view('layout', $this->data);
	}

	public function view_articles(){
		$this->mModel->userID = $this->input->get('ID');
		$this->data['userID'] = $this->mModel->userID;
		$this->data['articles'] = $this->mModel->view_articles();
		// $this->data['counselor'] = $this->mModel->get_sched_counselor();
		$this->data['content'] = 'view_articles';
		$this->load->view('layout', $this->data);
	}
}


