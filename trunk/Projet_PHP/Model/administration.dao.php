<?php

class administration_pdo {
    
    function __construct()
    {
        
    }
    
    public function select_seuil_stock()
    {
        $con = db::getInstance();
        $req = "SELECT ID_Article,Seuil,Stock FROM articles";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function Detail_commande($ID_Commande)
    {
        $con = db::getInstance();
        $req = "SELECT * FROM `detail_commande` INNER JOIN articles ON detail_commande.ID_Article = articles.ID_Article WHERE ID_Commande = $ID_Commande";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    public function update_stock($ID_Article, $Quantite)
    {
        $con = db::getInstance();
        $req = "UPDATE  exiastore.articles SET Stock = Stock - $Quantite WHERE ID_Article = $ID_Article";
        $exec = $con->exec($req);
        return 1;
    }
    
    public function ListeDeroulanteType()
    {
        $con = db::getInstance();
        $req = "SELECT type FROM type";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function ListeDeroulanteArticle()
    {
        $con = db::getInstance();
        $req = "SELECT Titre FROM articles";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function ListeDeroulantePreparation()
    {
        $con = db::getInstance();
        $req = "SELECT Statut_Commande FROM Commandes";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function ListeDeroulanteCommande()
    {
        $con = db::getInstance();
        $req = "SELECT ID_Commande FROM commandes WHERE Statut_Commande != 'Envoyee'";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function ListeDeroulanteStatut(){
     $con = db::getInstance();
        $req = "SELECT statut_commande FROM statut_commande";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function select_all($titre)
    {
        $con = db::getInstance();
        $req = "SELECT ID_Article ,Theme, img, Prix, Type, Titre, Date_Edition, Description, Editeur, Seuil, Stock, Statut FROM articles WHERE Titre = '" . $titre . "'";
     
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function select_all_commande($idcommande)
    {
        $con = db::getInstance();
        $req = "SELECT * FROM commandes WHERE ID_Commande = " . $idcommande . "";
     
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function InsertAjoutArticle($theme, $img, $prix, $type, $titre, $date_edition, $description, $editeur, $seuil, $stock, $statut)
    {
        $con = db::getInstance();
        $req = "INSERT INTO articles( Theme, img, Prix, Type, Titre, Date_Edition, Description, Editeur, Seuil, Stock, Statut) VALUES ('" . $theme . "' , '" . $img . "', '" . $prix . "' , '" . $type . "' , '" . $titre . "' , '" . $date_edition . "' , '" . $description . "' , '" . $editeur . "' , " . $seuil . ", " . $stock . ", '" . $statut . "')";
        $exec = $con->exec($req);
        return 1;
        }
        
        public function UpdateArticle($id_article, $theme, $img, $prix, $type, $titre, $date_edition, $description, $editeur, $seuil, $stock, $statut)
    {
        $con = db::getInstance();
        $req = "UPDATE  exiastore.articles SET Theme =  '" . $theme . "',img =  '" . $img . "',Prix = " . $prix . ",Type =  '" . $type ."' ,Titre =  '" . $titre . "',Date_Edition =  '" . $date_edition . "',Description = '" . $description . "'  ,Editeur =  '" . $editeur . "',Seuil =  " . $seuil . ",Stock =  " . $stock . ",Statut = '" . $statut . "' WHERE ID_Article = '" . $id_article . "'";
        $exec = $con->exec($req);
        return 1;
    }
    
    public function SupprimerArticle($id_article)
    {
        $con = db::getInstance();
        $req = "DELETE FROM exiastore.articles WHERE articles.ID_Article = " . $id_article . "";
        $exec = $con->exec($req);
        return 1;
    }
    
    public function UpdateCommande($id_commande, $statutCommande)
    {
        $con = db::getInstance();
        $req = "UPDATE  exiastore.commandes SET  Statut_Commande =  '" . $statutCommande . "' WHERE commandes.ID_Commande = '" . $id_commande . "'";
        $exec = $con->exec($req);
        return 1;
    }
    
}
?>
