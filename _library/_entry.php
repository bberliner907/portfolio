
<?php

function print_entry_left($entry) {
  global $defaults;

  $name = $entry->name;
  $image = $name . "_1" . $defaults["type"];

?>

  <div class="img">

    <a name="<?php echo $name; ?>" 
      href="images/<?php echo $image; ?>" 
      onclick="expand('<?php echo $name; ?>'); return false;"
      target="_blank">
      <img name="<?php echo $name; ?>" 
        src="images/<?php echo $image; ?>" 
        border="0" 
        width="<?php echo $entry->width; ?>" 
        height="<?php echo $entry->height; ?>">
    </a>
    
<?php

    if (count($entry->images) > 1) {
    
?>

      <div style="margin-top: 10px;">
        <select name="newimg" onchange="swap('<?php echo $name; ?>', this.options[this.selectedIndex].value);">

<?php

          for ($y = 0; $y < count($entry->images); $y++) {
            $filename = $name . "_" . ($y + 1) . $defaults["type"];
            echo "<option value=\"" . $filename . "\"";
            if ($filename == $image) echo " SELECTED";
            echo ">" . ($y + 1) . ": " . trim($entry->images[$y], "\"") . "</option>\n";
          }

?>

        </select>
      </div>
      
<?php

    }
    
?>

  </div>
    
<?php

}

?>



<?php

function print_entry_right($entry) {
  $name = $entry->name;
  
  $tools = explode(", ", $entry->tools);
  $skills = explode(", ", $entry->skills);

?>

  <div class="title">
    <h4><?php echo $entry->title; ?></h4>
  </div>
  
  <div class="item">

    <table border="0" cellspacing="10" cellpadding="0" width="100%" class="data">
      <tr><td class="key">Owner:</td><td class="owner"><?php echo $entry->agency; ?></td></tr>
      <tr><td class="key">Date:</td><td class="date"><?php echo $entry->date; ?></td></tr>
      
<?php

      $print = function($arr) {
        $count = count($arr);
        
        foreach ($arr as $i => $t) {
          $tagClass = tag_class($t);
        
          $classes = 'filter filter-' . $tagClass;
          $suffix = ($i < $count - 1) ? ', ' : '';
        
          print_tag($t, $classes, null, $suffix);
        }
      };

      echo '<tr><td class="key">Tools:</td><td>';
      
      $print($tools);
      
      echo '</td></tr>';
      echo '<tr><td class="key">Skills:</td><td>';
      
      $count = count($skills);
      
      if ($count > 10) {
        echo '<div class="skills-table">';
        
        for ($s = 0; $s < $count; $s++) {
          if ($s == 0 || $s == ceil($count / 2)) {
            echo '<div style="float: left; width: 50%;">';
          }
          
          $tagClass = tag_class($skills[$s]);
          $classes = 'filter filter-' . $tagClass;
          
          print_tag($skills[$s], $classes, null, "<br>");
          
          if ($s == $count - 1 || $s == ceil($count / 2) - 1) {
            echo '</div>';
          }
        }
        
        echo '</div>';
      } else {
        $print($skills);
      }
      
      echo '</td></tr>';
      
?>

      <tr><td class="key">Link:</td><td><?php echo $entry->link; ?></td></tr>
    </table>

  </div>
  
  <div class="item">
    <div class="desc"><?php echo $entry->details; ?></div>
  </div>

<?php

}

?>



<?php

function print_entry($entry) {
  $name = $entry->name;
  
  $tools = explode(", ", $entry->tools);
  $skills = explode(", ", $entry->skills);
  
  $tagClasses = "";
  foreach ($tools as $t) {
    $tagClasses .= ' ' . tag_class($t);
  }
  foreach ($skills as $s) {
    $tagClasses .= ' ' . tag_class($s);
  }

?>

  <div class="entry <?php echo $entry->section . $tagClasses; ?>" 
    id="<?php echo $name; ?>" 
    style="<?php if (page_clean() != "results") { echo "display: none;"; } ?>">

    <div class="entry-left" style="float: left;">
      <?php print_entry_left($entry); ?>
    </div>
    
    <div class="entry-right" style="float: right;">
      <?php print_entry_right($entry); ?>
    </div>

  </div>

<?php

}

?>
