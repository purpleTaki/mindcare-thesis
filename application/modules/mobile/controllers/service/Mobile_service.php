<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mobile_service extends MY_Controller
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
			'mobile/service/Mobile_services_model' => 'msModel'
		];
		$this->load->model($model_list);
	}

	public function profile()
	{
		// $this->msModel->url = $this->input->post("article_url");
		// $this->msModel->title = $this->input->post("title");
		// $this->msModel->desc = $this->input->post("desc");

		$response = $this->msModel->save();
		echo json_encode($response);
	}
	public function edit_student_info()
	{
		$this->msModel->ID = $this->input->post("ID");
		$this->msModel->fname = $this->input->post("fname");
		$this->msModel->mname = $this->input->post("mname");
		$this->msModel->lname = $this->input->post("lname");
		$this->msModel->cnum = $this->input->post("cnum");
		$this->msModel->email = $this->input->post("email");

		$response = $this->msModel->edit_student_info();
		echo json_encode($response);
	}
	public function set_appointment()
	{
		$this->msModel->Date = $this->input->post("Date");
		// $this->msModel->Time = $this->input->post("Time");
		$this->msModel->studID = $this->input->post("studID");
		$this->msModel->counselorID = $this->input->post("counselorID");
		$this->msModel->fromTime = $this->input->post("fromTime");
		$this->msModel->toTime = $this->input->post("toTime");
		$this->msModel->Status = $this->input->post("Status");
		$response = $this->msModel->set_appointment();
		echo json_encode($response);
	}
	public function post_mood()
	{
		$this->msModel->User = $this->input->post("User");
		$this->msModel->Mood = $this->input->post("Mood");
		$this->msModel->Points = $this->input->post("Points");
		$response = $this->msModel->post_mood();
		echo json_encode($response);
	}
	public function approve_appointment()
	{
		$this->msModel->Status = $this->input->post("Status");
		$this->msModel->ID = $this->input->post("ID");
		$this->msModel->Remarks = $this->input->post("Remarks");
		$response = $this->msModel->approve_appointment();
		echo json_encode($response);
	}
	public function set_appointment_pending()
	{
		$this->msModel->Status = $this->input->post("Status");
		$this->msModel->ID = $this->input->post("ID");
		$this->msModel->Remarks = $this->input->post("Remarks");
		// echo json_encode($this->msModel->Status);
		$response = $this->msModel->set_appointment_pending();
		echo json_encode($response);
	}
	public function set_appointment_cancel()
	{
		$this->msModel->Status = $this->input->post("Status");
		$this->msModel->ID = $this->input->post("ID");
		$this->msModel->Remarks = $this->input->post("Remarks");
		$response = $this->msModel->set_appointment_cancel();
		echo json_encode($response);
	}
	public function acknowledge()
	{
		$this->msModel->ID = $this->input->post("User");
		$response = $this->msModel->acknowledge();
		echo json_encode($response);
	}
}
