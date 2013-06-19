<?php

class catalogue_class extends router{
    
protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }
    
    function index (){
      
            $this->registry->db->catalogue_pdo->select_all();
            include $this->path.'/View/catalogue.php';
        
        
    }
}
?>
