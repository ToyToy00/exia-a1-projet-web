<?php

class index_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {

        $this->registry->template->show('index');
        
    }
    function plan_site() {
        $this->registry->template->show('plan_site');
    }

}
?>
