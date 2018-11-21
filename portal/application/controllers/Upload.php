<?php

class Upload extends CI_Controller {

        public $route;
        public function __construct(){
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('routerhelper');
                $choiceRoute = $this->routerhelper->whichsubroute();
                $this->route = $db_group = $choiceRoute[0];
        }
        
        public function do_upload_leads(){
                
                $this->load->library('form_validation');
                $this->load->helper('security');
                $this->load->library('loadviews');

                $this->form_validation->set_rules('salesRep', 'Sales Rep', 'required');

                if (empty($_FILES['userfile']['name'])){
                        $this->form_validation->set_rules('userfile', 'Input File', 'required');
                }

                if($this->form_validation->run()){

                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'xml|kml';
                        $config['max_size']             = 50000;
                        $config['max_width']            = 50000;
                        $config['max_height']           = 50000;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('userfile')){
                                $error = array('error' => $this->upload->display_errors());                        
                                $this->loadviews->createLead($this, $error);
                        }else{
                                $this->load->model('model_accounts');
                                $data = array(
                                        'upload_data'   => $this->upload->data(),
                                        'salesRep'      => $this->input->post('salesRep', true)
                                );
                                $this->model_accounts->insertLeadsFromXML($data);
                                $this->loadviews->createLead($this, $data);
                        }
                }else{
                        $error = array('error' => "Please select a KML file and/or a sales rep!");                        
                        $this->loadviews->createLead($this, $error);
                }
        }

        public function do_upload_products(){
                $this->load->library('loadviews');
                if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin")
                {
                        $this->load->library('form_validation');
                        $this->load->helper('security');
                        $this->load->model('model_accounts');

                        if (!empty($_FILES['userfile']['name'])){
                                $config['upload_path']          = './uploads/';
                                $config['allowed_types']        = 'csv|txt';
                                $config['max_size']             = 50000;
                                $config['max_width']            = 50000;
                                $config['max_height']           = 50000;
                                $this->load->library('upload', $config);

                                if (!$this->upload->do_upload('userfile')){
                                        $error = array('error' => $this->upload->display_errors());                        
                                        $this->loadviews->createProduct($this, $error);
                                }else{
                                        $this->load->model('model_products');
                                        $data = array(
                                                'upload_data'   => $this->upload->data()
                                        );
                                        $this->model_products->insertProductFromCSV($data);
                                        $this->loadviews->createProduct($this, $data);
                                }
                        }else{
                                $error = array('error' => "Please select a CSV file or enter a product.");                        
                                $this->loadviews->createProduct($this, $error);
                        }
                }else{
                        $this->loadviews->loginView($this);
                }
        }
}
?>