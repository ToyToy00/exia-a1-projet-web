<body>
    <div class="row-fluid">
        <div class="span9">
            <div class="pull-center well">

                <div class="modal-body">

                    <center>
                        <table class='table'>
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
                    <td><button name="btn_add_panier" class="btn_voir_article btn-primary" title="Supprimer cet article" onclick="location.href=\'' . __SITE_URL . '/panier/commande/\'" >-</button>
                                   </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php echo $submit_form; ?>
                        
                    </center>



                </div> <!-- /container -->
<script>

function plusarticle(id_)
{
    jQuery.ajax({
        type: 'POST', // Le type de ma requete
        url: '<?php echo __SITE_URL; ?>/panier/plus/', // L'url vers laquelle la requete sera envoyee
        data: {
            id: id_ // Les donnees que l'on souhaite envoyer au serveur au format JSON
        },
        success: function(data) {
            
            document.getElementById('qte-'+id_).innerHTML = parseInt(document.getElementById('qte-'+id_).innerHTML)+1;
        },
        error: function() {
            alert("planté");
        }
    });
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
},
        error: function() {
            alert("planté");
        }
    });
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
