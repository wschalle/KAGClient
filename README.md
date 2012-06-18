KAGCLient
=========

KAG API Client library for PHP

Requirements
=========

PHP 5.3
Curl php extension

Description
=========

This is a simple client lib for PHP.

Usage
=========

use KAGClient\Client as Client;

require_once 'KAGClient.php';

$cli = new Client();
var_dump($cli->getServerStatus(array('ip' => '199.168.184.8', 'port' => '23002')));
