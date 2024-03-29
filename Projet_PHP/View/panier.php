
        <div class="span9">
            <div class="well" >

                <div class="modal-body" >

                    <center>
                        <table class='table' id="table_panier" style="width:100%;">
                            <thead>
                                <tr>
                                    <td>Titre</td>
                                    <td>Type</td>
                                    <td>Quantité</td>
                                    <td>Prix (U TTC €)</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                foreach ($panier_articles as $key => $value) {
                                    echo '<tr id="'.$value['ID_Article'].'">
                    <td>' . $value['Titre'] . '</td>
                    <td>' . $value['Type'] . '</td>
                    <td><span id="qte-'.$value['ID_Article'].'">' . $_SESSION['user']['panier'][$value['ID_Article']] . '</span> <i class="icon-plus-sign" title="Supprimer cet article" onclick="plusarticle(' . $value['ID_Article'] . ');"></i><i class="icon-minus-sign" onclick="minusarticle(' . $value['ID_Article'] . ');" title="Supprimer cet article" onclick="delpanier(' . $value['ID_Article'] . ');"></i></td>
                    <td>' . $value['Prix'] . ' </td>
                    <td><button name="btn_add_panier" class="btn_voir_article btn-primary" title="Supprimer cet article" onclick="delpanier(' . $value['ID_Article'] . ');" >-</button>
                                   </tr>';
                                   
                                }
                                
                                echo '<tr><td colspan=4>TOTAL</td><td>'.$total.'€</td></tr>';
                                ?>
                            </tbody>
                            <?php echo $submit_form; ?>
                        </table>
                        
                        
                    </center>



                </div> <!-- /container -->
<script>

function plusarticle(id_)
{
    jQuery.ajax({
        type: 'POST', // Le type de ma requete
        url: '<?php echo __SITE_URL; ?>/panier/plus/', // L'url vers laquelle la requete sera envoyee
        data: {
            id: id_ // Les donnees que l'on souhaite envoyer 
        },
        success: function(data) { //On success        
            document.getElementById('qte-'+id_).innerHTML = parseInt(document.getElementById('qte-'+id_).innerHTML)+1; // on ajoute 1 a la quantité
        },
        error: function() { //si une erreur apparait (impossible de charger la page cible)
            alert("planté");
        }
    }); 
        $("#body").load("panier/index"); //on recharge le <body> de notre page pour mettre a jour le prix total qui est calculé en php
    }
    
    function minusarticle(id_)
{
    jQuery.ajax({
        type: 'POST', // Le type de ma requete
        url: '<?php echo __SITE_URL; ?>/panier/minus/', // L'url vers laquelle la requete sera envoyee
        data: {
            id: id_ // Les donnees que l'on souhaite envoyer au serveur au format JSON
        },
        success: function(data) {
                        document.getElementById('qte-'+id_).innerHTML = parseInt(document.getElementById('qte-'+id_).innerHTML)-1;
                if(parseInt(document.getElementById('qte-'+id_).innerHTML) === 0)
                {
                    delpanier(id_);
                    
                }
},
        error: function() {
            alert("planté");
        }
    });
    $("#body").load("panier/index");
    }
    function delpanier(id_)
{
    jQuery.ajax({
        type: 'POST', // Le type de ma requete
        url: '<?php echo __SITE_URL; ?>/panier/del/', // L'url vers laquelle la requete sera envoyee
        data: {
            id: id_ // Les donnees que l'on souhaite envoyer au serveur au format JSON
        },
        success: function(data) {
            document.getElementById(id_).innerHTML = '';
            document.getElementById('nb_article').innerHTML = document.getElementById('nb_article').innerHTML - 1;
            
            
        },
        error: function() {
            alert("planté");
        }
    });
    }
</script>
