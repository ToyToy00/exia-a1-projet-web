<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="span3">
    <div class="sidebar-nav-fixed offset10">
        <ul class="nav nav-list">
            <li class="nav-header">Mon Compte</li>
            <li><a href="<?php echo __SITE_URL; ?>/membre/">Votre compte</a></li>
            <li><a href="<?php echo __SITE_URL; ?>/membre/commande/">Vos commandes</a></li>          
            <li class="nav-header"> Panier   <i class="icon-shopping-cart"></i></li>
            <div class="well">
                <div class="well_blanc">
                    <!-- <?php ?> -->
                    <li><span id="nb_article"><?php echo $nb_article; ?></span> Articles</li>
                </div>
                <button type="button" onclick="location.href='<?php echo __SITE_URL; ?>/panier/'" class=" btn_panier btn-primary">Voir tout le panier</button>
            </div>
            <li class="nav-header">Liens utiles</li>
            <li><a href="<?php echo __SITE_URL; ?>/contact/">Contact</a></li>
            <li><a href="<?php echo __SITE_URL; ?>/index/plan_site/">Plan du site</a></li>
            <li class="nav-header">Partenaires</li>
            <li><a href="http://www.esl.eu/fr/"><img style="width:95%" alt="ESL" src="<?php echo __SITE_URL; ?>/img/partenaire/partenaire1.jpg"></a></li>
            <li><a href="http://en.intelextrememasters.com/nyc-vs-shanghai/" ><img style="width:95%" alt="Intel Extreme Masters"src="<?php echo __SITE_URL; ?>/img/partenaire/partenaire2.jpg"></a></li>
        </ul>
    </div><!--/.well --> 
</div><!-- /.span -->
        <footer style="margin-left: 0"class="span10 modal-footer">
                <p>&copy; Copyright 2013 EXI@STORE Groupe: Clement Valentin Lucien</p>
            </footer> 


</div><!-- /.row-fluid -->
 
<?php
?>
</body>
    

<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo __SITE_URL; ?>/js/jquery.js"></script>
<script src="<?php echo __SITE_URL; ?>/js/bootstrap.js"></script>
<script>
function addpanier(id_)
{
    jQuery.ajax({
        type: 'POST', // Le type de ma requete
        url: '<?php echo __SITE_URL; ?>/panier/add/', // L'url vers laquelle la requete sera envoyee
        data: {
            id: id_ // Les donnees que l'on souhaite envoyer au serveur au format JSON
        },
        success: function(data) {
            document.getElementById("nb_article").innerHTML = data;
        },
        error: function() {
            alert("planté");
        }
    });
    }
</script>
</html>