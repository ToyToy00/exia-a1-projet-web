<?php

class panier_class extends router {

    protected $registry;
    private $total;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {

        if (isset($_SESSION['user']['panier'])) {
            //$this->registry->db->panier_pdo->select_article($)


            $panier = array();

            foreach ($_SESSION['user']['panier'] as $key => $value) {
                $tab = $this->registry->db->panier_pdo->select_article($key);
                if ($tab != false) {
                    array_push($panier, $tab);
                    $this->total = $this->total + $tab['Prix'] * $_SESSION['user']['panier'][$tab['ID_Article']];
                }
            }
            if (!empty($panier)) {
                $this->registry->template->submit_form = '<form method="POST" action="' . __SITE_URL . '/panier/commande"><input type="hidden" name="commande" value="1"><button type="submit" class="submit_login btn-primary btn_panier" class="btn">Commander</button> </form>';
            } else {
                $this->registry->template->submit_form = '';
            }
            $this->registry->template->panier_articles = $panier;
            $this->registry->template->total = $this->total;
            $_SESSION['user']['panier']['total'] = $this->total;
            $this->registry->template->show('panier');
        } else {

            $this->registry->template->message = "Aucun article dans le panier.";
            $this->registry->template->show('message');
        }
    }

    function commande() {
        if (isset($_SESSION['user']['panier'])) {
            if (isset($_POST['commande'])) {
                $reponse = $this->registry->db->panier_pdo->ListeDeroulanteTypeCb();
                $this->registry->template->typecb = $reponse;
                $tab = $this->registry->db->panier_pdo->select_adresse();
                $this->registry->template->adresse = $tab;
                $this->registry->template->show('commande_adresse');
            }
        }
    }

    function valider() {
        if (isset($_SESSION['user']['panier']) && isset($_POST['submit'])) {

//            $reponse = $this->registry->db->panier_pdo->ListeDeroulanteTypeCb();
//            $this->registry->template->typecb = $reponse;

            $typecb = ($_POST['typecb']);
            $num_carte = trim($_POST['num_carte']);
            $crypto = trim($_POST['crypto']);
            $mois = trim($_POST['mois']);
            $annee = trim($_POST['annee']);
            $adresse = htmlspecialchars($_POST['Adresse']);
            $ville = htmlspecialchars($_POST['Ville']);
            $cp = intval($_POST['CP']);

            //vérifier que les champs pour la carte bleu ne sont pas vide
            if (is_numeric($num_carte) && is_numeric($crypto) && is_numeric($mois) && is_numeric($annee) && strlen($num_carte) == 10 && strlen($crypto) == 3) {

                //enregistrer la commande
                $id_commande = $this->registry->db->panier_pdo->add_commande($_SESSION['user']['user_id'], $typecb);

                if (is_numeric($id_commande)) {

                    //récupération de l'id de l'adresse et ajout si nouvelle
                    if (!empty($adresse) && !empty($ville) && !empty($cp)) {
                        $id_adresse = $this->registry->db->panier_pdo->InsertAdresse($id_commande, $_SESSION['user']['user_info'], $adresse, $ville, $cp);
                    } else {
                        $temp = $this->registry->db->panier_pdo->select_adresse();
                        $id_adresse = $temp['ID_Adresse'];
                    }

                    //insertion du détail de la commande
                    foreach ($_SESSION['user']['panier'] as $key => $value) {
                        if (is_numeric($key)) {
                            $i = 0;
                            $tab = $this->registry->db->panier_pdo->select_article($key);
                            if ($tab['Stock'] > $value[$key] && $i == 0) {
                                $nb_prepa = 1;
                            } else {
                                $i = 1;
                                $nb_prepa = 3;
                            }
                            $this->registry->db->panier_pdo->update_commande($id_commande, $id_adresse);
                            $this->registry->db->panier_pdo->add_detail($id_commande, $key, $_SESSION['user']['panier'][$key]);
                        }
                    }

                    $this->registry->template->date_reception = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + (2 + $nb_prepa), date("Y")));
                    $this->registry->template->total = $_SESSION['user']['panier']['total'];
                    $this->registry->template->show('finish_commande');
                    unset($_SESSION['user']['panier']);
                }
            }
        }
    }

    function add() {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            $_SESSION['user']['panier'][$_POST['id']] = 1;
            $count = 0;
            if (isset($_SESSION['user']['panier'])) {
                $count = count($_SESSION['user']['panier']);


                if (isset($_SESSION['user']['panier']['total'])) {
                    $count = count($_SESSION['user']['panier']);

                    if ($_SESSION['user']['panier']['total'] != null) {
                        $temp = $count;
                        $count = $temp - 1;
                    }
                }
            }
            echo $count;
        }
    }

    function plus() {
        if (isset($_POST['id'])) {                   //          id_article en id est = a la quantité
            $_SESSION['user']['panier'][$_POST['id']]++;
        }
    }

    function minus() {
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
            //echo var_dump($_SESSION['user']['panier_calcul']);
        }
    }

}

?>
