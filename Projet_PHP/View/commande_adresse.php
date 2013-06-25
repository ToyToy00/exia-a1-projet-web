
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
                                    Coordonnées bancaires : <br /> <br />

                                    <table>
                                        
                                        <tr><td>Numero de carte</td><td>Cryptogramme</td></tr>
                                        <tr><td><input type="text" name="num_carte" placeholder="Numéro"></td><td><input type="text" name="crypto" placeholder="Cryptogramme">  </td></tr>
                                      
                            <select style="width: 50%;" id="typecb" name="typecb">
                            <?php
                            // On affiche chaque entrée une à une
                            foreach ($typecb as $key => $donnees) {
                                echo '<option value="' . $donnees['typecb'] . '">' . $donnees['typecb'] . '</option>'; //ou bien $donnees['monchamp']
                            }
                            ?>
                            </select>
                                        <tr><td>Date d'expiration </td><td> <input type="text" name="mois" placeholder="Mois">/<input type="text" name="annee" placeholder="Année"></td></tr>
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