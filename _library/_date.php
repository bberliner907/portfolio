
<?php

function date_text($format, $date = null) {

	$obj = date_create($date);
	return date_format($obj, $format);
	
}

?>
