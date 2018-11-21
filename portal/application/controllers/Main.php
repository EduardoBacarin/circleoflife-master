<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$portal_path = PORTALPATH;

class Main extends CI_Controller
{
    public $route;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('routerhelper');
        $choiceRoute = $this->routerhelper->whichsubroute();
        $this->route = $choiceRoute[0];
        $this->load->model('model_accounts');
    }

    public function index()
    {
        $this->load->library('loadviews');
        if ($this->session->userdata('is_loggedin')) {
            $this->loadviews->homeView($this);
        } else {
            if ($this->model_accounts->dbHasAnyAccount()) {
                $this->loadviews->loginView($this);
            } else {
                $this->loadviews->registrationView($this);
            }
        }
    }

    public function register_account()
    {
        $this->load->library('loadviews');
        if ($this->session->userdata('is_loggedin')) {
            $this->loadviews->homeView($this);
        } else {
            redirect(PORTALPATH . 'account/register_account');
        }
    }

    public function login()
    {
        $this->load->library('loadviews');
        if ($this->session->userdata('is_loggedin')) {
            $this->loadviews->homeView($this);
        } else {
            redirect(PORTALPATH . 'account/login_validation');
        }
    }

    /**
     * @TODO Protect from external not authorized access
     * @param $userId
     * @return json
     */
    public function getCircleOfLifeByUserId($userId)
    {
        $this->load->library('CircleOfLifeChartProvider');

        $result = $this->circleoflifechartprovider
           ->getCircleOfLifeChartByUserIdAndDefaultChart($userId);

        $this->getJSONResponse($result);
    }

    public function writeCircleOfLifeFromUser()
    {
        $this->load->library('CircleOfLifeChartProvider');

        $dataToInsert = json_decode(file_get_contents('php://input'), true);

        $this->circleoflifechartprovider->writeCircleOfLifeFromUser($dataToInsert);

        $this->getJSONResponse(['message' => 'ok']);
    }


	public function logout(){
		$this->session->sess_destroy();
		redirect(PORTALPATH.'main/');
	}
	
	public function edit_account(){
		$this->load->library('loadviews');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->editAccountView($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function edit_company(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->editCompanyView($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function edit_payment(){
		$this->load->library('loadviews');
		
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->editPaymentView($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function edit_shipping(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->editShippingView($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function placeorder($type, $customer_id=NULL){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		$this->load->library('form_validation');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->placeOrder($this, $type, $customer_id);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function vieworders($type, $page = 1, $rows = 10){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewOrders($this, $type, $page, $rows);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function vieworders_all($status=""){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewOrders_all($this,$status);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewproducts_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewProducts_all($this);	
		}else{
			$this->loadviews->loginView($this);
		}
		
	}

	public function vieworder($id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		$this->load->model('model_orders');
		if($this->session->userdata('is_loggedin')){
				$this->loadviews->viewOrder($this,$id);
		}else{
			$this->loadviews->loginView($this);	
		}
	}
	
	public function m2msuite(){
		$this->load->library('loadviews');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->m2mSuiteApiView($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function accessDenied(){
		$this->load->library('loadviews');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->accessDenied($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}


	public function createproduct(){
		$this->load->library('loadviews');
		$this->load->model('model_products');
		if($this->session->userdata('is_loggedin')){
			$error = array('error' => "Please select a CSV file");
			$this->loadviews->createProduct($this, $error);
		}else{
			$this->loadviews->loginView($this);
		}
	}


	// Lumar Motta - Add Support Ticket
	public function createsuppticket(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->createSuppTicket($this);
		}else{
			$this->loadviews->loginView($this);
		}
	}
	// End Lumar
	public function createcol(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->createCoL($this);
		}else{
			$this->loadviews->loginView($this);
		}
	}

	public function createcolquestion(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->createCoLQuestion($this);
		}else{
			$this->loadviews->loginView($this);
		}
	}


	public function createsalesrep(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->createSalesRep($this);
		}else{
			$this->loadviews->loginView($this);
		}
	}


	public function createcustomer(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$this->loadviews->createCustomer($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function createlead(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		if($this->session->userdata('is_loggedin')){
			$error = array('error' => "Please, upload a Google KML file!");
			$this->loadviews->createLead($this, $error);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewleads($type, $page = 1, $rows = 20){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewLeads($this, $type, $page, $rows);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewcustomers($type,  $page = 1, $rows = 10){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewCustomers($this, $type, $page, $rows);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewlead($lead_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewLead($this, $lead_id);

		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewcustomer($customer_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');
		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewCustomer($this, $customer_id);
		}else{
			$this->loadviews->loginView($this);
		}
	}

    public function viewaccount($account_id=NULL){
    	if($account_id===NULL){
    		$account_id = $this->session->userdata('id');
    	}
		$this->load->library('loadviews');
		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewAccount($this, $account_id);
		}else{
			$this->loadviews->loginView($this);
		}
	}

	public function viewleads_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewLeads_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewcustomers_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewCustomers_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewsalesrep_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewSalesRep_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}


	public function viewsalesrep($salesrep_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewSalesRep($this,$salesrep_id);
		}else{
			$this->loadviews->loginView($this);	
		}	
	}

	public function viewadmins_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewAdmins_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}


	public function viewcol_all(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewCoL_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewcol($col_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewcol($this,$col_id);
		}else{
			$this->loadviews->loginView($this);	
		}	
	}

	public function viewcolquestions_all(){   
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewCoLQuestions_all($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewcolquestion($question_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewColQuestion($this,$question_id);
		}else{
			$this->loadviews->loginView($this);	
		}	
	}


	public function getstarted(){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->getStarted($this);
		}else{
			$this->loadviews->loginView($this);	
		}
	}

	public function viewadmin($admin_id){
		$this->load->library('loadviews');
		$this->load->model('model_accounts');

		if($this->session->userdata('is_loggedin')){
			$this->loadviews->viewAdmin($this,$admin_id);
		}else{
			$this->loadviews->loginView($this);	
		}	
	}

	private function getJSONResponse(array $response)
   {
       header('Content-Type: application/json');
       echo json_encode($response);
   }
}
