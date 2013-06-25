<?php

class router {

    //Déclaration des variables
    protected $path;
    private $registry;
    public $file;
    public $controller;
    public $action;
    public $id;

    //appelé par index.php reçoit le registre et le chemin absolu du site
    function __construct($registry, $path) {

        /*         * * check if path i sa directory ** */
        if (is_dir($path) == false) {
            throw new Exception('Invalid controller path: `' . $path . '`');
        }

        $this->path = $path;
        $this->registry = $registry;
    }

    /**
     *
     * @load the controller
     *
     * @access public
     *
     * @return void
     *
     */
    public function loader() {

        /*         * * parsage de l'url retourné par l'url rewriting pour récupérer les actions a éffectuer  ** */
        $this->getController();

        /*         * * si le fichier existe ** */
        if (is_readable($this->file) != false) {


            /*             * * include the controller ** */
            include $this->file;

            /*             * * Définition des nom des classes necessaires ** */
            $class = $this->controller . '_class';
            $pdo = $this->controller . '_pdo';
            //on sécurise les pages membres
            if ($this->controller == "panier" || $this->controller == "membre" || $this->controller == "commande") {
                //si la session n'existe pas on affiche une erreur
                if (!isset($_SESSION['user'])) {
                    $this->file = $this->path . '/Controller/message.class.php';
                    $this->controller = 'message';
                    /*                     * * include the controller ** */
                    include $this->file;
                    /*                     * * a new controller class instance ** */
                    $class = $this->controller . '_class';
                    $this->registry->template->message = 'Connectez vous';
                    $controller = new $class($this->registry);
                    $action = 'index';
                } else {
                    // instanciation du controleur
                    $controller = new $class($this->registry);

                    // on inclut et on instancie le Modele
                    $this->registry->db = new db($this->controller . '.dao.php');
                    $this->registry->db->$pdo = new $pdo();
                }
            } else {
                // instanciation du controleur
                $controller = new $class($this->registry);

                // on inclut et on instancie le Modele
                $this->registry->db = new db($this->controller . '.dao.php');
                $this->registry->db->$pdo = new $pdo();
            }
        } else {
            //sinon on affiche un message d'erreur 
            $this->file = $this->path . '/Controller/message.class.php';
            $this->controller = 'message';
            /*             * * include the controller ** */
            include $this->file;
            /*             * * a new controller class instance ** */
            $class = $this->controller . '_class';
            $this->registry->template->message = '404 Not found';
            $controller = new $class($this->registry);
        }

        /*         * * check if the action is callable ** */
        // l'action est la fonction qui sera appellée dans le controleur
        if (is_callable(array($controller, $this->action)) == false) {
            $action = 'index';
        } else {
            $action = $this->action;
        }
        /*         * * run the action ** */

//        //on sécurise les pages membres
//        if ($this->controller == "panier" || $this->controller == "membre" || $this->controller == "commande") {
//            //si la session n'existe pas on affiche une erreur
//            if (!isset($_SESSION['user'])) {
//          
//                $this->file = $this->path . '/Controller/message.class.php';
//                $this->controller = 'message';
//                /*                 * * include the controller ** */
//                include $this->file;
//                /*                 * * a new controller class instance ** */
//                $class = $this->controller . '_class';
//                $this->registry->template->message = 'Connectez vous';
//                $controller = new $class($this->registry);
//                $action = 'index';
//            }
//        }
        //on affiche la page
        $controller->$action($this->id);
    }

    /**
     *
     * @get the controller
     *
     * @access private
     *
     * @return void
     *
     */
    private function getController() {

        /*         * * get the route from the url ** */
        $route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

        if (empty($route)) {

            $route = 'index';
        } else {
            /*             * * get the parts of the route ** */
            $parts = explode('/', $route);
            $this->controller = strtolower($parts[0]);
            if (isset($parts[1])) {
                $this->action = strtolower($parts[1]);
            }
            if (isset($parts[2])) {
                $this->id = strtolower($parts[2]);
            }
        }

        if (empty($this->controller)) {
            $this->controller = 'index';
        }

        /*         * * Get action ** */
        if (empty($this->action)) {
            $this->action = 'index';
        }

        /*         * * Get id ** */
        if (empty($this->action)) {
            $this->id = '';
        }


        /*         * * set the file path ** */
        $this->file = $this->path . '\Controller\\' . $this->controller . '.class.php';
    }

}

?>
