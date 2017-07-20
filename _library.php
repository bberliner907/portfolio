
<?php include("../../_auth.php"); ?>

<?php include("_library/_ga.php"); ?>

<?php

auth("brennberliner");

$site = "portfolio";

$defaults = array();
$defaults["type"] = ".png";
$defaults["width"] = 500; // 1024
$defaults["height"] = 360; // 738
$defaults["link"] = "N/A";
$defaults["image"] = "Sample";

$pages = array();
$cat = array();

$sql = "SELECT * FROM pages WHERE site='" . $site . "' ORDER BY id";
$result = mysql_query($sql, $mysql_link);

while ($row = mysql_fetch_object($result)) {
  $pages[$row->page] = $row;
}

$sql = "SELECT * FROM categories ORDER BY id";
$result = mysql_query($sql, $mysql_link);

while ($row = mysql_fetch_object($result)) {
  $cat[$row->section] = $row->title;
}

$viewall = '<div class="viewall">';
$viewall .= '<strong><a href="#" onclick="display([\'.entry\', \'.category\']); return false;">view all</a></strong>';
$viewall .= '</div>';

?>

<?php include("_library/_thumbs.php"); ?>

<?php include("_library/_tag.php"); ?>
<?php include("_library/_tags.php"); ?>

<?php include("_library/_entry.php"); ?>
<?php include("_library/_entries.php"); ?>

<?php include("_library/_blurbs.php"); ?>
