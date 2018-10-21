<?php
  include '../pass_sec/pass_sec.php';
  echo pass_v('', '', '');
  echo '<br/>';
  $sedna = hex_en('ᓴᓐᓇ');
  //14F414D014C7
  echo $sedna . '<br/>';
  echo hex_de($sedna);
  //ᓴᓐᓇ
  
  //pass_v()
?>