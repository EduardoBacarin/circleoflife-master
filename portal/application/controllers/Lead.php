<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$portal_path = PORTALPATH;



class Lead extends CI_Controller {

    public $route;

    public function __construct(){
        parent::__construct();
        $this->load->library('routerhelper');
        $choiceRoute = $this->routerhelper->whichsubroute();
        $this->route = $db_group = $choiceRoute[0];
        $this->db = $this->load->database($db_group, TRUE);
        $this->load->model('model_accounts');
    }
    
    public function edit(){
        $this->load->library('loadviews');
        if($this->session->userdata('is_loggedin')){
            $data = array();
            if($this->input->post('update')){
                if($this->input->post('leadName')!=""){
                    $data['name'] = $this->input->post('leadName');
                }
                if($this->input->post('leadAddress')!=""){
                    $data['address'] = $this->input->post('leadAddress');
                }
                if($this->input->post('leadFirstName')!=""){
                    $data['fname'] = $this->input->post('leadFirstName');
                }
                if($this->input->post('leadLastName')!=""){
                    $data['lname'] = $this->input->post('leadLastName');
                }
                if($this->input->post('leadPhone')!=""){
                    $data['phone'] = $this->input->post('leadPhone');
                }
                if($this->input->post('leadNotes')!=""){
                    $data['notes'] = $this->input->post('leadNotes');
                }
                if($this->input->post('leadStatus')!=""){
                    $data['status'] = $this->input->post('leadStatus');
                }
                $this->db->where('id', $this->input->post('lead_id'));
                $this->db->update('leads', $data);
                redirect(PORTALPATH."main/viewlead/".$this->input->post('lead_id'));
            }else if($this->input->post('create')){
                $this->loadviews->createAccountFromLead($this, $this->input->post('lead_id'));
            }else if($this->input->post('delete')){
                $this->db->delete('leads', array('id' => $this->input->post('lead_id')));
                redirect(PORTALPATH."main/viewleads/all");
            }
        }else{
            $this->loadviews->loginView($this);
        }
    }

    public function log(){
        $this->load->library('loadviews');
        $this->load->model('model_accounts');
        if($this->session->userdata('is_loggedin')){
            if($this->input->post('updateLog')){
                if($this->input->post('leadLogComment')!=""){
                    $data['notes'] = $this->input->post('leadLogComment');
                }
                if($this->input->post('leadLogDate')!=""){
                    $data['date'] = $this->input->post('leadLogDate');
                }
                if($this->input->post('leadLogTime')!=""){
                    $data['date'] = $this->input->post('leadLogDate')." ".$this->input->post('leadLogTime');
                }
                if($this->input->post('logStatus')!=""){
                    $data['status'] = $this->input->post('logStatus');
                }
                if($this->input->post('lead_id')!=""){
                    $data['leads_id'] = $this->input->post('lead_id');
                }
                if($this->input->post('salesRep_id')!=""){
                    $data['account_id'] = $this->input->post('salesRep_id');
                }

                $this->db->insert('leads_log', $data);
                redirect(PORTALPATH."main/viewlead/".$this->input->post('lead_id'));

            }else{
                
            }
        }else{
            $this->loadviews->loginView($this);
        }
    }
}
?>