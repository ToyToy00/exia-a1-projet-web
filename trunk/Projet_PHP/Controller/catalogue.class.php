<?php

class catalogue_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        $this->getCategories();
        $tab = $this->registry->db->catalogue_pdo->select_all();
        $this->registry->template->article_array = $tab;
        $this->registry->template->show('catalogue');
    }

    function article($id = NULL) {
        if ($id != NULL) {
            $tab = $this->registry->db->catalogue_pdo->select_article($id);
            $this->getCategories();
            $this->registry->template->article = $tab;
            $this->registry->template->show('detail_article');
        }else {
            $this->registry->template->message = 'Cet Article n\'existe pas.';
        $this->registry->template->show('message');
        }
        
    }

    function cd() {
        $this->getCategories();
        $tab = $this->registry->db->catalogue_pdo->select_all_cd();
        $this->registry->template->article_array = $tab;
        $this->registry->template->show('catalogue');
    }

    function dvd() {
        $this->getCategories();
        $tab = $this->registry->db->catalogue_pdo->select_all_dvd();
        $this->registry->template->article_array = $tab;
        $this->registry->template->show('catalogue');
    }

    function getCategories() {
        $tab = $this->registry->db->catalogue_pdo->types();
        $this->registry->template->type = $tab;

        $tab = $this->registry->db->catalogue_pdo->themes();
        $this->registry->template->themes = $tab;
    }

    function search() {
        $this->getCategories();
        if (isset($_POST['search-query'])) {
            if (!empty($_POST['search-query'])) {
                $search_query = $_POST['search-query'];
                $critere = 'Titre';
                $theme = '';
                $type = '';
                if (!empty($_POST['critere'])) {
                    $critere = trim($_POST['critere']);
                }
                if (!empty($_POST['theme'])) {
                    $theme = ' AND Theme = \'' . trim($_POST['theme'])  . '\'';
                }
                if (!empty($_POST['type']))
                    $type = ' AND Type = \'' . trim($_POST['type']) . '\'';
                
                $tab = $this->registry->db->catalogue_pdo->search($search_query,$critere,$theme,$type);
                 $this->registry->template->article_array = $tab;
                 $this->registry->template->show('catalogue');
                
            }else{
                $this->registry->template->message = 'Il faut rechercher quelque chose';
                 $this->registry->template->show('message');
            }
            
        }else{
            $tab = $this->registry->db->catalogue_pdo->select_all();
        $this->registry->template->article_array = $tab;
        $this->registry->template->show('catalogue');
        }
    }

}

?>
