<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mobile_services_model extends CI_Model
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
        date_default_timezone_set('UTC');
    }

    public function save()
    {
        try {
            if (empty($this->title) || empty($this->url) || empty($this->desc)) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(
                'title' => $this->title,
                'url' => $this->url,
                'descr' => $this->desc,
                'added_by' => $this->session->ID
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->article, $data);
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

    public function edit_student_info()
    {
        try {
            // if(empty($this->title) || empty($this->url) || empty($this->desc)){
            //     throw new Exception(MISSING_DETAILS, true);
            // }

            $data = array(
                'fname' => $this->fname,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'cnum' => $this->cnum,
                'email' => $this->email,
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

    public function archive()
    {
        try {
            $data = array(
                'archived' => 1,
            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->article, $data);
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
    public function set_appointment()
    {
        try {
            $date = date('Y-m-d H:i:s');
            if (empty($this->Date) || empty($this->counselorID)) {
                throw new Exception('EMPTY_FIELDS');
            }
            $this->db->select('*');
            $this->db->from($this->Table->appointment);
            // $this->db->where('studID', $this->studID); // Comment this 
            // $this->db->where('counselorID', $this->counselorID);
            $this->db->where('Date', $this->Date);
            $this->db->where('fromTime', $this->fromTime);
            $this->db->where('toTime', $this->toTime);  
            $existingRecord = $this->db->get()->result();

            if ($existingRecord) {
                // Record already exists, notify and do not insert
                return array('message' => 'There is an existing appointment set for this time and date', 'has_error' => true);
            }

            if (strtotime($this->Date) < strtotime(date('Y-m-d'))) {
                return array('message' => 'Cannot schedule an appointment for days already passed before today', 'has_error' => true);
            }

            // if (strtotime($this->Time) < strtotime('08:00:00')) {
            //     return array('message' => 'Appointment Scheduling start at 8am', 'has_error' => true);
            // }

            $data = array(
                'studID' => $this->studID,
                'counselorID' => $this->counselorID,
                'appointer_name' => $this->session->fname . ' ' . $this->session->lname,
                'Date' => $this->Date,
                'fromTime' => $this->fromTime,
                'toTime' => $this->toTime,
                'DateAdded' => $date,
                'Status' => $this->Status
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
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }
    public function post_mood()
    {
        try {
            // $date = date('Y-m-d H:i:s');
            // if(empty($this->Date) || empty(($this->Time))){
            //     throw new Exception('EMPTY_FIELDS');
            // }
            $data = array(
                'User' => $this->User,
                'Mood' => $this->Mood,
                'Points' => $this->Points,
                // 'DateAdded' => $date
            );
            $this->db->trans_start();
            $this->db->insert($this->Table->user_mood, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }
    public function approve_appointment()
    {
        try {
            // $date = date('Y-m-d H:i:s');
            // if(empty($this->Date) || empty(($this->Time))){
            //     throw new Exception('EMPTY_FIELDS');
            // }
            $data = array(
                'Status' => $this->Status,
                'Remarks' => $this->Remarks,
                // 'DateStatus' => $date,
            );
            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->appointment, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => 'APPOINTMENT IS APPROVED', 'has_error' => false, 'ID' => $this->ID);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }
    public function set_appointment_pending()
    {
        try {
            // $date = date('Y-m-d H:i:s');
            // if(empty($this->Date) || empty(($this->Time))){
            //     throw new Exception('EMPTY_FIELDS');
            // }
            $data = array(
                'Status' => $this->Status,
                'Remarks' => $this->Remarks,
                // 'DateStatus' => $date
            );
            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->appointment, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => 'APPOINTMENT SET TO PENDING', 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }
    public function set_appointment_cancel()
    {
        try {
            // $date = date('Y-m-d H:i:s');
            // if(empty($this->Date) || empty(($this->Time))){
            //     throw new Exception('EMPTY_FIELDS');
            // }
            $data = array(
                'Status' => $this->Status,
                'Remarks' => $this->Remarks,
                // 'DateStatus' => $date
            );
            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            $this->db->update($this->Table->appointment, $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => 'APPOINTMENT IS CANCELLED', 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }

    public function acknowledge()
    {
        try {
            $data = array(
                'notif' => 2
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
                return array('has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), '' => true));
        }
    }

    public function mood_threshold()
    {
        $this->db->select('notif');
        $this->db->from($this->Table->user);
        $this->db->where('ID', $this->userID);
        $this->db->where('notif', 2);
        $que = $this->db->get()->row();
        if (empty($que) || $que == null) {
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
            $cw = $count_weeks == 0 ? 1 : $count_weeks;
            if ($q_date >= 0 && $point >= $cw * 21) {
                // echo 'a';
                $this->update_notif(0);
            } else {
                if ($point >= 21) {
                    // echo 'aa';
                    $this->update_notif(0);
                } else {
                    // echo 'aaa';
                    $this->update_notif(1);
                }
            }
        }

        // ($q_date >= 0 && $point >= $count_weeks * 21) ? $this->update_notif(0) : (($point >= 21 )? $this->update_notif(0) : $this->update_notif(1));
        $this->db->select('*');
        $this->db->from($this->Table->user);
        $this->db->where('ID', $this->userID);
        $this->db->where('notif !=', 1);
        $this->db->where('notif !=', 2);
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
