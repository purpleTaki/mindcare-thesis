<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_services_model extends CI_Model
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

    public function save(){
        try{     
            if(empty($this->title) || empty($this->url) || empty($this->desc)){
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(
                'Title' => $this->title,
                'Link' => $this->url,
                'ShortDes' => $this->desc,
                'date_added' => $this->session->ID
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->article, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function update(){
        try{     
            if(empty($this->title) || empty($this->url) || empty($this->desc)){
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(
                'Title' => $this->title,
                'Link' => $this->url,
                'ShortDes' => $this->desc,
            );

            $this->db->trans_start();
            $this->db->where('ID',$this->ID);
            $this->db->update($this->Table->article, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }

    public function archive(){
        try{     
            $data = array(
                'archived' => 1,
            );

            $this->db->trans_start();
            $this->db->where('ID',$this->ID);
            $this->db->update($this->Table->article, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}

?>