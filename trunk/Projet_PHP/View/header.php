<?php


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo __SITE_URL; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- Le styles -->
        <style>
          body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
          }
        </style>
        <title></title>
    </head>
    <nav>
        <!-- La barre de navigation -->
           <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">

                  <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                      <a class="brand" href="<?php echo __SITE_URL; ?>/"><span style="color:red;">E</span>xi<span style="color:red;">@</span>Store</a>
                    <div class="nav-collapse">
                      <ul class="nav">
                        <li class="active"><a href="<?php echo __SITE_URL; ?>/">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogue <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo __SITE_URL; ?>/catalogue/">TOUT</a></li>
                          <li><a href="<?php echo __SITE_URL; ?>/catalogue/cd">CD</a></li>
                          <li><a href="<?php echo __SITE_URL; ?>/catalogue/dvd">DVD</a></li>
                          <li><a href="#">Recherche</a></li>
                        </ul>
                    </li>
                      </ul>

                       
                        
                       
                    </div><!--/.nav-collapse -->
                     <?php echo $connect_nav; ?>
                  </div>
                </div>
       
              </div>        
    </nav>
        <body>
        <div class="row-fluid">
        
