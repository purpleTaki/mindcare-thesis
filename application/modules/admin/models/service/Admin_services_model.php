<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_services_model extends CI_Model
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
                return array('message' => 'save success', 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }


    public function update()
    {
        try {

            $data = array(
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'username' => $this->uname,
                'email' => $this->email,
                'yearSection' => $this->course,
                'sex' => $this->gender,
                'usertype' => $this->user,
            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->user, $data);

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

    public function make_appointment()
    {
        try {
            $this->db->select('*');
            $this->db->from($this->Table->appointment);
            $this->db->where('studID', $this->ID);
            $this->db->where('counselorID', $this->session->ID);
            $this->db->where('Date', $this->aDate);
            $this->db->where('Time', $this->aTime);
            $existingRecord = $this->db->get()->row();
    
            if ($existingRecord) {
                // Record already exists, notify and do not insert
                return array('message' => 'There is an existing appointment set for this time and date', 'has_error' => true);
            }

            if (strtotime($this->adate) < strtotime(date('Y-m-d'))) {
                return array('message' => 'Cannot schedule an appointment for days already passed before today', 'has_error' => true);
            }

            if (strtotime($this->atime) < strtotime('08:00:00')) {
                return array('message' => 'Appointment Scheduling start at 8am', 'has_error' => true);
            }

            $data = array(
                'studID' => $this->ID,
                'counselorID' => $this->session->ID,
                'appointer_name' => $this->session->fname . ' ' . $this->session->lname,
                'Date' => $this->adate,
                'time' => $this->atime,
                'appointer' => 1
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->appointment, $data);
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
}
