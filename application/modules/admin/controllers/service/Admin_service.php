<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_service extends MY_Controller
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
			'admin/service/Admin_services_model' => 'asModel'
		];
		$this->load->model($model_list);
	}

	public function search()
	{
		$this->asModel->search = $this->input->post("search");

		$query = $this->asModel->search();
		$this->data['sess'] = $this->session;
		$this->data['users'] = $query;
		$this->data['content'] = 'grid/load_students';
		$this->load->view('layout', $this->data);
	}

	public function save()
	{
		$this->asModel->fname = $this->input->post("fname");
		$this->asModel->mname = $this->input->post("mname");
		$this->asModel->lname = $this->input->post("lname");
		$this->asModel->uname = $this->input->post("uname");
		$this->asModel->email = $this->input->post("email");
		$this->asModel->gender = $this->input->post("gender");
		$this->asModel->course = $this->input->post("course");
		$this->asModel->user = $this->input->post("usertype");

		$response = $this->asModel->save();
		echo json_encode($response);
	}

	public function update()
	{
		$this->asModel->ID = $this->input->post("ID");
		$this->asModel->fname = $this->input->post("fname");
		$this->asModel->mname = $this->input->post("mname");
		$this->asModel->lname = $this->input->post("lname");
		$this->asModel->uname = $this->input->post("uname");
		$this->asModel->email = $this->input->post("email");
		$this->asModel->gender = $this->input->post("gender");
		$this->asModel->course = $this->input->post("course");
		$this->asModel->user = $this->input->post("usertype");

		$response = $this->asModel->update();
		echo json_encode($response);
	}

	public function make_appointment()
	{
		$this->asModel->ID = $this->input->post("ID");
		$this->asModel->atime = $this->input->post("atime");
		$this->asModel->adate = $this->input->post("adate");

		$response = $this->asModel->make_appointment();
		echo json_encode($response);
	}
}
