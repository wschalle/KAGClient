KAGCLient
=========

KAG API Client library for PHP

This is a simple client lib for PHP.

To use:

use KAGClient\Client as Client;

require_once 'KAGClient.php';

$cli = new Client();
var_dump($cli->getServerStatus(array('ip' => '199.168.184.8', 'port' => '23002')));
