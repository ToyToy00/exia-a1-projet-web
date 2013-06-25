<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
        <div class="row-fluid">
<div class="span9">
    <div class="modal-body">

        <div class="block_carousel_search">
            <div class="pull-right well">
                <form class="form-search" method="POST" action="<?php echo __SITE_URL; ?>/catalogue/search">
                    <div class="input-append">
                        <input type="text" class="search-query" name="search-query" placeholder="Recherche">
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>                       
                    </div>

                    <table>
                        <tr>
                            <td>
                                <select name="critere">
                                    <option disabled selected >Rechercher dans</option>
                                    <option value="Titre">Le titre</option>
                                    <option value="Description">La description</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="Theme">
                                    <option disabled selected >Thème</option>
<?php
foreach ($themes as $key => $value) {
    echo '
                                <option value="">' . $value['Themes'] . '</option>
               ';
}
?>



                                </select>
                            </td>
                        </tr>
                    </table>

                    <table>
                        <tr>
<?php
foreach ($type as $key => $value) {
    echo '<td>
                                        <label class="chck_cd checkbox">
                                            <input type="checkbox" name="type" value="' . $value['Type'] . '"/>' . $value['Type'] . '  
                                        </label>
                                    </td>
               ';
}
?>

                        </tr>
                    </table>
                </form>  

            </div>
            <div id="myCarousel" class="carousel_catalogue carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item"><img alt="" src="<?php echo __SITE_URL; ?>/img/carousel_first.jpg"/>        <div class="carousel-caption">
                            <p>Seulement sur notre site.</p>
                        </div></div>

                    <div class="item"><img alt="" src="<?php echo __SITE_URL; ?>/img/carousel_first.jpg"/>        <div class="carousel-caption">
                            <p>A partir du 18 Juin au 31 Juin.</p>
                        </div></div>

                    <div class="item"><img alt="" src="<?php echo __SITE_URL; ?>/img/carousel_first.jpg"/>        <div class="carousel-caption">
                            <p>Seulement pour vous.</p>
                        </div>
                    </div>

                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>


        </div>
        <!-- BODY  -->
        <div class="well" >
<?php
foreach ($article_array as $key => $value) {
    echo '<div class="article_catalogue well_blanc">
                <img class="img_catalogue"  alt="" src="' . __SITE_URL . '/' . $value['img'] . '" href="#"/>
                <p> ' . $value['Titre'] . ' - <span style="color:red;">' . $value['Prix'] . ' Euros</span></p>
                <table style="width:100%"><tr><td><button name="btn_add_panier" class="btn_voir_article btn-primary" type="button" onclick="location.href=\'' . __SITE_URL . '/catalogue/article/' . $value['ID_Article'] . '\'">Voir</button></td><td><button href=""  name="btn_add_panier" class="btn_voir_article btn-primary" title="Panier" onclick="addpanier('.$value['ID_Article'].');" >+</button></td></tr></table>
            </div>';
}
?>



        </div>
    </div> 
</div>