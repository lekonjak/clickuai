<?php
/*
* Your facebook convas url and your facebook connect url must be same.
* I-E your facebook convas url is http://www.example.com/a/abc.php
* and your facebook connect url also same as http://www.example.com/a/.*  
*/
  include "facebook.class.php";
  // Create our Application instance (replace this with your appId and secret).
  $id = "184950098597"; // facebook applicationh ID.
  $sec = "d38b401815beb67e232da77c317130fe"; // facebook application secrate.
  $callback = "http://www.example.com/abc.php"; // call back url ie http://www.example.com/abc.php/
  $permission = "0"; // 0 for all class custome permission or explain ur permission like offline_status, email,sms etc http://developers.facebook.com/docs/authentication/permissions.
  $facebook = new facebook_login($id,$sec,$callback,$permission);

  if(is_array($facebook->FBLogin()))
  {
      print_r($facebook->FBLogin());
  }
  else
  {
      echo $facebook->FBLogin();
  }
?>
