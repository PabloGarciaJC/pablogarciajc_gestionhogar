<?php

class Database {

    static public function connect(){
        $db = new mysqli('localhost','root','','finanzas_hogar');      
        $db->query("SET NAMES 'utf-8'");   
        //echo 'si hay conexion'; 
        return $db;
    }
}

/* $tes = new Database();
$prueba = $tes->conexion(); 
var_dump($prueba); 
 */

?>
