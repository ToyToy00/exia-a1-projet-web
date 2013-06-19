<?php
class index_pdo {
    
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
?>
