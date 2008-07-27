<?php
require('connection.php');

if(!empty($_POST['summary']) && !empty($_POST['droptext'])  && !empty($_POST['language']) ) {
	$summary = mysql_real_escape_string($_POST['summary']);
	$drop = mysql_real_escape_string($_POST['droptext']);
	$language = mysql_real_escape_string($_POST['language']);
	if (getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else $ip = getenv("REMOTE_ADDR");
	
	if(isset($_POST['id'])) {
		$id = mysql_real_escape_string($_POST['id']);
		$drop_result = mysql_query('UPDATE `drops` SET `summary` = \''. $summary .'\', `date` = NOW(), `text` = \''. $drop .'\', `ip` = \''. $ip .'\', `lang` = \''. $language .'\' WHERE `id` = '. $id .' LIMIT 1;');
		
		if(!(isset($_POST['passkey']))) {
			die(header("Location: /success.php?id=".$id));
		} else {
			die(header("Location: /success.php?id=".$id."&pkey=".$_POST['passkey']));
		}
	}
	
   // This grabs the ip, and sets variable to $ip
	
   function generatePasskey ()
	{
	  	$length = 24;
		$password = "";
		$possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
	  	$i = 0; 
	  	while ($i < $length) { 
	    	$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
	    	if (!strstr($password, $char)) { 
	      		$password .= $char;
	      		$i++;
	    	}
	  	}
	  return $password;
	}
   	// This opens up db to submit to
	    $drop_result = mysql_query('
	       INSERT INTO drops (summary, date, text, ip, lang)
	       VALUES ("' . $summary . '",NOW(), "' . $drop . '", "' . $ip . '", "' . $language . '")
	    ');

	

} else { die("Uhh, you didn't fill out the forms correctly, go back!"); }

die(header("Location: /success.php"));

?>

