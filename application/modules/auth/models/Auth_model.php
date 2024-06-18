<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public $Username;
    public $Password;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }
    public function check_credentials() {
        // Retrieve the hashed password from the database
        $this->db->select('*');
            $this->db->from($this->Table->user);
            $this->db->where('username', $this->username);
            $query = $this->db->get()->row();
            
            if(empty($query)){
                throw new Exception(NO_ACCOUNT, true);
            }
            if($query->password !== sha1(password_generator($this->password,$query->locker)) ){
                throw new Exception(NOT_MATCH, true);
            }
            // $query->from = $from;
            set_userdata(USER,(array)$query);
            // set_userdata(SAMPLE,(array)$sample);

            return array('has_error' => false, 'message' => 'Login Success', 'usertype' => $query->usertype, 'ID' => $query->ID);
        } 
    
}
