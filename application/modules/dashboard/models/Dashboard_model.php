<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public $Table;
    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_articles(){
        $this->db->select('*');
        $this->db->from($this->Table->article);
        $this->db->where('archived', 0);
        $this->db->order_by('date_added', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }


}
