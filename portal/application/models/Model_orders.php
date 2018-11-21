<?php
class Model_orders extends CI_Model {

	private $db;
	public function __construct(){
	    parent::__construct();
	    $this->load->library('routerhelper');
	    $choiceRoute = $this->routerhelper->whichsubroute();
	    $db_group = $choiceRoute[0];
	    $this->db = $this->load->database($db_group, TRUE);
    }

	public function insertOrder($data, $dataItems){

		$this->db->trans_begin();
		
		if($this->db->insert("orders",$data)) {
			
			$order_id = $this->db->insert_id();

			foreach ($dataItems as $key => $row) {
				if($row['type'] == "Lease"){
					$lease = array(
						"orders_id" => $order_id,
						"lease_plans_id" => $row['code'],
						"qty" => $row['qty'],
						"activationFee" => $row['activationFee'],
						"recurringCost" => $row['recurringCost'],
						"firstPayQty"	=> $row['firstPayQty']
					);
					if(!$this->db->insert("orders_has_lease_plans",$lease)){
						$this->db->trans_rollback();
						return false;
					}
				}else if ($row['type'] == "Standard"){
					$standard = array(
						"orders_id" => $order_id,
						"standard_products_id" => $row['code'],
						"qty" => $row['qty'],
						"unit_price" => $row['price']
					);
					if(!$this->db->insert("orders_has_standard_products",$standard)){
						$this->db->trans_rollback();
						return false;
					}
				}else if ($row['type'] == "Connect"){
					$connect = array(
						"orders_id" => $order_id,
						"data_plans_id" => $row['code'],
						"qty" => $row['qty'],
						"price" => $row['price']
					);
					if(!$this->db->insert("orders_has_data_plans",$connect)){
						$this->db->trans_rollback();
						return false;
					}
				}else if ($row['type'] == "Fee"){
					$connect = array(
						"orders_id" => $order_id,
						"order_fees_id" => $row['code'],
						"description" => $row['description'],
						"price" => $row['price']
					);
					if(!$this->db->insert("orders_has_order_fees",$connect)){
						$this->db->trans_rollback();
						return false;
					}
				}
			}
			$this->db->trans_commit();
			return $order_id;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	public function logOrder($order_id, $account_id, $status, $date){
		$log = array(
			"order_id" => $order_id,
			"account_id" => $account_id,
			"status" => $status,
			"date" => $date
		);
		if(!$this->db->insert("orders_log",$log)){
			return false;
		}
		return true;
	}

	public function getOrder($order_id){

		$order = $this->db->where("id",$order_id)->get("orders")->row();
		$items = array();
		$query = $this->db->where("orders_id",$order_id)->get("orders_has_lease_plans");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$items[] = $row;	
			}
		}

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_standard_products");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$items[] = $row;	
			}
		}

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_data_plans");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$items[] = $row;	
			}
		}

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_order_fees");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$items[] = $row;	
			}
		}

		$order_data = array(
			"order"	=> $order,
			"items"	=> $items
		);
		return $order_data;
	}

	public function getOrderForViews($order_id){
		$order = $this->db->where("id",$order_id)->get("orders")->row();
		$items = array();

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_lease_plans");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$auxQuery = $this->db->select("code, description")->where("id", $row->lease_plans_id)->get("lease_plans");
				if($auxQuery->num_rows() > 0){
					foreach($auxQuery->result() as $auxRow){
						$array1 = json_decode(json_encode($row),true);
						$array2 = json_decode(json_encode($auxRow),true);
						$row = array_merge($array1,$array2);
					}
				}
				$items[] = $row;
			}
		}

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_standard_products");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$auxQuery = $this->db->select("code, description")->where("id", $row->standard_products_id)->get("standard_products");
				if($auxQuery->num_rows() > 0){
					foreach($auxQuery->result() as $auxRow){
						$array1 = json_decode(json_encode($row),true);
						$array2 = json_decode(json_encode($auxRow),true);
						$row = array_merge($array1,$array2);
					}
				}
				$items[] = $row;
			}
		}

		$aux = 0;
		$query = $this->db->where("orders_id",$order_id)->get("orders_has_data_plans");
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$auxQuery = $this->db->select("code, description")->where("id", $row->data_plans_id)->get("data_plans");
				if($auxQuery->num_rows() > 0){
					foreach($auxQuery->result() as $auxRow){
						$array1 = json_decode(json_encode($row),true);
						$array2 = json_decode(json_encode($auxRow),true);
						$row = array_merge($array1,$array2);
					}
				}
				$items[] = $row;
			}
		}

		$query = $this->db->where("orders_id",$order_id)->get("orders_has_order_fees");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$auxQuery = $this->db->select("code")->where("id", $row->order_fees_id)->get("order_fees");
				if($auxQuery->num_rows() > 0){
					foreach($auxQuery->result() as $auxRow){
						$array1 = json_decode(json_encode($row),true);
						$array2 = json_decode(json_encode($auxRow),true);
						$row = array_merge($array1,$array2);
					}
				}
				$items[] = $row;
			}
		}

		$order_data = array(
			"order"	=> $order,
			"items"	=> $items
		);
		return $order_data;
	}

	public function getOrders(){
		$log = array();
		$sql = "SELECT * FROM orders";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			$log[] = $row;
		}
		return $log;	
	}

	public function getOrdersForViews($type, $page = 1, $total = 10){

		$type = str_replace("%20", " ", $type);
		$start = $total * ($page-1);
		$end = $total;

		$orders = array();

		if($type == "all"){
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders LIMIT ".$start.", ".$end."";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}
		}else{
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE status = '".$type."'")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE status = '".$type."' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}

		}

		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);
		return $order_data;
	}

	public function getAllStandardProductsForViews(){
		$products = array();
		$sql = "SELECT * FROM standard_products WHERE active='1'";
		$query = $this->db->query($sql);
		return $query;
	}

	public function getAllOrdersForViews($status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders";
		if($status!=""){
			$sql = $sql." WHERE status='".$status."' OR paid='".$status."'";
		}
		$query = $this->db->query($sql);
		$totalRows = $query->num_rows();
		foreach ($query->result_array() as $row) {
			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row['sales_rep_id']."'";
			$auxQuery = $this->db->query($auxSql);
			if($auxQuery->num_rows() == 1){
				$salesRep = $auxQuery->result_array();
				$row['salesRepName'] = $salesRep[0]['f_name']." ".$salesRep[0]['l_name'];
				$orders[] = $row;
			}
		}

		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);

		return $order_data;
	}
////////////////////////////////////////////////
	public function getAllSalesOrdersForViews($salesrep_id, $status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE sales_rep_id = '".$salesrep_id."'";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		$totalRows = $query->num_rows();
		foreach ($query->result_array() as $row) {
			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row['sales_rep_id']."'";
			$auxQuery = $this->db->query($auxSql);
			if($auxQuery->num_rows() == 1){
				$salesRep = $auxQuery->result_array();
				$row['salesRepName'] = $salesRep[0]['f_name']." ".$salesRep[0]['l_name'];
				$orders[] = $row;
			}
		}
		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);
		return $order_data;
	}

	public function getCurrentMonthEarnings($status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders WHERE MONTH(date) = MONTH(NOW()) AND YEAR(date) = YEAR(NOW())";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getTotalEarnings($status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders";
		if($status!=""){
			$sql = $sql." WHERE status='".$status."' OR paid='".$status."'";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getPreviousMonthEarnings($status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00') AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getSalesCurrentMonthEarnings($salesrep_id, $status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders WHERE sales_rep_id = '".$salesrep_id."'
		AND MONTH(date) = MONTH(NOW()) AND YEAR(date) = YEAR(NOW())";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getSalesTotalEarnings($salesrep_id, $status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders WHERE sales_rep_id = '".$salesrep_id."'";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getSalesPreviousMonthEarnings($salesrep_id, $status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT SUM(order_total) FROM orders WHERE sales_rep_id = '".$salesrep_id."'
		AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01 00:00:00') AND DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		if($query->result_array()[0]["SUM(order_total)"]){
			return $query->result_array()[0]["SUM(order_total)"];	
		}
		return "0.00";
	}
	public function getAllResellerOrdersForViews($account_id, $status=""){
		$orders = array();
		if($status == 'Paid'){
			$status = 1;
		}
		$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE account_id = '".$account_id."'";
		if($status!=""){
			$sql = $sql." AND (status='".$status."' OR paid='".$status."')";
		}
		$query = $this->db->query($sql);
		$totalRows = $query->num_rows();
		foreach ($query->result_array() as $row) {
			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row['sales_rep_id']."'";
			$auxQuery = $this->db->query($auxSql);
			if($auxQuery->num_rows() == 1){
				$salesRep = $auxQuery->result_array();
				$row['salesRepName'] = $salesRep[0]['f_name']." ".$salesRep[0]['l_name'];
				$orders[] = $row;
			}
		}
		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);
		return $order_data;
	}
	
	public function getOrderLog($order_id){
		$log = array();
		$sql = "SELECT * FROM orders_log WHERE order_id='".$order_id."'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row['account_id']."'";
			$auxQuery = $this->db->query($auxSql);
			if($auxQuery->num_rows() == 1){
				$salesRep = $auxQuery->result_array();
				$row['name'] = $salesRep[0]['f_name']." ".$salesRep[0]['l_name'];
			}
			$log[] = $row;
		}
		return $log;
	}

	public function getCustomerOrders($customer_id=NULL){
		if($customer_id === NULL){
			$customer_id = $this->session->userdata('id');
		}
		$log = array();
		$sql = "SELECT * FROM orders WHERE account_id='".$customer_id."'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			$log[] = $row;
		}
		return $log;	
	}

	public function getSalesOrders($sales_id=NULL){
		if($sales_id === NULL){
			$sales_id = $this->session->userdata('id');
		}
		$sql = "SELECT * FROM orders WHERE sales_rep_id='".$sales_id."'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			$log[] = $row;
		}
		return $log;	
	}

	public function getSalesOrdersForViews($type, $page = 1, $total = 10, $salesrep_id){

		$type = str_replace("%20", " ", $type);
		$start = $total * ($page-1);
		$end = $total;

		$orders = array();

		if($type == "all"){
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE sales_rep_id = '".$salesrep_id."'")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE sales_rep_id = '".$salesrep_id."' LIMIT ".$start.", ".$end."";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}
		}else {
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE sales_rep_id = '".$salesrep_id."' AND status = '".$type."'")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE sales_rep_id = '".$salesrep_id."' AND status = '".$type."' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}
		}
		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);
		return $order_data;
	}

	public function getResellerOrdersForViews($type, $page = 1, $total = 10, $reseller_id){

		$type = str_replace("%20", " ", $type);
		$start = $total * ($page-1);
		$end = $total;

		$orders = array();

		if($type == "all"){
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE account_id = '".$reseller_id."'")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE account_id = '".$reseller_id."' LIMIT ".$start.", ".$end."";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}
		}else{
			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfOrders FROM orders WHERE account_id = '".$reseller_id."' AND status = '".$type."'")->result_array();
			$totalRows = $totalRows[0]['NumberOfOrders'];

			$sql = "SELECT id, account_id, sales_rep_id, bill_company, ship_company, date, order_total, status FROM orders WHERE account_id = '".$reseller_id."' AND status = '".$type."' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row) {
				$orders[] = $row;
			}
		}

		$order_data = array(
			"NumberOfOrders"	=> (int)$totalRows,
			"orders"			=> $orders
		);
		return $order_data;
	}

	public function canSalesRepViewOrder($order_id, $salesrep_id){

		$query = $this->db->query("SELECT sales_rep_id FROM orders WHERE id='".$order_id."'");
		if($query->row()->sales_rep_id == $salesrep_id){
			return true;
		}
		return false;
	}

	public function canResellerViewOrder($order_id, $reseller_id){

		$query = $this->db->query("SELECT account_id FROM orders WHERE id='".$order_id."'");
		if($query->row()->account_id == $reseller_id){
			return true;
		}
		return false;
	}

	public function signOrder($order_id){

		$query = $this->db->query("UPDATE orders SET status='Pending Approval' WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}

	public function approveOrder($order_id){

		$query = $this->db->query("UPDATE orders SET status='Approved' WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}

	public function cancelOrder($order_id){

		$query = $this->db->query("UPDATE orders SET status='Cancelled' WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}

	public function invoiceOrder($order_id, $invoiceNumber){

		$query = $this->db->query("UPDATE orders SET status='Invoiced', invoice='".$invoiceNumber."' WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}

	public function shipOrder($order_id, $trackingNumber){

		$query = $this->db->query("UPDATE orders SET status='Shipped', tracking_num='".$trackingNumber."' WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}

	public function payOrder($order_id){

		$query = $this->db->query("UPDATE orders SET paid=TRUE  WHERE id='".$order_id."'");
		if($query){
			return true;
		}
		return false;
	}


}