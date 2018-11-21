<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party/geoplugin.class.php');



class LoadViews{



	public $geoplugin;

	

	public function __construct(){		

    }



	public function loginView($controller)

	{

		$header = array( 

			"Page" => "Login",

			"Title" => "Login - ".$controller->route

		);





		$pageData = array(

			"hasAccount"	=> $controller->model_accounts->dbHasAccount()

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/login_includes');

		$controller->load->view('login', $pageData);

		$controller->load->view('/footers/login_footer');

	}

	

	public function homeView($controller){

		

		$header = array( 

			"Page" => "Home",

			"Title" => "Home - ".$controller->route

		);

		/* Lumar Motta - add Circle_of_life data to show Areas */

		$customers = $controller->model_accounts->getCustomersList();

		$circleoflifeareas = $controller->model_accounts->getCircleOfLifeAreas();

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"customers" => $customers,

			"circleoflifeareas" => $circleoflifeareas



		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->view('home', $pageData);

		}else if($controller->session->userdata("user_type") == "Sales"){

			$controller->load->view('home', $pageData);

		}else if($controller->session->userdata("user_type") == "Reseller"){

			$controller->load->view('home', $pageData);

		}

		

		$controller->load->view('/footers/home_footer');

	}



	public function registrationView($controller){

		$header = array(

			"Page"	=> "Registration",

			"Title"	=> "Register - ".$controller->route

		);

		$geoplugin = new geoPlugin();

		$geoplugin->locate();



		$countries = $controller->model_accounts->getCountryList();

		$pageData = array(

			"hasAnyAccount"	=> $controller->model_accounts->dbHasAnyAccount(),

			"countries" => $countries,

			"geoplugin" => $geoplugin->countryCode

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/registration_includes');

		$controller->load->view('registration',$pageData);

		$controller->load->view('/footers/registration_footer');

	}







	public function recoverView($controller){

		$header = array(

			"Page"	=> "Password Recover",

			"Title"	=> "Recover - ".$controller->route

		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/registration_includes');

		$controller->load->view('recover');

		$controller->load->view('/footers/registration_footer');

	}

	

	public function newAccountRegistrationMsg($controller, $email=NULL, $err){

		

		$page_data = array(

				"Email" => $email,

				"Error"	=> $err

		);

		

		if($err == 'EmailSent'){

			$header = array(

				"Page"	=> "Confirmation Email Sent",

				"Title"	=> "Email Code - ".$controller->route

			);

			

		}else if ($err == 'EmailErr'){

			$header = array(

				"Page"	=> "Failed to send email",

				"Title"	=> "Failed to Send Email - ".$controller->route

			);

		}else if ($err == 'AccErr'){

			$header = array(

				"Page"	=> "Failed to create Account",

				"Title"	=> "Account Error - ".$controller->route

			);

		}else if ($err == 'InvalidKey'){

			$header = array(

				"Page"	=> "Email Validation Error",

				"Title"	=> "Invalid Key - ".$controller->route

			);

		}else if ($err == 'ValidKey'){

			$header = array(

				"Page"	=> "Email Validation Success",

				"Title"	=> "Email Valid - ".$controller->route

			);

		}else if ($err == 'BadRequest'){

			$header = array(

				"Page"	=> "BadRequests",

				"Title"	=> "BadRequest - Error"

			);

		}else if ($err == 'GetEmailKey'){

			$header = array(

				"Page"	=> "Autenticate",

				"Title"	=> "Autenticate Account - ".$controller->route

			);

		}

		

		$controller->load->view('/headers/header',$header);

		$controller->load->view('/headers/includes/error_includes');

		$controller->load->view('account_registration_message',$page_data);

	}

	

	public function passwordRecoverMsg($controller, $email, $err){

		

		$pageData = array(

				"Email" => $email,

				"Error"	=> $err

		);

		

		if($err == 'EmailSent'){

			$header = array(

				"Page"	=> "Email Sent",

				"Title"	=> "Email Code - ".$controller->route

			);

			

		}else if ($err == 'EmailErr'){

			$header = array(

				"Page"	=> "Failed to send email",

				"Title"	=> "Failed to Send Email - ".$controller->route

			);

		}else if ($err == 'WrongEmail'){

			$header = array(

				"Page"	=> "Failed to find Account",

				"Title"	=> "Account Error - ".$controller->route

			);

		}else if ($err == 'InvalidKey'){

			$header = array(

				"Page"	=> "Email Validation Error",

				"Title"	=> "Invalid Key - ".$controller->route

			);

		}else if ($err == 'ValidKey'){

			$header = array(

				"Page"	=> "Email Validation Success",

				"Title"	=> "Email Valid - ".$controller->route

			);

		}else if ($err == 'BadRequest'){

			$header = array(

				"Page"	=> "BadRequests",

				"Title"	=> "BadRequest - Error"

			);

		}else if ($err == 'GetEmailKey'){

			$header = array(

				"Page"	=> "Autenticate",

				"Title"	=> "Autenticate Account - ".$controller->route

			);

		}

		

		$controller->load->view('/headers/header',$header);

		$controller->load->view('/headers/includes/error_includes');

		$controller->load->view('password_recover_message',$pageData);

	}

	

	public function editAccountView($controller){

		

		$header = array( 

			"Page" => "Edit Account",

			"Title" => "Edit Account - ".$controller->route

		);

		

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"error"	=> $controller->session->flashdata("error")

		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_account', $pageData);

		$controller->load->view('/footers/home_footer');

	}

	

	public function editCompanyView($controller){



		$header = array( 

			"Page" => "Edit Company",

			"Title" => "Edit Company - ".$controller->route

		);

		

		$geoplugin = new geoPlugin();

		$geoplugin->locate();

		

		$countries = $controller->model_accounts->getCountryList();

		

		$controller->load->model('model_accounts');



		$company_information = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	 

			"company_name" => $controller->session->userdata("company_name"),

			"countries" => $countries,

			"geoplugin" => $geoplugin->countryCode,

			"company"	=> $company_information,

		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('edit_company', $pageData);

		$controller->load->view('/footers/footer');



	}

	

	public function editShippingView($controller){

		$header = array( 

			"Page" => "Edit Shipping",

			"Title" => "Edit Shipping - ".$controller->route

		);

		

		$countries = $controller->model_accounts->getCountryList();

		

		$geoplugin = new geoPlugin();

		$geoplugin->locate();



		$controller->load->model('model_accounts');

		$shipping_information = $controller->model_accounts->getShippingInfo($controller->session->userdata("email"));

		

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"countries" => $countries,

			"geoplugin" => $geoplugin->countryCode,

			"shipping"	=> $shipping_information

		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('edit_shipping', $pageData);

		$controller->load->view('/footers/footer');

	}

	

	public function placeOrder($controller, $whse="usa", $customer_id=NULL){

		if($whse == "usa"){

			$header = array( 

				"Page" => "Place Order USA",

				"Title" => "Place Order USA - ".$controller->route

			);	

		}else if($whse == "local"){

			$header = array( 

				"Page" => "Place Order Local",

				"Title" => "Place Order Local - ".$controller->route

			);	

		}else if($whse == "requestvpn"){

			$header = array( 

				"Page" => "Work in Progress",

				"Title" => "Work in Progress - ".$controller->route

			);	

		}

		

		$countries = $controller->model_accounts->getCountryList();

		

		$geoplugin = new geoPlugin();

		$geoplugin->locate();

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->model('model_accounts');



		if($controller->session->userdata("user_type") == "Admin"){

			if($customer_id===NULL){

				$companies = $controller->model_accounts->getCompaniesNames();	

			}else{

				$companies = $controller->model_accounts->getCompanyNametoPlaceOrder($customer_id);

			}



			$pageData = array(

				"warehouse" => $whse,

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"countries" => $countries,

				"geoplugin" => $geoplugin->countryCode,

				"companies"	=> $companies,

				"customer_id" => $customer_id

			);

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			if($whse != "requestvpn")

				$controller->load->view('place_order', $pageData);

			else

			{

				$controller->load->view('place_order_in_work', $pageData);

			}

		

		}else if($controller->session->userdata("user_type") == "Sales"){

			if($customer_id===NULL){

				$companies = $controller->model_accounts->getCompanyNamesforSalesRep($controller->session->userdata("email"));	

			}else{

				$companies = $controller->model_accounts->getCompanyNametoPlaceOrder($customer_id);

			}

			

			$pageData = array(

				"warehouse" => $whse,

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"countries" => $countries,

				"geoplugin" => $geoplugin->countryCode,

				"companies"	=> $companies,

				"customer_id" => $customer_id

			);



			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			if($whse != "requestvpn")

				$controller->load->view('place_order', $pageData);

			else

			{

				$controller->load->view('place_order_in_work', $pageData);

			}

		

		}else if($controller->session->userdata("user_type") == "Reseller"){



			$companies = $controller->model_accounts->getCompanyNamebyEmail($controller->session->userdata("email"));

			if($companies == FALSE){

				redirect(PORTALPATH."main/edit_company");

			}

			$pageData = array(

				"warehouse" => $whse,

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"countries" => $countries,

				"geoplugin" => $geoplugin->countryCode,

				"companies"	=> $companies

			);

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			if($whse != "requestvpn")

				$controller->load->view('place_order', $pageData);

			else

			{

				$controller->load->view('place_order_in_work', $pageData);

			}

		}

		$controller->load->view('/footers/footer');

	}

	

	public function m2mSuiteApiView($controller){

		if($controller->session->userdata("user_type") == "Admin"){

			$header = array( 

			"Page" => "M2M Suite Sync",

			"Title" => "M2M Suite Sync - ".$controller->route

			);

			

			$controller->load->model('model_accounts');

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name")

			);

			

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/m2msuite_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('m2msuite', $pageData);

			$controller->load->view('/footers/footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewOrder_pdf($controller, $order_id){



		$header = array( 

			"Page" => "Print Order",

			"Title" => "Print Order - ".$controller->route

		);

		

		if($controller->session->userdata("user_type") == "Admin"){

			$company = $controller->model_accounts->getCompanyInfoById($controller->session->userdata('id'));

			$order = $controller->model_orders->getOrderForViews($order_id);	

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID();

			$canView = $controller->model_orders->canSalesRepViewOrder($order_id, $salesrep_id);

			if($canView == TRUE){

				$company = $controller->model_accounts->getCompanyInfoById($controller->model_accounts->getSalesRepInfo($controller->session->userdata('id'))->sales_rep);

				$order = $controller->model_orders->getOrderForViews($order_id);

				

			}else{

				redirect(PORTALPATH."main/accessDenied");

			}

		

		}else if($controller->session->userdata("user_type") == "Reseller"){

			

			$reseller_id = $controller->model_accounts->getUserID();

			$canView = $controller->model_orders->canResellerViewOrder($order_id, $reseller_id);

			if($canView == TRUE){

				$company = $controller->model_accounts->getCompanyInfoById($controller->model_accounts->getSalesRepInfo($controller->session->userdata('id'))->sales_rep);

				$order = $controller->model_orders->getOrderForViews($order_id);

			}else{

				redirect(PORTALPATH."main/accessDenied");

			}

		}



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"order"		=> $order,

			"header" => $header,

			"company"=> $company

		);



		$controller->load->view('viewOrder_pdf', $pageData);

	}



	public function viewOrder($controller, $order_id){

		$header = array( 

			"Page" => "View Order",

			"Title" => "View Order - ".$controller->route

		);

		

		if($controller->session->userdata("user_type") == "Admin"){



			$order = $controller->model_orders->getOrderForViews($order_id);	

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID();

			$canView = $controller->model_orders->canSalesRepViewOrder($order_id, $salesrep_id);

			if($canView == TRUE){

				$order = $controller->model_orders->getOrderForViews($order_id);

			}else{

				redirect(PORTALPATH."main/accessDenied");

			}

		

		}else if($controller->session->userdata("user_type") == "Reseller"){

			

			$reseller_id = $controller->model_accounts->getUserID();

			$canView = $controller->model_orders->canResellerViewOrder($order_id, $reseller_id);

			if($canView == TRUE){

				$order = $controller->model_orders->getOrderForViews($order_id);

			}else{

				redirect(PORTALPATH."main/accessDenied");

			}

		}

		

		$log = $controller->model_orders->getOrderLog($order_id);



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"order"		=> $order,

			"log"		=> $log

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_order', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewOrders($controller, $type, $page = 1, $rows = 10){

		

		$header = array( 

			"Page" => "View Orders",

			"Title" => "View Orders - ".$controller->route

		);



		if($controller->session->userdata("user_type") == "Admin"){



			$orders = $controller->model_orders->getOrdersForViews($type, $page, $rows);

		

		}else if($controller->session->userdata("user_type") == "Distributor"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$orders = $controller->model_orders->getSalesOrdersForDistributor($type, $page, $rows, $salesrep_id);

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$orders = $controller->model_orders->getSalesOrdersForViews($type, $page, $rows, $salesrep_id);

		

		}else if($controller->session->userdata("user_type") == "Reseller"){



			$reseller_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$orders = $controller->model_orders->getResellerOrdersForViews($type, $page, $rows, $reseller_id);

		

		}

		

		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"company_name" => $controller->session->userdata("company_name"),

			"orders"	=> $orders,

			"page"		=> $page,

			"rows"		=> $rows,

			"type"		=> $type

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_orders', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewOrders_all($controller, $status=""){

		

		$header = array( 

			"Page" => "View Orders",

			"Title" => "View Orders - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		if ($company_name != NULL)

			$company_name = $company_name->row()->name;

		else

			$company_name = NULL;



		if($controller->session->userdata("user_type") == "Admin"){

			$orders = $controller->model_orders->getAllOrdersForViews($status);

			$cm_earnings = $controller->model_orders->getCurrentMonthEarnings($status);

			$pm_earnings = $controller->model_orders->getPreviousMonthEarnings($status);

			$t_earnings = $controller->model_orders->getTotalEarnings($status);

		

		}else if($controller->session->userdata("user_type") == "Sales"){

			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$orders = $controller->model_orders->getAllSalesOrdersForViews($salesrep_id,$status);

			$cm_earnings = $controller->model_orders->getSalesCurrentMonthEarnings($salesrep_id,$status);

			$pm_earnings = $controller->model_orders->getSalesPreviousMonthEarnings($salesrep_id,$status);

			$t_earnings = $controller->model_orders->getSalesTotalEarnings($salesrep_id,$status);

		}else if($controller->session->userdata("user_type") == "Reseller"){

			$reseller_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$orders = $controller->model_orders->getAllResellerOrdersForViews($reseller_id,$status);

			$cm_earnings = $pm_earnings = $t_earnings = NULL;

		}



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"cm_earnings"	=> $cm_earnings,

			"pm_earnings"	=> $pm_earnings,

			"t_earnings"	=> $t_earnings,

			"orders"	=> $orders

		);

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_orders_all', $pageData);

		$controller->load->view('/footers/tableresp_footer');

	}



	public function accessDenied($controller){



		$header = array( 

			"Page" => "Access Denied",

			"Title" => "Access Denied - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		if ($company_name != false)

			$company_name = $company_name->row()->name;



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name")

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('access_denied', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function createSalesRep($controller){

		$header = array( 

			"Page" => "Create Sales Rep",

			"Title" => "Create Sales Rep - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_information = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		$countries = $controller->model_accounts->getCountryList();



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"countries" => $countries,

			"company" 	=> $company_information

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_salesrep', $pageData);

		$controller->load->view('/footers/home_footer');

	}



	public function createCol($controller){

		$header = array( 

			"Page" => "Create CoL areas",

			"Title" => "Create CoL Areas - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_information = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"company" 	=> $company_information

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_col', $pageData);

		$controller->load->view('/footers/home_footer');

	}



	public function createColQuestion($controller){

		$header = array( 

			"Page" => "Create CoL Questions",

			"Title" => "Create CoL Questions - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_information = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		$col_areas = $controller->model_accounts->getCoLForView();

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"company" 	=> $company_information,

			"col_areas" => $col_areas

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_col_question', $pageData);

		$controller->load->view('/footers/home_footer');

	}





	// Lumar Motta - Tickets - 05-27-2018



	public function createSuppTicket($controller){

		$header = array( 

			"Page" => "Support Tickets",

			"Title" => "Create Support Ticket - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_information = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		$faq = $controller->model_accounts->getFAQList();



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"faq" => $faq,

			"company" 	=> $company_information

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_suppticket', $pageData);

		$controller->load->view('/footers/home_footer');

	}





	// End Lumar



	public function createCustomer($controller){

		$header = array( 

			"Page" => "Create Customer Account",

			"Title" => "Create Customer Account - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_info = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"));

		$countries = $controller->model_accounts->getCountryList();

		$salesRep = $controller->model_accounts->getAllSalesReps();



		$geoplugin = new geoPlugin();

		$geoplugin->locate();

		$pageData = array(

			"id"		=> $controller->session->userdata("id"),

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"company_name" => $controller->session->userdata("company_name"),

			"countries" => $countries,

			"company_info" 	=> $company_info,

			"geoplugin"	=> $geoplugin->countryCode,

			"salesRep"		=> $salesRep

		);

			

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes',$pageData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_customer', $pageData);

		$controller->load->view('/footers/footer');



	}



	public function viewSalesRep_all($controller){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$header = array( 

				"Page" => "View Sales Reps",

				"Title" => "View Sales Reps - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$info = $controller->model_accounts->getSalesRepInfoForView();

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"sales_reps" => $info

				

			);



			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/sales_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/view_salesreps_all', $pageData);

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewSalesRep($controller, $id){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$controller->load->model('model_orders');



			$salesRep = $controller->model_accounts->getSalesRepInfo($id);

			$orders = $controller->model_orders->getAllSalesOrdersForViews($id);



			if($salesRep == false)

				redirect(PORTALPATH."main/viewSalesRep_all");



			$cm_earnings = $controller->model_orders->getSalesCurrentMonthEarnings($id);

			$pm_earnings = $controller->model_orders->getSalesPreviousMonthEarnings($id);

			$t_earnings = $controller->model_orders->getSalesTotalEarnings($id);

			$header = array( 

				"Page" => "Sales Representative",

				"Title" => "Sales Rep ".$salesRep->f_name." - ".$controller->route

			);

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"sales_rep_info" => $salesRep,

				"cm_earnings"	=> $cm_earnings,

				"pm_earnings"	=> $pm_earnings,

				"t_earnings"	=> $t_earnings,

				"orders"	=> $orders

			);

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/home_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('view_salesrep', $pageData);

			$controller->load->view('/footers/tableresp_footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewAdmins_all($controller){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$header = array( 

				"Page" => "View Administrators",

				"Title" => "View Administrators - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$info = $controller->model_accounts->getAdminsForView();

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"admins" => $info

				

			);



			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/sales_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/view_admins_all', $pageData);

			$controller->load->view('/footer/footer', $pageData);

		}else{

			redirect(PORTALPATH."main/");

		}

	}









	public function viewCoL_all($controller){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$header = array( 

				"Page" => "View CoL Areas",

				"Title" => "View CoL Areas - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$info = $controller->model_accounts->getCoLForView();

			$pageData = array(

				"email" 	   => $controller->session->userdata("email"),

				"user_type"	   => $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"col_areas"    => $info

				

			);



			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/sales_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/view_col_all', $pageData);

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewCoL($controller, $id){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$controller->load->model('model_orders');



			$CoL = $controller->model_accounts->getCoL($id);



			if($CoL == false)

				redirect(PORTALPATH."main/viewCoL_all");



			$header = array( 

				"Page" => "CoL Areas",

				"Title" => "Col Areas ".$CoL->description." - ".$controller->route

			);

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"CoL" => $CoL

			);

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/home_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('view_CoL', $pageData);

			$controller->load->view('/footers/tableresp_footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}







	public function viewCoLQuestions_all($controller){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$header = array( 

				"Page" => "View CoL Areas",

				"Title" => "View CoL Areas - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$info = $controller->model_accounts->getCoLQuestionForView();



			$pageData = array(

				"email" 	   => $controller->session->userdata("email"),

				"user_type"	   => $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"col_questions"=> $info

				

			);



//var_dump($pageData);

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/sales_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/view_col_question_all', $pageData);

			$controller->load->view('/footers/tableresp_footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewCoLQuestion($controller, $id){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$controller->load->model('model_orders');



			$CoLQuestion = $controller->model_accounts->getCoLQuestion($id);



			if($CoLQuestion == false)

				redirect(PORTALPATH."main/viewCoLQuestions_all");



			$CoL = $controller->model_accounts->getCoL($CoLQuestion->circle_id);



			$header = array( 

				"Page" => "CoL Questions",

				"Title" => "Col Questions ".$CoLQuestion->description." - ".$controller->route

			);

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"CoL_area"    => $CoL->description,

				"CoLQuestion" => $CoLQuestion

			);

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/home_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('view_CoL_Question', $pageData);

			$controller->load->view('/footers/tableresp_footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}









	public function getStarted($controller){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$header = array( 

				"Page" => "Get Started",

				"Title" => "Get Started - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$info = $controller->model_accounts->getAdminsForView();

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"admins" => $info

				

			);



			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/sales_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/get_started', $pageData);

			$controller->load->view('/footers/home_footer', $pageData);

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewAdmin($controller, $id){



		if($controller->session->userdata("user_type") == "Admin"){

			$controller->load->model('model_accounts');

			$controller->load->model('model_orders');



			$admin = $controller->model_accounts->getAccountInfoById($id);

			//$orders = $controller->model_orders->getAllAdminForViews($id);



			if($admin == false)

				redirect(PORTALPATH."main/viewAdmins_all");



			//$cm_earnings = $controller->model_orders->getSalesCurrentMonthEarnings($id);

			//$pm_earnings = $controller->model_orders->getSalesPreviousMonthEarnings($id);

			//$t_earnings = $controller->model_orders->getSalesTotalEarnings($id);

			$cm_earnings = 0;

			$pm_earnings = 0;

			$t_earnings = 0;



			$header = array( 

				"Page" => "Sales Representative",

				"Title" => "Administrators ".$admin->f_name." - ".$controller->route

			);

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name" => $controller->session->userdata("company_name"),

				"admin_info" => $admin,

				"cm_earnings"	=> $cm_earnings,

				"pm_earnings"	=> $pm_earnings,

				"t_earnings"	=> $t_earnings

				//"orders"	=> $orders

			);

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/home_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('view_admin', $pageData);

			$controller->load->view('/footers/tableresp_footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function createLead($controller, $leads){

		

		$header = array( 

			"Page" => "Create Lead",

			"Title" => "Create Lead - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		if($controller->session->userdata('user_type') == "Admin"){

			$salesRep = $controller->model_accounts->getAllSalesReps();	

		}else if($controller->session->userdata('user_type') == "Sales"){

			$salesRep = $controller->model_accounts->getAccountInfo();

		}

		

		if(isset($leads["error"])){

    		$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"salesRep"	=> $salesRep,

				"error"		=> $leads["error"],

				"company_name" => $company_name

			);

  		}else if(isset($leads["upload_data"])){

  			$pageData = array(

				"email" 		=> $controller->session->userdata("email"),

				"user_type"		=> $controller->session->userdata("user_type"),

				"salesRep"		=> $salesRep,

				"upload_data"	=> $leads["upload_data"],

				"company_name" => $company_name

			);

  		} 

		

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_lead', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewLeads_all($controller){

		$header = array( 

			"Page" => "View Leads",

			"Title" => "View Leads - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		if($controller->session->userdata("user_type") == "Admin"){



			$leads = $controller->model_accounts->getAllLeadsForViews();

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$leads = $controller->model_accounts->getAllSalesLeadsForViews($salesrep_id);

		}



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"leads"		=> $leads,

			"controller"=> $controller,

			"company_name" => $company_name

		);



		$mapData = array(

			"height"	=> "900px",

        	"width"		=> "100%"

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes', $mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_leads_all', $pageData);

		//$controller->load->view('/footers/footer');

	}



	public function viewLeads($controller, $type, $page = 1, $rows = 20){

		

		$header = array( 

			"Page" => "View Leads",

			"Title" => "View Leads - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		if($controller->session->userdata("user_type") == "Admin"){



			$leads = $controller->model_accounts->getLeadsForViews($type, $page, $rows);

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$leads = $controller->model_accounts->getSalesLeadsForViews($type, $page, $rows, $salesrep_id);

		

		}

		

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"leads"		=> $leads,

			"type"		=> $type,

			"page"		=> $page,

			"rows"		=> $rows,

			"controller"=> $controller,

			"company_name" => $company_name

		);



		$mapData = array(

			"height"	=> "900px",

        	"width"		=> "100%"

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/leads_includes', $mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_leads', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewLead($controller, $lead_id){

		

		$lead = $controller->model_accounts->getLead($lead_id);

		$log = $controller->model_accounts->getLeadLog($lead_id);



		$header = array( 

			"Page" => "View Lead",

			"Title" => "View Lead - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;





		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"lead"		=> $lead,

			"log"		=> $log,

			"company_name" => $company_name

		);



		$mapData = array(

			"height"	=> "300px",

        	"width"		=> "100%"

		);





		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes', $mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_lead', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function createAccountFromLead($controller, $lead_id){

		$lead = $controller->model_accounts->getLead($lead_id);



		$countries = $controller->model_accounts->getCountryList();

		

		$geoplugin = new geoPlugin();

		$geoplugin->locate();



		$header = array( 

			"Page" => "Create Account",

			"Title" => "Create Account - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"lead"		=> $lead,

			"countries" => $countries,

			"geoplugin" => $geoplugin->countryCode,

			"company_name" => $company_name

		);

	

		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes',$pageData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('create_account', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewCustomers($controller, $type, $page = 1, $rows = 10){

		

		$header = array( 

			"Page" => "View Customers",

			"Title" => "View Customers - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		if($controller->session->userdata("user_type") == "Admin"){



			$customers = $controller->model_accounts->getCustomersForViews($type, $page, $rows);

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$customers = $controller->model_accounts->getSalesCustomersForViews($type, $page, $rows, $salesrep_id);

		}

		

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"customers"	=> $customers,

			"type"		=> $type,

			"page"		=> $page,

			"rows"		=> $rows,

			"company_name" => $company_name

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_customers', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function viewCustomers_all($controller){

		$header = array( 

			"Page" => "View Customers",

			"Title" => "View Customers - ".$controller->route

		);



		$controller->load->model('model_accounts');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		if($controller->session->userdata("user_type") == "Admin"){



			$customers = $controller->model_accounts->getAllCustomersForViews();

		

		}else if($controller->session->userdata("user_type") == "Sales"){



			$salesrep_id = $controller->model_accounts->getUserID($controller->session->userdata("email"));

			$customers = $controller->model_accounts->getAllSalesCustomersForViews($salesrep_id);

		}

		

		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"customers"	=> $customers,

			"controller"=> $controller,

			"company_name" => $company_name

		);



		$mapData = array(

			"height"	=> "900px",

        	"width"		=> "100%"

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes', $mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_customers_all', $pageData);

		//$controller->load->view('/footers/footer');

		

	}



	public function viewAccount($controller, $account_id=NULL){

		if($account_id === NULL){

			$account_id = $controller->session->userdata('id');

		}

		$controller->load->model('model_orders');



		if($controller->session->user_type == "Admin"){

			$account = $controller->model_accounts->getAccountInfo();

			$orderLog = $controller->model_orders->getOrders();	

		}else if($controller->session->user_type == "Sales"){

			$account = $controller->model_accounts->getAccountInfo();

			$orderLog = $controller->model_orders->getSalesOrders();

		}else if ($controller->session->user_type == "Reseller"){

			$account = $controller->model_accounts->getAccountInfo();

			$orderLog = $controller->model_orders->getCustomerOrders();

		}

		

		$header = array( 

			"Page" => "View Account",

			"Title" => "View Account - ".$controller->route

		);

		

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		$customer_company = $controller->model_accounts->getCompanyInfoById($account_id);

		$shipping_info = $controller->model_accounts->getShippingInfoById($account_id);

		$salesRep = $controller->model_accounts->getAllSalesReps();

		$contractNDA = $controller->model_accounts->getContractDemo("NDA");

		$contractAgree1 = $controller->model_accounts->getContractDemo("Agree1");

		$contractAgree2 = $controller->model_accounts->getContractDemo("AgreeGurtam");



		$mapData = array(

			"height"	=> "300px",

        	"width"		=> "100%"

		);



		$geoplugin = new geoPlugin();

		$geoplugin->locate();



		$countries = $controller->model_accounts->getCountryList();



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"customer"	=> $account,

			"log"		=> $orderLog,

			"company_name" => $company_name,

			"customer_company" => $customer_company,

			"geoplugin"	=> $geoplugin,

			"countries"	=> $countries,

			"shipping_info"	=> $shipping_info,

			"salesRep"		=> $salesRep,

			"header"		=> $header,

			"contractNDA"   => $contractNDA,

			"contractAgree1"=> $contractAgree1,

			"contractAgree2"=> $contractAgree2

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes',$mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_account', $pageData);

		$controller->load->view('/footers/footer');



	}	



	public function viewCustomer($controller, $account_id){

		$controller->load->model('model_orders');



		$customer = $controller->model_accounts->getCustomerInfo($account_id);

		$orderLog = $controller->model_orders->getCustomerOrders($account_id);

		

		$header = array( 

			"Page" => "View Customer",

			"Title" => "View Customer - ".$controller->route

		);

		

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		$customer_company = $controller->model_accounts->getCompanyInfoById($account_id);

		$shipping_info = $controller->model_accounts->getShippingInfoById($account_id);

		$personal_info = $controller->model_accounts->getPersonalInfoById($account_id);

		$salesRep = $controller->model_accounts->getAllSalesReps();

		$contractNDA = $controller->model_accounts->getContractDemo("NDA");

		$contractAgree1 = $controller->model_accounts->getContractDemo("Agree");

		$contractAgree2 = $controller->model_accounts->getContractDemo("AgreeGurtam");



		$mapData = array(

			"height"	=> "300px",

        	"width"		=> "100%"

		);



		$geoplugin = new geoPlugin();

		$geoplugin->locate();



		$countries = $controller->model_accounts->getCountryList();



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),

			"customer"	=> $customer,

			"log"		=> $orderLog,

			"company_name" => $company_name,

			"customer_company" => $customer_company,

			"geoplugin"	=> $geoplugin,

			"countries"	=> $countries,

			"shipping_info"	=> $shipping_info,

			"salesRep"		=> $salesRep,

			"contractNDA"   => $contractNDA,

			"contractAgree1"=> $contractAgree1,

			"personal_info"=> $personal_info



		);


		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/lead_includes',$mapData);

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_customer', $pageData);

		$controller->load->view('/footers/footer');

	}



	public function submitAccountEmail($controller, $email=NULL){

		$header = array( 

			"Page" => "Enter Account Email",

			"Title" => "Enter Account Email - ".$controller->route

		);

		$pageData = array(

				"Email" => $email

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/registration_includes');

		$controller->load->view('submitAccountEmail', $pageData);

		$controller->load->view('/footers/registration_footer');

	}



	public function createProduct($controller, $products){

		if($controller->session->userdata("user_type") == "Admin"){



			$header = array( 

				"Page" => "Create Product",

				"Title" => "Create Product - ".$controller->route

			);

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			

			if(isset($products["error"])){

				$pageData = array(

					"email" 	=> $controller->session->userdata("email"),

					"user_type"	=> $controller->session->userdata("user_type"),

					"company_name"	=> $company_name,

					"error"		=> $products["error"]

				);

			}else if(isset($products["upload_data"])){

				$pageData = array(

					"email" 	=> $controller->session->userdata("email"),

					"user_type"	=> $controller->session->userdata("user_type"),

					"company_name"	=> $company_name,

					"upload_data"		=> $products["upload_data"]

				);

			}else if(isset($products["form_data"])){

				$pageData = array(

					"email" 	=> $controller->session->userdata("email"),

					"user_type"	=> $controller->session->userdata("user_type"),

					"company_name"	=> $company_name,

					"form_data"		=> $products["form_data"]

				);

			}

			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/home_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/create_product', $pageData);

			$controller->load->view('/footers/footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}



	public function viewProduct($controller, $productId){

		if($controller->session->userdata("user_type") == "Admin" || $controller->session->userdata("user_type") == "Sales"){



			$header = array( 

				"Page" => "Create Product",

				"Title" => "Create Product - ".$controller->route

			);

			//$controller->load->model('model_accounts');

			$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;

			$pageData = array(

				"email" 	=> $controller->session->userdata("email"),

				"user_type"	=> $controller->session->userdata("user_type"),

				"company_name"	=> $company_name

			);



			$controller->load->view('/headers/header', $header);

			$controller->load->view('/headers/includes/lead_includes');

			$controller->load->view('/headers/upper_menu', $pageData);

			$controller->load->view('/headers/sidebar', $pageData);

			$controller->load->view('/view_products_all', $pageData);

			//$controller->load->view('/footers/footer');

		}else{

			redirect(PORTALPATH."main/");

		}

	}

	public function viewProducts_all($controller){

		$header = array( 

			"Page" => "View Products",

			"Title" => "View Products - ".$controller->route

		);



		$controller->load->model('model_products');

		$company_name = $controller->model_accounts->getCompanyInfo($controller->session->userdata("email"))->row()->name;



		$products = $controller->model_products->getAllStandardProductsForViews();

		



		$pageData = array(

			"email" 	=> $controller->session->userdata("email"),

			"user_type"	=> $controller->session->userdata("user_type"),	

			"products"		=> $products,

			"controller"=> $controller,

			"company_name" => $company_name

		);



		$controller->load->view('/headers/header', $header);

		$controller->load->view('/headers/includes/home_includes');

		$controller->load->view('/headers/upper_menu', $pageData);

		$controller->load->view('/headers/sidebar', $pageData);

		$controller->load->view('view_products_all', $pageData);



	}

}