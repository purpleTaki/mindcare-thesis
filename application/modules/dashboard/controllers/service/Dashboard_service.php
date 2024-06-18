<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_service extends MY_Controller
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
			'dashboard/service/Dashboard_services_model' => 'dsModel'
		];
		$this->load->model($model_list);
	}

	public function save()
	{
		$this->dsModel->url = $this->input->post("article_url");
		$this->dsModel->title = $this->input->post("title");
		$this->dsModel->desc = $this->input->post("desc");

		$response = $this->dsModel->save();
		echo json_encode($response);
	}

	public function update()
	{
		$this->dsModel->url = $this->input->post("article_url");
		$this->dsModel->title = $this->input->post("title");
		$this->dsModel->desc = $this->input->post("desc");
		$this->dsModel->ID = $this->input->post("ID");

		$response = $this->dsModel->update();
		echo json_encode($response);
	}

	public function archive()
	{
		$this->dsModel->ID = $this->input->post("ID");

		$response = $this->dsModel->archive();
		echo json_encode($response);
	}
}
