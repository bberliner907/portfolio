
<?php

function print_tags($type) {
  global $mysql_link;

  $data = array();

  $sql = "SELECT " . $type . " FROM portfolio ORDER BY id";
  $result = mysql_query($sql, $mysql_link);

  while ($row = mysql_fetch_object($result)) {
    $line = explode(", ", $row->$type);

    foreach ($line as $tag) {
      trim($tag);
      if ($tag != "") {
        if (!$data[$tag]) $data[$tag] = 1;
        else $data[$tag]++;
      }
    }
  }

  $sorted = array_keys($data);
  natcasesort($sorted);

  foreach ($sorted as $tag) {
    $count = $data[$tag];
    
    $size = ($type == "skills") ? 6.25 : 10.5;
    $modifier = ($type == "skills") ? 1.75 : 2.25;
    
    $style = "font-size: " . ($size + ($count * $modifier)) . "pt;";
    
    print_tag($tag, "tag", $style);
  }
}

?>
