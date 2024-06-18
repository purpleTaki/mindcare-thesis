<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Appointment_model extends CI_Model
{
    public $Table;
    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_appointments()
    {
        $this->db->select('apt.*,' . 'u.username');
        $this->db->join($this->Table->user . ' u', 'apt.studID = u.ID', 'inner');
        $this->db->from($this->Table->appointment . ' apt');
        if($this->session->usertype!=3){
            $this->db->where('counselorID', $this->session->ID);
        }
        $this->db->where('appointer', 0);
        $this->db->order_by('FIELD(Status, "Pending", "Approved", "Denied") ASC, DateAdded ASC');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_appointments_c()
    {
        $this->db->select('apt.*,' . 'u.username, u.fname, u.mname, u.lname');
        $this->db->join($this->Table->user . ' u', 'apt.studID = u.ID', 'inner');
        $this->db->from($this->Table->appointment . ' apt');
        $this->db->where('counselorID', $this->session->ID);
        $this->db->where('appointer', 1);
        $this->db->order_by('FIELD(Status, "Pending", "Approved", "Denied") ASC, DateAdded ASC');
        $query = $this->db->get()->result();
        return $query;
    }

    public function mood_stat()
    {
        $this->db->select('um.*');
        $this->db->where('um.User', $this->userID);
        $this->db->from($this->Table->user_mood . ' um');
        $query = $this->db->get()->result();
        return $query;
    }
}
