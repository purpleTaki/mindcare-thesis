<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
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
    public function authentication()
    {

        try {

            if (empty($this->username) || empty($this->password)) {
                throw new Exception(REQUIRED_FIELD);
            }
            $this->db->select('*');
            $this->db->from($this->Table->user);
            $this->db->where('Username', $this->username);
            $query = $this->db->get()->row();

            if (empty($query)) {
                throw new Exception(NO_ACCOUNT, true);
            }
            if ($query->password !== sha1(password_generator($this->password, $query->locker))) {
                throw new Exception(NOT_MATCH, true);
            }
            if ($query->usertype == 1) {
                $this->db->select('ID');
                $this->db->where('counselorID', $query->ID);
                $this->db->where('Status', 'Pending');
                $this->db->where('DateStatus', null);
                $this->db->where('appointer', 0);
                $this->db->from($this->Table->appointment);
                $notif = $this->db->get()->result();
                $query->notif = count($notif);
            }

            set_userdata(USER, (array)$query);

            return array('has_error' => false, 'message' => 'Login Success', 'usertype' => $query->usertype, 'ID' => $query->ID, 'a' => $query->active);
        } catch (Exception $ex) {
            return array('error_message' => $ex->getMessage(), 'has_error' => true);
        }
    }
    public function change_pass()
    {

        try {

            if (empty($this->password)) {
                throw new Exception(REQUIRED_FIELD);
            }
            $locker = locker();
            $pw = sha1(password_generator($this->password, $locker));
            $data = array(
                'active' => 1,
                'password' => $pw,
                'locker' => $locker,
            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->user, $data);
            $this->db->trans_complete();

            return array('has_error' => false, 'message' => 'Login Success', 'usertype' => $this->usertype, 'ID' => $this->ID);
        } catch (Exception $ex) {
            return array('error_message' => $ex->getMessage(), 'has_error' => true);
        }
    }
}
