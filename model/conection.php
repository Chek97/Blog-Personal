<?php 

    include('../config/config.php');

    class Conection {

        private $conection;

        public function __construct(){
            try{

                $this->conection = new PDO('mysql:host=' . HOST . '; dbname=' . DBNAME, USERNAME, PASSWORD);
                $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conection->exec('SET CHARACTER SET utf8');

            }catch(Exception $e){
                die('Error en la conexion ' . $e->getMessage());
            }
        }
    }
?>