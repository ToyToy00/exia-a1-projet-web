<?php

class panier_pdo {
    
    function __construct()
    {
        
    }
    
    public function select_article($ID)
    {
        $con = db::getInstance();
        $req = "SELECT ID_Article,Titre,Prix,Type FROM Articles WHERE ID_Article = '".$ID."'";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function select_adresse()
    {
        $con = db::getInstance();
        
        $req = "SELECT Nom,Prenom,Adresse,Ville,CP FROM client,adresses WHERE client.ID_Client = adresses.ID_Client AND client.Email='" . $_SESSION['user']['user_info'] . "'";
        $query = $con->query($req);
        return $query->fetch();
    }
}
?>
