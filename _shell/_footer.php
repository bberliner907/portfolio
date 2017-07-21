
      <div id="zoom">
        <span id="close">
          <a href="#" onclick="collapse(); return false;">&times;</a>
        </span>
        <img src="" border="0" />
      </div>
      
<?php

      $date = date_create();
      $formatted = date_format($date, "Y");
    
?>
  
      <div id="footer">
        <br />
        <strong>All content &copy; <?php echo $formatted; ?>.</strong>
        <br /><br />
      </div>

    </div>

  </body>
</html>
