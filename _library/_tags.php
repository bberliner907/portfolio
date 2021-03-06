
<?php

function print_tags($type) {
  $data = array();

  $result = query("SELECT " . $type . " FROM portfolio WHERE status!='offline' ORDER BY id");

  while ($row = query_next($result)) {
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
    $modifier = ($type == "skills") ? 1.5 : 2.25;
    
    $style = "font-size: " . ($size + ($count * $modifier)) . "pt;";
    
    print_tag($tag, "tag", $style);
  }
}

?>
