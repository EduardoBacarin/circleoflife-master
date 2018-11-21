<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Email_Messages{



public function getOrderPosted($url, $order_num){

	return '

		<html>

		<head>

			<title>New Order Posted</title>

		</head>

		<body>

			<p><b>Action required:</b> This email is to confirm order # '.$order_num.'</p>

			Please Approve Order '.$order_num.'</p>

			<p>Click on the link to view and approve the order</p>

			

			<br><br>

			Best Regards,<br><br>

			<br>

			Circle of Life

		</body>

	</html>

	';

}



public function getOrderPendingAdminApproval($order_num){



return '

	<html>

		<head>

			<title>Stars GPS Order pending approval</title>

		</head>

		<body>

			<p><b>Action required:</b> This email is to confirm order # '.$order_num.'</p>

			Please Approve Order '.$order_num.'</p>

			<p>Click on the link to view and approve the order</p>

			<a href="http://www.oigoconnect.com/starsgps/portal/order/viewOrder/'.$order_num.'">Click Here to Approver Order</a>

			<br><br>

			Best Regards,<br><br>

			<br>

			

		</body>

	</html>

';

}



public function getOrderPendingSalesApproval($url, $order_num){



return '

	<html>

		<head>

			<title>Stars GPS Order pending approval</title>

		</head>

		<body>

			<p>This email is to confirm order # '.$order_num.' was posted in your account.</p>

			<p>The order is still pending for approval from your sales representative</p>

            Please click <a href="'.$url.'">Order #: '.$order_num.'</a> to see details.

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



public function getOrderPendingCustomerContract($url, $orderId){

return '

	<html>

		<head>

			<title>Stars GPS Order pending contract</title>

		</head>

		<body>

			<p>Action required:

			The Order '.$orderId.' is waiting for your approval.

            <p>Click on the

			<a href="'.$url.'">Order #: '.$orderId.'</a>

            to view the order</p>

            <br>To Approve it you need to Login to your account and select the Order to accept MSA Terms.

            <br>

            <br>Please contact your Sales Rep for further assistence.

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



public function getSelectSalesRep($order_num){

return '

	<html>

		<head>

			<title>Stars GPS Request Sales Representative</title>

		</head>

		<body>

			<p>Action required:

			Assign Sales Representative</p>

			<p>All you need to do is select the sales representative for the following account and assign it from the account admin settings. </p>

			<table border="1">

				<tr>

					<td> Company </td>

					<td> Legal Officer </td>

					<td> Title </td>

					<td> Email </td>

					<td> Sales Representative </td>

				</tr>

			</table>

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



public function getOrderStatusChenged($order_num,$company_name,$order_status){

return '

	<html>

		<head>

			<title>Stars GPS Order Status or Change requested</title>

		</head>

		<body>

			<p>NO ACTION REQUIRED<br><br>

			The Order '.$order_num.' for Customer '.$company_name.'</p>

            <p>Status: '.$order_status.'</p>

			<p>Please Click

			<a href="http://www.oigotelematics.com/support/pages/accounts/vieworders.php?NoLogin&OrderId='.$order_num.'"> Order #: '.$order_num.'</a>

            to view details</p>

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



public function getNewAccountRegistrationEmailCode($email,$url,$key){

	

return '

	<html>

		<head>

			<title>Stars GPS Verify Email Address</title>

		</head>

		<body>

			<p>Action required:

			<br>Please verify your email address.</p>

			<p>All you need to do is click the button below (it only takes a few seconds) or enter the code "'.$key.'" on your account settings.

			<form name="sendEmailCode" id="sendEmailCode" method="POST" action="'.$url.'">

				<input type="hidden" name="email" id="email" value="'.$email.'">

				<input type="hidden" id="key" name="key" value="'.$key.'">

				<input type="submit" name="submit" id="submit" value="Submit Code">

			</form>

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



public function getPasswordRecoverMessage($password){

	

return '

	<html>

		<head>

			<title>Stars GPS Password Recover</title>

		</head>

		<body>

			<p>Action required:

			<br>Password Recover</p>

			<p>Your Password: '.$password.'

			

			<br><br>

			Best Regards,<br><br>

			<br>

			Stars GPS, LLC<br>

			17361 Armstrong Avenue<br>

			Irvine CA 92614<br>

			United States<br>

			Tel: +1(949) 988-3330<br>

			<a align="center" href="http://www.stars-gps.com"><img src="http://stars-gps.com/images/Stars_logo.jpg" class="img-responsive" alt="Responsive image"></a>

		</body>

	</html>

';

}



}

?>