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
        return $query->fetchAll();
    }
    
    public function types()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Type";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function themes()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Themes";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function select_article($id)
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Articles WHERE ID_Article = " . $id;
        $query = $con->query($req);
        return $query->fetch();
    }
    
    public function select_all_cd()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Articles WHERE type = 'CD'";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    
    public function select_all_dvd()
    {
        $con = db::getInstance();
        $req = "SELECT * FROM Articles WHERE type = 'DVD'";
        $query = $con->query($req);
        return $query->fetchAll();
    }
    public function search($search_query,$critere,$theme,$type)
    {
        $con = db::getInstance();
        $req = 'SELECT * FROM Articles WHERE ' . $critere .' LIKE \'%'. $search_query .'%\''. $theme . $type;
   
        $query = $con->query($req);
        return $query->fetchAll();
        
    }
}

?>
