<?php

 

class Model_Accounts extends CI_Model {

	

	private $db;



	public function __construct(){

        parent::__construct();

        $this->load->library('routerhelper');

        $choiceRoute = $this->routerhelper->whichsubroute();

        $db_group = $choiceRoute[0];

        $this->db = $this->load->database($db_group, TRUE);

    }



    public function dbHasAccount(){

    	$this->db->select('id');

    	$query = $this->db->get('accounts');

    	if($query->num_rows() > 0){

			return true;

		}

		return false;

    }



    public function dbHasTmpAccount(){



		$this->db->select('id');

    	$query = $this->db->get('tmp_accounts');

    	if($query->num_rows() > 0){

			return true;

		}		

		return false;

    }



    public function dbHasAnyAccount(){

    	$this->db->select('id');

    	$query = $this->db->get('accounts');

    	if($query->num_rows() > 0){

			return true;

		}

		$this->db->select('id');

    	$query = $this->db->get('tmp_accounts');

    	if($query->num_rows() > 0){

			return true;

		}		

		return false;

    }



	public function can_login($email, $passw){

		$this->db->where('email', $email);

		$this->db->where('password', $passw);

		$query = $this->db->get('accounts');

		if($query->num_rows() ==1) {

			return true;

		}else {

			return false;

		}

	}

	

	public function getId($email){

		$sql = "SELECT id FROM accounts WHERE email='".$email."'";

		$query = $this->db->query($sql);

		if($query->num_rows() == 1){

			return $query->row()->id;

		}

		return false;

	}



	public function getSalesRepID($account_id){

		//var_dump($account_id);

		$sql = "SELECT sales_rep FROM accounts WHERE id='".$account_id."'";

		$query = $this->db->query($sql);

		if($query->num_rows() == 1){

			return $query->result_array();

		}

		return false;	

	}



	public function get_account_information($email){

		$this->db->where('email', $email);

		$query = $this->db->get('accounts');

		if($query->num_rows() == 1) {

			return $query;

		}else {

			return false;

		}

	}

	

	public function is_tmp_account($email){

		$this->db->where('email', $email);

		$query = $this->db->get('tmp_accounts');

		if($query->num_rows() == 1) {

			return true;

		}else {

			return false;

		}

	}

	

	public function get_tmp_account($email){

		$this->db->where('email', $email);

		$query = $this->db->get('tmp_accounts');

		if($query->num_rows() == 1) {

			return $query;

		}else {

			return false;

		}

	}

	

	public function get_account_type($email){

		

	}

	

	public function add_temp_account($data){

		$query = $this->db->insert('tmp_accounts', $data);

		if($query){

			return true;

		}else{

			return false;

		}

	}

	

	public function verify_email_key($email, $key){

		$this->db->where('email', $email);

		$this->db->where('key', $key);

		$query = $this->db->get('tmp_accounts');

		if($query->num_rows() == 1) {

			return $query;

		}else {

			return false;

		}	

	}

	

	public function move_tmp_to_perm_account($email){

		$query = $this->db->query('SELECT * FROM tmp_accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			$row = $query->row();



			if($this->dbHasAccount() == FALSE){

				$user_type = "Admin";

			}else{

				$user_type = "Reseller";

			}



			$data = array(

				'email' 		=> $row->email,

				'password' 		=> $row->password,

				'f_name' 		=> $row->f_name,

				'l_name' 		=> $row->l_name,

				'title'			=> $row->title,

				'date_created' 	=> $row->date_created,

				'key' 			=> $row->key,

				'user_type'		=> $user_type,

				'nda'			=> 1,

				'sales_rep'     => 1

			);



			if($query = $this->db->insert('accounts', $data)){

				$query = $this->db->query('DELETE FROM `tmp_accounts` WHERE email = "'.$email.'"');

				if($query){

					$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

					if($query->num_rows() == 1){

						$row2 = $query->row();

						$data = array(

							'account_id' => $row2->id,

							'name'	=> $row->company_name,

							'address' => $row->company_address,

							'address2' => $row->company_address2,

							'city' => $row->company_city,

							'state' => $row->company_state,

							'zip' => $row->company_zip,

							'country' => $row->company_country

						);

						if($query = $this->db->insert('company_information', $data)){

							$data = array(

							'account_id' => $row2->id,

							'address' => $row->company_address,

							'address2' => $row->company_address2,

							'city' => $row->company_city,

							'state' => $row->company_state,

							'zip' => $row->company_zip,

							'country' => $row->company_country

						);

						if($query = $this->db->insert('shipping_information', $data)){

								return true;

						}

						}

					}

				}

			}

		}

		return false;

	}





	

	public function getCountryList(){

		$query = $this->db->query('SELECT code, country FROM countries');

		if($query->num_rows() > 0){

			return $query;

		}else{

			return false;

		}

	}


	/* Lumar Criete Customer List */

	public function getCustomersList(){

		$query = $this->db->query('SELECT id, email, f_name, l_name FROM accounts WHERE user_type = "Reseller" ');

		if($query->num_rows() > 0){

			return $query;

		}else{

			return false;

		}

	}

	public function getCircleOfLifeAreas(){

		$query = $this->db->query('SELECT description FROM circle_of_life WHERE active = 1 ');

		if($query->num_rows() > 0){

			return $query;

		}else{

			return false;

		}

	}


	// Lumar Motta - Add FAQ List - 05-27-2018

	public function getFAQList(){

		$query = $this->db->query('SELECT * FROM support_faq');

		if($query->num_rows() > 0){

			return $query;

		}else{

			return false;

		}

	}

	// End Lumar

	

	public function getCompanyInfo($email){

		$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() != 0){

			$query = $this->db->query('SELECT * FROM company_information WHERE account_id="'.$query->row()->id.'"');	

		}

		if($query->num_rows() == 1){

			return $query;

		}

		return false;

	}

	

	public function getShippingInfo($email){

		$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

		

		$query = $this->db->query('SELECT * FROM shipping_information WHERE account_id="'.$query->row()->id.'"');

		if($query->num_rows() == 1){

			return $query;

		}

		return false;

	}



	public function getCompanyInfoById($id){

		$query = $this->db->query('SELECT * FROM company_information WHERE account_id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}

	

	public function getContractDemo($type){

		$query = $this->db->query('SELECT text FROM contract_template WHERE type="'.$type.'"');

		if($query->num_rows() == 1){

			return $query->row()->text;

		}

		return false;

	}





	public function getShippingInfoById($id){

		$query = $this->db->query('SELECT * FROM shipping_information WHERE account_id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getPersonalInfoById($id){

		$query = $this->db->query('SELECT * FROM personal_information WHERE account_id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getAccountInfo($email=""){

		if($email==""){

			$email = $this->session->userdata('email');

		}

		$query = $this->db->query('SELECT * FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getAccountInfoById($id=""){

		if($id==""){

			$id = $this->session->userdata('id');

		}

		$query = $this->db->query('SELECT * FROM accounts WHERE id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getCoL($id){

		$query = $this->db->query('SELECT * FROM circle_of_life WHERE active = 1 AND id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getCoLQuestion($id){

		$query = $this->db->query('SELECT * FROM circle_of_life_questions WHERE active = 1 AND id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}





	public function updateCompanyInfo($email, $data){

		$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			$row = $query->row();

			$data = array(

					'name' 		=> $data['company'],

					'address' 	=> $data['address1'],

					'address2' 	=> $data['address2'],

					'city' 		=> $data['city'],

					'state' 	=> $data['state'],

					'zip' 		=> $data['zip'],

					'country'	=> $data['country'],

					'phone'		=> $data['phone'],

					'website'	=> $data['website']



				);

			$this->db->where('account_id', $row->id);

			$this->db->update('company_information', $data);

		}

	}



	public function updateCustomerCompanyInfo($id, $data){

		$this->db->where('account_id', $id);

		$this->db->update('company_information', $data);

	}



	public function updateEmailPasswordInfo($cemail,$email, $password,$data){

		if($cemail == $email)

		{

			$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'" and password="'.sha1($password).'"');

			if($query->num_rows() == 1){

				$row = $query->row();



				$this->db->where('id', $row->id);

				return $this->db->update('accounts', $data);

			}

		}

		return false;

	}



	public function updateAccountInfo($id,$data){

		

		$this->db->where('id', $id);

		return $this->db->update('accounts', $data);

		

	}





	public function updateShippingInfo($email, $data){

		$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			$row = $query->row();

			$data = array(

					'address' 	=> $data['address1'],

					'address2' 	=> $data['address2'],

					'city' 		=> $data['city'],

					'state' 	=> $data['state'],

					'zip' 		=> $data['zip'],

					'country'	=> $data['country'],

					'phone'		=> $data['phone']



				);

			$this->db->where('account_id', $row->id);

			$this->db->update('shipping_information', $data);

		}

	}



	public function updateCustomerShippingInfo($id, $data){

		$data = array(

			'address' 	=> $data['address1'],

			'address2' 	=> $data['address2'],

			'city' 		=> $data['city'],

			'state' 	=> $data['state'],

			'zip' 		=> $data['zip'],

			'country'	=> $data['country'],

			'phone'		=> $data['phone']

		);

		$this->db->where('account_id', $id);

		$this->db->update('shipping_information', $data);

	}


	public function updateCustomerPersonalInfo($id, $data){

				$data = array(

					'birthday'				=> $this->input->post('birthday'),

					'birth_sign'			=> $this->input->post('birth_sign'),

					'profession'			=> $this->input->post('profession'),

					'favorite_ethnic_food'	=> $this->input->post('favorite_ethnic_food'),

					'favorite_music_general'=> $this->input->post('favorite_music_general'),

					'favorite_music_general'=> $this->input->post('favorite_music_general')

				);

		$this->db->where('account_id', $id);

		$this->db->update('personal_information', $data);

	}



	public function updateCustomerAccountInfo($id, $data){

		$this->db->where('id', $id);

		$this->db->update('accounts', $data);

	}



	public function updatePassword($data, $where){

		if($data != null && $where != null)

			return $this->db->update('accounts', $data,$where);

		return false;

	}





	public function updateCoL($id,$data){

		

		$this->db->where('id', $id);

		return $this->db->update('circle_of_life', $data);

		

	}







	public function getCompaniesNames(){

		$query = $this->db->query('SELECT account_id, name FROM company_information WHERE name IS NOT NULL' );

		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}



	public function getCompanyNamebyEmail($email=""){

		$id = $this->getUserID($email);

		

		$query = $this->db->query('SELECT account_id, name FROM company_information WHERE account_id='.$id.' AND name IS NOT NULL' );



		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}



	public function getCompanyNamesforSalesRep($email){

		$id = $this->getUserID($email);



		$query = $this->db->query('SELECT company_information.account_id, company_information.name FROM company_information INNER JOIN accounts ON accounts.id = company_information.account_id WHERE accounts.sales_rep = '.$id.' AND company_information.name IS NOT NULL');



		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}



	public function getCompanyNametoPlaceOrder($id){

		$query = $this->db->query('SELECT account_id, name FROM company_information WHERE account_id='.$id);

		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}



	public function getCompanyName($id){

		$query = $this->db->query('SELECT name FROM company_information WHERE account_id='.$id);

		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}



	public function getUserID($email=""){

		if($email==""){

			$email = $this->session->userdata('email');

		}

		$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			return $query->row()->id;

		}

		return false;

	}



	public function getUserEmail($id){



		$query = $this->db->query('SELECT email FROM accounts WHERE id="'.$id.'"');

		if($query->num_rows() == 1){

			return $query->row()->email;

		}

		return false;

	}



	public function getSalesRepEmail($email=""){

		if($email==""){

			$email = $this->session->userdata('email');

		}

		$query = $this->db->query('SELECT sales_rep FROM accounts WHERE email="'.$email.'"');

		if($query->num_rows() == 1){

			$sales_rep = $query->row()->sales_rep;

			$query = $this->db->query('SELECT email FROM accounts WHERE id="'.$sales_rep.'"');

			if($query->num_rows() == 1){

				return $query->row()->email;

			}

		}

		return false;

	}

	public function getSalesRepInfo($id){

		

		$query = $this->db->query('SELECT * FROM accounts WHERE id="'.$id.'" AND user_type="Sales"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getSalesRepInfoForView(){

		

		$salesreps = array();



		$sql = "SELECT * FROM accounts WHERE user_type='Sales'";

		$query = $this->db->query($sql);

		if($query){

			$totalRows = $query->num_rows();	

			foreach ($query->result_array() as $row) {

				$salesreps[] = $row;

			}



			$salesrep_data = array(

				"totalRows"	=> (int)$totalRows,

				"sales_reps"	=> $salesreps

			);

			return $salesrep_data;

		} 

		return false;

	}



	public function getAdminsForView(){

		

		$admins = array();



		$sql = "SELECT * FROM accounts WHERE user_type='Admin'";

		$query = $this->db->query($sql);

		if($query){

			$totalRows = $query->num_rows();	

			foreach ($query->result_array() as $row) {

				$admins[] = $row;

			}



			$admins_data = array(

				"totalRows"	=> (int)$totalRows,

				"admins"	=> $admins

			);

			return $admins_data;

		} 

		return false;

	}



	public function getCoLForView(){



		$query = $this->db->query('SELECT * FROM circle_of_life WHERE active = 1');

		if($query->num_rows() > 0){

			return $query;

		}

		return false;





	}





	public function getCoLQuestionForView(){
		$col_questions = array();
		$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfQuestions FROM circle_of_life_questions")->result_array();
		$totalRows = $totalRows[0]['NumberOfQuestions'];
		$query = $this->db->query('SELECT * FROM circle_of_life_questions WHERE active = 1');
		foreach ($query->result_array() as $row) {
			$auxSql = "SELECT description FROM circle_of_life WHERE id='".$row["circle_id"]."'";
			$auxQuery = $this->db->query($auxSql);
			$CoL = $auxQuery->result_array();
			$row["col_name"] = $CoL[0]["description"] ;		
			$col_questions[] = $row;	
		}	
		$col_questions_data = array(
			"NumberOfQuestions"	=> (int)$totalRows,
			"col"				=> $col_questions
		);
		return $col_questions_data;
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





	public function insertLeadsFromXML($leads){

		if(isset($leads['upload_data'])){

		    $xml=simplexml_load_file("./uploads/".$leads['upload_data']['file_name']);

		    $search = $xml->Folder->name;



		    foreach ($xml->Folder->Placemark as $dealer) {

		    	$fullAddress  = explode(",", $dealer->address);

		    	$address = $fullAddress[0];

		    	$city = $fullAddress[1];

		    	

		    	$state_zip = explode(" ", ltrim($fullAddress[2]));

		    	$state = $state_zip[0];

		    	$zip = $state_zip[1];



		    	$point = explode(",", $dealer->Point->coordinates);

		   		$point = $point[0].",".$point[1];

		    	

		    	$data = array(

		    		'search'		=> $search,

		    		'salesRep_id'	=> $leads['salesRep'],

		    		'name'			=> $dealer->name,

		    		'address'		=> $address,

		    		'city'			=> $city,

		    		'state'			=> $state,

		    		'zip'			=> $zip,

		    		'country'		=> "US",

		    		'phone'			=> $dealer->phoneNumber,

		    		'snippet'		=> $dealer->snippet,

		    		'description'	=> $dealer->description,

		    		'styleUrl'		=> $dealer->styleUrl,

		    		'extendedData'	=> $dealer->ExtendedData->Data->value,

		    		'point'			=> $point,

		    		'status'		=> "New"

		    	);

	    		$this->db->insert('leads', $data);

	    	}

  		}

	}

	

	public function getAllSalesReps(){

		$query = $this->db->query('SELECT * FROM accounts WHERE user_type="Sales"');

		if($query->num_rows() > 0){

			return $query;

		}

		return false;

	}





	public function getAllLeadsForViews(){

		

		$leads = array();

		

		$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads")->result_array();

		$totalRows = $totalRows[0]['NumberOfLeads'];

		$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads";

		$query = $this->db->query($sql);

		foreach ($query->result_array() as $row) {

			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

			$auxQuery = $this->db->query($auxSql);

			$salesRep = $auxQuery->result_array();

			$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

			$leads[] = $row;	

		}	

		

		$leads_data = array(

			"NumberOfLeads"	=> (int)$totalRows,

			"leads"			=> $leads

		);

		return $leads_data;

	}



	public function getLeadsForViews($type, $page = 1, $total = 10){

		$type = str_replace("%20", " ", $type);

		$start = $total * ($page-1);

		$end = $total;



		$leads = array();

		if($type == "all"){

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads")->result_array();

			$totalRows = $totalRows[0]['NumberOfLeads'];



			$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);

			foreach ($query->result_array() as $row) {

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				$leads[] = $row;	

			}	

		}else{

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads WHERE status = '".$type."'")->result_array();

			$totalRows = $totalRows[0]['NumberOfLeads'];



			$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads WHERE status = '".$type."' LIMIT ".$start.", ".$end."";



			$query = $this->db->query($sql);

			foreach ($query->result_array() as $row) {

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				$leads[] = $row;

			}

		}

		$leads_data = array(

			"NumberOfLeads"	=> (int)$totalRows,

			"leads"			=> $leads

		);

		return $leads_data;

	}



	public function getAllSalesLeadsForViews($salesrep_id){



		$leads = array();

		

		$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads WHERE salesRep_id = '".$salesrep_id."'")->result_array();

		$totalRows = $totalRows[0]['NumberOfLeads'];

		$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads WHERE salesRep_id = '".$salesrep_id."'";

		$query = $this->db->query($sql);

		foreach ($query->result_array() as $row) {

			$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

			$auxQuery = $this->db->query($auxSql);

			$salesRep = $auxQuery->result_array();

			$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

			$leads[] = $row;

		}

		

		$leads_data = array(

			"NumberOfLeads"	=> (int)$totalRows,

			"leads"			=> $leads

		);

		return $leads_data;

	}



	public function getSalesLeadsForViews($type, $page = 1, $total = 10, $salesrep_id){

		$type = str_replace("%20", " ", $type);

		$start = $total * ($page-1);

		$end = $total;



		$leads = array();



		if($type == "all"){

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads WHERE salesRep_id = '".$salesrep_id."'")->result_array();

			$totalRows = $totalRows[0]['NumberOfLeads'];



			$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads WHERE salesRep_id = '".$salesrep_id."' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);



			foreach ($query->result_array() as $row) {

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				$leads[] = $row;

			}

		}else{

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfLeads FROM leads WHERE salesRep_id = '".$salesrep_id."' AND status = '".$type."'")->result_array();

			$totalRows = $totalRows[0]['NumberOfLeads'];



			$sql = "SELECT id, search, salesRep_id, name, address, city, state, zip, phone, point, status FROM leads WHERE salesRep_id = '".$salesrep_id."' AND status = '".$type."' LIMIT ".$start.", ".$end."";



			$query = $this->db->query($sql);

			foreach ($query->result_array() as $row) {

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["salesRep_id"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"];		

				$leads[] = $row;

			}

		}

		$leads_data = array(

			"NumberOfLeads"	=> (int)$totalRows,

			"leads"			=> $leads

		);

		return $leads_data;

	}



	public function getLead($lead_id){

		$sql = "SELECT * FROM leads WHERE id = '".$lead_id."'";

		$query = $this->db->query($sql);

		

		$data = $query->result_array();

		return $data[0];

	}



	public function createAccount($lead, $accountData, $billingData, $shippingData){

		

		$this->db->trans_begin();

		if($query = $this->db->insert('accounts', $accountData)){

			if($query){

				$query = $this->db->query('SELECT id FROM accounts WHERE email="'.$accountData['email'].'"');

				if($query->num_rows() == 1){

					$row = $query->row();

					$billingData['account_id'] = $row->id;



					if($query = $this->db->insert('company_information', $billingData)){

						$shippingData['account_id'] = $row->id;

						if($query = $this->db->insert('shipping_information', $shippingData)){

							$this->db->delete('leads_log', array('leads_id' => $lead['lead_id']));

							$this->db->delete('leads', array('id' => $lead['lead_id']));

							$this->db->trans_commit();

							return $row->id;

						}

					}

				}

			}

		}

		$this->db->trans_rollback();

		return false;

	}



	public function insertAccount($accountData){

		$this->db->insert('accounts', $accountData);

		return $this->db->insert_id();

	}



	public function insertCompany($companyData){

		$this->db->insert('company_information', $companyData);

		return $this->db->insert_id();

	}



	public function insertShippingInfo($shipData){

		$this->db->insert('shipping_information', $shipData);

		return $this->db->insert_id();

	}



	public function insertCoL($accountData){

		$this->db->insert('circle_of_life', $accountData);

		return $this->db->insert_id();

	}





	public function getCustomerInfo($id){

		

		$query = $this->db->query('SELECT * FROM accounts WHERE id="'.$id.'" AND user_type="Reseller"');

		if($query->num_rows() == 1){

			return $query->row();

		}

		return false;

	}



	public function getCustomersForViews($type, $page = 1, $total = 10){

		$type = str_replace("%20", " ", $type);

		$start = $total * ($page-1);

		$end = $total;



		$customers = array();

		if($type == "all"){

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfCustomers FROM accounts")->result_array();

			$totalRows = $totalRows[0]['NumberOfCustomers'];



			$sql = "SELECT * FROM accounts WHERE user_type='Reseller' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);

			foreach ($query->result_array() as $row) {

				

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["sales_rep"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"];



				$auxSql = "SELECT * FROM company_information WHERE account_id='".$row['id']."'";

				$auxQuery = $this->db->query($auxSql);

				$companyName = $auxQuery->result_array();

				$row['companyName'] = $companyName[0]['name'];

				$row['companyAddress'] = $companyName[0]['address'].", ".$companyName[0]['city'].", ".$companyName[0]['state']." ".$companyName[0]['zip'];

				$row['companyPhone'] = $companyName[0]['phone'];



				$customers[] = $row;

			}	

		}

		$customers_data = array(

			"NumberOfCustomers"	=> (int)$totalRows,

			"customers"			=> $customers

		);

		return $customers_data;

	}



	public function getAllCustomersForViews(){

		

		$customers = array();

		

		$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfCustomers FROM accounts WHERE user_type='Reseller'")->result_array();

		$totalRows = $totalRows[0]['NumberOfCustomers'];

		$sql = "SELECT account_id, name, address, address2, city, state, zip, country, phone, website, point FROM company_information";

		$query = $this->db->query($sql);

		foreach ($query->result_array() as $row) {

			$auxSql = "SELECT f_name, l_name, sales_rep, email, user_type FROM accounts WHERE id='".$row["account_id"]."' AND user_type='Reseller'";

			$auxQuery = $this->db->query($auxSql);

			if($auxQuery->num_rows() == 1){

				$acc = $auxQuery->result_array();

				$salesRepId = $acc[0]['sales_rep'];

				$row['customerName'] =$acc[0]["f_name"]." ".$acc[0]["l_name"];

				$row['email'] = $acc[0]["email"];

				$row['type'] = $acc[0]["user_type"];

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$salesRepId."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				$customers[] = $row;	

			}

		}

		$customers_data = array(

			"NumberOfCustomers"	=> (int)$totalRows,

			"customers"			=> $customers

		);

		return $customers_data;

	}

		

	public function getAllSalesCustomersForViews($salesrep_id){

		$customers = array();

		

		$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfCustomers FROM accounts WHERE user_type='Reseller' AND sales_rep='".$salesrep_id."'")->result_array();

		$totalRows = $totalRows[0]['NumberOfCustomers'];

		$sql = "SELECT account_id, name, address, address2, city, state, zip, country, phone, website, point FROM company_information";

		$query = $this->db->query($sql);

		foreach ($query->result_array() as $row) {

			$auxSql = "SELECT f_name, l_name, sales_rep, email, user_type FROM accounts WHERE id='".$row["account_id"]."' AND user_type='Reseller' AND sales_rep='".$salesrep_id."'";

			$auxQuery = $this->db->query($auxSql);

			if($auxQuery->num_rows() == 1){

				$acc = $auxQuery->result_array();

				$salesRepId = $acc[0]['sales_rep'];

				$row['customerName'] =$acc[0]["f_name"]." ".$acc[0]["l_name"];

				$row['email'] = $acc[0]["email"];

				$row['type'] = $acc[0]["user_type"];

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$salesRepId."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				

				$customers[] = $row;	

			}

		}

		

		$customers_data = array(

			"NumberOfCustomers"	=> (int)$totalRows,

			"customers"			=> $customers

		);

		return $customers_data;

	}



	public function getSalesCustomersForViews($type, $page = 1, $total = 10, $salesrep_id){

		$type = str_replace("%20", " ", $type);

		$start = $total * ($page-1);

		$end = $total;



		$customers = array();



		if($type == "all"){

			$totalRows = $this->db->query("SELECT COUNT(*) AS NumberOfCustomers FROM accounts WHERE sales_rep = '".$salesrep_id."'")->result_array();

			$totalRows = $totalRows[0]['NumberOfCustomers'];



			$sql = "SELECT * FROM accounts WHERE user_type='Reseller' AND sales_rep = '".$salesrep_id."' LIMIT ".$start.", ".$end."";

			$query = $this->db->query($sql);



			foreach ($query->result_array() as $row) {

				$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row["sales_rep"]."'";

				$auxQuery = $this->db->query($auxSql);

				$salesRep = $auxQuery->result_array();

				$row["salesRepName"] = $salesRep[0]["f_name"]." ".$salesRep[0]["l_name"] ;		

				

				$auxSql = "SELECT * FROM company_information WHERE account_id='".$row["id"]."'";

				$auxQuery = $this->db->query($auxSql);

				$company = $auxQuery->result_array();

				$row["companyName"] = $company[0]["name"];

				$row["companyAddress"] = $company[0]["address"].", ".$company[0]["city"].", ".$company[0]["state"]." ".$company[0]["zip"];



				$row["companyPhone"] = $company[0]["phone"];

				$customers[] = $row;

			}

		}

		$leads_data = array(

			"NumberOfCustomers"	=> (int)$totalRows,

			"customers"			=> $customers

		);

		return $leads_data;

	}



	public function getAccount($account_id){



		$data = array();

		$sql = "SELECT * FROM accounts WHERE id='".$account_id."'";

		$query = $this->db->query($sql);

		if($query->num_rows() == 1){

			return $query->result_array();

		}

		return false;

	}



	public function getAccountInformationForView($account_id){



		$customer = array();

		$sql = "SELECT * FROM accounts WHERE id='".$account_id."'";

		$query = $this->db->query($sql);

		$row = $query->result_array();

		$customer = $row[0];

		$auxSql = "SELECT f_name, l_name FROM accounts WHERE id='".$row[0]["sales_rep"]."'";

		$auxQuery = $this->db->query($auxSql);



        $salesRep = $auxQuery->result_array();

        if($auxQuery->num_rows()==1){

            $salesRep = $salesRep[0];

		    $customer["salesRepName"] = $salesRep["f_name"]." ".$salesRep["l_name"] ;

        }else{

            $customer["salesRepName"] = $customer["f_name"]." ".$customer["l_name"];

        }

		$auxSql = "SELECT * FROM company_information WHERE account_id='".$row[0]["id"]."'";

		$auxQuery = $this->db->query($auxSql);

		$company = $auxQuery->result_array();

        $customer["id"] = $account_id;

		$customer["companyName"] = $company[0]["name"];

		$customer["companyAddress"] = $company[0]["address"];

		$customer["companyAddress2"] = $company[0]["address2"];

		$customer["companyCity"] = $company[0]["city"];

		$customer["companyState"] = $company[0]["state"];

		$customer["companyZip"] = $company[0]["zip"];

		$customer["companyCountry"] = $company[0]["country"];

		$customer["companyPhone"] = $company[0]["phone"];

		$customer["companyWebsite"] = $company[0]["website"];

		$customer["companyRFC"] = $company[0]["rfc"];

		$customer["companyTaxID"] = $company[0]["taxid"];

		$customer["point"]	= $company[0]["point"];



		$auxSql = "SELECT * FROM shipping_information WHERE account_id='".$row[0]["id"]."'";

		$auxQuery = $this->db->query($auxSql);

		$ship = $auxQuery->result_array();

		$customer["shipAddress"] = $ship[0]["address"];

		$customer["shipAddress2"] = $ship[0]["address2"];

		$customer["shipCity"] = $ship[0]["city"];

		$customer["shipState"] = $ship[0]["state"];

		$customer["shipZip"] = $ship[0]["zip"];

		$customer["shipCountry"] = $ship[0]["country"];

		$customer["shipPhone"] = $ship[0]["phone"];



		return $customer;

	}



	public function getEmailFromId($id){



		$sql = "SELECT email FROM accounts WHERE id='".$id."'";

		$query = $this->db->query($sql);

		if($query->num_rows() == 1 ){

			return $query->result()[0]->email;

		}

		return false;

	}



	public function getLeadLog($lead_id){

		$data = array();

		$sql = "SELECT * FROM leads_log WHERE leads_id='".$lead_id."'";

		$query = $this->db->query($sql);

		if($query->num_rows() > 0){

			return $query->result_array();

		}

		return false;

	}

}

?>