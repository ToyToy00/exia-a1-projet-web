<?php

class membre_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        if (isset($_SESSION['user'])) {
            $tab = $this->registry->db->membre_pdo->RemplirChamps();
            $_SESSION['user']['Email'] = $tab['Email'];
            $_SESSION['user']['Mdp'] = $tab['Mdp'];
            $_SESSION['user']['Nom'] = $tab['Nom'];
            $_SESSION['user']['Prenom'] = $tab['Prenom'];
            $_SESSION['user']['Adresse'] = $tab['Adresse'];
            $_SESSION['user']['Ville'] = $tab['Ville'];
            $_SESSION['user']['CP'] = $tab['CP'];
            $this->registry->template->show('membre');
        } else {

            $this->registry->template->message = "Vous n'êtes pas connecté";
            $this->registry->template->show('message');
        }
    }
    
    function commande($ID_Commande = NULL)
    {
        if (isset($_SESSION['user'])) {
            
            
           
            if($ID_Commande != NULL)
            {
                $detail_commandes = $this->registry->db->membre_pdo->Detail_commande($ID_Commande);
             
                $bouyou = '';
                foreach ($detail_commandes as $key => $value) {
                         $bouyou = $bouyou.'<tr><td>'.$value['Titre'].'</td><td>'.$value['Prix'].'</td><td><a href="'. __SITE_URL .'/membre/commande/'.$value['ID_Commande'].'" title="voir detail" data-toggle="modal" data-target="#modal" class="LienModal" rel="1">Detail</a></td></tr>';
                         
                     }
                     $this->registry->template->commandes = $bouyou;
                     $this->registry->template->showu('facture');
                
            }else{
                $commandes = $this->registry->db->membre_pdo->List_commande();
                $bouyou = '';
                foreach ($commandes as $key => $value) {
                         $bouyou = $bouyou.'<tr><td>'.$value['Date_Commande'].'</td><td>'.$value['Statut_Commande'].'</td><td><a href="'. __SITE_URL .'/membre/commande/'.$value['ID_Commande'].'" title="voir detail" data-toggle="modal" data-target="#modal" class="LienModal" rel="1">Detail</a></td></tr>';
                         
                     }
                     $this->registry->template->commandes = $bouyou;
                  
                $this->registry->template->show('facture');
            }
            
            
        }
        
    }
    
    function logout() {
        session_unset();
        session_destroy();
        $this->registry->template->message = "Vous êtes déconnecté";
        $this->registry->template->show('message');
    }

    function modificationClient() {
        if (isset($_POST['Email'])) {
            $Email = ($_POST['Email']);
            $VerifEmail = ($_POST['VerifEmail']);
            $Nom = ($_POST['Nom']);
            $Prenom = ($_POST['Prenom']);
            $Mdp = ($_POST['Mdp']);
            $VerifMdp = ($_POST['VerifMdp']);

            if ($Email != '' && $VerifEmail != '' && $Nom != '' && $Prenom != '' && $Mdp != '' && $VerifMdp != '' && $Mdp === $VerifMdp && $Email === $VerifEmail) {
                $resultat = $this->registry->db->membre_pdo->UpdateClient($Email, $Mdp, $Nom, $Prenom);
                echo "<script> alert('Succès') </script>";
                $tab = $this->registry->db->membre_pdo->RemplirChamps();
                $_SESSION['user']['Email'] = $tab['Email'];
                $_SESSION['user']['Mdp'] = $tab['Mdp'];
                $_SESSION['user']['Nom'] = $tab['Nom'];
                $_SESSION['user']['Prenom'] = $tab['Prenom'];
                $_SESSION['user']['Adresse'] = $tab['Adresse'];
                $_SESSION['user']['Ville'] = $tab['Ville'];
                $_SESSION['user']['CP'] = $tab['CP'];
                $this->registry->template->show('membre');
            } else {
                echo "<script> alert('Champs non remplis ou mal renseignés') </script>";
                $tab = $this->registry->db->membre_pdo->RemplirChamps();
                $_SESSION['user']['Email'] = $tab['Email'];
                $_SESSION['user']['Mdp'] = $tab['Mdp'];
                $_SESSION['user']['Nom'] = $tab['Nom'];
                $_SESSION['user']['Prenom'] = $tab['Prenom'];
                $_SESSION['user']['Adresse'] = $tab['Adresse'];
                $_SESSION['user']['Ville'] = $tab['Ville'];
                $_SESSION['user']['CP'] = $tab['CP'];
                $this->registry->template->show('membre');
            }
        } else {
            $this->registry->template->show('membre');
        }
    }

    function modificationAdresse() {
        if (isset($_POST['Adresse'])) {
            $Adresse = ($_POST['Adresse']);
            $Ville = ($_POST['Ville']);
            $CP = ($_POST['CP']);

            if ($Adresse != '' && $Ville != '' && $CP != '' && is_numeric($CP)) {
                $resultat = $this->registry->db->membre_pdo->UpdateAdresse($Adresse, $Ville, $CP);
                echo "<script> alert('Succès') </script>";
                $tab = $this->registry->db->membre_pdo->RemplirChamps();
                $_SESSION['user']['Email'] = $tab['Email'];
                $_SESSION['user']['Mdp'] = $tab['Mdp'];
                $_SESSION['user']['Nom'] = $tab['Nom'];
                $_SESSION['user']['Prenom'] = $tab['Prenom'];
                $_SESSION['user']['Adresse'] = $tab['Adresse'];
                $_SESSION['user']['Ville'] = $tab['Ville'];
                $_SESSION['user']['CP'] = $tab['CP'];
                $this->registry->template->show('membre');
            } else {
                echo "<script> alert('Champs non remplis ou mal renseigné') </script>";
                $tab = $this->registry->db->membre_pdo->RemplirChamps();
                $_SESSION['user']['Email'] = $tab['Email'];
                $_SESSION['user']['Mdp'] = $tab['Mdp'];
                $_SESSION['user']['Nom'] = $tab['Nom'];
                $_SESSION['user']['Prenom'] = $tab['Prenom'];
                $_SESSION['user']['Adresse'] = $tab['Adresse'];
                $_SESSION['user']['Ville'] = $tab['Ville'];
                $_SESSION['user']['CP'] = $tab['CP'];
                $this->registry->template->show('membre');
            }
        } else {
            $this->registry->template->show('membre');
        }
    }

}
?>


