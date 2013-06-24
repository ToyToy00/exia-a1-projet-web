<?php

class administration_pdo {
    
    function __construct()
    {
        
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
    
    public function select_all($titre)
    {
        $con = db::getInstance();
        $req = "SELECT ID_Article ,Theme, img, Prix, Type, Titre, Date_Edition, Description, Editeur, Seuil, Stock, Statut FROM articles WHERE Titre = '" . $titre . "'";
     
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
    
}
?>
