<?php
require_once 'connection.php';
if(!empty($_POST['title']) && !empty($_POST['text'])  && !empty($_POST['language']) ) {
	
	$title = mysql_real_escape_string($_POST['title']);
	$text = mysql_real_escape_string($_POST['text']);
	$language = mysql_real_escape_string($_POST['language']);
	//$post_as = $_POST['psot'];
	$type = $_POST['type'];
	if(isset($_POST['editable'])) $editable = 1;
	else $editable = 0;
	if(isset($_POST['private'])) $private = 1;
	else $private = 0;
	if (getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else $ip = getenv("REMOTE_ADDR");
	
	if(isset($_POST['drop_id'])) {
	$id = mysql_real_escape_string($_POST['drop_id']);
	$drop_result = mysql_query('UPDATE `drops` SET `summary` = \''. $title .'\', `date` = NOW(), `text` = \''. $text .'\', `ip` = \''. $ip .'\', `lang` = \''. $language .'\' WHERE `id` = '. $id .' LIMIT 1;');
		
	if(!(isset($_POST['drop_passkey']))) {
			die(header("Location: /".$id));
		} else {
			die(header("Location: /".$id."?pkey=".$_POST['drop_passkey']));
		}
	}
	
   // This grabs the ip, and sets variable to $ip
	
   function generatePasskey ()
	{
	  	$length = 24;
		$password = "";
		$possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
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
	$passkey = generatePasskey();
	if($private == 1) $passkey = "'" . $passkey . "'";
	else $passkey = "NULL";
	
   	// This opens up db to submit to
	$result = mysql_query("INSERT INTO drops (
		summary ,
		date ,
		text ,
		ip ,
		lang ,
		editable ,
		private ,
		passkey
		)
		VALUES (
		'$title',  NOW(),  '$text',  '$ip',  '$language',  '$editable',  '$private', $passkey	)") or $error_a = mysql_error();
		$id =  mysql_insert_id();
		$passkey = substr($passkey, 0, -1);
		$passkey = substr($passkey, 1);
?>
<div id="success">
	<p>Your text was successfully dropped. View it here: <a href="/<?php echo $id;?><?php if(isset($_POST['private'])) {?>?pkey=<?php echo $passkey; }?>">#<?php echo $id;?></a></p>
</div>
<?php 	
} else {

?>
	<div class="error" id="error">
		<p>There was an error in dropping your text. Please see the highlighted boxes below.</p>
		<p id="error_what" style="display:none;">
<?php	
	if(empty($_POST['title'])) echo "title+";
	if(empty($_POST['text'])) echo "text+";
	if(empty($_POST['language'])) echo "highlight+";
?>
	</p></div>
<?php
}
?>

