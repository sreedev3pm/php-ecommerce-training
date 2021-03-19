<?php
include("./database.php");
class product{
    public $productcollection;
    function __construct($id=null){
        $db=new database();
        if($id){
           
            $sql="SELECT * FROM catalog WHERE entity_id=$id";
            $db->database($sql);
        
        }
        else{
            
            $sql="SELECT * FROM catalog";
            $db->database($sql);

        }
       $this->productcollection=$db->result ;
    }
}

?>