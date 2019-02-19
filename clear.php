<?php
  if(session_id() == '')
  {
    session_start();
  }
$_SESSION = array();
 session_destroy();
 echo 'ok';