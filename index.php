
<?php

	include('mail/Mandrill.php');

	$mails[] = array('email' => "recepdur@outlook.com", 'name' =>"Recep Dur	- Dev", 'type' => 'to');				
	$from = "reeceep@gmail.com";
	$fromName = "From Name";
	$body = "Mail Body";
	$subject = "Mail subject";	
	
	foreach($mails as $key => $val)
	{				
		try {
			$mandrill = new Mandrill('API_KEY');
			$message = array(
				'html' => "$body",
				'subject' => "$subject",
				'from_email' => "$from",
				'from_name' => "$fromName",
				'to' => array($val) 
			);
			$async = true;
			$result = $mandrill->messages->send($message, $async);
			 
		} catch(Mandrill_Error $e) 
		{			
			echo 'Error: ' . get_class($e) . ' - ' . $e->getMessage();
			throw $e;					
		}
	}

?>