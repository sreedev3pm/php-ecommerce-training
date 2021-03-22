<?php
include("./database.php");
class product{
    public $productcollection;
    function __construct($id=null){
        $db=new database();
        if($id){
           
            $sql="SELECT * FROM catalog WHERE entity_id=$id";
            $db->query($sql);
        
        }
        else{
            
            $sql="SELECT * FROM catalog";
            $db->query($sql);

        }
       $this->productcollection=$db->result ;
    }
}

?>