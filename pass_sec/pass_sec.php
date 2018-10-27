<?php
  function pass_v($password, $hash){
    $target = md5($password);
    return $target;
  }
  function hex_en($word){
      return strtoupper(bin2hex(iconv('UTF-8', 'UCS-2BE', $word)));
  }
  function hex_de($word){
    return iconv('UCS-2BE', 'UTF-8', hex2bin(strtolower($word)));
  }
?>