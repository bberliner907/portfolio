
<?php include("_global.php"); ?>

<?php include("_shell/_header.php"); ?>

<div id="menu">

<?php

  foreach ($pages as $page => $data) {
    $style = (page_active($page) && page_clean() != "results") ? "display: block;" : "";
  
?>

    <div class="page <?php echo $data->type; ?>" 
      id="<?php echo $page; ?>"
      style="<?php echo $style; ?>">

<?php

      $load = "print_" . $data->type;
      $load($page);

      if ($data->type != "blurbs") view_all();

?>

    </div>

<?php

  }

?>

</div>

<div id="results">
  <?php print_entries(); ?>
</div>

<?php include("_shell/_footer.php"); ?>
