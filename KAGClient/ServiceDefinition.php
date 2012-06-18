<?php
/**
 * KAG REST API Client V0.1
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
          'password' => array('type' => 'boolean', 'required' => false)
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
