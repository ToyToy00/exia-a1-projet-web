

            <div class="span9">
                <div class="modal-body">
                    <div class="well">
                        <div class="inline-block well_blanc"><h2><?php echo $article['Titre']; ?></h2></br>
                                  <img class=" well img_detail_article"  alt="" src="<?php echo __SITE_URL . '/' . $article['img']; ?> " href="#"/>
                                  <div class="well detail_detail_article pull-right">
                                      <p>Prix de la livraison : Gratuit</br></br> Stock : <?php echo $article['Statut']; ?></br> </br> </br> Label : <?php echo $article['Editeur']; ?></br> </br> Date de sortie : <?php echo $article['Date_Edition']; ?></p>
                                      <button href=""  name="btn_add_panier" class="btn_add_panier_detail btn-primary">Ajouter au panier</button>
                                  </div>
                                      
                                      
                                      <p><?php echo $article['Description']; ?></p>
                                      
                                      <p>Pour seulement <span style="color:red"><?php echo $article['Prix']; ?>E</span></p>
                                    
                                      
                        </div>
                    </div>
                    
                </div>
            </div>
            
            

    