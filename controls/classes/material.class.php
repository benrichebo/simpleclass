<?php
class Material extends Query{
    public static function uploadMaterial($connection,$table,$dbvalues,$values){
        return static::insertData($connection,$table,$dbvalues,$values);
    }
    public static function fetchMaterials($connection,$data,$table){
        return static::selectData($connection,$data,$table);
    }
    
}
?>