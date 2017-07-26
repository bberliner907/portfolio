
<?php

function print_blurbs($page) {
  global $site;
  
  $result = query("SELECT * FROM blurbs WHERE site='" . $site . "' AND page='" . $page . "' AND status='live' ORDER BY id");
  
  while ($row = query_next($result)) {
  
?>

    <h3><?php echo $row->title; ?></h3>
    <p><?php echo $row->body; ?></p>

<?php
  
  }
}

?>
