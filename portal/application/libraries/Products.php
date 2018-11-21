<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products{
	
	function __construct() {
        parent::__construct();

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



    public function getOveragePlans()
    {
        $result = $this->mod->getOveragePlansPlan();


        $options = "<option value=''>Select</option>";

        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->plan."'>".$cada->plan."</option>";
        }


        echo json_encode(array('return'=>true, 'plans'=>$options)); exit;


    }

    public function getOverageDatas()
    {
        $params = $this->input->post();

        $result = $this->mod->getOveragePlansData($params['plans']);


        $options = "<option value=''>Select</option>";

        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->data."'>".$cada->data."</option>";
        }


        echo json_encode(array('return'=>true, 'datas'=>$options)); exit;


    }

    public function getOverageCarriers()
    {
        $params = $this->input->post();

        $result = $this->mod->getOveragePlansCarrier($params['plans'],$params['datas']);


        $options = "<option value=''>Select</option>";

        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->coverage."'>".$cada->coverage."</option>";
        }


        echo json_encode(array('return'=>true, 'carriers'=>$options)); exit;


    }

    public function getOverageTypes()
    {
        $params = $this->input->post();

        $result = $this->mod->getOveragePlansTypes($params['plans'],$params['datas'], $params['carriers']);


        $options = "<option value=''>Select</option>";

        foreach ($result as $key => $cada) {
            $options .= "<option value='".$cada->recurring."'>".$cada->recurring."</option>";
        }


        echo json_encode(array('return'=>true, 'types'=>$options)); exit;


    }

    public function getOverageFull()
    {
        $params = $this->input->post();

        $result = $this->mod->getOveragePlansFull($params['plans'],$params['datas'], $params['carriers'], $params['types']);

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
}