<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<style type="text/css">
    body {
        margin-top: 20px;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        margin-right: 10px;
        padding: 7px 9px;
    }

</style>

</head>

<body>

    <div class="modal-form container">
        <center>
            <table>
                <tr>
                    <td>

                    </td>
                    <td>





                        <form class="form-signin" action="<?php echo __SITE_URL ?>/administration/ajoutarticle" method="POST" name="formAjoutArticle" style="display:inline-block;">
                            <h2 class="form-signin-heading">Ajouter un article</h2>
                            Thème
                            <input type="text"  class="input-block-level" placeholder="Thème" name="Theme">    
                            Image
                            <input type="text"  class="input-block-level" placeholder="Image" name="Image">
                            Prix
                            <input type="text"  class="input-block-level" placeholder="Prix" name="Prix">
                            Type 

                            </br>

<!--<input type="text"  class="input-block-level" placeholder="Type" name="Type">-->


                            <select id="Type" name="Type">
                                <?php
                                foreach ($ttype as $key => $donnees) {
                                    echo '<option selected value="' . $donnees['type'] . '">' . $donnees['type'] . '</option>'; //ou bien $donnees['monchamp']
                                }
                                ?>
                            </select>

                            </br>
                            Titre
                            <input type="text"  class="input-block-level" placeholder="Titre" name="Titre">
                            Date d'édition
                            <input type="date"  class="input-block-level" placeholder="Date d'édition" name="Date_Edition">
                            Description
                            <input type="text"  class="input-block-level" placeholder="Description" name="Description">     
                            Editeur
                            <input type="text"  class="input-block-level" placeholder="Editeur" name="Editeur">
                            Seuil
                            <input type="text"  class="input-block-level" placeholder="Seuil" name="Seuil">
                            Stock
                            <input type="text"  class="input-block-level" placeholder="Stock" name="Stock">
                            Statut
                            <input type="text"  class="input-block-level" placeholder="Statut" name="Statut">

                            <p></p>
                            <button class="btn btn-large btn-primary" type="submit" >Ajouter</button>
                    </td>
                    </form>  
                    </div>
                <div class ="form-signin">
                    <h2 class="form-signin-heading">Choisir un article</h2>
                    <form  action="<?php echo __SITE_URL ?>/administration/afficherarticle" method="POST" id="formList2" style="display:inline-block;">
                        <select onchange="document.getElementById('formList2').submit()" id="Titre" name="Titre">
                            <option disabled selected value='0'>Selectionner un article</option>
                            <?php
                        // On affiche chaque entrée une à une
                        foreach ($Titre as $keyy => $donneess) {

                            echo '<option value="' . $donneess['Titre'] . '" >' . $donneess['Titre'] . '</option>';
                        }
                        ?>
                        </select>
                    </form>

                </div>

                <td>
                    <div class="form-signin">
                        <h2 class="form-signin-heading">Modifier un article</h2>

                        <form action="<?php echo __SITE_URL ?>/administration/modifierarticle" method="POST" name="formModifierArticle" style="display:inline-block;">

                            <input  name="ID_Article" id="ID_Article" type="text"  class="input-block-level" placeholder="ID" value="<?php echo $id_article; ?>">
                            Thème
                            <input type="text"  class="input-block-level" placeholder="Thème" name="Theme" value="<?php echo $theme; ?>">    
                            Image
                            <input type="text"  class="input-block-level" placeholder="Image" name="Image" value="<?php echo $img; ?>">
                            Prix
                            <input type="text"  class="input-block-level" placeholder="Prix" name="Prix" value="<?php echo $prix; ?>">
                            Type
                            </br>

                            <select style="width: 50%;" id="Type" name="Type">
                            <?php
                            // On affiche chaque entrée une à une
                            foreach ($ttype as $key => $donnees) {
                                echo '<option value="' . $donnees['type'] . '">' . $donnees['type'] . '</option>'; //ou bien $donnees['monchamp']
                            }
                            ?>
                            </select>

                            <input type="text" style="width: 40%"  class="input-block-level" placeholder="Type" name="Type" disabled value="<?php echo $type; ?>">
                            Titre

                            <input type="text"  class="input-block-level" placeholder="Titre" name="Titre" value="<?php echo $titre; ?>">
                            Date d'édition
                            <input type="date"  class="input-block-level" placeholder="Date d'édition" name="Date_Edition" value="<?php echo $date_edition; ?>">
                            Description
                            <input type="text"  class="input-block-level" placeholder="Description" name="Description" value="<?php echo $description; ?>">     
                            Editeur
                            <input type="text"  class="input-block-level" placeholder="Editeur" name="Editeur" value="<?php echo $editeur; ?>">
                            Seuil
                            <input type="text"  class="input-block-level" placeholder="Seuil" name="Seuil" value="<?php echo $seuil; ?>">
                            Stock
                            <input type="text"  class="input-block-level" placeholder="Stock" name="Stock" value="<?php echo $stock; ?>">
                            Statut
                            <input type="text"  class="input-block-level" placeholder="Statut" name="Statut" value="<?php echo $statut; ?>">


                            <button class="btn btn-large btn-primary" type="submit" >Modifier</button>
                        </form>  
                    </div>
                </td>
                <td>
                    <div class="form-signin">
                        <h2 class="form-signin-heading">Supprimer un article</h2>

                        <form action="<?php echo __SITE_URL ?>/administration/supprimerarticle" method="POST" name="formSupprimerArticle" style="display:inline-block;">

                            <input  name="ID_Article2" id="ID_Article2"  type="text"  class="input-block-level" placeholder="ID"  value="<?php echo $id_article; ?>">
                            Thème
                            <input type="text"  class="input-block-level" placeholder="Thème" name="STheme" disabled value="<?php echo $theme; ?>">    
                            Image
                            <input type="text"  class="input-block-level" placeholder="Image" name="Image" disabled value="<?php echo $img; ?>">
                            Prix
                            <input type="text"  class="input-block-level" placeholder="Prix" name="Prix" disabled value="<?php echo $prix; ?>">
                            Type
                            </br>

                            <input type="text"  class="input-block-level" placeholder="Type" name="Type" disabled disabled value="<?php echo $type; ?>">
                            Titre

                            <input type="text"  class="input-block-level" placeholder="Titre" name="Titre" disabled value="<?php echo $titre; ?>">
                            Date d'édition
                            <input type="date"  class="input-block-level" placeholder="Date d'édition" disabled name="Date_Edition" value="<?php echo $date_edition; ?>">
                            Description
                            <input type="text"  class="input-block-level" placeholder="Description" disabled name="Description" value="<?php echo $description; ?>">     
                            Editeur
                            <input type="text"  class="input-block-level" placeholder="Editeur" disabled name="Editeur" value="<?php echo $editeur; ?>">
                            Seuil
                            <input type="text"  class="input-block-level" placeholder="Seuil" disabled name="Seuil" value="<?php echo $seuil; ?>">
                            Stock
                            <input type="text"  class="input-block-level" placeholder="Stock" disabled name="Stock" value="<?php echo $stock; ?>">
                            Statut
                            <input type="text"  class="input-block-level" placeholder="Statut" disabled name="Statut" value="<?php echo $statut; ?>">


                            <button class="btn btn-large btn-primary" type="submit" >Supprimer</button>
                        </form>  
                    </div>
                </td>
                <td>
                    <div class="form-signin">
                        <h2 class="form-signin-heading">Modifier l'état d'une commande</h2>

                        
                            <form  action="<?php echo __SITE_URL ?>/administration/affichercommande" method="POST" id="formList4" style="display:inline-block;">
                        <select onchange="document.getElementById('formList4').submit();" name="ID_Commande">
                            <option disabled selected value='0'>Selectionner une commande à modifier</option>
                            <?php
                        // On affiche chaque entrée une à une
                        foreach($ID_Commande as $key => $donnees) {

                            echo '<option value="' . $donnees['ID_Commande'] . '" >' . $donnees['ID_Commande'] . '</option>';
                        }
                        ?>
                        </select>
                    </form>
                            <form  action="<?php echo __SITE_URL ?>/administration/modifiercommande" method="POST" name="formModifierCommande" style="display:inline-block;">

                            
                            <input type="text"  class="input-block-level" name="ID_Commandee" id="ID_Article3" value="<?php echo $ID_Commandee; ?>">    
                            
                            ID Client
                            <input type="text"  class="input-block-level" disabled placeholder="ID Client" name="ID_Client" value="<?php echo $ID_Client; ?>">    
                            ID Adresse
                            <input type="text"  class="input-block-level" disabled placeholder="ID Adresse" name="ID_Adresse" value="<?php echo $ID_Adresse; ?>">
                            Date de la commande
                            <input type="text"  class="input-block-level" disabled placeholder="Date de la commande" name="Date_Commande" value="<?php echo $Date_Commande; ?>">
                            Paiment
                            <input type="text"  class="input-block-level" disabled placeholder="Moyen de paiement" name="Paiement" value="<?php echo $Paiement; ?>">
                            Statut de la commande
                            <input type="text"  class="input-block-level" disabled placeholder="Statut de la commande" name="Statut_Commande" value="<?php echo $Statut_Commande; ?>">
                            
                           
                            Nouveau statut de la commande
                            
                            <select   name="statut_commande">
                                <option disabled selected value='0'>Nouveau statut de la commande</option>
                            <?php
                            // On affiche chaque entrée une à une
                            foreach ($statut_commande as $key => $donnees) {
                                echo '<option value="' . $donnees['statut_commande'] . '">' . $donnees['statut_commande'] . '</option>'; //ou bien $donnees['monchamp']
                            }
                            ?>
                            </select>
                            

                          

                            <button class="btn btn-large btn-primary" type="submit" >Modifier</button>
                        </form>  
                    </div>
                </td>
                </tr>
            </table>
        </center>

        <script>
                            document.getElementById("ID_Article").style.display = 'none';
                            document.getElementById("ID_Article2").style.display = 'none';
                            document.getElementById("ID_Article3").style.display = 'none';
        </script>

    </div> <!-- /container -->
