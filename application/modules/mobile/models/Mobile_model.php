<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mobile_model extends CI_Model
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

    public function get_student_profile()
    {
        $this->db->select('*');
        $this->db->from($this->Table->user);
        $this->db->where('ID', $this->userID);
        // $this->db->order_by('date_added', 'DESC');
        $query = $this->db->get()->row();
        return $query;
    }

    public function mood_history()
    {
        $this->db->select('um.*,' . 'm.Mood as md');
        $this->db->where('um.User', $this->userID);
        $this->db->join($this->Table->mood . ' m', 'um.Mood = m.ID', 'inner');
        $this->db->from($this->Table->user_mood . ' um');
        $this->db->order_by('um.DateAdded', 'DESC');
        $query = $this->db->get()->result();
        // var_dump($query);
        return $query;
    }

    public function get_counselor()
    {
        $this->db->select('*');
        $this->db->from($this->Table->user);
        $this->db->where('usertype', 1);
        // $this->db->order_by('date_added', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }
    public function view_appointments()
    {
        $this->db->select('apt.*,' . 'user.*,' . 'apt.ID as aptID');
        $this->db->from($this->Table->appointment . ' apt');
        $this->db->join($this->Table->user . ' user', 'apt.counselorID = user.ID');
        $this->db->where('studID', $this->userID);
        $this->db->where('appointer', 0);
       
        $this->db->order_by('Status', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }
    public function view_counselor_appointments()
    {
        $this->db->select('apt.*,' . 'user.*,' . 'apt.ID as aptID');
        $this->db->from($this->Table->appointment . ' apt');
        $this->db->join($this->Table->user . ' user', 'apt.counselorID = user.ID');
        $this->db->where('studID', $this->userID);
        $this->db->where('appointer', 1);
        // $this->db->where('status', 0);
        $this->db->order_by('Status', 'ASC');
        $query = $this->db->get()->result();
        return $query;
    }
    public function view_articles()
    {
        $this->db->select('*');
        $this->db->from($this->Table->article);
        $this->db->where('archived', 0);
        $this->db->order_by('ID', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_current_mood()
    {  
        $this->db->select('um.*,' . 'm.Mood as md');
        $this->db->where('um.User', $this->userID);
        $this->db->where('DATE(um.DateAdded)', date('Y-m-d'));
        $this->db->join($this->Table->mood . ' m', 'um.Mood = m.ID', 'inner');
        $this->db->from($this->Table->user_mood . ' um');
        $this->db->order_by('um.ID', 'DESC');
        $query = $this->db->get()->row();
        // var_dump($query);
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
