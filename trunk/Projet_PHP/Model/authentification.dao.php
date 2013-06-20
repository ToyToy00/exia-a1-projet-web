<?php

class authentification_pdo {
    

    function __construct()
    {
    
    }
    
    public function VerifAuthentification($email, $mdp)
    {
        $con = db::getInstance();
        $req = "SELECT Email,Mdp,Admin FROM client WHERE Email='" . $email . "' AND Mdp='" . $mdp . "'";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function VerifInscription($email)
    {
        $con = db::getInstance($email);
        $req = "SELECT Email FROM client WHERE Email = '" . $email . " '";
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function InsertInscriptionClient($email, $mdp, $nom, $prenom)
    {
        $con = db::getInstance($email, $mdp, $nom, $prenom);
        $req = "INSERT INTO client (Email, Mdp, Nom, Prenom) VALUES ('" . $email . "', '" . $mdp . "', '" . $nom . "', '" . $prenom . "')";
        $exec = $con->exec($req);
        return 1;
        }
    
        public function InsertInscriptionAdresse($email, $adresse, $ville, $cp)
    {
        $con = db::getInstance($email, $adresse, $ville, $cp);
        $req = "INSERT INTO adresses (ID_Client, Adresse, Ville, CP) VALUES ((SELECT ID_Client FROM client WHERE Email = '" . $email ."'),'" . $adresse . "', '" . $ville . "', " . $cp . ")";
        $exec = $con->exec($req);
        return 1;
        }

}
?>
