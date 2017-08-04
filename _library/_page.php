
<?php

  function page_clean() {
    return preg_replace("/\W/", "", $_GET["page"]);
  }

?>



<?php
  
  function page_param() {
    global $pages;
    
    $param = page_clean();
    
    return (isset($_GET["page"]) && array_key_exists($param, $pages));
  }
  
?>



<?php

  function page_active($page) {
    global $pages;
    
    $param = page_clean();
    foreach ($pages as $first => $temp) break;
  
    return ((page_param() && $page == $param) || (!page_param() && $page == $first));
  }

?>
