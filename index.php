<?php 
use KAGClient\Client as Client;
ini_set('display_errors', 1);

require_once 'KAGClient\KAGClient.php';
?><!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
  </head>
  <body>
    <?php
$cli = new Client();
$list = $cli->getServerList();
$server = $list['serverList'][0];
$status = $cli->getServerStatus(array('ip' => $server['serverIPv4Address'], 'port' => $server['serverPort']));

var_dump($status);

$playerStatus = $cli->getPlayerStatus('garanis');
var_dump($playerStatus);

?>
  </body>
</html>
