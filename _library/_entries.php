
<?php

function print_entries() {
  global $defaults, $cat;
  
  foreach ($cat as $section => $text) {
    $data = array();
    $index = 0;

    $result = query("SELECT * FROM portfolio WHERE section='" . $section . "' AND status='live' ORDER BY end DESC, start, id");

    while ($row = query_next($result)) {
      if ($row->images) $row->images = explode(", ", $row->images);
      else $row->images = array($defaults["image"]);

      if (!$row->width) $row->width = $defaults["width"];
      if (!$row->height) $row->height = $defaults["height"];

      if ($row->link) $row->link = "<a href=\"" . $row->link . "\" target=\"_blank\">" . $row->link . "</a>";
      else $row->link = $defaults["link"];

      if ($row->start == $row->end) $row->date = $row->start;
      else $row->date = $row->start . " - " . $row->end;

      $data[$index] = $row;
      $index++;
    }

?>
  
    <div class="section" id="<?php echo $section; ?>">
  
      <div class="category category-<?php echo $section; ?>" 
        style="<?php if (page_clean() != "results") { echo "display: none;"; } ?>">
        <a name="<?php echo $section; ?>"></a>
        <h2><?php echo $text; ?></h2>
      </div>

<?php

      for ($x = 0; $x < count($data); $x++) {
        print_entry($data[$x]);
      }
  
?>

    </div>

<?php

  }
}

?>
