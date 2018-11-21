<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $route;
    public function __construct(){
        parent::__construct();
        $this->load->library('routerhelper');
        $choiceRoute = $this->routerhelper->whichsubroute();
        $this->route =$db_group = $choiceRoute[0];
        $this->db = $this->load->database($db_group, TRUE);
        $this->load->model("model_products","mod");
    }

    public function getLeasePlans()
    {
    	$result = $this->mod->getLeasePlansPlan();
    	$options = "<option value=''>Select</option>";
    	foreach ($result as $key => $cada) {
    		$options .= "<option value='".$cada->plan."'>".$cada->plan."</option>";
    	}
    	echo json_encode(array('return'=>true, 'plans'=>$options)); exit;
    }

    public function getLeaseDatas()
    {
    	$params = $this->input->post();
    	$result = $this->mod->getLeasePlansData($params['plans']);
    	$options = "<option value=''>Select</option>";
    	foreach ($result as $key => $cada) {
    		$options .= "<option value='".$cada->data."'>".$cada->data."</option>";
    	}
    	echo json_encode(array('return'=>true, 'datas'=>$options)); exit;
    }

    public function getLeaseCarriers()
    {
    	$params = $this->input->post();
    	$result = $this->mod->getLeasePlansCarrier($params['plans'],$params['datas']);
    	$options = "<option value=''>Select</option>";
    	foreach ($result as $key => $cada) {
    		$options .= "<option value='".$cada->coverage."'>".$cada->coverage."</option>";
    	}
    	echo json_encode(array('return'=>true, 'carriers'=>$options)); exit;
    }

    public function getLeaseTypes()
    {
    	$params = $this->input->post();
    	$result = $this->mod->getLeasePlansTypes($params['plans'],$params['datas'], $params['carriers']);
    	$options = "<option value=''>Select</option>";
    	foreach ($result as $key => $cada) {
    		$options .= "<option value='".$cada->recurring."'>".$cada->recurring."</option>";
    	}
    	echo json_encode(array('return'=>true, 'types'=>$options)); exit;
    }

    public function getLeaseFull()
    {
    	$params = $this->input->post();
    	$result = $this->mod->getLeasePlansFull($params['plans'],$params['datas'], $params['carriers'], $params['types']);
    	echo json_encode(array('return'=>true, 'full'=>$result[0])); exit;
    }

    public function getStandardType()
    {
        $result = $this->mod->getStandardType();
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->type."'>".$cada->type."</option>";
        }
        echo json_encode(array('return'=>true, 'types'=>$options)); exit;
    }

    public function getStandardItem()
    {
        $result = $this->mod->getStandardItem($this->input->post('type'));
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->code."'>".$cada->description."</option>";
        }
        echo json_encode(array('return'=>true, 'item'=>$options)); exit;
    }

    public function getStandardProduct()
    {
        $result = $this->mod->getStandardProduct($this->input->post("code"));
        echo json_encode(array('return'=>true, 'standard'=>$result[0])); exit;
    }

    public function getConnectPlans()
    {
        $result = $this->mod->getConnectPlansPlan();
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->plan."'>".$cada->plan."</option>";
        }
        echo json_encode(array('return'=>true, 'plans'=>$options)); exit;
    }

    public function getConnectDatas()
    {
        $params = $this->input->post();
        $result = $this->mod->getConnectPlansData($params['plans']);
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->data."'>".$cada->data."</option>";
        }
        echo json_encode(array('return'=>true, 'datas'=>$options)); exit;
    }

    public function getConnectCarriers()
    {
        $params = $this->input->post();
        $result = $this->mod->getConnectPlansCarrier($params['plans'],$params['datas']);
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->coverage."'>".$cada->coverage."</option>";
        }
        echo json_encode(array('return'=>true, 'carriers'=>$options)); exit;
    }

    public function getConnectRecurring()
    {
        $params = $this->input->post();
        $result = $this->mod->getConnectPlansTypes($params['plans'],$params['datas'], $params['carriers']);
        $options = "<option value=''>Select</option>";

        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->recurring."'>".$cada->recurring."</option>";
        }
        echo json_encode(array('return'=>true, 'types'=>$options)); exit;
    }

    public function getConnectFull()
    {
        $params = $this->input->post();
        $result = $this->mod->getConnectPlansFull($params['plans'],$params['datas'], $params['carriers'], $params['types']);
        echo json_encode(array('return'=>true, 'full'=>$result[0])); exit;
    }

    
    public function getSpecialPlans()
    {
        $result = $this->mod->getSpecialPlansPlan();
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->plan."'>".$cada->plan."</option>";
        }
        echo json_encode(array('return'=>true, 'plans'=>$options)); exit;
    }

    public function getSpecialDatas()
    {
        $params = $this->input->post();
        $result = $this->mod->getSpecialPlansData($params['plans']);
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->data."'>".$cada->data."</option>";
        }
        echo json_encode(array('return'=>true, 'datas'=>$options)); exit;
    }

    public function getSpecialCarriers()
    {
        $params = $this->input->post();
        $result = $this->mod->getSpecialPlansCarrier($params['plans'],$params['datas']);
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->coverage."'>".$cada->coverage."</option>";
        }
        echo json_encode(array('return'=>true, 'carriers'=>$options)); exit;
    }

    public function getSpecialTypes()
    {
        $params = $this->input->post();
        $result = $this->mod->getSpecialPlansTypes($params['plans'],$params['datas'], $params['carriers']);
        $options = "<option value=''>Select</option>";
        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->recurring."'>".$cada->recurring."</option>";
        }
        echo json_encode(array('return'=>true, 'types'=>$options)); exit;
    }

    public function getSpecialFull()
    {
        $params = $this->input->post();
        $result = $this->mod->getSpecialPlansFull($params['plans'],$params['datas'], $params['carriers'], $params['types']);
        echo json_encode(array('return'=>true, 'full'=>$result[0])); exit;
    }

    public function addStandardProductFromForm(){
        $this->load->library('loadviews');
        
        if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin"){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->model('model_accounts');

            $this->form_validation->set_rules('code', 'Code', 
            'required|trim|xss_clean');
            $this->form_validation->set_rules('type', 'Type', 
            'required|trim|xss_clean');
            $this->form_validation->set_rules('price', 'Price', 
            'required|trim|xss_clean');
            $this->form_validation->set_rules('commission', 'Commission', 
            'required|trim|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 
            'required|trim|xss_clean');

            if($this->form_validation->run()){
                $this->load->model('model_products');
                $formData = array(
                    'code'  => $this->input->post('code'),
                    'active'    => 1,
                    'type'  => $this->input->post('type'),
                    'price' => $this->input->post('price'),
                    'commission'    => $this->input->post('commission'),
                    'description'   => $this->input->post('description')
                );
                $data = array(
                    'form_data' => $formData
                );
                $product_id = $this->model_products->insertProduct($formData);
                $this->loadviews->createProduct($this, $data);
            }else{
                $error = array('error' => "Please select a CSV file or enter a product.");                        
                $this->loadviews->createProduct($this, $error);
            }
        }
    }
}