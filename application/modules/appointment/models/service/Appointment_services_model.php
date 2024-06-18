<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Appointment_services_model extends CI_Model
{
    public $ID;
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

    public function search()
    {
        try {
            $this->db->select('*');
            $this->db->from($this->Table->user);
            $this->db->where('usertype', 0);
            if ($this->search) {
                $this->db->group_start();
                $this->db->like('username', $this->search);
                $this->db->or_like('fname', $this->search);
                $this->db->or_like('mname', $this->search);
                $this->db->or_like('lname', $this->search);
                $this->db->group_end();
            }
            $query = $this->db->get()->result();
            return $query;
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function save()
    {
        try {
            if (empty($this->fname) || empty($this->lname) || empty($this->uname) || empty($this->email) || empty($this->course)) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $this->db->select('um.*');
            $this->db->where('username', empty($this->uname));
            $this->db->from($this->Table->user);
            $checker_uname = $this->db->get()->row();

            if (!empty($checker_uname)) {
                throw new Exception(DUPLICATE_USERNAME_FOUND, true);
            }

            $pw = '123456';
            $locker = locker();

            $pw = sha1(password_generator($pw, $locker));
            $data = array(
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'username' => $this->uname,
                'email' => $this->email,
                'yearSection' => $this->course,
                'password' => $pw,
                'locker' => $locker,
                'sex' => $this->gender,
                'usertype' => $this->user,
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->user, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }


    public function update_status()
    {
        try {
            if (($this->status == 1 && empty($this->remarks)) || ($this->status == 2 && empty($this->remarks))) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $remarks = $this->remarks ?? 0;

            $status = ($this->status == '1' ? 1 : ($this->status == '0' ? 0 : 2));
            $data = array(
                'Status' => $status,
                'Remarks' => $remarks
            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->appointment, $data);

            $this->db->trans_complete();

            //updates notification yes
            $notif = $this->session->notif;

            // if($status!='Pending'){
            // echo 'aaaaaaa';
            $this->db->select('*');
            $this->db->from($this->Table->user);
            $this->db->where('Username', $this->session->username);
            $query = $this->db->get()->row();

            $this->db->select('ID');
            $this->db->where('counselorID', $query->ID);
            $this->db->where('Status', 'Pending');
            $this->db->where('DateStatus', null);
            $this->db->where('appointer', 0);
            $this->db->from($this->Table->appointment);
            $notif = $this->db->get()->result();
            $query->notif = count($notif);
            set_userdata(USER, (array)$query);
            // }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false, 'stat' => $status,  'a' => count($notif));
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }
}
