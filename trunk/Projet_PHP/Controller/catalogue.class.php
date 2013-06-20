<?php

class catalogue_class extends router{
    
protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }
    
    function index (){
      
            $tab = $this->registry->db->catalogue_pdo->select_all();
            $this->registry->template->article_array = $tab;
            $this->registry->template->show('catalogue');
              
    }
    
    function article($id)
    {
        if($tab = $this->registry->db->catalogue_pdo->select_article($id))
        {
            $this->registry->template->article = $tab;
            $this->registry->template->show('detail_article');
        }
        $this->registry->template->message = 'Cet Article n\'existe pas.';
        $this->registry->template->show('message');
    }
    
    function cd(){
        $tab = $this->registry->db->catalogue_pdo->select_all_cd();
        $this->registry->template->article_array = $tab;
       $this->registry->template->show('catalogue');
        
    }
    
    function dvd()
    {
        $tab = $this->registry->db->catalogue_pdo->select_all_dvd();
        $this->registry->template->article_array = $tab;
       $this->registry->template->show('catalogue');
    }
}
?>
