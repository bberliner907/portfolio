
<?php

function print_tag($tag, $span = null, $style = null, $suffix = null) {
  $tagClass = tag_class($tag);

  if ($span || $style) echo '<span class="' . $span . '" style="' . $style . '">';
  
  echo '<a href="#" ';
  echo 'onclick="display([\'.' . $tagClass .'\']); return false;">';
  echo $tag . '</a>';
  
  if ($span || $style) echo '</span>';
  if ($suffix) echo $suffix;
  echo "\n";
}

?>
