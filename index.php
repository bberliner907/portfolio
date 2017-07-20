
<?php include("_library.php"); ?>
<?php include("_header.php"); ?>

<div id="menu">

<?php

  foreach ($pages as $page => $data) {
  
?>

    <div class="page <?php echo $data->type; ?>" id="<?php echo $page; ?>">

<?php

      $func = "print_" . $data->type;
      $func($page);

      if ($data->type != "blurbs") echo $viewall;

?>

    </div>

<?php

  }

?>

</div>

<div id="results">
  <?php print_entries(); ?>
</div>

<?php include("_footer.php"); ?>
