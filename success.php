<?php include('header.php');

if(!(isset($_GET['id']))) {
	$grab_drop = mysql_query('
	    SELECT *
	    FROM drops ORDER BY id DESC LIMIT 1
	');

	while($drop_fetch = mysql_fetch_assoc($grab_drop)) {
	    $id = stripslashes($drop_fetch['id']);

?>
<p class="success">You've successfully dropped drop #<?php echo '<a href="/'.$id.'">'.$id.'</a>'; ?></p>
<?php }

mysql_free_result($grab_drop);

} else {
	$id = $_GET['id'];
	if(!(isset($_GET['pkey']))) {
	?>
<p class="success">You've successfully edited drop #<?php echo '<a href="/'.$id.'">'.$id.'</a>'; ?></p>
<?php
} else { ?>
<p class="success">You've successfully edited drop #<?php echo '<a href="/'.$id.'?pkey='.$_GET['pkey'].'">'.$id.'</a>'; ?></p>	
<?php	
}}
?>
<script type="text/javascript" src="http://include.reinvigorate.net/re_.js"></script>
<script type="text/javascript">
re_("nf0vp-j5o2a5n630");
</script>
</body>
</html>