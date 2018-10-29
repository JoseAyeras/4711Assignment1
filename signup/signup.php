<?php
  include '../pass_sec/DBclass.php';
  include '../redirect.php';

  echo pass_v('', '', '');
  echo '<br/>';
  $sedna = hex_en('ᓴᓐᓇ');
  //14F414D014C7
  echo $sedna . '<br/>';
  echo hex_de($sedna);
  //ᓴᓐᓇ
  $sudb = new DBclass();
  if(!isset($_POST))
  echo "Not a post request!";
  elseif(!isset($_POST['username']))
  echo "No username!";
  elseif(!isset($_POST['password']))
  echo "No password!";
  elseif(!isset($_POST['confirm_pass']))
  echo "Password not confirmed!";
  elseif(!isset($_POST['email']))
  echo "No email!";
  elseif($_POST['password'] !== $_POST['confirm_pass'])
  echo "Passwords don't match!";
  else {
    if($sudb->NewUser());
  //pass_v()
  }
?>