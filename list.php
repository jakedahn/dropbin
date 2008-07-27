<?php require 'header.php';
if(!isset($_GET['offset']) || $_GET['offset'] == 0) $offset = 0;
else $offset = mysql_real_escape_string($_GET['offset']);
$end_off = 11;
$ids_sql = 'SELECT `id` FROM `drops` WHERE `private` = 0 ORDER BY `date` DESC LIMIT '.$offset.', '.$end_off;
$grab_ids = mysql_query($ids_sql);
$test_num_drops = mysql_num_rows($grab_ids);
if($test_num_drops >= 11) {
	$end_off = 10;
	$ids_sql = 'SELECT `id` FROM `drops` WHERE `private` = 0 ORDER BY `date` DESC LIMIT '.$offset.', '.$end_off;
}
?>


	<div class="pages toppage">
	<?php if($offset != 0) {
	?>
	<a href="<?php echo $DROP_CONF_siteURL;
	echo "/recent";
	$noffset = $offset - 10;
	if($noffset > 0) {
		echo "/".$noffset;
	}?>">&#171; See Newer Drops</a>
	<?php }
	if($offset != 0 && $test_num_drops == 11) {
		?>&nbsp;|&nbsp;<?php
	}
	if($test_num_drops == 11) {
	?>
	<a href="<?php echo $DROP_CONF_siteURL;
	echo "/recent/";
	$poffset = $offset + 10;
	echo $poffset;?>">See Older Drops &#187;</a>
	<?php } ?>
	</div>
	<?php 

	$grab_ids = mysql_query($ids_sql);
	$num_drops = mysql_num_rows($grab_ids);
	$i = 1;
	while ($row = mysql_fetch_assoc($grab_ids)) {
			$drops[$i] = $row['id'];
			$i++;
	}
	for($j = 1; $j <= $num_drops; $j++){
		$grab_drop = mysql_query('
		    SELECT *
		    FROM drops 
		    WHERE id="' . $drops[$j] . '"
		    ');
		while($drop = mysql_fetch_assoc($grab_drop)) {
				?><div class="drop"><h3><a href="<?php echo $DROP_CONF_siteURL;
				echo "/";
				echo $drops[$j];?>"><?php echo $drop['summary'];?></a></h3><?php
				include 'highlighting.php';?>
				</div><?php
		}
	}?>
	<div class="pages">
	<?php if($offset != 0) {
	?>
	<a href="<?php echo $DROP_CONF_siteURL;
	echo "/recent";
	$noffset = $offset - 10;
	if($noffset > 0) {
		echo "/".$noffset;
	}?>">&#171; See Newer Drops</a>
	<?php }
	if($offset != 0 && $test_num_drops == 11) {
		?>&nbsp;|&nbsp;<?php
	}
	if($test_num_drops == 11) {
	?>
	<a href="<?php echo $DROP_CONF_siteURL;
	echo "/recent/";
	$poffset = $offset + 10;
	echo $poffset;?>">See Older Drops &#187;</a>
	<?php } ?>
	</div>
<?php require 'footer.php';?>