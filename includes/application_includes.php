
<?php


// Hardcoding the action of Connecting to our Database

function connectToDb()
{
  $db = new mysqli('localhost', 'csc206user', 'Geneva2018!', 'csc206');
  if ($db->connect_errno )
  {
      trigger_error('Database could not connect');
      $connect_Error = $db->connect_errno;

      echo 'Connect Error : ' - $connect_Error;
  }

  return $db;

}


?>
