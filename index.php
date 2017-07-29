
<?php include("_global.php"); ?>

<?php include("_shell/_header.php"); ?>

<div id="menu">

<?php

  foreach ($pages as $page => $data) {
  
?>

    <div class="page <?php echo $data->type; ?>" id="<?php echo $page; ?>">

<?php

      $func = "print_" . $data->type;
      $func($page);

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
