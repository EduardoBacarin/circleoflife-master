<?php

defined('BASEPATH') OR exit('No direct script access allowed');



$portal_path = PORTALPATH;



class Order extends CI_Controller {

	

	public $route;



	public function __construct(){

        parent::__construct();

        $this->load->library('routerhelper');

        $choiceRoute = $this->routerhelper->whichsubroute();

        $this->route = $db_group = $choiceRoute[0];

        $this->db = $this->load->database($db_group, TRUE);

        $this->load->model('model_accounts');

        $this->load->model('model_orders');

    }

	

	public function validade_PurchaseItems(){

		if($this->input->post("StandardItemsTotal") > 0){

			

			for($i=0; $i<$this->input->post("StandardItemsTotal"); $i++){

			

				if(!$this->input->post("standardInfo".$i)){

					$this->form_validation->set_message('validade_PurchaseItems', 'A purhase item option cannot be left unselected.');

					return false;

				}

				if($this->input->post("standardQuantity".$i) <= 0){

					$this->form_validation->set_message('validade_PurchaseItems', 'A purhase item quantity needs to be at least 1.');

					return false;

				}

			}

		}else{

			$this->form_validation->set_message('validade_PurchaseItems', 'Please choose at least one purchase item.');

			return false;	

		}

		return true;

	}



	public function getAccountSalesRepID($account_id){

		$this->load->model('model_accounts');



		$sales_rep = $this->model_accounts->getSalesRepID($account_id);

		if($sales_rep){

			return $sales_rep[0]['sales_rep'];

		}

		return false;

	}



	public function placeOrder(){



		$this->load->library('loadviews');

		//$this->load->model('model_orders');

		//$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('bcompany', 'Company Name',

			'required|xss_clean');

			$this->form_validation->set_rules('baddress1', 'Billing Address',

			'required|xss_clean');

			$this->form_validation->set_rules('baddress2', 'Billing Address2', 

			'xss_clean');

			$this->form_validation->set_rules('bcity', 'Billing City', 

			'required|xss_clean');

			$this->form_validation->set_rules('bstate', 'Billing State', 

			'required|xss_clean');

			$this->form_validation->set_rules('bzip', 'Billing Zip', 

			'required|xss_clean');

			$this->form_validation->set_rules('bcountry', 'Billing Country', 

			'required|xss_clean');

			$this->form_validation->set_rules('scompany', 'Ship Company', 

			'required|xss_clean');

			$this->form_validation->set_rules('saddress1', 'Ship Address', 

			'required|xss_clean');

			$this->form_validation->set_rules('saddress2', 'Ship Address2', 

			'xss_clean');

			$this->form_validation->set_rules('scity', 'Ship City', 

			'required|xss_clean');

			$this->form_validation->set_rules('sstate', 'Ship State', 

			'required|xss_clean');

			$this->form_validation->set_rules('szip', 'Ship Zip', 

			'required|xss_clean');

			$this->form_validation->set_rules('scountry', 'Ship Country', 

			'required|xss_clean');

			$this->form_validation->set_rules('StandardItemsTotal', 'Purchase Item', 

			'required|xss_clean|callback_validade_PurchaseItems');

			

			if($this->form_validation->run()){

				$orderData = array();



				$orderData['account_id'] = $this->input->post("account_id");

				$orderData['ship_from'] = $this->input->post("order_ship_from");



				$orderData['bill_rep'] = "";

				$orderData['bill_company'] = $this->input->post("company_name");

				$orderData['bill_address'] = $this->input->post("baddress1");

				$orderData['bill_address2'] = $this->input->post("baddress2");

				$orderData['bill_city'] = $this->input->post("bcity");

				$orderData['bill_state'] = $this->input->post("bstate");

				$orderData['bill_zip'] = $this->input->post("bzip");

				$orderData['bill_country'] = $this->input->post("bcountry");



				$orderData['ship_rep'] = '';

				$orderData['ship_company'] = $this->input->post("scompany");

				$orderData['ship_address'] = $this->input->post("saddress1");

				$orderData['ship_address2'] = $this->input->post("saddress2");

				$orderData['ship_city'] = $this->input->post("scity");

				$orderData['ship_state'] = $this->input->post("sstate");

				$orderData['ship_zip'] = $this->input->post("szip");

				$orderData['ship_country'] = $this->input->post("scountry");



				$orderData['date'] = date('Y-m-d h:i:s');

				$orderData['ship_date'] = "";

				$orderData['deliver_date'] = "";



				$orderData['pay_method'] = $this->input->post("order_payment_method");

				$orderData['pay_terms'] = $this->input->post("order_payment_terms");



				$orderData['ship_account'] = $this->input->post("order_ship_account");

				$orderData['ship_carrier'] = $this->input->post("order_ship_carrier");

				$orderData['ship_account_num'] = (isset($_POST["order_ship_account_number"]) ? $this->input->post("order_ship_account_number") : "");

				

				$orderData['ship_type'] = (isset($_POST["order_ship_type"]) ? $this->input->post("order_ship_type") : "");

				

				$orderData['ship_freight'] = "";

				$orderData['ship_cost'] = "";

				$orderData['tracking_num'] = "";

				echo "here_3";

				if($this->session->userdata("user_type") == "Admin" || $this->session->userdata("user_type") == "Sales"){

					$orderData['status'] = "New";

				}else if($this->session->userdata("user_type") == "Reseller"){

					$orderData['status'] = "New";

				}

				

				$orderData['sales_rep_id'] = $this->getAccountSalesRepID($this->input->post("account_id"));

				if($orderData['sales_rep_id']==NULL){

					$orderData['sales_rep_id'] = 1;

				}



				$orderData['notes'] = $this->input->post("order_notes");

				



				$orderItems = array();

				$totalOrder = 0;



				for($i=0; $i<$this->input->post("StandardItemsTotal"); $i++){

					$orderItems[] = array(

						"type"=>"Standard",

						"order_id"=>"",

						"code"=>$this->input->post("standardInfo".$i),

						"qty"=>$this->input->post("standardQuantity".$i),

						"price"=>$this->input->post("standardPrice".$i),

						"priceTotal"=>$this->input->post("standardPriceTotal".$i)

					);

					$totalOrder += $this->input->post("standardPriceTotal".$i);

				}



					/*

					for($i=0; $i<$this->input->post("ConnectItemsTotal"); $i++){

					$orderItems[] = array(

						"type"=>"Connect",

						"order_id"=>"",

						"code"=>$this->input->post("connectInfo".$i),

						"qty"=>$this->input->post("connectQuantity".$i),

						"price"=>$this->input->post("connectPrice".$i),

						"priceTotal"=>$this->input->post("connectPriceTotal".$i)

					);

					$totalOrder += $this->input->post("connectPriceTotal".$i);

				}

					*/

				if(!isset($_POST['feeProcWaive'])){

					$feeCode = 0;

					$desc = "Processing Fee";



					$orderItems[] = array(

						"type"=>"Fee",

						"orders_id"=>"",

						"code"=>$feeCode,

						"description"=> "Processing Fee",

						"price"=>$this->input->post("feeProc"),

					);

					$totalOrder += $this->input->post("feeProc");

				}



				if(!isset($_POST['feeConvWaive'])){

					if($this->input->post("order_payment_method") == "Credit"){

						$feeCode = 4;

						$desc = "Convenience Fee";

					}else if($this->input->post("order_payment_method") == "PayPal"){

						$feeCode = 2;

						$desc = "PayPal Fee";

					}else if($this->input->post("order_payment_method") == "Wire"){

						$feeCode = 1;

						$desc = "Wire Transfer Fee";

					}



						$orderItems[] = array(

						"type"=>"Fee",

						"orders_id"=>"",

						"code"=>$feeCode,

						"description"=>$desc,

						"price"=>$this->input->post("feeConv"),

						);



						$totalOrder += $this->input->post("feeConv");

				}



				if(!isset($_POST['feeShipWaive'])){

					$feeCode = 3;

					$desc = "Shipping Fee";

					



					$orderItems[] = array(

						"type"=>"Fee",

						"orders_id"=>"",

						"code"=>$feeCode,

						"description"=>$desc,

						"price"=>$this->input->post("feeShip"),

					);



					$totalOrder += $this->input->post("feeShip");

				}



				$orderData['order_total'] = $totalOrder;

				

				// if sales_rep_id != null

				$order_id = $this->model_orders->insertOrder($orderData, $orderItems);

				// end if



				if($order_id) {

					$userID = $this->model_accounts->getUserID();

					$this->model_orders->logOrder($order_id, $userID, "Created", $orderData['date']);

					$this->load->library('emailsformated');



					if($this->session->userdata("user_type") == "Admin" || $this->session->userdata("user_type") == "Sales"){

						//Send Order Entered Email

						$url = PORTALPATH."order/viewOrder/".$order_id;

						$to = $this->model_accounts->getUserEmail($this->input->post("account_id"));

						$to = "lumar.motta@webbt-systemscorp.com";

						$this->emailsformated->sendOrderPostedEmail($this, $to, 'info@webbt-systemscorp.com', $url, $order_id);



					}else if($this->session->userdata("user_type") == "Reseller"){

						//Send Pendign Approval Email

						$url = PORTALPATH."order/viewOrder/".$order_id;

						$to = $this->model_accounts->getSalesRepEmail();



						$to = "lumar.motta@webbt-systemscorp.com";



						$this->emailsformated->sendOrderEnteredEmail($this, $to, 'info@oigotelematics.com', $url, $order_id);

					}

					redirect(PORTALPATH.'order/viewOrder/'.$order_id);	

				}

			}else{

				$this->loadviews->placeOrder($this);

			}

		}else{ // NOT LOGEGD IN

				redirect(PORTALPATH.'main/');

		}

	}

	

	public function viewOrder_pdf($order_id){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode ver qualquer ordem

				$this->loadviews->viewOrder_pdf($this, $order_id);

			}else if($this->session->userdata("user_type") == "Distributor" || $this->session->userdata("user_type") == "Sales"){

				//So pode ver as ordens dele e dos clientes dele	

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					$this->loadviews->viewOrder_pdf($this, $order_id);

				}

			}else if($this->session->userdata("user_type") == "Reseller"){

				//So pode ver as ordens dele	

				$reseller_id = $this->model_accounts->getUserID();

				if($this->model_orders->canResellerViewOrder($order_id, $reseller_id)){

					$this->loadviews->viewOrder_pdf($this, $order_id);

				}

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}





	public function viewOrder($order_id){



		$this->load->library('loadviews');

		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		$this->load->library('form_validation');

		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode ver qualquer ordem

				$this->loadviews->viewOrder($this, $order_id);

			}else if($this->session->userdata("user_type") == "Distributor" || $this->session->userdata("user_type") == "Sales"){

				//So pode ver as ordens dele e dos clientes dele	

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					$this->loadviews->viewOrder($this, $order_id);

				}

			}else if($this->session->userdata("user_type") == "Reseller"){

				//So pode ver as ordens dele	

				$reseller_id = $this->model_accounts->getUserID();

				if($this->model_orders->canResellerViewOrder($order_id, $reseller_id)){

					$this->loadviews->viewOrder($this, $order_id);

				}

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}

	

	public function viewOrders($type){



		$this->load->library('loadviews');

		$this->load->model('model_orders');

		$this->load->model('model_accounts');



		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode ver qualquer ordem

				$this->loadviews->viewOrders($this, $type);



			}else if($this->session->userdata("user_type") == "Distributor"){

				//So pode ver as ordens dele e dos clientes dele

				$this->loadviews->viewOrders($this, $type);



			}else if($this->session->userdata("user_type") == "Reseller"){

				// So pode ver as orders dele

				$this->loadviews->viewOrders($this, $type);

			

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}



	public function signContract($order_id){



		$this->load->model('model_orders');

		$this->load->model('model_accounts');



		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode aprovar qualquer ordem

				if($this->model_orders->signOrder($order_id)){

					$userID = $this->model_accounts->getUserID();

					$this->model_orders->logOrder($order_id, $userID, "Signed", date('Y-m-d h:i:s'));

				}

				

			}else if($this->session->userdata("user_type") == "Sales"){

				//So pode aprovar so as ordens dele e dos clientes dele

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					if($this->model_orders->signOrder($order_id)){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Signed", date('Y-m-d h:i:s'));

					}					

				}

			}

			redirect(PORTALPATH."order/viewOrder/".$order_id);



		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function approve($order_id){



		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		

		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode aprovar qualquer ordem

				if($this->model_orders->approveOrder($order_id)){

					$userID = $this->model_accounts->getUserID();

					$this->model_orders->logOrder($order_id, $userID, "Approved", date('Y-m-d h:i:s'));

				}

			}else if($this->session->userdata("user_type") == "Sales"){

				//So pode aprovar so as ordens dele e dos clientes dele

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					if($this->model_orders->approveOrder($order_id)){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Approved", date('Y-m-d h:i:s'));

					}

				}

			}

			redirect(PORTALPATH."order/viewOrder/".$order_id);

		}else{

			$this->loadviews->loginView($this);	

		}

	}



	public function cancel($order_id){



		$this->load->model('model_orders');

		$this->load->model('model_accounts');



		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				if($this->model_orders->cancelOrder($order_id)){

					$userID = $this->model_accounts->getUserID();

					$this->model_orders->logOrder($order_id, $userID, "Cancelled", date('Y-m-d h:i:s'));

				}

				

			}else if($this->session->userdata("user_type") == "Sales"){

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					if($this->model_orders->cancelOrder($order_id)){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Cancelled", date('Y-m-d h:i:s'));

					}					

				}

			}

			redirect(PORTALPATH."order/viewOrder/".$order_id);

		}else{

			$this->loadviews->loginView($this);

		}

	}



	public function invoice($order_id){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		$this->load->library('form_validation');

		$this->load->helper('security');

		$this->form_validation->set_rules('invoiceNumber', 'Invoice Number', 

		'required|trim|xss_clean');



		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				if($this->form_validation->run($this)){

				//Pode aprovar qualquer ordem

					if($this->model_orders->invoiceOrder($order_id, $this->input->post('invoiceNumber'))){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Invoiced", date('Y-m-d h:i:s'));

					}

				}

			}else if($this->session->userdata("user_type") == "Sales"){

				if($this->form_validation->run($this)){

				//So pode aprovar so as ordens dele e dos clientes dele

					$salesrep_id = $this->model_accounts->getUserID();

					if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

						if($this->model_orders->invoiceOrder($order_id)){

							$userID = $this->model_accounts->getUserID();

							$this->model_orders->logOrder($order_id, $userID, "Invoiced", date('Y-m-d h:i:s'));

						}					

					}

				}

			}

			$this->loadviews->viewOrder($this,$order_id);

		}else{

			$this->loadviews->loginView($this);

		}

	}



	public function ship($order_id){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		$this->load->library('form_validation');

		$this->load->helper('security');

		$this->form_validation->set_rules('trackingNumber', 'Tracking Number', 

		'required|trim|xss_clean');



		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				if($this->form_validation->run()){

				//Pode aprovar qualquer ordem

					if($this->model_orders->shipOrder($order_id, $this->input->post('trackingNumber'))){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Shipped", date('Y-m-d h:i:s'));

					}

				}

			}else if($this->session->userdata("user_type") == "Sales"){

				if($this->form_validation->run()){

				//So pode aprovar so as ordens dele e dos clientes dele

					$salesrep_id = $this->model_accounts->getUserID();

					if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

						if($this->model_orders->shipOrder($order_id)){

							$userID = $this->model_accounts->getUserID();

							$this->model_orders->logOrder($order_id, $userID, "Shipped", date('Y-m-d h:i:s'));

						}					

					}

				}

			}

			$this->loadviews->viewOrder($this,$order_id);

		}else{

			$this->loadviews->loginView($this);

		}

	}





	public function pay($order_id){



		$this->load->model('model_orders');

		$this->load->model('model_accounts');

		

		if($this->session->userdata('is_loggedin')){

			if($this->session->userdata("user_type") == "Admin"){

				//Pode Marcar as Paid qualquer ordem

				if($this->model_orders->payOrder($order_id)){

					$userID = $this->model_accounts->getUserID();

					$this->model_orders->logOrder($order_id, $userID, "Paid", date('Y-m-d h:i:s'));

				}

			}else if($this->session->userdata("user_type") == "Sales"){

				//So pode aprovar so as ordens dele e dos clientes dele

				$salesrep_id = $this->model_accounts->getUserID();

				if($this->model_orders->canSalesRepViewOrder($order_id, $salesrep_id)){

					if($this->model_orders->payOrder($order_id)){

						$userID = $this->model_accounts->getUserID();

						$this->model_orders->logOrder($order_id, $userID, "Paid", date('Y-m-d h:i:s'));

					}

				}

			}

			redirect(PORTALPATH."order/viewOrder/".$order_id);

		}else{

			$this->loadviews->loginView($this);	

		}

	}







	public function placeOrderSIM(){

		

	}

	

	public function placeOrderSpecial(){

		

	}

	

	public function placeOrderVPN(){

		

	}





}

?>