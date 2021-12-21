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
	<title>Shortcodes: Plugs</title>
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
			
		var plug = document.getElementById('plug').value;
			
		if (plug == 'about' ) {
			
			tagtext = '[cardAbout]';
			
		}
		else {
		
			tagtext = '[cardNetworks]';
			
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

        <div class="title">Shortcodes: Plugins</div>
        
		<br/>
			
			<table border="0" cellpadding="4" cellspacing="0">
				
				<tr>
					<td class="label" nowrap="nowrap"><label for="plug">Insert Plugin</label></td>
					<td>
						<select name="plug" id="plug" style="width: 230px">
							<option value="about">About / Personal Details</option>
							<option value="networks">Networks / SocialMedia Buttons</option>
                        </select>
                    </td>
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
