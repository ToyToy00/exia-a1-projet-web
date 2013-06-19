<?php

class template {

    private $registry;
    private $vars = array();

    public function __set($index, $value) {

        $this->vars[$index] = $value;
    }

    function __construct($registry) {
        $this->registry = $registry;
    }

    function show($name) {
        $path_header = __SITE_PATH . '/View/header.php';
        $path_footer = __SITE_PATH . '/View/footer.php';
        $path = __SITE_PATH . '/View' . '/' . $name . '.php';

        if (!isset($_SESSION['user']['user_info'])) {
            $this->registry->template->connect_nav = '<form class="navbar-form pull-right" action="' . __SITE_URL . '/authentification/login" method="POST" >
                        <input type="text" class="txtbx_login" placeholder="Nom d\'utilisateur" name="comail">
                        <input type="password" class="txtbx_login" placeholder="Mot de Passe" name="comdp">
                        <button type="submit" class="submit_login btn-primary btn_panier" class="btn">Se Connecter</button>
                        <button class="submit_login btn-primary btn_panier" class="btn" onclick="location.href=\'' . __SITE_URL . '/authentification/\'">Pas encore Inscrit ?</button>
                        </form>';
        } else {
            $this->registry->template->connect_nav = '<div class="navbar-form pull-right">
                <p> Bienvenue ' . $_SESSION['user']['user_info'] . ' 
                    
                        <button class="submit_login btn-primary btn_panier" class="btn" onclick="location.href=\'' . __SITE_URL . '/authentification/logout\'">Déconnexion</button>
                    </p></div>';
        }
        if (file_exists($path) == false) {
            throw new Exception('Template not found in ' . $path);
            return false;
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $$key = $value;
        }



        include ($path_header);
        include ($path);
        include ($path_footer);
    }

}

?>
