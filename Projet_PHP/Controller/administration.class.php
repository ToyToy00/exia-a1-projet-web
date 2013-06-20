<?php

class administration_class extends router{
    
protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }
    
    function index (){
      
            $this->registry->template->show('administration');
              
    }
}
?>
