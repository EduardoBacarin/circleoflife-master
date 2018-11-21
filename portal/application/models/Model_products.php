<?php

class Model_products extends CI_Model {

	private $db;

	public function __construct(){
	    parent::__construct();
	    $this->load->library('routerhelper');
	    $choiceRoute = $this->routerhelper->whichsubroute();
	    $db_group = $choiceRoute[0];
	    $this->db = $this->load->database($db_group, TRUE);
    }

	public function getLeasePlansPlan()
	{
		return $this->db->where("active",1)
						->distinct()
						->select("plan")
						->order_by("plan")
						->get("lease_plans")
						->result();
	}


	public function getLeasePlansData($plan)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->distinct()
						->select("data")
						->order_by("data")
						->get("lease_plans")
						->result();
	}

	public function getLeasePlansCarrier($plan, $data)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->distinct()
						->select("coverage")
						->order_by("coverage")
						->get("lease_plans")
						->result();
	}

	public function getLeasePlansTypes($plan, $data,$carrier)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->distinct()
						->select("recurring")
						->order_by("recurring")
						->get("lease_plans")
						->result();
	}

	public function getLeasePlansFull($plan, $data,$carrier, $types)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->where('recurring',$types)
						->distinct()
						->select("*")
						->get("lease_plans")
						->result();
	}

	public function getStandardType(){
		return $this->db->where("active",1)
						->distinct()
						->select("type")
						->group_by("type")
						->get("standard_products")
						->result();
	}

	public function getStandardItem($type){
		return $this->db->where("active",1)
						->where("type",$type)
						->distinct()
						->select("code,description")
						->order_by("code", "asc")
						->get("standard_products")
						->result();
	}

	public function getStandardProduct($code){
		return $this->db->where("active",1)
						->where("code",$code)
						->distinct()
						->select("*")
						->order_by("code", "asc")
						->get("standard_products")
						->result();
	}

	public function getConnectPlansPlan()
	{
		return $this->db->where("active",1)
						->distinct()
						->select("plan")
						->order_by("plan")
						->get("data_plans")
						->result();
	}


	public function getConnectPlansData($plan)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->distinct()
						->select("data")
						->order_by("data")
						->get("data_plans")
						->result();
	}

	public function getConnectPlansCarrier($plan, $data)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->distinct()
						->select("coverage")
						->order_by("coverage")
						->get("data_plans")
						->result();
	}

	public function getConnectPlansTypes($plan, $data,$carrier)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->distinct()
						->select("recurring")
						->order_by("recurring")
						->get("data_plans")
						->result();
	}

	public function getConnectPlansFull($plan, $data,$carrier, $types)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->where('recurring',$types)
						->distinct()
						->select("*")
						->get("data_plans")
						->result();
	}


	
	public function getSpecialPlansPlan()
	{
		return $this->db->where("active",1)
						->distinct()
						->select("plan")
						->order_by("plan")
						->get("promotions")
						->result();
	}


	public function getSpecialPlansData($plan)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->distinct()
						->select("data")
						->order_by("data")
						->get("promotions")
						->result();
	}

	public function getSpecialPlansCarrier($plan, $data)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->distinct()
						->select("coverage")
						->order_by("coverage")
						->get("promotions")
						->result();
	}

	public function getSpecialPlansTypes($plan, $data,$carrier)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->distinct()
						->select("recurring")
						->order_by("recurring")
						->get("promotions")
						->result();
	}

	public function getSpecialPlansFull($plan, $data,$carrier, $types)
	{
		return $this->db->where("active",1)
						->where('plan',$plan)
						->where('data',$data)
						->where('coverage',$carrier)
						->where('recurring',$types)
						->distinct()
						->select("*")
						->get("promotions")
						->result();
	}

	public function insertProduct($productData){
		$this->db->insert('standard_products', $productData);
		return $this->db->insert_id();
	}

	public function insertProductFromCSV($products){
		
		if(isset($products['upload_data'])){
			ini_set('auto_detect_line_endings',TRUE);
			$handle = fopen("./uploads/".$products['upload_data']['file_name'],'r');
			$data = array();
			while(!feof($handle)){
				$csv = fgetcsv($handle);
				$data[] = array(
					'code'	=> $csv[0],
					'active'	=> $csv[1],
					'type'	=> $csv[2],
					'price'	=> $csv[3],
					'commission'	=> $csv[4],
					'description'	=> $csv[5]
				);
			}
			fclose($handle);
			if($this->db->insert_batch('standard_products', $data))
				return TRUE;
			return FALSE;
  		}
  		return FALSE;
	}

	public function getAllStandardProductsForViews(){
		$products = array();
		$sql = "SELECT * FROM standard_products WHERE active='1'";
		$query = $this->db->query($sql);
		$products = array(
			'products' => $query->result_array()
		);
		return $products;
	}

}