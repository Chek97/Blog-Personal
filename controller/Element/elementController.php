<?php

    //require('../../model/conection.php'); tal vez no sea necesario

    class ElementActions{

        private $db;

        public function __construct(){
            $this->db = Conection::conect();
        }

        public function createElement(){
            //Agregar helper para definir el elemento
            if($_POST['list'] == 1){
                $type = 'titulo';
            }elseif($_POST['list'] == 2) {
                $type = 'parrafo';
            }
            
            $consult = $this->db->query("INSERT INTO elemento VALUES(NULL, '$type', ''," . $_POST['id'] . ")");

            if($consult->rowCount() > 0){
                header('location: ../../view/Main/createEntry.php');
            }else{
                //crear la session error
                echo("No se pudo crear el elemento");
            }
        }

        public function getElements($id){
            $consult = $this->db->query("SELECT * FROM elemento WHERE entrada_id = $id");
            $list = array();
            while($row = $consult->fetch(PDO::FETCH_ASSOC)){
                $list[] = $row;
            }
            return $list;
        }
    }

    if(isset($_GET['q'])){

        $element = new ElementActions();

        switch ($_GET['q']) {
            case 'create':
                $element->createElement();
                break;
            default:
                echo('No es una accion valida');
                break;
        }
    }


?>