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
 * Example - server browser!
 * This example shows a simple server browser application.
 */
use KAGClient\Client;
include '../../KAGClient/bootstrap.php';
include 'sortFunctions.php';

/** Process parameters **/
$sortFunctions = array('playersDesc', 'playersAsc');
$sortFunction = 'playersDesc';
if(isset($_GET['sort']) && array_search($_GET['sort'], $sortFunctions, true) !== false)
  $sortFunction = $_GET['sort'];

/** Init KAGClient **/
$cli = new Client();

/** Fetch Servers **/
$servers = $cli->getServerList(array('current' => true));
$servers = $servers['serverList'];

/** Sort server list **/
usort($servers, $sortFunction);


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>KAG Server List 0.1 by Garanis</title>
  <meta name="description" content="KAG Server List">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <style>
    body {
      padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
  </style>
  <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/servers.css" />
</head>
<body>    
  <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><span style="color: #496">&#9819;</span> KAG Server Browser 0.1 by Garanis</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="servers.php">All Servers</a></li>
              <li class="dropdown">
                <a href="#"
                   class="dropdown-toggle"
                   data-toggle="dropdown">
                  Sort
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="servers.php?sort=playersDesc"># Players - Desc</a></li>
                  <li><a href="servers.php?sort=playersAsc"># Players - Asc</a></li>
                </ul>   
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">
    <?php foreach($servers as $server):?>
    <div class="row server-row">
      <div class="span5">
        <div class="server-name">
          <h2><a href="kag://<?php echo $server['serverIPv4Address'] . ':' . $server['serverPort']?>"><?php echo $server['serverName']?></a></h2>
        </div>
        <div class="server-desc">
          <p><?php echo $server['description']?></p>
        </div>
        <div class="server-stats">
          <table>
            <tr>
              <td>Current/Max Players:</td>
              <td><strong><?php echo $server['currentPlayers'] . ' / ' . $server['maxPlayers']?></strong></td>
            </tr>
            <tr>
              <td>Game Mode:</td>
              <td><strong><?php echo $server['gameMode']?></strong></td>
            </tr>
            <tr>
              <td>Map Size:</td>
              <td><strong><?php echo $server['mapW'] . 'x' . $server['mapH']?></strong></td>
            </tr>
            <tr>
              <td>Gold Only:</td>
              <td><strong><?php echo (($server['gold'] == 0)?'No':'<span style="color: #AE841A">Yes</span>')?></strong></td>
            </tr>
            <tr>
              <td>Password Protected:</td>
              <td><strong><?php echo (($server['password'] == 0)?'No':'<span style="color: #b00">Yes</span>')?></strong></td>
            </tr>
            <tr>
              <td>Build:</td>
              <td><strong><?php echo $server['build']?></strong></td>
            </tr>
            
          </table>
        </div>
      </div>
      <div class="span7">
        <div class="server-minimap">
          <img src="https://api.kag2d.com/server/ip/<?php echo $server['serverIPv4Address'] . '/port/' . $server['serverPort'] ?>/minimap" /> 
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>