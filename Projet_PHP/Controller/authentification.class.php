<?php

class authentification_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {

        $this->registry->template->show('authentification');

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
                    $this->registry->template->message = "Yes";
                } else {
                    $this->registry->template->message = "Email ou mot de passe invalide";
                }
            } else {
                $this->registry->template->message = "Email ou mot de passe manquant";
            }
            $this->registry->template->show('message');
        }else{
        $this->registry->template->show('authentification');
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
                    $this->registry->template->message = "Login deja use";
                }
            }
            else 
            {
                $this->registry->template->message = "Champs non rempli";
            }
            $this->registry->template->show('message');
        }else{
        $this->registry->template->show('authentification');
        }
    }

}
?>


