<?php

class authentification_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {

        $this->registry->template->connect_nav = '<input type="text" class="txtbx_login" placeholder="Nom d\'utilisateur">
                        <input type="password" class="txtbx_login" placeholder="Mot de Passe">
                        <button type="submit" class="submit_login" class="btn">Se Connecter</button>';

        $this->registry->template->show('authentification');



        var_dump($_POST);
    }

    function login() {

        if (isset($_POST['comail'])) {
            $comail = ($_POST['comail']);
            $comdp = ($_POST['comdp']);

            if ($comail != '' && $comdp != '') {
                
                $resultat = $this->registry->db->authentification_pdo->VerifAuthentification($comail, $comdp);

                if ($resultat != '') {
                    //$_SESSION['user'] = array($comail, $comdp);
                    if($resultat['Admin'] == true)
                    {
                       // $_SESSION['admin'] = $_SESSION['user'];
                        echo "admin";
                    }
                    echo "ok";
                } else {
                    echo "Email ou mot de passe invalide";
                }
            } else {
                echo "Email ou mot de passe manquant";
            }
        }
    }
    
    function inscription() {
        if (isset($_POST['Email'])){
            $Email = ($_POST['Email']);
            $VerifEmail = ($_POST['VerifEmail']);
            $Nom = ($_POST['Nom']);
            $Prenom = ($_POST['Prenom']);
            $Mdp = ($_POST['Mdp']);
            $VerifMdp = ($_POST['VerifMdp']);
            $Adresse = ($_POST['Adresse']);
            $Ville = ($_POST['Ville']);
            $CP = ($_POST['CP']);
            
            if($Email != '' && $VerifEmail != '' && $Nom != '' && $Prenom != '' && $Mdp != '' && $VerifMdp != '' && $Adresse != '' && $Ville != '' && $CP != '')
            {
                $resultat = $this->registry->db->authentification_pdo->VerifInscription($Email);
                
                if ($resultat === false)
                {
                    $resultat = $this->registry->db->authentification_pdo->InsertInscriptionClient($Email, $Mdp, $Nom, $Prenom);
                    $resultat2 = $this->registry->db->authentification_pdo->InsertInscriptionAdresse($Adresse, $Ville, $CP);
                }
                else 
                {
                    echo "Login deja use";
                }
            }
            else 
            {
                echo "Champs non rempli";
            }
        }
        else {
            echo "error";
        }
    }

}
?>


