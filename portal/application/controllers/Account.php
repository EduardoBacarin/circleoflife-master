<?php

//

defined('BASEPATH') OR exit('No direct script access allowed');

	

$portal_path = PORTALPATH;



class Account extends CI_Controller {



	public $route;



	public function __construct(){

        parent::__construct();

        $this->load->library('routerhelper');

        $choiceRoute = $this->routerhelper->whichsubroute();

        $this->route = $db_group = $choiceRoute[0];

        $this->db = $this->load->database($db_group, TRUE);

        $this->load->model('model_accounts');

    }



	public function login_validation(){

		$this->load->library('loadviews');

		$this->load->library('form_validation');

		$this->load->helper('security');

		$this->form_validation->set_rules('email', 'Email', 

		'required|trim|xss_clean|callback_validade_credentials');

		$this->form_validation->set_rules('password', 'Password', 'required|trim|sha1');


//echo "Chega aqui -- ";
		

		if($this->form_validation->run()){



			$company_name = $this->model_accounts->getCompanyInfo($this->input->post('email', true))->row()->name;

			$user_type = $this->model_accounts->get_account_information($this->input->post('email', true))->row()->user_type;

//echo "<br>passa aqui -- ";
//echo "<br>user_type=".$user_type;
//exit();

			$data = array(

				'id'			=> $this->model_accounts->get_account_information($this->input->post('email', true))->row()->id,

				'email' 		=> $this->input->post('email', true),

				'is_loggedin' 	=> true,

				'user_type'		=> $user_type,

				'company_name'	=> $company_name

				

			);

			$this->session->set_userdata($data);

			if($user_type=="Reseller"){
				redirect(PORTALPATH.'../../CoLWithGit/');
			}else{
				redirect(PORTALPATH.'main');
			}	

		}else{

			if($this->model_accounts->is_tmp_account($this->input->post('email', true))){

				$this->input->post('email', true);

				

				$data = array(

					'email' 		=> $email,

					'is_loggedin' 	=> false,

					'user_type'		=> "Temp"

				);

				$this->session->set_userdata($data);

				$err = "GetEmailKey";

				$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

				return;

			}

		}

		$this->loadviews->loginView($this);

	}



	public function validade_credentials(){

		if($this->model_accounts->can_login($this->input->post('email', true), sha1($this->input->post('password', true)))){

			return true;

		}else{

			$this->form_validation->set_message('validade_credentials', 'Incorrect Email/Password.');

			return false;

		}

	}



	public function logout(){

		$this->session->sess_destroy();

		redirect(PORTALPATH.'main/');

	}



	public function register_account($key = NULL){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			redirect(PORTALPATH.'main/');

		}else {

			if($key === NULL){

				$this->loadviews->registrationView($this);

			}else{

				redirect(PORTALPATH.'main/');

			}

		}

	}



	public function recover($key = NULL){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			redirect(PORTALPATH.'main/');

		}else {

				$this->loadviews->recoverView($this);

		}

	}



	public function registration_validation(){



		$this->load->library('loadviews');

		$this->load->library('form_validation');

		$this->load->helper('security');

		$this->form_validation->set_rules('f_name', 'First Name',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('l_name', 'Last Name',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('company', 'Company Name',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('title', 'Job Title',

		'required|trim|xss_clean');



		$this->form_validation->set_rules('address', 'Address',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('address2', 'Address Complement',

		'trim|xss_clean');

		$this->form_validation->set_rules('city', 'City',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('state', 'State',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('zip', 'Zipcode',

		'required|trim|xss_clean');

		$this->form_validation->set_rules('country', 'Country',

		'required|trim|xss_clean');



		$this->form_validation->set_rules('email', 'Email',

		'required|trim|xss_clean|valid_email|is_unique[accounts.email]|is_unique[tmp_accounts.email]');

		$this->form_validation->set_rules('password', 'Password',

		'required|trim|sha1');

		$this->form_validation->set_rules('cpassword', 'Password Confirmation',

		'required|trim|sha1|matches[password]');

		$this->form_validation->set_rules('accept_terms','Accept Terms and Conditions',

		'trim|required');



		if($this->form_validation->run()){



			//Set user credentials to activate email

			$data = array(

				'email' 		=> $this->input->post('email', true),

				'is_loggedin' 	=> false

			);

			$this->session->set_userdata($data);



			//generate random key

			$key = md5(uniqid());

			$email = $this->input->post('email');

			$url = PORTALPATH."account/verify_email_activation_code";

			$this->load->library('emailsformated');



			//Send email

			$data = array(

				'f_name'		=> $this->input->post('f_name', true),

				'l_name'		=> $this->input->post('l_name', true),

				'title'			=> $this->input->post('title', true),

				'company_name'	=> $this->input->post('company', true),

				'company_address' => $this->input->post('address', true),

				'company_address2'=> $this->input->post('address2', true),

				'company_city'	=> $this->input->post('city', true),

				'company_state'	=> $this->input->post('state', true),

				'company_zip'	=> $this->input->post('zip', true),

				'company_country'=> $this->input->post('country', true),

				'email'			=> $this->input->post('email', true),

				'password'		=> $this->input->post('password', true),

				'date_created' 	=> date('Y-m-d H:i:s'),

				'key' 			=> $key,

				'user_type'		=> "Temp"

			);



			if($this->model_accounts->add_temp_account($data)){

				if($this->emailsformated->sendNewAccountRegistrationEmailCode($this, $this->input->post('email'), 'info@'.$route.'.com', $url, $key)){

					redirect(PORTALPATH.'account/registration_email/EmailSent');

				}else{

					redirect(PORTALPATH.'account/registration_email/EmailErr');

				}

			}else{

				redirect(PORTALPATH.'account/registration_email/AccErr');

			}

		}else{

			$this->loadviews->registrationView($this);

		}

	}



	



	public function passwordRecover(){

		$this->load->library('loadviews');

		$this->load->library('form_validation');

		$this->load->helper('security');

		$this->form_validation->set_rules('email','Email', 

		'trim|required');

		

		if($this->form_validation->run()){

			

			//Set user credentials to activate email

			$data = array(

				'email' 		=> $this->input->post('email', true),

				'is_loggedin' 	=> false

			);

			//$this->session->set_userdata($data);

			

			//generate random key

			$key = md5(uniqid());

			

			$url = PORTALPATH."account/verify_email_activation_code";

			$this->load->library('emailsformated');



			$info = $this->model_accounts->get_account_information($this->input->post('email'));

			

			//Send email

			if(!empty($info)){

				$password = $this->createPassword(8,4);

				$this->model_accounts->updatePassword(array('password'=>sha1($password)),array('id'=>$info->row()->id));

				if($this->emailsformated->sendPasswordRecoverEmail($this, $this->input->post('email'), 'info@'.$route.'.com', $password)){

					redirect(PORTALPATH.'account/recover_password/EmailSent');

				}else{

					redirect(PORTALPATH.'account/recover_password/EmailErr');

				}

			}else{

				redirect(PORTALPATH.'account/recover_password/WrongEmail');

			}

		}else{

			$this->loadviews->recoverView($this);

		}

	}

	

	public function registration_email($err=NULL){

		$this->load->library('loadviews');

		

		if($err == 'EmailSent'){

			$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

		}else if ($err == 'EmailErr' && $this->session->userdata('email')){

			$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

		}else if ($err == 'AccErr'){

			$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

		}else if($err == NULL){

			$err = "BadRequest";

			$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

		}else{



		}

	}



	public function recover_password($err=NULL){

		$this->load->library('loadviews');

		

		if($err == 'EmailSent'){

			$this->loadviews->passwordRecoverMsg($this, $this->session->userdata('email'), $err);

		}else if ($err == 'EmailErr'){

			$this->loadviews->passwordRecoverMsg($this, $this->session->userdata('email'), $err);

		}else if ($err == 'WrongEmail'){

			$this->loadviews->passwordRecoverMsg($this, $this->session->userdata('email'), $err);

		}else{

			$err = "BadRequest";

			$this->loadviews->passwordRecoverMsg($this, $this->session->userdata('email'), $err);

		}

	}

	

	public function verify_email_activation_code(){

		$this->load->library('emailsformated');

		$this->load->library('loadviews');

		

		if(isset($_POST["submit"])){

			$key = $this->input->post('key', true);

			$email = $this->input->post('email', true);

			

			if($this->model_accounts->verify_email_key($email, $key)){

				$err = "ValidKey";

				if($this->model_accounts->move_tmp_to_perm_account($email)){

					$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

				}else{

					$err = "InvalidKey";

					$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

				}

			}else{

				$err = "InvalidKey";

				$this->loadviews->newAccountRegistrationMsg($this, $this->session->userdata('email'), $err);

			}			

		}else if(isset($_POST["resend"])){

			$url = PORTALPATH."account/verify_email_activation_code";

			if($this->emailsformated->sendNewAccountRegistrationEmailCode($this, $this->input->post('email'), 'info@pioneerpro.com', $url, $key)){

					redirect(PORTALPATH.'account/registration_email/EmailSent');

			}else{

					redirect(PORTALPATH.'account/registration_email/EmailErr');

			}

			

		}else if(isset($_POST["support"])){

			

		}else{

			redirect(PORTALPATH.'account/registration_email/EmailSent');

		}

	}

	

	public function edit_company(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('company', 'Company', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('address1', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('address2', 'Address Complement', 

			'trim|xss_clean');

			$this->form_validation->set_rules('city', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('state', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('zip', 'Zip', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('country', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('phone', 'Phone', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('website', 'Website', 

			'trim|xss_clean');

			$this->form_validation->set_rules('copyShipping', 'Clone Shipping', 

			'trim|xss_clean');

			

			if($this->form_validation->run()){

				$data = array(

					'company'	=> $this->input->post('company'),

					'address1'	=> $this->input->post('address1'),

					'address2'	=> $this->input->post('address2'),

					'city'		=> $this->input->post('city'),

					'state'		=> $this->input->post('state'),

					'zip'		=> $this->input->post('zip'),

					'country'	=> $this->input->post('country'),

					'phone'		=> $this->input->post('phone'),

					'website'	=> $this->input->post('website') 

				);

				$this->model_accounts->updateCompanyInfo($this->session->userdata('email'), $data);

				if($this->input->post('copyShipping')){

					$data = array(

					'address1'	=> $this->input->post('address1'),

					'address2'	=> $this->input->post('address2'),

					'city'		=> $this->input->post('city'),

					'state'		=> $this->input->post('state'),

					'zip'		=> $this->input->post('zip'),

					'country'	=> $this->input->post('country'),

					'phone'		=> $this->input->post('phone')

					);

					$this->model_accounts->updateShippingInfo($this->session->userdata('email'), $data);

				}

				$this->loadviews->viewAccount($this, $this->session->userdata('id'));

			}else{

				$this->loadviews->viewAccount($this, $this->session->userdata('id'));

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}



	public function edit_customer(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('f_name', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('l_name', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('notes', 'Notes', 

			'trim|xss_clean');

			

			$email = $this->model_accounts->getEmailFromId($this->input->post('customer_id'));

			if($email != $this->input->post('email'))

			{

				$this->form_validation->set_rules('email', 'Email Name', 

				'required|trim|xss_clean|valid_email|is_unique[accounts.email]|is_unique[tmp_accounts.email]');	

			}

			

			$this->form_validation->set_rules('customer_id', 'Requires Valid Customer', 

			'required|trim|xss_clean');



			$this->form_validation->set_rules('salesRep_id', 'Requires Valid Sales Rep', 

			'trim|xss_clean');



			if($this->form_validation->run()){

				$data = array();

				if($this->session->userdata('user_type') === "Admin" && $this->session->userdata('id')===$this->input->post('customer_id')){

					$salesRep_id = NULL;

				}else if($this->input->post('salesRep') == "Select Sales Representative"){

					$salesRep_id = $this->input->post('salesRep_id');

				}else {

					$salesRep_id = $this->input->post('salesRep');

				}

				if($this->session->userdata('user_type') != "Reseller"){

					$data['notes'] = $this->input->post('notes');

				}

				$data['f_name'] = $this->input->post('f_name');

				$data['l_name'] = $this->input->post('l_name');

				$data['email'] = $this->input->post('email');

				$data['sales_rep'] = $salesRep_id;

				$this->model_accounts->updateCustomerAccountInfo($this->input->post('customer_id'), $data);

			}

			$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

		}

	}



	// Lumar Motta - Add Promote to Admin - 05/30/2018 

	 	

	public function edit_usertype(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin" ){



			$this->load->library('form_validation');

			$this->load->helper('security');



			$user_type = $this->input->post('user_type');

			$user_id   = $this->input->post('user_id') ;

			$accountData = array(

					'user_type'		=> $user_type

				);

			//echo "ID=".$this->input->post('user_id') ;

			//echo "<br>Type=".$this->input->post('user_type') ;

			//echo "<br>com Email=".$this->input->post('email') ;

			//exit();

			$account_id=$this->input->post('id');

			if(!$this->model_accounts->updateAccountInfo($this->input->post('user_id') , $accountData)){

				$this->session->set_flashdata('error', "Wrong Current Email"); 

				$this->loadviews->loginView($this);

			}

			if($user_type=="Admin"){

				$this->loadviews->viewAdmin($this, $user_id);

			}else{

				$this->loadviews->viewSalesRep($this, $user_id);

			}	

		}

	}	

	// End Lumar



	public function edit_customerCompany(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('company', 'Company', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('address1', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('address2', 'Address Complement', 

			'trim|xss_clean');

			$this->form_validation->set_rules('city', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('state', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('zip', 'Zip Code', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('country', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('phone', 'Phone', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('website', 'Website', 

			'trim|xss_clean');

			$this->form_validation->set_rules('rfc', 'RFC', 

			'trim|xss_clean');

			$this->form_validation->set_rules('taxid', 'Tax ID', 

			'trim|xss_clean');

			$this->form_validation->set_rules('copyShipping', 'Clone Shipping', 

			'trim|xss_clean');



			if($this->form_validation->run()){



				$this->load->library('api/Googleapi');



				$address = $this->input->post('address1')." ".$this->input->post('address2').", ".$this->input->post('city').", ".$this->input->post('state').", ".$this->input->post('zip').", ".$this->input->post('country');

                    

                $point = $this->googleapi->getPointFromAddress($address);

               	$data = array(

					'name'	=> $this->input->post('company'),

					'address'	=> $this->input->post('address1'),

					'address2'	=> $this->input->post('address2'),

					'city'		=> $this->input->post('city'),

					'state'		=> $this->input->post('state'),

					'zip'		=> $this->input->post('zip'),

					'country'	=> $this->input->post('country'),

					'phone'		=> $this->input->post('phone'),

					'website'	=> $this->input->post('website'),

					'rfc'		=> $this->input->post('rfc'),

					'taxid'		=> $this->input->post('website'),

					'point'		=> $point

				);

				$this->model_accounts->updateCustomerCompanyInfo($this->input->post('customer_id'), $data);

				if($this->input->post('copyShipping')){

					$data = array(

					'address1'	=> $this->input->post('address1'),

					'address2'	=> $this->input->post('address2'),

					'city'		=> $this->input->post('city'),

					'state'		=> $this->input->post('state'),

					'zip'		=> $this->input->post('zip'),

					'country'	=> $this->input->post('country'),

					'phone'		=> $this->input->post('phone')

					);

					$this->model_accounts->updateCustomerShippingInfo($this->input->post('customer_id'), $data);

				}

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}else{

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}





	public function editCustomerCompanyInfo(){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('companyName', 'Company', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('customerFirstName', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('customerLastName', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('customerEmail', 'Email', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billAddress', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billAddress2', 'Address Complement', 

			'trim|xss_clean');

			$this->form_validation->set_rules('billCity', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billState', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billZip', 'Zip', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billCountry', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billPhone', 'Phone', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('billwebsite', 'Website', 

			'trim|xss_clean');

			$this->form_validation->set_rules('billRfc', 'RFC', 

			'trim|xss_clean');

			$this->form_validation->set_rules('billTaxID', 'Tax ID', 

			'trim|xss_clean');

			$this->form_validation->set_rules('copyShipping', 'Clone Shipping', 

			'trim|xss_clean');

			

			if($this->form_validation->run()){

				$companyData = array(

					'name'		=> $this->input->post('companyName'),

					'address1'	=> $this->input->post('billAddress'),

					'address2'	=> $this->input->post('billAddress2'),

					'city'		=> $this->input->post('billCity'),

					'state'		=> $this->input->post('billState'),

					'zip'		=> $this->input->post('billZip'),

					'country'	=> $this->input->post('billCountry'),

					'phone'		=> $this->input->post('billPhone'),

					'website'	=> $this->input->post('billWebsite'),

					'rfc'		=> $this->input->post('billRfc'),

					'taxid'		=> $this->input->post('billTaxID')

				);

				

				$this->model_accounts->updateCustomerCompanyInfo($this->input->post('customer_id'), $companyData);



				$accountData = array(

					'f_name'	=> $this->input->post('customerFirstName'),

					'l_name'	=> $this->input->post('customerLastName'),

					'email'		=> $this->input->post('customerEmail')

				);



				$this->model_accounts->updateCustomerAccountInfo($this->input->post('customer_id'), $accountData);

				

				if($this->input->post('copyShipping')){

					$shipData = array(

					'address1'	=> $this->input->post('billAddress'),

					'address2'	=> $this->input->post('billAddress2'),

					'city'		=> $this->input->post('billCity'),

					'state'		=> $this->input->post('billState'),

					'zip'		=> $this->input->post('billZip'),

					'country'	=> $this->input->post('billCountry'),

					'phone'		=> $this->input->post('billPhone')

					);

					$this->model_accounts->updateCustomerShippingInfo($this->input->post('customer_id'), $shipData);

				}

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}else{

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}



	public function edit_account(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			if($this->session->userdata('email') != $this->input->post('email'))

			{

				$this->form_validation->set_rules('email', 'Email Name', 

				'required|trim|xss_clean|valid_email|is_unique[accounts.email]|is_unique[tmp_accounts.email]');	

			}

			if($this->input->post('newpassword')!=="")

			{

				$this->form_validation->set_rules('password', 'Confirm Current Password', 

				'required|trim|xss_clean|callback_validade_credentials');

				$this->form_validation->set_rules('newpassword', 'New Password', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('cpassword', 'Confirm Password', 

				'required|trim|xss_clean|matches[newpassword]');

			}



			$this->form_validation->set_rules('f_name', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('l_name', 'Last Name', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				if($this->input->post('newpassword')!=="")

				{

					$data = array(

						'email'	=> $this->input->post('email'),

						'f_name'=> $this->input->post('f_name'),

						'l_name'=> $this->input->post('l_name'),

						'password'	=> sha1($this->input->post('newpassword')),

					);

				}else{

					$data = array(

						'email'	=> $this->input->post('email'),

						'f_name'=> $this->input->post('f_name'),

						'l_name'=> $this->input->post('l_name')

					);

				}

				if(!$this->model_accounts->updateAccountInfo($this->session->userdata('id'), $data))

				{



					$this->session->set_flashdata('error', "Wrong Current Email or Current Password"); 

				}

				$this->loadviews->viewAccount($this);

			}else{

				$this->loadviews->viewAccount($this);

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}

	

	public function edit_shipping(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('address1', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('address2', 'Address Complement', 

			'trim|xss_clean');

			$this->form_validation->set_rules('city', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('state', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('zip', 'Zip', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('country', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('phone', 'Phone', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('website', 'Website', 

			'trim|xss_clean');

			

			if($this->form_validation->run()){

				$data = array(

					'address1'	=> $this->input->post('address1'),

					'address2'	=> $this->input->post('address2'),

					'city'		=> $this->input->post('city'),

					'state'		=> $this->input->post('state'),

					'zip'		=> $this->input->post('zip'),

					'country'	=> $this->input->post('country'),

					'phone'		=> $this->input->post('phone')

				);

				$this->model_accounts->updateShippingInfo($this->session->userdata('email'), $data);

				$this->loadviews->viewAccount($this);

			}else{

				$this->loadviews->viewAccount($this);

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}



	public function editCustomerShipAddress(){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('shipAddress', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('shipAddress2', 'Address Complement', 

			'trim|xss_clean');

			$this->form_validation->set_rules('shipCity', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('shipState', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('shipZip', 'Zip', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('shipCountry', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('shipPhone', 'Phone', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('customer_id', 'Customer ID', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				$data = array(

					'address1'	=> $this->input->post('shipAddress'),

					'address2'	=> $this->input->post('shipAddress2'),

					'city'		=> $this->input->post('shipCity'),

					'state'		=> $this->input->post('shipState'),

					'zip'		=> $this->input->post('shipZip'),

					'country'	=> $this->input->post('shipCountry'),

					'phone'		=> $this->input->post('shipPhone')

				);

				$this->model_accounts->updateCustomerShippingInfo($this->input->post('customer_id'), $data);

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}else{

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}


	public function editCustomerPersonal(){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('birthday', 'Birthday', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('birth_sign', 'Birth Sign', 

			'trim|xss_clean');

			$this->form_validation->set_rules('profession', 'Profession', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('	favorite_ethnic_food', 'Favorite Ethnic Food', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('favorite_music_general', 'Favorite Music General', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('favorite_music_general', 'Share a Brief Philosophy of Life Statement', 

			'required|trim|xss_clean');


			$this->form_validation->set_rules('customer_id', 'Customer ID', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				$data = array(

					'birthday'				=> $this->input->post('birthday'),

					'birth_sign'			=> $this->input->post('birth_sign'),

					'profession'			=> $this->input->post('profession'),

					'favorite_ethnic_food'	=> $this->input->post('favorite_ethnic_food'),

					'favorite_music_general'=> $this->input->post('favorite_music_general'),

					'favorite_music_general'=> $this->input->post('favorite_music_general')

				);

				$this->model_accounts->updateCustomerPersonalInfo($this->input->post('customer_id'), $data);

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}else{

				$this->loadviews->viewCustomer($this, $this->input->post('customer_id'));

			}

		}else{

			$this->loadviews->loginView($this);	

		}

	}




	public function edit_col(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin" ){



			$this->load->library('form_validation');

			$this->load->helper('security');



			$user_type       = $this->input->post('user_type');

			$col_id          = $this->input->post('col_id') ;

			$description     = $this->input->post('description') ;

			$colData = array(

					'description'		=> $description

				);

			if(!$this->model_accounts->updateCoL($col_id , $colData)){

				$this->session->set_flashdata('error', "Wrong Current Email"); 

				$this->loadviews->loginView($this);

			}

			if($user_type=="Admin"){

				$this->loadviews->viewCoL($this, $col_id);

			}else{

				$this->loadviews->viewCoL($this, $col_id);

			}	

		}

	}	

	// End Lumar





	public function getCompanyAndShippingInfo(){

		

		$company = $this->model_accounts->getCompanyInfoById($this->input->post('id'));

		$shipping = $this->model_accounts->getShippingInfoById($this->input->post('id'));

		echo json_encode(array('return'=>true, 'company'=>$company, 'shipping'=>$shipping)); exit;

	

	}



	public function getUserType($email){

		return $this->model_accounts->get_account_information($email)->row()->user_type;

	}



	public function getUserID($email){

		return $this->model_accounts->get_account_information($email)->row()->id;

	}



	public function createPassword($tamanho=9, $forca=0) {

		$vogais = 'aeuy';

		$consoantes = 'bdghjmnpqrstvz';

		if ($forca >= 1) {

			$consoantes .= 'BDGHJLMNPQRSTVWXZ';

		}

		if ($forca >= 2) {

			$vogais .= "AEUY";

		}

		if ($forca >= 4) {

			$consoantes .= '23456789';

		}

		if ($forca >= 8 ) {

			$vogais .= '@#$%';

		}

	 

		$senha = '';

		$alt = time() % 2;

		for ($i = 0; $i < $tamanho; $i++) {

			if ($alt === 1) {

				$senha .= $consoantes[(rand() % strlen($consoantes))];

				$alt = 0;

			} else {

				$senha .= $vogais[(rand() % strlen($vogais))];

				$alt = 1;

			}

		}

		return $senha;

	}



	public function createAccount(){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('fname', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('lname', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('email', 'Email', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('rfcNumber', 'Number of Branches', 

			'trim|xss_clean');

			$this->form_validation->set_rules('taxNumber', 'Tax ID Number', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('website', 'WebSite', 

			'trim|xss_clean');

			

			if($this->form_validation->run()){

				$accountData = array(

					'email'			=> $this->input->post('email'),

					'password' 		=> $this->createSHA512Password(),

					'f_name'		=> $this->input->post('fname'),

					'l_name'		=> $this->input->post('lname'),

					'date_created' 	=> date('Y-m-d H:i:s'),

					'key'			=> "", 

					'user_type'		=> "Reseller",

					'sales_rep'		=> $this->input->post('salesRep_id')

				);



				if(!$this->input->post('lead_point')){

					//$point 

				}



				$billingData = array(

					'name'		=> $this->input->post('bcompany'),

					'address' 	=> $this->input->post('baddress1'),

					'address2' 	=> $this->input->post('baddress2'),

					'city' 		=> $this->input->post('bcity'),

					'state' 	=> $this->input->post('bstate'),

					'zip' 		=> $this->input->post('bzip'),

					'country'	=> $this->input->post('bcountry'),

					'phone'		=> $this->input->post('bphone'),

					'website'	=> $this->input->post('website'),

					'rfc'		=> $this->input->post('rfcNumber'),

					'taxid'		=> $this->input->post('taxNumber'),

					'point'		=> $this->input->post('lead_point')

				);



				$shippingData = array(

					'address' 	=> $this->input->post('saddress1'),

					'address2' 	=> $this->input->post('saddress2'),

					'city' 		=> $this->input->post('scity'),

					'state' 	=> $this->input->post('sstate'),

					'zip' 		=> $this->input->post('szip'),

					'country'	=> $this->input->post('scountry'),

					'phone'		=> $this->input->post('sphone')

				);



				$leadInfo = array(

					'lead_id'	=> $this->input->post('lead_id')

				);



				$account_id = $this->model_accounts->createAccount($leadInfo, $accountData, $billingData, $shippingData);

				if($account_id){

					$this->loadviews->viewCustomer($this, $account_id);

				}

				

			}else{

				$this->loadviews->createAccountFromLead($this, $this->input->post('lead_id'));

			}

		}else{

			$this->loadviews->loginView($this);

		}

	}



	public function createSalesAccount(){

		$this->load->library('loadviews');

		

		if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin" ){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('fname', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('lname', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('email', 'Email', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				$accountData = array(

					'email'			=> $this->input->post('email'),

					'password' 		=> $this->createSHA512Password(),

					'f_name'		=> $this->input->post('fname'),

					'l_name'		=> $this->input->post('lname'),

					'date_created' 	=> date('Y-m-d H:i:s'),

					'key'			=> "", 

					'user_type'		=> "Sales",

					'sales_rep'		=> $this->session->userdata('id')

				);

				

				$account_id = $this->model_accounts->insertAccount($accountData);

				if($account_id){

					$company = $this->model_accounts->getCompanyInfoById($this->session->userdata('id'));

					$company->account_id = $account_id;

					$this->model_accounts->insertCompany($company);



					$ship_info =  $this->model_accounts->getShippingInfoById($this->session->userdata('id'));

					$ship_info->account_id = $account_id;

					$this->model_accounts->insertShippingInfo($ship_info);



					$this->loadviews->viewSalesRep($this, $account_id);

				}else{

					$this->loadviews->createSalesRep($this);

				}

			}else{

				$this->loadviews->createSalesRep($this);

			}

		}else{

			$this->loadviews->loginView($this);

		}

	}





	public function createCoL(){

		$this->load->library('loadviews');

		

		if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin" ){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('description', 'CoL Name', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				$colData = array(

					'description'	=> $this->input->post('description')

				);

				$col_id = $this->model_accounts->insertCoL($colData);



				if($col_id){



					$this->loadviews->viewCoL($this, $col_id);

				}else{

					$this->loadviews->createCoL($this);

				}

			}else{

				$this->loadviews->createCoL($this);

			}

		}else{

			$this->loadviews->loginView($this);

		}

	}







	public function createSuppTicket(){

		$this->load->library('loadviews');

		

		if($this->session->userdata('is_loggedin')){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('fname', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('lname', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('email', 'Email', 

			'required|trim|xss_clean');

			

			if($this->form_validation->run()){

				$ticketData = array(



					// must change usting ticket data

					'email'			=> $this->input->post('email'),

					'password' 		=> $this->createSHA512Password(),

					'f_name'		=> $this->input->post('fname'),

					'l_name'		=> $this->input->post('lname'),

					'date_created' 	=> date('Y-m-d H:i:s'),

					'key'			=> "", 

					'user_type'		=> "Sales",

					'sales_rep'		=> $this->session->userdata('id')

				);

				

				$ticket_id = $this->model_accounts->insertTicket($ticketData);

				if($ticket_id){

					// must change using ticket info

					$company = $this->model_accounts->getCompanyInfoById($this->session->userdata('id'));

					$company->account_id = $account_id;

					$this->model_accounts->insertCompany($company);



					$ship_info =  $this->model_accounts->getShippingInfoById($this->session->userdata('id'));

					$ship_info->account_id = $account_id;

					$this->model_accounts->insertShippingInfo($ship_info);



					$this->loadviews->viewSuppTicket($this, $account_id);



					

				}else{

					$this->loadviews->createSuppTicket($this);

				}

			}else{

				$this->loadviews->createSuppTicket($this);

			}

		}

		$this->loadviews->loginView($this);

	}







	public function createCustomerAccount(){

		$this->load->library('loadviews');

		$this->load->model('model_orders');

		

		if($this->session->userdata('is_loggedin') && $this->session->userdata("user_type") == "Admin" || $this->session->userdata("user_type") == "Sales" ){

			$this->load->library('form_validation');

			$this->load->helper('security');



			$this->form_validation->set_rules('salesRep_id', 'Please Assign to a Sales Rep', 

			'trim|xss_clean');



			$this->form_validation->set_rules('fname', 'First Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('lname', 'Last Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('email', 'Email', 

			'required|trim|xss_clean');





			$this->form_validation->set_rules('rfcNumber', 'Number of Branchhes', 

			'trim|xss_clean');

			$this->form_validation->set_rules('taxid', 'Tax ID Number', 

			'trim|xss_clean');

			$this->form_validation->set_rules('website', 'Website', 

			'trim|xss_clean');



			$this->form_validation->set_rules('bcompany', 'Company Name', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('baddress1', 'Address', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('baddress2', 'Company Address', 

			'trim|xss_clean');

			$this->form_validation->set_rules('bcity', 'City', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('bstate', 'State', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('bzip', 'Zip', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('bcountry', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('bcountry', 'Country', 

			'required|trim|xss_clean');

			$this->form_validation->set_rules('bphone', 'Contact Number', 

			'required|trim|xss_clean');



			if(!$this->input->post('copyShipping')){



				$this->form_validation->set_rules('saddress1', 'Address', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('saddress2', 'Company Address', 

				'trim|xss_clean');

				$this->form_validation->set_rules('scity', 'City', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('sstate', 'State', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('szip', 'Zip', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('scountry', 'Country', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('scountry', 'Country', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('sphone', 'Contact Number', 

				'required|trim|xss_clean');

				$this->form_validation->set_rules('sphone', 'Contact Number', 

				'required|trim|xss_clean');

			}

			if($this->form_validation->run()){



				if(!$this->input->post('salesRep_id')){

					$sales_rep = $this->session->userdata('id');

				}else{

					$sales_rep = $this->input->post('salesRep_id');

				}



				$accountData = array(

					'email'			=> $this->input->post('email'),

					'password' 		=> $this->createSHA512Password(),

					'f_name'		=> $this->input->post('fname'),

					'l_name'		=> $this->input->post('lname'),

					'date_created' 	=> date('Y-m-d H:i:s'),

					'key'			=> "", 

					'user_type'		=> "Reseller",

					'sales_rep'		=> $sales_rep

				);



				$account_id = $this->model_accounts->insertAccount($accountData);

				if($account_id){

					

					$this->load->library('api/Googleapi');



					$address = $this->input->post('baddress1')." ".$this->input->post('baddress2').", ".$this->input->post('bcity').", ".$this->input->post('bstate').", ".$this->input->post('bzip').", ".$this->input->post('bcountry');

                    

                    $point = $this->googleapi->getPointFromAddress($address);

                	//var_dump($point);



					$companyData = array(

						'account_id'=> $account_id,

						'name'		=> $this->input->post('bcompany'),

						'address' 	=> $this->input->post('baddress1'),

						'address2' 	=> $this->input->post('baddress2'),

						'city' 		=> $this->input->post('bcity'),

						'state' 	=> $this->input->post('bstate'),

						'zip' 		=> $this->input->post('bzip'),

						'country'	=> $this->input->post('bcountry'),

						'phone'		=> $this->input->post('bphone'),

						'website'	=> $this->input->post('website'),

						'rfc'		=> $this->input->post('rfcNumber'),

						'taxid'		=> $this->input->post('taxid'),

						'point'		=> $point

					);

					$company_id = $this->model_accounts->insertCompany($companyData);

					if($this->input->post('copyShipping')){

						$shipData = array(

							'account_id'=> $account_id,

							'address'	=> $this->input->post('baddress1'),

							'address2'	=> $this->input->post('baddress2'),

							'city'		=> $this->input->post('bcity'),

							'state'		=> $this->input->post('bstate'),

							'zip'		=> $this->input->post('bzip'),

							'country'	=> $this->input->post('bcountry'),

							'phone'		=> $this->input->post('bphone')

						);

						$this->model_accounts->insertShippingInfo($shipData);

					}else{

						$shipData = array(

							'account_id'=> $account_id,

							'address'	=> $this->input->post('saddress1'),

							'address2'	=> $this->input->post('saddress2'),

							'city'		=> $this->input->post('scity'),

							'state'		=> $this->input->post('sstate'),

							'zip'		=> $this->input->post('szip'),

							'country'	=> $this->input->post('scountry'),

							'phone'		=> $this->input->post('sphone')

						);

						$this->model_accounts->insertShippingInfo($shipData);

					}

					

					$this->loadviews->viewCustomer($this, $account_id);

				}else{

					$this->loadviews->createCustomer($this);

				}

			}else{

				$this->loadviews->createCustomer($this);

			}

		}else{

			$this->loadviews->loginView($this);

		}	

	}



///MUST MODIFY THIS FUNCTION AND ALL METHODS THAT CALL SHA1 TO SHA512

///FOR DEV PURPOSES IT WILL STAY SHA1

///FOR PRODUCTION SHOULD BE SHA512

	public function createSHA512Password(){

		$string = $this->createPassword();

		return sha1($string);

	}

///



	public function placeorder(){

		$this->load->library('loadviews');

		if($this->session->userdata('is_loggedin')){

			$customer_id = $this->input->post('customer_id');

			$this->loadviews->placeOrder($this, "usa", $customer_id);

		}else{

			$this->loadviews->loginView($this);	

		}

	}

}

?>