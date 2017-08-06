
<div id="nav">

<?php

  foreach ($pages as $page => $data) {
    $pageClass = (page_active($page) && page_clean() != "results") ? "selected" : "";

?>

    <span id="<?php echo $page; ?>Link" class="page-link <?php echo $pageClass; ?>">
      <strong>
        <a href="?page=<?php echo $page; ?>" 
          onclick="toggle('<?php echo $page; ?>'); return false;">
          <?php echo strtoupper($page); ?>
        </a>
      </strong>
    </span>

<?php

  }

?>
  
</div>
