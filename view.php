<?php require 'header.php';?>
<div class="drop">
	
	<?php $id = mysql_real_escape_string($_GET['id']);

	$grab_drop = mysql_query('
	    SELECT *
	    FROM drops 
	    WHERE id="' . $id . '"
	    ');
	if($_GET['edit'] != 'true') {
		while($drop = mysql_fetch_assoc($grab_drop)) {
			if($drop['private'] == 0 || $drop['private'] == 1 && $_GET['passkey'] == $drop['passkey']) {
				?><h3><?php echo $drop['summary'];?></h3><?php
				include 'highlighting.php';
			} else {
				die("This drop is private!");
			}
		}
	} else if($_GET['edit'] == 'true'){ 
		$drop = mysql_fetch_assoc($grab_drop);
		if($drop['editable'] == 1 && $drop['private'] == 0 || $drop['editable'] == 1 && $drop['private'] == 1 && $_GET['passkey'] == $drop['passkey']) { ?>
			<form action="/drop.php" method="post" accept-charset="utf-8" id="dropform">
				<p id="form_highlighting">
					<select name="language" id="form_lang">
						<?php
				        foreach ($DROP_CONF['aval_lang'] AS $l) {
				            echo '<option';
				            echo ($l == @$drop['lang']) ? ' selected="selected"' : '';
							echo ($l == @$DROP_CONF['default']) ? ' id="default_lang">' : '>';
				            echo $l ,'</option>';
				        }
				        ?>
					</select>

					Highlighting
				</p>
				<br />
				<p id="form_text" style="padding: 0;">
					<textarea id="form_textarea" name="text" cols="87" rows="20"><?php echo stripslashes($drop['text']); ?></textarea>
				</p>
				<br />
				<p id="form_title">
					Title <input id="form_titleinput" type="text" name="title" value="<?php echo stripslashes($drop['summary']); ?>"/>
				</p>
				<!--<p>Post as:</p>
				<p id="form_as_user"><input type="radio" name="post_as" value="userid" /> Joe User</p>
				<p id="form_as_anon"><input type="radio" name="post_as" value="anon" checked="checked"/> Anonymous</p>-->
				<br />
				<p id="form_submit"><input type="submit" value="Drop That!" /></p>
				<input type="hidden" value="<?php echo stripslashes($drop['id']); ?>" name="drop_id"/>
				<input type="hidden" value="text" name="type"/>
				<?php if(isset($_GET['passkey'])) {?><input type="hidden" value="<?php echo stripslashes($_GET['passkey']); ?>" name="drop_passkey"/>
				<?php }?>
			</form>	

		<?php }}	?>
</div>
<?php require 'footer.php';?>