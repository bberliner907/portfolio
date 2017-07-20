
<?php

function print_blurbs($page) {
  global $mysql_link, $site;
  
  $sql = "SELECT * FROM blurbs WHERE site='" . $site . "' AND page='" . $page . "' AND status='live' ORDER BY id";
  $result = mysql_query($sql, $mysql_link);
  
  while ($row = mysql_fetch_object($result)) {
  
?>

    <h3><?php echo $row->title; ?></h3>
    <p><?php echo $row->body; ?></p>

<?php
  
  }
}

?>
