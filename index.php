<?php 
use KAGClient\Client as Client;
ini_set('display_errors', 1);

require_once 'KAGClient.php';
?><!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <?php
$cli = new Client();
var_dump($cli->getServerStatus(array('ip' => '199.168.184.8', 'port' => '23002')));
?>
  </body>
</html>
