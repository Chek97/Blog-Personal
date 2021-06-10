<?php

class ElementActions{

        private $db;

        public function __construct(){
            require_once('../../model/conection.php');
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
                header('location: ../../view/Main/createEntry.php?entry=' . $_POST['id']);
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

        public function updateElements($data, $id){
            //ACtualizacion del titulo de la entrada
            $consult1 = $this->db->query("UPDATE entrada SET titulo = '" . $data['title'] . "' WHERE id= $id");
            //AJUSTAR PARA QUE NO TOME EL ERROR
            if($consult1->rowCount()){
                echo('Se actualizo la entrada');
            }else{
                echo('La entrada no se actualizo correctamente <br>');
            }
            //-----------------------------------------------------------
            $flag = false;
            //Verificamos si hay elementos encabezados, si los hay actualizarlos
            if(isset($data['head'])){
                foreach ($data['head'] as $head) {    
                    $consult2 = $this->db->query("UPDATE elemento SET valor='" . $data['headtit'][$head] . "' WHERE id=" . $data['head'][$head]);
                    //AJUSTAR PARA QUE NO TOME EL ERROR
                    if($consult2->rowCount() > 1){
                        $flag = true;
                    }else{
                        $flag = false;
                    }
                    //-----------------------------------------------------------
                }
            }
            $flag1 = false;
            //Verificamos los elementos de parrafos
            if(isset($data['parraf'])){
                foreach ($data['parraf'] as $parraf) {
                    echo($data['parraf'][$parraf]);
                    echo($data['parraftit'][$parraf]);
                    $consult3 = $this->db->query("UPDATE elemento SET valor='" . $data['parraftit'][$parraf] . "' WHERE id=" . $data['parraf'][$parraf]);
                    if($consult3->rowCount() > 1){
                        $flag = true;
                    }else{
                        $flage = false;
                    }
                }
            }
            header('location: ../../view/Main/createEntry.php?entry=' . $id);
        }
    }

    if(isset($_GET['q'])){

        $element = new ElementActions();

        switch ($_GET['q']) {
            case 'create':
                $element->createElement();
                break;
            case 'update':
                $element->updateElements($_POST, $_POST['id']);
                break;
            default:
                echo('No es una accion valida');
                break;
        }
    }
?>