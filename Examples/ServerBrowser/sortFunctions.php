<?php
/**
 * KAG REST API Client V0.2
 *
 * author: William Schaller
 * contact: wschalle@gmail.com
 * Copyright (c) 2012, William Schaller
 * License: http://www.gnu.org/copyleft/gpl.html GNU GENERAL PUBLIC LICENSE (GPLv3)
 */

function playersDesc($a, $b)
{
  $a = $a['currentPlayers'];
  $b = $b['currentPlayers'];
  if($a == $b)
    return 0;
  
  return ($a > $b) ? -1 : 1;
}
function playersAsc($a, $b)
{
  $a = $a['currentPlayers'];
  $b = $b['currentPlayers'];
  if($a == $b)
    return 0;
  
  return ($a < $b) ? -1 : 1;
}