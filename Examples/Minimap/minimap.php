<?php
/**
 * KAG REST API Client V0.2
 *
 * author: William Schaller
 * contact: wschalle@gmail.com
 * Copyright (c) 2012, William Schaller
 * License: http://www.gnu.org/copyleft/gpl.html GNU GENERAL PUBLIC LICENSE (GPLv3)
 */

/**
 * Example - minimap fetcher
 * Fetches the minimap data for a given server and dumps it as a PNG.
 */
use KAGClient\Client;
include '../../KAGClient/bootstrap.php';

if(!isset($_GET['ip']) || !isset($_GET['port']))
{
  header('HTTP/1.1 400 Bad Request');
  die('400 Bad Request');
}
$ip = $_GET['ip'];
$port = $_GET['port'];

$cli = new Client();
$minimap = $cli->getServerMinimap(array('ip' => $ip, 'port' => $port));
if(is_array($minimap)) //Error occurred, dump response.
  var_dump($minimap);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

header('Content-Type: image/png');
header('Content-Length: ' . strlen($minimap));
echo $minimap;