<?php

// figure out the if ":" or ";" should be used for ini separators
if (strpos(strtoupper(PHP_OS), "WIN") !== false) {
    define("INI_PATH_SEPARATOR", ";");
} else {
    define("INI_PATH_SEPARATOR", ":");
}


// add PEAR to the path
ini_set(
        "include_path", 
        ini_get("include_path") . INI_PATH_SEPARATOR . 
        realpath("PEAR")
       );
       

// stripslashes as shown on http://php.net/get_magic_quotes_gpc
if (get_magic_quotes_gpc()) {
   function stripslashes_deep($value)
   {
       $value = is_array($value) ?
                   array_map('stripslashes_deep', $value) :
                   stripslashes($value);

       return $value;
   }

   $_POST = array_map('stripslashes_deep', $_POST);
   $_GET = array_map('stripslashes_deep', $_GET);
   $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}


?>