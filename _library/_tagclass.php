
<?php

function tag_class($tag) {
  $tagClass = str_replace(' ', '_', str_replace('-', '_', $tag));
  
  return strtolower($tagClass);
}

?>
