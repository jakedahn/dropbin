<?php
include 'configure.php';
if(!isset($connectYes)) {
	require 'connection.php';
}
include 'functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>DropBin</title>
		<link rel="stylesheet" href="/style.css" type="text/css" media="screen" title="default" charset="utf-8" />
		<script src="/mootools.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="site">
			<div id="nav">
				<ul>
					<li><a href="<?php echo getURL("site");?>">Home</a></li>
					<li><a href="<?php echo getURL("site");?>/recent">Recent</a></li>
					<li><a href="<?php echo getURL("site");?>/about">About</a></li>
				</ul>
			</div>
			<div id="account">
				<p>&nbsp;</p>
			</div>