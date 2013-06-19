<?php

class catalogue_pdo {
    
    function __construct()
    {
        
    }
    
    public function select_all()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Articles";
        $query = $con->query($req);
        return $query->fetch();
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
