<?php

class db{

/*** Declare instance ***/
private static $instance = NULL;

/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/
function __construct($classname) {
    include $classname;
}

/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*
*/
public static function getInstance() {

if (!self::$instance)
    {
    self::$instance = new PDO("mysql:host=localhost;dbname=exiastore", 'root', '');;
    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
return self::$instance;
}


} /*** end of class ***/

?>
