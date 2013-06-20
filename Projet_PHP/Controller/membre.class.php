<?php

class membre_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        if(isset($_SESSION['user']))
        {
           $tab = $this->registry->db->membre_pdo->RemplirChamps();
           $_SESSION['user']['Email'] = $tab['Email'];
           $_SESSION['user']['Mdp'] = $tab['Mdp'];
           $_SESSION['user']['Nom'] = $tab['Nom'];
           $_SESSION['user']['Prenom'] = $tab['Prenom'];
           $_SESSION['user']['Adresse'] = $tab['Adresse'];
           $_SESSION['user']['Ville'] = $tab['Ville'];
           $_SESSION['user']['CP'] = $tab['CP'];
            $this->registry->template->show('membre');
            
        }else{
           
        $this->registry->template->message = "Vous n'êtes pas connecté";
            $this->registry->template->show('message');
        }
    }
    function logout()
    {
        session_unset();
        session_destroy();
        $this->registry->template->message = "Vous êtes déconnecté";
            $this->registry->template->show('message');
    }
    
    function modificationClient()
    {
        if (isset($_POST['Email'])){
            $Email = ($_POST['Email']);
            $VerifEmail = ($_POST['VerifEmail']);
            $Nom = ($_POST['Nom']);
            $Prenom = ($_POST['Prenom']);
            $Mdp = ($_POST['Mdp']);
            $VerifMdp = ($_POST['VerifMdp']);
            
            if($Email != '' && $VerifEmail != '' && $Nom != '' && $Prenom != '' && $Mdp != '' && $VerifMdp != '')
            {
                $resultat = $this->registry->db->membre_pdo->UpdateClient($Email, $Mdp, $Nom, $Prenom);
                
            }
            else 
            {
               $this->registry->template->message = "Champs non rempli";
            }
            $this->registry->template->message = "Succés";
            $this->registry->template->show('message');
        }else{
        $this->registry->template->show('membre');
        }
    }
    
    function modificationAdresse()
    {
        if (isset($_POST['Adresse'])){
            $Adresse = ($_POST['Adresse']);
            $Ville = ($_POST['Ville']);
            $CP = ($_POST['CP']);
            
            if($Adresse != '' && $Ville != '' && $CP != '')
            {
                $resultat = $this->registry->db->membre_pdo->UpdateAdresse($Adresse, $Ville, $CP);
            }
            else 
            {
               $this->registry->template->message = "Champs non rempli";
            }
            $this->registry->template->message = "Succés";
            $this->registry->template->show('message');
        }else{
        $this->registry->template->show('membre');
        }
    }

}
?>


