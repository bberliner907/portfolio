
<div id="nav">

<?php

  $p = 0;
  foreach ($pages as $page => $data) {
    $p++;

?>

    <span id="<?php echo $page; ?>Link" class="page-link <?php if ($p == 1) echo "selected"; ?>">
      <strong><a href="#" onclick="toggle('<?php echo $page; ?>'); return false;">
        <?php echo strtoupper($page); ?></a>
      </strong>
    </span>

<?php

  }

?>
  
  <!-- <a href="#" onclick="window.print(); return false;" title="Print" id="print"><img src="print.png"></a> -->
</div>
