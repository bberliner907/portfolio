
<!DOCTYPE html>

<html>
  <head>
  
    <title>Brenn Berliner - Web Development Portfolio</title>
    
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="static/styles.css" />
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/scripts.js"></script>
    
    <?php ga("UA-102812269-1"); ?>
    
  </head>

  <body>

    <div id="leader">
    
      <div id="header" name="top">
        <div id="title">
          <div id="photo">
            <img src="images/photo.png" width="100" height="100" />
          </div>
  
          <h1>Brenn Berliner</h1>
          <h3>Web Development Portfolio</h3>
        </div>
      </div>

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
      
    </div>
    
    <div id="content">
