<?php
$DATABASE['host'] = "--dbserveraddress--";
$DATABASE['type'] = "mysql"; // If you are not using MySQL, you will have problems. Please wait until we develop for more.
$DATABASE['username'] = "--dbusername--";
$DATABASE['password'] = "--dbpassword--";
$DATABASE['name'] = "--dbname--";

$DROP_CONF['highlight'] = "!!";
$DROP_CONF['highlight_len'] = strlen($DROP_CONF['highlight']); // DO NOT EDIT THIS LINE OR I MAY KILL YOU!

define("DROP_CONF_siteURL", "http://".$_SERVER['SERVER_NAME']); // This will return your site URL, either let PHP do it or set your own.

$DROP_CONF['default'] = 'No';
$DROP_CONF['aval_lang'] = array(
		'text'=>'No',
		'asp'=>'ASP',
		'applescript'=>'AppleScript',
		'html'=>'HTML',
		'bash'=>'Bash',
		'c'=>'C',
		'cpp'=>'C++',
		'css'=>'CSS',
		'diff'=>'Diff',
		'java'=>'Java',
		'javascript'=>'JavaScript',
		'lisp'=>'LISP',
		'lua'=>'Lua',
		'mysql'=>'MySQL',
		'objc'=>'Objective C',
		'perl'=>'Perl',
		'php'=>'PHP',
		'python'=>'Python',
		'ruby'=>'Ruby',
		'sql'=>'SQL',
		'xml'=>'XML'
);
?>