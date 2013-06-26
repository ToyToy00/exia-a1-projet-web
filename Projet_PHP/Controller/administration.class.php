<?php

class administration_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        if (isset($_SESSION['user']['user_admin'])) {
            $this->init();
            $tab = $this->registry->db->administration_pdo->select_seuil_stock();
            $temp = '';
            foreach ($tab as $key => $value) {
                if ($value['Stock'] < $value['Seuil']) {
                    $temp .= '<script> alert("Il faut commander l\'article ID :  ' . $value['ID_Article'] . '"); </script>';
                }
            }
            $this->registry->template->alert = $temp;

            $this->registry->template->show('administration');
        } else {
            $this->registry->template->message = "Vous n'êtes pas un admin";
            $this->registry->template->show('message');
        }
    }

    function init() {
        $this->registry->template->id_article = '';
        $this->registry->template->theme = '';
        $this->registry->template->img = '';
        $this->registry->template->prix = '';
        $this->registry->template->type = '';
        $this->registry->template->titre = '';
        $this->registry->template->date_edition = '';
        $this->registry->template->description = '';
        $this->registry->template->editeur = '';
        $this->registry->template->seuil = '';
        $this->registry->template->stock = '';
        $this->registry->template->statut = '';
        $this->registry->template->Statut_Commande = '';
        $this->registry->template->ID_Client = '';
        $this->registry->template->ID_Adresse = '';
        $this->registry->template->Date_Commande = '';
        $this->registry->template->Paiement = '';
        $this->registry->template->ID_Commande = '';
        $this->registry->template->statut_commande = '';
        $this->registry->template->ID_Commandee = '';
        $this->registry->template->alert = '';
        $this->registry->template->statut_article ='';

        $reponse = $this->registry->db->administration_pdo->ListeDeroulanteType();
        $reponse2 = $this->registry->db->administration_pdo->ListeDeroulanteArticle();
        $reponse3 = $this->registry->db->administration_pdo->ListeDeroulanteArticle();
        $reponse4 = $this->registry->db->administration_pdo->ListeDeroulanteCommande();
        $reponse5 = $this->registry->db->administration_pdo->ListeDeroulanteStatut();
        $reponse6 = $this->registry->db->administration_pdo->ListeDeroulanteStatutArticle();


        $this->registry->template->ttype = $reponse;
        $this->registry->template->Titre = $reponse2;
        $this->registry->template->TTitre = $reponse3;
        $this->registry->template->ID_Commande = $reponse4;
        $this->registry->template->statut_commande = $reponse5;
        $this->registry->template->statut_article = $reponse6;
    }

    function ajoutarticle() {
        if (isset($_SESSION['user']['user_admin'])) {

            $this->init();

            $Theme = ($_POST['Theme']);
            $Image = ($_POST['Image']);
            $Prix = ($_POST['Prix']);
            $Type = ($_POST['Type']);
            $Titre = ($_POST['Titre']);
            $Date_Edition = ($_POST['Date_Edition']);
            $Description = ($_POST['Description']);
            $Editeur = ($_POST['Editeur']);
            $Seuil = ($_POST['Seuil']);
            $Stock = ($_POST['Stock']);
            $Statut = ($_POST['Statut']);

            if ($Theme != '' && $Image != '' && $Prix != '' && $Type != '' && $Titre != '' && $Date_Edition != '' && $Description != '' && $Editeur != '' && $Seuil != '' && $Stock != '' && $Statut != '' && is_numeric($Prix) && is_numeric($Seuil) && is_numeric($Stock)) {

                $resultat = $this->registry->db->administration_pdo->InsertAjoutArticle($Theme, $Image, $Prix, $Type, $Titre, $Date_Edition, $Description, $Editeur, $Seuil, $Stock, $Statut);

                $reponse = $this->registry->db->administration_pdo->ListeDeroulanteType();
                $this->registry->template->type = $reponse;
                echo "<script> alert('Succès') </script>";
                $this->registry->template->ID_CommandeString = '';
                $this->init();

                $this->registry->template->show('administration');
            } else {
                echo "<script> alert('Champs non remplis') </script>";
                $this->registry->template->ID_CommandeString = '';
                $this->init();

                $this->registry->template->show('administration');
            }
        } else {
            $this->registry->template->show('administration');
        }
    }

    function afficherarticle() {
        if (isset($_SESSION['user']['user_admin'])) {
            $this->init();

            $titrearticle = $_POST['Titre'];

            $tab = $this->registry->db->administration_pdo->select_all($titrearticle);

            $this->registry->template->id_article = $tab['ID_Article'];
            $this->registry->template->theme = $tab['Theme'];
            $this->registry->template->img = $tab['img'];
            $this->registry->template->prix = $tab['Prix'];
            $this->registry->template->type = $tab['Type'];
            $this->registry->template->titre = $tab['Titre'];
            $this->registry->template->date_edition = $tab['Date_Edition'];
            $this->registry->template->description = $tab['Description'];
            $this->registry->template->editeur = $tab['Editeur'];
            $this->registry->template->seuil = $tab['Seuil'];
            $this->registry->template->stock = $tab['Stock'];
            $this->registry->template->statut = $tab['Statut'];
            $this->registry->template->ID_CommandeString = '';

            $this->registry->template->show('administration');
        } else {
            $this->registry->template->message = "Vous n'êtes pas un admin";
            $this->registry->template->show('message');
        }
    }

    function modifierarticle() {
        if (isset($_SESSION['user']['user_admin'])) {
            $id_article = ($_POST['ID_Article']);
            $theme = ($_POST['Theme']);
            $image = ($_POST['Image']);
            $prix = ($_POST['Prix']);
            $type = ($_POST['Type']);
            $titre = ($_POST['Titre']);
            $date_edition = ($_POST['Date_Edition']);
            $description = ($_POST['Description']);
            $editeur = ($_POST['Editeur']);
            $seuil = ($_POST['Seuil']);
            $stock = ($_POST['Stock']);
            $statut = ($_POST['statut_article']);

            if ($theme != '' && $image != '' && $prix != '' && $type != '' && $titre != '' && $date_edition != '' && $description != '' && $editeur != '' && $seuil != '' && $stock != '' && $statut != '' && is_numeric($prix) && is_numeric($seuil) && is_numeric($stock)) {
                $resultat = $this->registry->db->administration_pdo->UpdateArticle($id_article, $theme, $image, $prix, $type, $titre, $date_edition, $description, $editeur, $seuil, $stock, $statut);
                echo "<script> alert('Succès') </script>";
                $this->registry->template->ID_CommandeString = '';
                $this->init();

                $this->registry->template->show('administration');
            } else {    
                echo "<script> alert('Champs non remplis ou mal renseigné') </script>";
                $this->registry->template->ID_CommandeString = '';
                $this->init();

                $this->registry->template->show('administration');
            }
        } else {
            $this->registry->template->show('administration');
        }
    }

    function supprimerarticle() {
        if (isset($_SESSION['user']['user_admin'])) {

            $id_article = ($_POST['ID_Article2']);

            $resultat = $this->registry->db->administration_pdo->SupprimerArticle($id_article);

            echo "<script> alert('Succès') </script>";
            $this->registry->template->ID_CommandeString = '';
            $this->init();

            $this->registry->template->show('administration');
        }
    }

    function modifiercommande() {
        if (isset($_SESSION['user']['user_admin'])) {
            $idcommande = ($_POST['ID_Commande']);
            $statut_commande = ($_POST['statut_commande']);

            if ($statut_commande == 'Envoyee') {
                $detail_commandes = $this->registry->db->administration_pdo->Detail_commande($idcommande);

                $verif = 0;
                foreach ($detail_commandes as $key => $value) {
                    if ($value['Stock'] < 0) {
                        $verif = 1;
                    }
                }
                if ($verif != 1) {
                    foreach ($detail_commandes as $key => $value) {
                        $this->registry->db->administration_pdo->update_stock($value['ID_Article'], $value['Quantite']);
                    }
                    $resultat = $this->registry->db->administration_pdo->UpdateCommande($idcommande, $statut_commande);
                }
            }

            echo "<script> alert('Succes') </script>";

            $this->init();

            $this->registry->template->show('administration');
        } else {
            echo 'ttestt';
        }
    }

    function affichercommande() {
        if (isset($_SESSION['user']['user_admin'])) {
            $this->init();

            $id_commande = $_POST['ID_Commande'];

            $tab = $this->registry->db->administration_pdo->select_all_commande($id_commande);

            $this->registry->template->ID_Commandee = $tab['ID_Commande'];
            $this->registry->template->ID_Client = $tab['ID_Client'];
            $this->registry->template->ID_Adresse = $tab['ID_Adresse'];
            $this->registry->template->Date_Commande = $tab['Date_Commande'];
            $this->registry->template->Paiement = $tab['Paiement'];
            $this->registry->template->Statut_Commande = $tab['Statut_Commande'];


            $this->registry->template->show('administration');
        } else {
            $this->registry->template->message = "Vous n'êtes pas un admin";
            $this->registry->template->show('message');
        }
    }

}

?>
