<?php 
    
    class Conection {

        public static function conect(){
            try{

                $conection = new PDO('mysql:host=localhost; dbname=blog-personal', 'root', '');
                $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conection->exec('SET CHARACTER SET utf8');

                return $conection;

            }catch(Exception $e){
                die('Error en la conexion ' . $e->getMessage());
                exit;
            }
        }
    }
?>