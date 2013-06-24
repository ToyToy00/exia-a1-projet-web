<?php

class panier_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        if (isset($_SESSION['user'])) {
            //$this->registry->db->panier_pdo->select_article($)
            $panier = array();
            foreach ($_SESSION['user']['panier'] as $key => $value) {
                $tab = $this->registry->db->panier_pdo->select_article($key);
                if ($tab != false) {
                    array_push($panier, $tab);
                }
            }
            if(!empty($panier))
            {
                $this->registry->template->submit_form = '<form method="POST" action="'.__SITE_URL.'/panier/commande"><input type="hidden" name="commande" value="1"><button type="submit" class="submit_login btn-primary btn_panier" class="btn">Commander</button> </form>';
            }else{
                $this->registry->template->submit_form = '';
            }
            $this->registry->template->panier_articles = $panier;
            $this->registry->template->show('panier');
        } else {

            $this->registry->template->message = "Vous n'êtes pas connecté";
            $this->registry->template->show('message');
        }
    }
    
    function commande()
    {
         if (isset($_SESSION['user']['panier'])) {
             if(isset($_POST['commande']))
             {
                 $tab = $this->registry->db->panier_pdo->select_adresse();
                 $this->registry->template->adresse = $tab;
                 $this->registry->template->show('commande_adresse');
             }
         }
    }

    function valider()
    {
         if (isset($_SESSION['user']['panier']) && isset($_POST['submit'])) {
             $num_carte = trim($_POST['num_carte']);
             $crypto = trim($_POST['crypto']);
             $mois = trim($_POST['mois']);
             $annee = trim($_POST['annee']);
             //vérifier que les champs pour la carte bleu ne sont pas vide
             if(is_numeric($num_carte) && is_numeric($crypto) && is_numeric($mois) && is_numeric($annee))
             {
                 
             }
             //vérifier l'adresse remplacer l'ancienne par la nouvelle dans la base
             //enregistrer la commande
         }
    }
    
    function add() {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            $_SESSION['user']['panier'][$_POST['id']] = 1;
            echo count($_SESSION['user']['panier'])-1;
        }
    }
    
    function plus()
    {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            $_SESSION['user']['panier'][$_POST['id']]++;
        }
    }
    function minus()
    {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            $_SESSION['user']['panier'][$_POST['id']]--;
        }
    }

    function del() {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            unset($_SESSION['user']['panier'][$_POST['id']]);
            
            foreach ($_SESSION['user']['panier']['articles'] as $key => $item) {
                if ($item['ID_Article'] === $_POST['id']) {
                    unset($_SESSION['user']['panier']['articles'][$key]);
                }
            }
            echo var_dump($_SESSION['user']['panier_calcul']);
        }
    }

}

?>
