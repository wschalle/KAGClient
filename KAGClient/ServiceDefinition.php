<?php
/**
 * KAG REST API Client V0.2
 *
 * author: William Schaller
 * contact: wschalle@gmail.com
 * Copyright (c) 2012, William Schaller
 * License: http://www.gnu.org/copyleft/gpl.html GNU GENERAL PUBLIC LICENSE (GPLv3)
 */

namespace KAGClient;

/**
 * KAG REST API Service Definition
 *
 */
class ServiceDefinition {  
  private static $def = array(
    'commands' => array(
      'get_servers' => array(
        'prepend' => 'servers',
        'params' => array(
          'connectable' => array('type' => 'boolean', 'required' => false),
          'current' => array('type' => 'boolean', 'required' => false),
          'build' => array('type' => 'integer', 'required' => false),
          'gold' => array('type' => 'boolean', 'required' => false),
          'minPlayerPercentage' => array('type' => 'float', 'min' => 0, 'max' => 1, 'required' => false),
          'maxPlayerPercentage' => array('type' => 'float', 'min' => 0, 'max' => 1, 'required' => false),
          'password' => array('type' => 'boolean', 'required' => false),
          'full' => array('type' => 'boolean', 'required' => false),
          'empty' => array('type' => 'boolean', 'required' => false),
          'gameMode' => array('type' => 'string', 'required' => false, 'urlEncode' => true),
          'maxPlayers' => array('type' => 'integer', 'min' => 0, 'max' => 1000, 'required' => false),
          'mostCurrentPlayers' => array('type' => 'integer', 'required' => false),
          'leastCurrentPlayers' => array('type' => 'integer', 'required' => false),
          'mostMaxPlayers' => array('type' => 'integer', 'required' => false),
          'leastMaxPlayers' => array('type' => 'integer', 'required' => false),
          //'lastUpdated',
          //'firstSeen',
          'preferAF' => array('type' => 'boolean', 'required' => false),
          'nameContains' => array('type' => 'string', 'required' => false, 'urlEncode' => true),
          'name' => array('type' => 'string', 'required' => false, 'urlEncode' => true),
          'descriptionContains' => array('type' => 'string', 'required' => false, 'urlEncode' => true),
          'description' => array('type' => 'string', 'required' => false, 'urlEncode' => true),          
        )
      ),
      'get_server_status' => array(
        'prepend' => 'server',
        'params' => array(
          'ip' => array('type' => 'string', 
            'regex' => '/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/',
            'minlength' => 7,
            'maxlength' => 15, 
            'required' => true),
          'port' => array('type' => 'integer',
            'min' => 1,
            'max' => 65535,
            'required' => true)
        ),
        'append' => 'status'      
      ),
      'get_server_minimap' => array(
        'prepend' => 'server',
        'params' => array(
          'ip' => array('type' => 'string', 
            'regex' => '/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/',
            'minlength' => 7,
            'maxlength' => 15, 
            'required' => true),
          'port' => array('type' => 'integer',
            'min' => 1,
            'max' => 65535,
            'required' => true)
        ),
        'append' => 'minimap'
      ),
      'get_player_status' => array(
        'prepend' => 'player',
        'params' => array(
          'name' => array('type' => 'string',
            'regex' => '/^[a-zA-Z0-9]+$/',
            'minlength' => 1,
            'maxlength' => 100,
            'required' => true,
            'noParameterKey' => true) // how long is max length?
        ),
        'append' => 'status'
      ),
      'get_player_avatar' => array(
        'prepend' => 'player',
        'params' => array(
          'name' => array('type' => 'string',
            'regex' => '/^[a-zA-Z0-9]+$/',
            'minlength' => 1,
            'maxlength' => 100,
            'required' => true,
            'noParameterKey' => true) // how long is max length?
        ),
        'append' => 'avatar'
      ),
      'get_player_info' => array(
        'prepend' => 'player',
        'params' => array(
          'name' => array('type' => 'string',
            'regex' => '/^[a-zA-Z0-9]+$/',
            'minlength' => 1,
            'maxlength' => 100,
            'required' => true,
            'noParameterKey' => true) // how long is max length?
        ),
        'append' => 'info'
      )
      
    )
  );

  public static function getCommandDefinition($command) {
    if(!isset(self::$def['commands'][$command]))
      throw new ClientException('Command definition not found.');
    else return self::$def['commands'][$command];
  }
}
?>
