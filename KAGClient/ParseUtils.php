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
 * Utilities to parse and verify php variables
 *
 */
class ParseUtils {
  /*
   * Parses a string into a proper typed variable, or if the variable is already typed, 
   * returns the variable.
   * @param mixed $variable
   */
  public static function parseVariable($variable) {
    if(is_numeric($variable))
    {
      if($this->isFloat($variable))
        return (float)$this->toFloat($variable);
      else if ($this->isInt($variable))
        return (int)$this->toInt($variable);
    } 
    else if ($this->isBool($variable))
      return (bool)$this->toBool($variable);
    else if (is_string($variable))
      return (string)trim($variable);
    else
      return null;
  }
  
  /**
   * Checks if a variable can validly parse to a float. 
   * @param mixed $val
   * @return boolean 
   */
  public static function isFloat($val){    
    if(is_string($val)) $val = trim($val);
    if( is_numeric($val) && ( is_float($val) || ( (float) $val > (int) $val 
    || strlen($val) != strlen( (int) $val) ) && (ceil($val)) != 0 )) return true;
    else return false;
  }

  /**
   * Converts a variable to an float if possible. If not, it returns false.
   * @param mixed $val
   * @return boolean|float
   */
  public static function toFloat($val){
    if($this->isFloat($val)){
      if(is_string($val))
        return (float)trim($val);
      else
        return (float)$val;
    } else return false;
  }

  /**
   * Checks if a variable can validly parse to an int. 
   * @param mixed $val
   * @return boolean 
   */
  public static function isInt($val) {
    if(is_string($val) && !is_numeric(trim($val)))
      return false;
      $num = (int)$val;    
      if ($val==$num) {
          $val=$num;
          return true;
      }
      return false;
  }

  /**
   * Converts a variable to an int if possible. If not, it returns false.
   * @param mixed $val
   * @return boolean|int
   */
  public static function toInt($val) {
    if($this->isInt($val)) {
      if(is_string($val))
        return (int)trim($val);
      else
        return (int)$val;  
    } else return false;
  }
  
  /**
   * List of strings that should parse to boolean true
   * @var array $validTrue
   */
  private static $validTrue = array("true", "on", "yes");
  /**
   * List of strings that should parse to boolean false
   * @var array $validFalse
   */
  private static $validFalse = array("false", "off", "no");
  /**
   *
   * @param type $val
   * @return boolean 
   */
  public static function isBool($val) {
    if (is_bool($val))
      return true;
    else if(is_int($val)) {
      if($val == 1 || $val == 0) 
        return true;
    } else if(is_string($val)){
      if(array_search(trim($val), self::$validTrue, true)!== false)
        return true;
      else if(array_search(trim($val), self::$validFalse, true)!==false)
        return true;
    } else return false; 
  }    
  
  /**
   *
   * @param type $val
   * @return boolean 
   */
  public static function toBool($val) {
    if(!$this->isBool($val)) 
      return false;
    else {
      if (is_bool($val))
        return $val;
      else if(is_int($val)) {
        if($val == 1) 
          return true;
        else
          return false;
      } else if(is_string($val)){
        if(array_search(trim($val), self::$validTrue, true)!== false)
          return true;
        else if(array_search(trim($val), self::$validFalse, true)!==false)
          return false;
      } else return false; 
    }
  }
}

?>
