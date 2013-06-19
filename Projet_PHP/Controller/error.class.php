<?php

class error_class extends router {

    private $error;

    function __construct($error) {
        $this->error = $error;
    }
    
    function index (){
            include $this->path.'/View/error404.php';
        
    }

}

?>
