
<?php

function query($sql) {
  global $mysql_link;
	
  return mysql_query($sql, $mysql_link);
}



function query_next($result) {
  return mysql_fetch_object($result);
}



function query_rows($result) {
  return mysql_num_rows($result);
}

?>
