<?php

/**
 * Example - server info viewer component
 * Fetches status info for a given server and displays it.
 * Intended for use via AJAX in servers.php
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
$server = $cli->getServerStatus(array('ip' => $ip, 'port' => $port));
if(isset($server['http_code']) && $server['http_code'] != 200)
{
  var_dump($server);
  die('An error occurred.');
}
$server = $server['serverStatus'];
?>
  



<?php $serverIp = (isset($server['serverIPv4Address']))?$server['serverIPv4Address']:$server['serverIPv6Address'];?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h2>
      <a href="kag://<?php echo $serverIp . ':' . $server['serverPort'] ?>"><?php echo $server['serverName'] ?></a> 
      <a class="btn btn-info" href="#" onclick="getServerInfo(this, '<?php echo $serverIp . "','" . $server['serverPort'] ?>')"><i class="icon-refresh icon-white"></i></a>
    </h2>
  </div>

  <div class="modal-body">
    <div class="server-desc">
      <p><?php echo $server['description'] ?></p>
    </div>
    <div class="server-stats">
      <table>
        <tr>
          <td>Current/Max Players:</td>
          <td><strong><?php echo $server['currentPlayers'] . ' / ' . $server['maxPlayers'] ?></strong></td>
        </tr>
        <tr>
          <td>Game Mode:</td>
          <td><strong><?php echo $server['gameMode'] ?></strong></td>
        </tr>
        <tr>
          <td>Map Size:</td>
          <td><strong><?php echo $server['mapW'] . 'x' . $server['mapH'] ?></strong></td>
        </tr>
        <tr>
          <td>Gold Only:</td>
          <td><strong><?php echo (($server['gold'] == 0) ? 'No' : '<span style="color: #AE841A">Yes</span>') ?></strong></td>
        </tr>
        <tr>
          <td>Password Protected:</td>
          <td><strong><?php echo (($server['password'] == 0) ? 'No' : '<span style="color: #b00">Yes</span>') ?></strong></td>
        </tr>
        <tr>
          <td>Build:</td>
          <td><strong><?php echo $server['build'] ?></strong></td>
        </tr>
              
      </table>
    </div>
    <div class="server-minimap">
      <center>
        <img src="https://api.kag2d.com/server/ip/<?php echo $server['serverIPv4Address'] . '/port/' . $server['serverPort'] ?>/minimap" /> 
      </center>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="kag://<?php echo $serverIp . ':' . $server['serverPort'] ?>" class="btn btn-success"><i class="icon-play icon-white"></i> Play</a> 
  </div>
<!--
<div class="row server-row">
  <div class="span5">

    
  </div>
  <div class="span7">

  </div>
</div>-->