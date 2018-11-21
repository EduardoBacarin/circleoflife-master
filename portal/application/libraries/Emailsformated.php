<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class EmailsFormated{



	public function sendNewAccountRegistrationEmailCode($controller, $to, $from, $url, $key){

		

		$controller->load->library('email_messages');

		$controller->load->library('email', array('mailtype'=>'html'));

		$controller->email->from($from, 'Circle of Life Account Registration');

		$controller->email->to($to);

		$controller->email->subject('Circle of Life New Account Confirmation');

		

		$message = $controller->email_messages->getNewAccountRegistrationEmailCode($to,$url,$key);

		$controller->email->message($message);

		

		if($controller->email->send()){

			return true;

		}else{

			return false;

		}

	}



	public function sendPasswordRecoverEmail($controller, $to, $from, $password){

		

		$controller->load->library('email_messages');

		$controller->load->library('email', array('mailtype'=>'html'));

		$controller->load->library('email_messages');

		$controller->email->from($from, 'Oigo Telematics Account Recover');

		$controller->email->to($to);

		$controller->email->subject('Password Recover at OigoTelematics');

		

		$message = $controller->email_messages->getPasswordRecoverMessage($password);

		$controller->email->message($message);

		

		if($controller->email->send()){

			return true;

		}else{

			return false;

		}

	}

	

	public function sendPendingOrderContractEmail($controller, $to, $from, $url, $orderId){

		

		$controller->load->library('email_messages');

		$controller->load->library('email', array('mailtype'=>'html'));

		$controller->email->from($from, 'Oigo Telematics Orders');

		$controller->email->to($to);

		$controller->email->subject('New Order Pending your Approval');

		

		$message = $controller->email_messages->getOrderPendingCustomerContract($url, $orderId);

		$controller->email->message($message);

		

		if($controller->email->send()){

			return true;

		}else{

			return false;

		}

	}



	public function sendPendingOrderApprovalEmail($controller, $to, $from, $url, $orderId){

		$controller->load->library('email_messages');

		$controller->load->library('email', array('mailtype'=>'html'));

		$controller->email->from($from, 'Oigo Telematics Orders');

		$controller->email->to($to);

		$controller->email->subject('New Order Pending your Approval');

		

		$message = $controller->email_messages->getOrderPendingSalesApproval($url, $orderId);

		$controller->email->message($message);

		

		if($controller->email->send()){

			return true;

		}else{

			return false;

		}

	}



	public function sendOrderPostedEmail($controller, $to, $from, $url, $orderId){

		$controller->load->library('email_messages');

		$controller->load->library('email', array('mailtype'=>'html'));

		$controller->email->from($from, 'StarGPS Orders');

		$controller->email->to($to);

		$controller->email->subject('New Order Posted');

		

		$message = $controller->email_messages->getOrderPosted($url, $orderId);

		$controller->email->message($message);

		

		if($controller->email->send()){

			return true;

		}else{

			return false;

		}

	}



	public function sendOrderEnteredEmail($controller, $to, $from, $url, $orderId){

		return true;

	}



	public function tsendTestEmail(){

		return true;

	}

}