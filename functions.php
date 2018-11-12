<?php
function alert($type, $alertMsg){
  echo '<div class="alert alert-'.$type.'" role="alert">
    '.$alertMsg.'
  </div>';
}

function checkData($data){
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = trim($data);
  return $data;
}

?>
