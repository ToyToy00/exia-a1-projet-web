<?php

class panier_pdo {
    
    function __construct()
    {
        
    }
    
    public function select_article($ID)
    {
        $con = db::getInstance();
        $req = "SELECT ID_Article,Titre,Prix,Type,Stock,Statut FROM Articles WHERE ID_Article = '".$ID."'";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function select_adresse()
    {
        $con = db::getInstance();
        
        $req = "SELECT ID_Adresse,Nom,Prenom,Adresse,Ville,CP FROM client,adresses WHERE client.ID_Client = adresses.ID_Client AND client.Email='" . $_SESSION['user']['user_info'] . "'";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function add_commande($ID_Client, $typecb)
    {
        $con = db::getInstance();
        $req = "INSERT INTO `exiastore`.`commandes` (`ID_Client`, `ID_Adresse`, `Date_Commande`, `Paiement`, `Statut_Commande`) VALUES ('$ID_Client', '0', CURRENT_TIMESTAMP, '" . $typecb . "', 'Preparation');";
        $exec = $con->exec($req);
        return $con->lastInsertId();
    }
    
    public function update_commande($ID_Commande, $ID_Adresse)
    {
        $con = db::getInstance();
        $req = "UPDATE commandes SET ID_Adresse = '$ID_Adresse' WHERE ID_Commande = '$ID_Commande'";
        $exec = $con->exec($req);
        return 1;
    }
    
    public function add_detail($ID_Commande, $ID_Article, $Quantite)
    {
        $con = db::getInstance();
        $req = "INSERT INTO `exiastore`.`detail_commande` (`ID_Commande`, `ID_Article`, `Quantite`) VALUES ('$ID_Commande', '$ID_Article', '$Quantite');";
        $exec = $con->exec($req);
        return $con->lastInsertId();
    }
    
    public function InsertAdresse($ID_Commande, $email, $adresse, $ville, $cp)
    {
        $con = db::getInstance();
        $req = "INSERT INTO adresses (ID_Client, ID_Commande, Adresse, Ville, CP) VALUES ((SELECT ID_Client FROM client WHERE Email = '" . $email ."'), '$ID_Commande','" . $adresse . "', '" . $ville . "', " . $cp . ")";
        $exec = $con->exec($req);
        return $con->lastInsertId();
        }
        public function ListeDeroulanteTypeCb()
    {
        $con = db::getInstance();
        $req = "SELECT typecb FROM typecb";
        $query = $con->query($req);
        return $query->fetchAll();
    }
}
?>
