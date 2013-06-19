<?php

$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);
$site_url = str_replace('C:\wamp\www\\','/',__SITE_PATH);
define ('__SITE_URL', $site_url);

include __SITE_PATH . '/registry.php';
include __SITE_PATH . '/Controller/template.class.php';
include '/Model/db.dao.php';  
include 'init.php'; //inclu les classe maitres

 /*** a new registry object ***/
 $registry = new registry;
 $registry->router = new router($registry,__SITE_PATH);
 $registry->template = new template($registry);
 $registry->router->loader();
 
 
 //$router = new router(__SITE_PATH);
 
// inclure le bon controleur en fonction de la page

//include 'header.php';

//appel controleur page
 //$router->loader();
//appel footer


?>
