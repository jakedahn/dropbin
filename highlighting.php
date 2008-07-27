<?php
include_once('geshi/geshi.php');
include_once('configure.php');

$highlight = array();

if ($DROP_CONF['highlight']) {
	$lines = explode("\n", $drop['text']);
	$drop['text'] = array();
	$ilines = 0;
	foreach ($lines as $idx => $line) {
		$ilines++;
		if (substr($line,0,$DROP_CONF['highlight_len']) == $DROP_CONF['highlight']) {
			$highlight[] = $idx+1;
			$line = substr($line,$DROP_CONF['highlight_len']);
		}
		$drop['text'] = array_merge($drop['text'], array($line));
		if(isset($drops[1])){
			if($ilines == 9) {
				$drop['text'] = array_merge($drop['text'], array("... This Drop is longer than 10 lines. Click the name above to see it all ..."));
				break;
			}
		}
	}
	$drop['text'] = implode("\n", $drop['text']);
}

//geshi object
	$geshi = new GeSHi(stripslashes($drop['text']), $drop['lang']);
	$geshi->highlight_lines_extra($highlight);
	$geshi->set_tab_width(4);
	$geshi->set_highlight_lines_extra_style('background:#FFFF88;');
	$geshi->enable_keyword_links(false);
//geshi line numbers
	$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
	$geshi->set_header_type(GESHI_HEADER_DIV);
//geshi styling for syntax box
	$geshi->set_overall_style('color: #000066; border: 1px solid #d0d0d0; background-color: #fdfdf6; line-height:1.3em;', true);
	
	$geshi->set_line_style('font: normal normal \'Courier New\', Courier, monospace; color: #003030;', 'font-weight: bold; color: #006060; padding-right: 5px;', true);
	$geshi->set_code_style('color: #000020;', 'color: #000020;');
	
	if($drop['editable'] == 1) {
		if(!(isset($_GET['passkey']))) {
			$editable = ' You may <a href="'.$DROP_CONF_siteURL.'/'.$drop['id'].'/edit">edit this</a> drop.';
		} else {
			$editable = ' You may <a href="'.substr($_SERVER['REQUEST_URI'], 0, -30).'/edit?pkey='.$_GET['passkey'].'">edit this</a> drop.';
		}
	} else if($drop['editable'] == 0) {
		$editable = '';
	} else {
		die("WOAH! WE HAVE AN ERROR IN THE HOUSE!!! CONTACT THE AUTHORITIES!");
	}
	
	$geshi->set_header_content('You are viewing Drop #'.$drop['id'].' and it is being highlighted with the '.$drop['lang'].' syntax.'.$editable);
	$geshi->set_header_content_style('font-family: Verdana, Arial, sans-serif; color: #414141; background-color: #d2d2c8; border-bottom: 1px solid #d0d0d0; padding: 2px;');

	if(!isset($drops[1])){
	$geshi->set_footer_content('Parsed in <TIME> seconds');
    }
	$geshi->set_footer_content_style('font-family: Verdana, Arial, sans-serif; color: #414141; background-color: #d2d2c8; border-top: 1px solid #d0d0d0; padding: 2px;');
	
	
//geshi results
echo $geshi->parse_code();

//echo $drop['text'];
?>