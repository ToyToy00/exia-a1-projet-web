<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
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
                      <a class="brand" href="index.php"><span style="color:red;">E</span>xi<span style="color:red;">@</span>Store</a>
                    <div class="nav-collapse">
                      <ul class="nav">
                        <li class="active"><a href="index.php">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogue <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="catalogue_cd.php">CD</a></li>
                          <li><a href="catalogue_dvd.php">DVD</a></li>
                          <li><a href="#">Recherche</a></li>
                        </ul>
                    </li>
                      </ul>

                        <div class="navbar-form pull-right">
                        <input type="text" class="txtbx_login" placeholder="Nom d'utilisateur">
                        <input type="password" class="txtbx_login" placeholder="Mot de Passe">
                        <button type="submit" class="submit_login" class="btn">Se Connecter</button>
                        <button type="submit" class="submit_login" class="btn-small">Pas encore inscrit ?</span></button>
                        </div>
                    </div><!--/.nav-collapse -->
                     
                  </div>
                </div>
       
              </div>        
    </nav>
    <body>
        <div class="row-fluid">

            <div class="span9">
                <div class="modal-body">
                    <div class="well">
                        <div class="inline-block well_blanc"><h2>Le nouvelle Album de Black Sabbath est arrivée</h2></br>
                                  <img class=" well img_detail_article"  alt="" src="img/catalogue/article1.jpg" href="#"/>
                                  <div class="well detail_detail_article pull-right">
                                      <p>Prix de la livraison :</br></br> Stock : </br></br> Voulez vous vous faire livrer le ... ? Commandez dans les ...h...m pour que ça soit possible</br></br> Nombre de disques : </br> </br> Label :</br> </br> Date de sortie :</p>
                                      <button href=""  name="btn_add_panier" class="btn_add_panier_detail btn-primary">Ajouter au panier</button>
                                  </div>
                                      
                                      
                                      <p>LoremLorem ipsum dolor sit amet, consectetur adipiscing elit. In a lacinia velit, sit amet commodo augue. Nam nulla turpis, blandit a malesuada at, scelerisque at lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi pharetra euismod est eu auctor. Etiam ut orci commodo, malesuada magna quis, commodo erat. Proin ut tellus eget velit fringilla placerat ac vel justo. Duis fermentum dolor metus, sit amet faucibus dolor egestas non. Ut nec nisl auctor, commodo felis at, vulputate diam. Curabitur imperdiet velit sed ante venenatis, eu pellentesque erat tincidunt. Sed nec vehicula dolor. Sed a accumsan dolor. Praesent nec turpis feugiat, malesuada neque id, ultrices mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam consectetur lacus enim, id ullamcorper erat interdum ac. Pellentesque quis enim vel augue ornare tincidunt et mollis nulla. Nullam porta felis sed convallis sagittis.
Integer malesuada blandit metus, ut molestie erat vehicula quis. Morbi vulputate, leo quis rhoncus congue, dolor tortor volu</p>
                                      
                                      <p>Pour seulement <span style="color:red">23E</span></p>
                                    
                                      
                        </div>
                    </div>
                    
                </div>
   
            <footer class="modal-footer">
                <p>&copy; Copyright 2013 EXI@STORE Groupe: Clement Valentin Lucien</p>
            </footer>   
            </div>
            
            

            
            
            
            
            
            <div class="span3">
                <div class="sidebar-nav-fixed offset9">
                    <ul class="nav nav-list">
                        <li class="nav-header">Mon Compte</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                            <li class="nav-header"> Panier   <i class="icon-shopping-cart"></i></li>
                        <div class="well">
                            <div class="well_blanc">
                                <!-- <?php ?> -->
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                            </div>
                            <button href="" class=" btn_panier btn-primary">Voir tout le panier</button>
                        </div>
                        <li class="nav-header">Publicite</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="nav-header">Partenaires</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div><!--/.well --> 
            </div><!-- /.span -->

        </div><!-- /.row-fluid -->
 
        <?php

        ?>
    </body>

        <!-- Le javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.js"></script>
</html>
