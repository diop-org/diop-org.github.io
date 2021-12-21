<?php
	
	$curUrl = $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
	$zeeUrl = explode('/', $curUrl);
	$remove = count($zeeUrl)-9;
	$root = 'http://';
	for($i = 0; $i < $remove; $i++) {
		$root .= $zeeUrl[$i].'/';
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shortcodes: Skills</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
		var title = document.getElementById('title').value;
		var skill = document.getElementById('skill').value;
		var text = document.getElementById('text').value;
			
		if (title == '' ) {
			alert('Please specify a title of your skill.');
		}
		else {
		
			if(selectedContent == '') {
					
				tagtext = '[cardSkill title="'+title+'" skill="'+skill+'"] '+text+' [/cardSkill] ';
					
			} else {
					
				tagtext = '[cardSkill title="'+title+'" skill="'+skill+'"] '+selectedContent+' [/cardSkill] ';
					
			}
		}
	
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
    
	<style type="text/css">
	em { font-size: 11px; color: #555555; padding: 5px 0 0 50px; }
    label span { color: #f00; }
	td.label { width: 100px; }
	
    </style>
    
</head>
<body onload="init();">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="zeeShortcodes" action="#">

        <div class="title">Shortcodes: Skills</div>
        
		<br/>
			
			<table border="0" cellpadding="4" cellspacing="0">
				
				<tr>
					<td nowrap="nowrap"><label for="title">Skill Title:<span>*</span></label></td>
					<td><input type="text" name="title" id="title" style="width: 230px" /></td>
                </tr>
				
				<tr>
					<td class="label" nowrap="nowrap"><label for="skill">Skill Level:</label></td>
					<td>
						<select name="skill" id="skill" style="width: 230px">
							<option value="one">1 / 5</option>
							<option value="two">2 / 5</option>
							<option value="three">3 / 5</option>
							<option value="four">4 / 5</option>
							<option value="five">5 / 5</option>
                        </select>
                    </td>
				</tr>
				
				<tr>
					<td nowrap="nowrap"><label for="text">Description:</label></td>
					<td><textarea type="text" name="text" id="text" style="width: 230px" rows="5"></textarea></td>
				</tr>
              
            </table>

	<div class="mceActionPanel">
		<div style="float: left">
			<input name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" id="cancel" type="button" />
		</div>

		<div style="float: right">
			<input name="insert" value="Insert" onclick="insertShortcode();" id="insert" type="submit" />

		</div>
	</div>
</form>
</body>
</html>
<?php

?>
