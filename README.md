KAGCLient
=========

KAG API Client library for PHP

Requirements
---------

PHP 5.3
Curl php extension

Description
---------

This is a simple client lib for PHP.

Usage
---------

    use KAGClient\Client as Client;

    require_once 'KAGClient/bootstrap.php';

    $cli = new Client();
    var_dump($cli->getServerStatus(array('ip' => '199.168.184.8', 'port' => '23002')));

Changelog
---------
* 6/24/2012 - v0.2
 * Added ipv6 support for library and server browser example
 * Added server browser example
 * Added basic error handling
 * Added bootstrap script
 * Added minimap fetch script
* 6/17/2012 - v0.1
 * Initial build