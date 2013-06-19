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
