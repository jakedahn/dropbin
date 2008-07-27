<?php require 'header.php';?>

<div id="status">
</div>
<div class="drop">
	<script type="text/javascript" charset="utf-8">
		window.addEvent('domready', function(){
			$('dropform').addEvent('submit', function(e) {
				new Event(e).stop();
				var status = $('status').empty();
				var form_title = $('form_title');
				var form_highlighting = $('form_highlighting');
				var form_editable = $('form_editable');
				var form_private = $('form_private');
				var form_submit = $('form_submit');
				var form_text = $('form_text');
				function errorFlash(obj)
				{
				    
					var fx = obj.effects({duration: 200, transition: Fx.Transitions.Quad.easeInOut});
					fx.start({
							'background-color': '#e6e6db'
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae'
							});
						}).chain(function(){
							this.start.delay(200, this, {
								'background-color': '#e6e6db'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#e6e6db'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae'
							});
						});
				}
				function errorFlashGlobal()
				{
					var fx = $('error').effects({duration: 200, transition: Fx.Transitions.Quad.easeInOut});
					fx.start({
							'background-color': '#ffffff',
							'border-bottom-color': '#ffffff'
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae',
								'border-bottom-color': '#e94545'
							});
						}).chain(function(){
							this.start.delay(200, this, {
								'background-color': '#ffffff',
								'border-bottom-color': '#ffffff'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae',
								'border-bottom-color': '#e94545'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffffff',
								'border-bottom-color': '#ffffff'
							});
						}).chain(function() {
							this.start.delay(200, this, {
								'background-color': '#ffaeae',
								'border-bottom-color': '#e94545'
							});
						});
				}
				function successFlash()
				{
					var fx = $('success').effects({duration: 150, transition: Fx.Transitions.Quad.easeInOut});
					fx.start({
							'background-color': '#ffffff',
							'border-bottom-color': '#ffffff'
						}).chain(function() {
							this.start({
								'background-color': '#a7d8a0',
								'border-bottom-color': '#448a3a'
							});
						});
					$('form_textarea').value = '';
					$('form_titleinput').value = '';
					$('form_editcheck').checked = false;
					$('form_privatecheck').checked = false;
					$each($('form_lang').options, function(option){
						if (option.selected) option.selected = false;
						if (option.id == "default_lang") option.selected = true;
					});
				}
				function removeError(obj){
					new Fx.Style(obj, 'background-color').set('#e6e6db');
				}
				this.send({
						update: status,
						
						onComplete: function() {
							if(document.getElementById('error_what')) {
								errorFlashGlobal();
								if ($('error_what').getText().contains('title')) errorFlash(form_title);
								else removeError(form_title);
								if ($('error_what').getText().contains('text'))	errorFlash(form_text);
								else removeError(form_text);
								if ($('error_what').getText().contains('highlight')) errorFlash(form_highlighting);
								else removeError(form_highlighting);
								if ($('error_what').getText().contains('edit'))	errorFlash(form_editable);
								else removeError(form_editable);
								if ($('error_what').getText().contains('private')) errorFlash(form_private);
								else removeError(form_private);
								if ($('error_what').getText().contains('submit')) errorFlash(form_submit);
								else removeError(form_submit);
							} else {
								removeError(form_title);
								removeError(form_text);
								removeError(form_highlighting);
								removeError(form_editable);
								removeError(form_private);
								removeError(form_submit);
								successFlash();
							}
						}
				});
			});
			/*$('type_file').addEvent('click', function() {
				$('form_change').setHTML("<p id=\"form_file\"><input type=\"file\" name=\"dropfile\" size=\"40\" id=\"form_filefield\"/></ p>")
			});*/
		});
	</script>
	<form action="drop.php" method="post" accept-charset="utf-8" id="dropform">
		<p id="form_highlighting">
			<select name="language" id="form_lang">
				<?php
		        foreach ($DROP_CONF['aval_lang'] AS $l) {
		            echo '<option';
		            echo ($l == @$_POST['language']) ? ' selected="selected"' : '';
					echo ($l == @$DROP_CONF['default']) ? ' id="default_lang">' : '>';
		            echo $l ,'</option>';
		        }
		        ?>
			</select>
			
			Highlighting
		</p>
		<p id="form_type_text" style="display: none;"><input type="radio" name="type" value="text" checked="checked" id="type_text"/> Text</p>
		<?php $for_later = '<p id="form_type_file"><input type="radio" name="type" value="file" id="type_file"/> File</p>'; ?>
		<br />
		<div id="form_change">
		<p id="form_text" style="padding: 0;">
			<textarea id="form_textarea" name="text" cols="87" rows="20"></textarea>
		</p>
		</div>
		<br />
		<p id="form_title">
			Title <input id="form_titleinput" type="text" name="title" />
		</p>
		<?php $for_later = '<!--<p>Post as:</p>
		<p id="form_as_user"><input type="radio" name="post_as" value="userid" /> Joe User</p>
		<p id="form_as_anon"><input type="radio" name="post_as" value="anon" checked="checked"/> Anonymous</p>-->'; ?>
		<br />
		<p id="form_submit"><input type="submit" value="Drop That!" /></p>
		<p id="form_editable">
			<input type="checkbox" id="form_editcheck" name="editable" value="yes" /> Editable
		</p>
		<p id="form_private">
			<input type="checkbox" id="form_privatecheck" name="private" value="yes" /> Private
		</p>
	</form>
</div>
<?php require 'footer.php';?>