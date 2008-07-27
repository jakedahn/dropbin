<?php
if (isset($_POST['submit'])) 
{ // if form has been submitted



			
			
} else  {	// if form hasn't been submitted

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
<title>Upload A File</title>
<style type="text/css">
body { font-family: tahoma, verdana, arial; font-size: 0.7em; color: black; padding-top: 8px; cursor: default; background-color: #fff; }
#lis { border: 3px solid #fff; width: 500px; }
#lis td.center { text-align: center; }
#lis td { border-bottom: 1px solid #f0f0f0; }
#lis img { margin-bottom: -2px; }
#lis table { color: #606060; width: 100%; margin-top:3px; }
#lis span.link { color: #0066DF; cursor: pointer; }
#lis .rounded { padding: 10px 7px 10px 10px; -moz-border-radius:6px; }
#lis .gray { background-color:#fafafa;border-bottom: 1px solid #e5e5e5; }
#lis p { padding: 0px; margin: 0px;line-height:1.4em;}
#lis p.left { float:left;width:100%;padding:3px;color:#606060;}
#lis strong { font-family: "Trebuchet MS", tahoma, arial; font-size: 1.2em; font-weight: bold; color: #202020; padding-bottom: 3px; margin: 0px; }
#lis a:link    { color: #0066CC; }
#lis a:visited { color: #003366; }
#lis a:hover   { text-decoration: none; }
#lis a:active  { color: #9DCC00; }
</style>
</head>
<body>
<div id="lis">
<div class="rounded gray" style="padding:5px 10px 5px 7px;color:#202020"><strong>Upload File</strong></div>
<br />
<form enctype="multipart/form-data" action="actualupload.php" method="post">
<div class="rounded gray" style="padding:5px 10px 5px 7px;color:#202020">Username: <input type="file" name="dropfile" size="40"></div>
<br />
<input type="submit" name="submit" value="Upload">
</form>
</div>
</body>
</html>
<?php
die();
}
?>
