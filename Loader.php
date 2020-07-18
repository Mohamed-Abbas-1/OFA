<?php
    /**
     * this page used to be as a auto loader instead of -manually include all files you created into each one .
     * 													-manually include every class.
     * Here we will create all requires and includes.
     */

    // include config file
    require_once 'Database.php';  // require is the same like include but it will not show any thing if the file is missed.
   								// (require_once & include_once) are the same like (rquire & include) but they will check if it 
    							// already required || included or not , if it already done it will not requires it again.
    // require_once('lib/Templete.php');    // instead of it we will use Autoloader .

    // Autloader
    function __autoload($class_name){
    	require_once $class_name.'.php' ;  // but you have to be sure that (class name) = (file name), so when you create a class it will auto
    											  // include the file name
    } 

/*
	// the same like require_once
    if (defined('config.php')) {
    	require 'config.php';
    }

    */
?>