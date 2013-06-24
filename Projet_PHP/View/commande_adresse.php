
    <style>
        .input-block-level {
            width: 300px;
        }
    </style>
    
        <div class="span9">


            <div class="modal-body">
                
                <form class="form-signin" action="<?php echo __SITE_URL; ?>/panier/valider" method="POST" style="display:inline-block;vertical-align:center;">   
                    <table>
                        <tr>
                            <td>
                                <div class="pull-left well">
                                    Coordonnées bancaires : <br />

                                    <table>
                                        <tr><td>Numero de carte</td><td>Cryptogramme</td></tr>
                                        <tr><td><input type="text" name="num_carte"></td><td><input type="text" name="crypto"></td></tr>
                                        <tr><td>Date d'expiration </td><td><input type="text" name="mois">/<input type="text" name="annee"></td></tr>
                                    </table>


                                </div>
                            </td>
                            <td>
                                <div class="pull-right well">
                                    Votre adresse actuelle : <br />
                                    <?php
                                    echo $adresse['Nom'] . ' ' . $adresse['Prenom'] . '<br /><br />' . $adresse['Adresse'] . '<br />' . $adresse['Ville'] . '<br />' . $adresse['CP'];
                                    ?>
                                    <br />
                                    <br />
                                    Saisir une autre adresse (laisser vide sinon): <br />

                                    <input type="text"  class="input-block-level" placeholder="Adresse" name="Adresse"><br />
                                    <input type="text"   class="input-block-level" placeholder="Ville" name="Ville"><br />
                                    <input type="text"  class="input-block-level" placeholder="Code Postal" name="CP"><br />
                                    
                                </div> <!-- /container -->
                            </td>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <input class="btn btn-large btn-primary" type="submit" name="submit" value="Valider">
                            </td>
                        </tr>
                    </table>
                </form>