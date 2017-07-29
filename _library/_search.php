
<?php

function print_search() {

?>
    
  <form action="#" onsubmit="lookup($('#searchbox').val()); return false;">
    <span id="clear">
      <a href="#" onclick="$('#searchbox').val('').trigger('keyup').focus(); return false;">&times;</a>
    </span>
    
    <input type="text" 
      id="searchbox" 
      onkeyup="lookup($(this).val());" 
      placeholder="Tools, Skills, Keywords" 
      autocomplete="off"><button type="submit">GO</button>
  </form>
  
  <div id="searched"></div>
  
  <div class="searchitem" id="searchtemplate" style="display: none;">
    <div class="left">
      <a href="#">
        <img src="" border="0" width="" height="">
      </a>
    </div>

    <div class="right">
      <a href="#" class="searchlink"></a><br>
      <small class="searchcat"></small><br>
      <small class="searchdate"></small>
    </div>
  </div>

<?php

}

?>
