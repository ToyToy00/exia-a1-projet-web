<?php

class membre_pdo {
    

    function __construct()
    {
    
    }
    
    public function RemplirChamps()
    {
        $con = db::getInstance();
        $req = "SELECT Email,Mdp,Nom,Prenom,Adresse,Ville,CP FROM client,adresses WHERE client.ID_Client = adresses.ID_Client AND client.Email='" . $_SESSION['user']['user_info'] . "'";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function Detail_commande($ID_Commande)
    {
        $con = db::getInstance();
        $req = "SELECT * FROM `detail_commande` INNER JOIN articles ON detail_commande.ID_Article = articles.ID_Article WHERE ID_Commande = $ID_Commande";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function List_commande()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM `commandes` WHERE ID_Client = '" . $_SESSION['user']['user_id'] ."'";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    
    public function UpdateAdresse($adresse, $ville, $cp)
    {
        $con = db::getInstance();
        $req = "UPDATE  exiastore.adresses SET Adresse = '" . $adresse . "' , Ville =  '" . $ville . "' ,  CP = " . $cp . " WHERE ID_Client = (SELECT ID_Client FROM client WHERE client.Email= '" .$_SESSION['user']['user_info'] . "')";
        $exec = $con->exec($req);
        return 1;
    }
    
    public function UpdateClient($email, $mdp, $nom, $prenom)
    {
        $con = db::getInstance();
        $req = "UPDATE  exiastore.client SET Email = '" . $email . "' , Mdp =  '" . $mdp . "' ,  Nom = '" . $nom . "' , Prenom = '" . $prenom . "' WHERE  client.Email='". $_SESSION['user']['user_info'] . "'";
        $exec = $con->exec($req);
        return 1;
        }

}
?>
