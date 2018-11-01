<?php
function alert($type, $alertMsg){
  echo '<div class="alert alert-'.$type.'" role="alert">
    '.$alertMsg.'
  </div>';
}

?>
