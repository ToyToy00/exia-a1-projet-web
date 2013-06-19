<?php

class message_class extends router {

    private $error;
    private $registry;
    
    function __construct($registry) {
        //$this->error = $error;
        $this->registry = $registry;
    }
    
    function index (){
        
        $this->registry->template->show('message');
        
    }

}

?>
