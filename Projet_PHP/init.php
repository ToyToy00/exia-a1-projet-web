<?php

class router {
    /*
     * @the registry
     */

    private $error;

    /*
     * @the controller path
     */
    protected $path;
    private $registry;
    private $args = array();
    public $file;
    public $controller;
    public $action;

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

        /*         * * check the route ** */
        $this->getController();

        /*         * * if the file is not there diaf ** */
        if (is_readable($this->file) != false) {


            /*             * * include the controller ** */
            include $this->file;
            /*             * * a new controller class instance ** */
            $class = $this->controller . '_class';
            $pdo = $this->controller . '_pdo';
            $controller = new $class($this->registry);
            $this->registry->db = new db($this->controller . '.dao.php');
            $this->registry->db->$pdo = new $pdo();
            //$model = new db($this->controller . '.dao.php');
        } else {
            $this->file = $this->path . '/Controller/error.class.php';
            $this->controller = 'error';
            /*             * * include the controller ** */
            include $this->file;
            /*             * * a new controller class instance ** */
            $class = $this->controller . '_class';
            $controller = new $class($this->registry);
        }




        /*         * * check if the action is callable ** */
        if (is_callable(array($controller, $this->action)) == false) {
            $action = 'index';
        } else {
            $action = $this->action;
        }
        /*         * * run the action ** */
        $controller->$action();
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
        }

        if (empty($this->controller)) {
            $this->controller = 'index';
        }

        /*         * * Get action ** */
        if (empty($this->action)) {
            $this->action = 'index';
        }

        /*         * * set the file path ** */
        $this->file = $this->path . '\Controller\\' . $this->controller . '.class.php';
    }

}

?>
