
<?php

function print_thumbs($page) {
  global $defaults, $cat;
  
  foreach ($cat as $section => $text) {

?>

    <div class="column">
  
      <h3>
        <a href="#" 
          onclick="display(['.<?php echo $section; ?>', '.category-<?php echo $section; ?>']); return false;" 
          style="text-decoration: none;"><?php echo $text; ?></a>
      </h3>

<?php

      $data = array();
      $index = 0;

      $result = query("SELECT * FROM portfolio WHERE section='" . $section . "' AND status='live' ORDER BY end DESC, start, id");

      while ($row = query_next($result)) {
        if (!$row->width) $row->width = $defaults["width"];
        if (!$row->height) $row->height = $defaults["height"];

        $data[$index] = $row;
        $index++;
      }

      for ($x = 0; $x < count($data); $x++) {
        $name = $data[$x]->name;
        $image = "images/small/" . $name . $defaults["type"];

?>

        <a href="#" 
          onclick="display(['#<?php echo $name; ?>', '.category-<?php echo $section; ?>']); return false;"
          title="<?php echo $data[$x]->title; ?>">
          <img name="<?php echo $name; ?>" 
            src="<?php echo $image; ?>" 
            border="0" 
            width="<?php echo round($data[$x]->width*0.225); ?>" 
            height="<?php echo round($data[$x]->height*0.225); ?>">
        </a>

<?php

      }

?>

    </div>

<?php

  }
}

?>
