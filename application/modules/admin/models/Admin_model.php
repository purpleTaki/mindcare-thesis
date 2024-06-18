<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
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

    public function get_users(){
        $this->db->select('*');
        $this->db->from($this->Table->user);
        $this->db->where('usertype', 0);
        $this->db->order_by('date_created', 'DESC');
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

    public function mood_threshold()
    {
        $this->db->select('SUM(um.Points) as totalPoints');
        $this->db->where('um.User', $this->userID);
        $this->db->from($this->Table->user_mood . ' um');
        $pointr = $this->db->get()->row();
        $point = $pointr->totalPoints ?? 0;

        $endDate = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('-1 week', strtotime($endDate)));

        $this->db->select('User');
        $this->db->where('DateAdded >=', $startDate);
        $this->db->where('DateAdded <=', $endDate);
        $this->db->where('tbl_user_mood.User', $this->userID);
        $this->db->from($this->Table->user_mood);

        $q_date = $this->db->get()->num_rows();

        $this->db->select('ID');
        $this->db->where('User', $this->userID);

        $this->db->where("DATEDIFF(CURDATE(), DateAdded) >= 0", NULL, FALSE);
        $this->db->where("DATEDIFF(CURDATE(), DateAdded) <= 7", NULL, FALSE);

        $this->db->from($this->Table->user_mood);

        $count_weeks = $this->db->get()->num_rows();
        $cw = $count_weeks==0 ? 1 : $count_weeks;
        // echo $point.' q'.$q_date.' c'.$cw;
        if ($q_date > 0 && $point >= $cw * 21) {
            // echo 'aa';
            $this->update_notif(0);
        } else {
            if ($point >= 10) {
                $this->update_notif(0);
                // echo 'aaa';
                
            } else {
                $this->update_notif(1);
                // echo 'aaaa';
            }
        }
        // ($q_date >= 0 && $point >= $count_weeks * 21) ? $this->update_notif(0) : (($point >= 21 )? $this->update_notif(0) : $this->update_notif(1));
        $this->db->select('*');
        $this->db->from($this->Table->user);
        $this->db->where('ID', $this->userID);
        $this->db->where('notif !=', 1);
        $query = $this->db->get()->row();
        return $query;
    }

    
	public function update_notif($num)
    {
        $this->db->trans_start();
        $this->db->where('ID', $this->userID);
        $this->db->update($this->Table->user, array('notif' => $num));
        $this->db->trans_complete();
        return true;
    }


}
