<?php

class index_class extends router {

    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
    }

    function index() {
        $this->registry->template->connect_nav = '<input type="text" class="txtbx_login" placeholder="Nom d\'utilisateur">
                        <input type="password" class="txtbx_login" placeholder="Mot de Passe">
                        <button type="submit" class="submit_login" class="btn">Se Connecter</button>';
        $this->registry->template->show('index');
        
    }

}
?>
