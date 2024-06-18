<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_service extends MY_Controller
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
			'user/service/User_services_model' => 'usModel'
		];
		$this->load->model($model_list);
	}

	public function search()
	{
		$this->usModel->search = $this->input->post("search");

		$query = $this->usModel->search();
		$this->data['session'] =  $this->session;
		$this->data['users'] = $query;
		$this->data['content'] = 'grid/load_students';
		$this->load->view('layout', $this->data);
	}

	public function filter_dpt()
	{
		$this->usModel->dpt = $this->input->post("dpt");
		$this->usModel->qm = $this->input->post("qm");
		$this->usModel->yr = $this->input->post("yr");

		$query = $this->usModel->filter_dpt();
		$this->data['session'] =  $this->session;
		$this->data['mood_stat'] = $query;
		$this->data['content'] = 'grid/load_full';
		$this->load->view('layout', $this->data);
	}

	public function save()
	{
		$this->usModel->fname = $this->input->post("fname");
		$this->usModel->mname = $this->input->post("mname");
		$this->usModel->lname = $this->input->post("lname");
		$this->usModel->uname = $this->input->post("uname");
		$this->usModel->email = $this->input->post("email");
		$this->usModel->gender = $this->input->post("gender");
		$this->usModel->course = $this->input->post("course");
		$this->usModel->user = $this->input->post("usertype");
		$this->usModel->cnum = $this->input->post("cnum");
		$this->usModel->dpt = $this->input->post("dpt");

		$response = $this->usModel->save();
		echo json_encode($response);
	}

	public function update()
	{
		$this->usModel->ID = $this->input->post("ID");
		$this->usModel->fname = $this->input->post("fname");
		$this->usModel->mname = $this->input->post("mname");
		$this->usModel->lname = $this->input->post("lname");
		$this->usModel->uname = $this->input->post("uname");
		$this->usModel->email = $this->input->post("email");
		$this->usModel->gender = $this->input->post("gender");
		$this->usModel->course = $this->input->post("course");
		$this->usModel->user = $this->input->post("usertype");
		$this->usModel->cnum = $this->input->post("cnum");
		$this->usModel->dpt = $this->input->post("dpt");

		$response = $this->usModel->update();
		echo json_encode($response);
	}

	public function make_appointment()
	{
		$this->usModel->ID = $this->input->post("ID");
		$this->usModel->fromTime = $this->input->post("fromTime");
		$this->usModel->toTime = $this->input->post("toTime");
		$this->usModel->adate = $this->input->post("adate");

		$response = $this->usModel->make_appointment();
		echo json_encode($response);
	}


	public function reset()
	{
		$this->usModel->ID = $this->input->post("ID");

		$response = $this->usModel->reset();
		echo json_encode($response);
	}
}
