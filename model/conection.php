<?php 

    //include_once('../config/config.php');
    include('../../config/config.php');
    class Conection {

        public static function conect(){
            try{

                $conection = new PDO('mysql:host=' . HOST . '; dbname=' . DBNAME, USERNAME, PASSWORD);
                $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conection->exec('SET CHARACTER SET utf8');

                return $conection;

            }catch(Exception $e){
                die('Error en la conexion ' . $e->getMessage());
            }
        }
    }
?>