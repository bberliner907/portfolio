
<?php

function print_tag($tag, $span = null, $style = null, $suffix = null) {
  $tagClass = str_replace(' ', '_', $tag);

  if ($span || $style) echo '<span class="' . $span . '" style="' . $style . '">';
  
  echo '<a href="#" ';
  echo 'onclick="display([\'.' . $tagClass .'\', $(\'.' . $tagClass .'\').parent().children(\'.category\')]); return false;">';
  echo $tag . '</a>';
  
  if ($span || $style) echo '</span>';
  if ($suffix) echo $suffix;
  echo "\n";
}

?>
