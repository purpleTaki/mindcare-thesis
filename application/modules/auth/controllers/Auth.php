<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);
		$model_list = [
			'auth/Auth_model' => 'aModel',
		];
        $this->load->model($model_list);
        // $this->Table = json_decode(TABLE);
	}

	public function login()
{
    $this->aModel->username = $this->input->post('username');
    $this->aModel->password = $this->input->post('password');
	log_message('debug', 'Received data from Android Studio - Username: ' .  $this->aModel->username . ', Password: ' . $this->aModel->password);
    // Check if the credentials are valid
    $result = $this->aModel->check_credentials();

    // Send a JSON response including user data
    $response = array(
        'has_error' => $result['has_error'],
        'message' => $result['message'],
        'usertype' => isset($result['usertype']) ? $result['usertype'] : null,
        'ID' => isset($result['ID']) ? $result['ID'] : null
    );

    log_message('debug', 'Controller Response: ' . json_encode($response)); // Convert array to JSON for logging
    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}


}
