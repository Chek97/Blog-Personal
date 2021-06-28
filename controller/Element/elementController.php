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
            
            $statement = $this->db->prepare("INSERT INTO elemento VALUES(NULL, :tip, :val, :ent_id)");
            $statement->execute(array(':tip' => $type, ':val' => '', ':ent_id' => $_POST['id']));

            if($statement->rowCount() > 0){
                header('location: ../../view/Main/createEntry.php?entry=' . $_POST['id']);
            }else{
                //crear la session error
                echo("No se pudo crear el elemento");
            }
        }

        public function getElements($id){
            $statement = $this->db->prepare("SELECT * FROM elemento WHERE entrada_id = :id");
            $statement->execute(array(':id' => $id));

            $list = array();
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                $list[] = $row;
            }
            return $list;
        }

        public function updateElements($data, $id){
            //ACtualizacion del titulo de la entrada
            $statement1 = $this->db->prepare("UPDATE entrada SET titulo = :tit WHERE id= :id");
            $statement1->execute(array(':tit' => $data['title'], ':id' => $id ));

            //AJUSTAR PARA QUE NO TOME EL ERROR
            if($statement1->rowCount()){
                echo('Se actualizo la entrada');
            }else{
                echo('La entrada no se actualizo correctamente <br>');
            }
            //-----------------------------------------------------------
            $flag = false;
            //Verificamos si hay elementos encabezados, si los hay actualizarlos
            if(isset($data['head'])){
                foreach ($data['head'] as $head) {    
                    $statement2 = $this->db->prepare("UPDATE elemento SET valor= :val WHERE id= :id");
                    $statement2->execute(array(':val' => $data['headtit'][$head], ':id' => $data['head'][$head]));

                    //AJUSTAR PARA QUE NO TOME EL ERROR
                    if($statement2->rowCount() > 1){
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
                    $statement3 = $this->db->prepare("UPDATE elemento SET valor= :val WHERE id= :id");
                    $statement3->execute(array(':val' => $data['parraftit'][$parraf], ':id' => $data['parraf'][$parraf]));

                    if($statement3->rowCount() > 1){
                        $flag = true;
                    }else{
                        $flage = false;
                    }
                }
            }
            header('location: ../../view/Main/createEntry.php?entry=' . $id);
        }
        
        public function deleteElement($id){
            $statement = $this->db->prepare("SELECT entrada_id FROM elemento WHERE id= :id");
            $statement->execute(array(':id' => $id));

            $entrada_id = $statement->fetch(PDO::FETCH_ASSOC);
            
            $statement1 = $this->db->prepare("DELETE FROM elemento WHERE id= :id");
            $statement1->execute(array(':id' => $id));

            if($statement1->rowCount()){
                header('location: ../../view/Main/createEntry.php?entry=' . $entrada_id['entrada_id']);
            }else{
                echo('No fue posible borrar el elemento');
            }
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
            case 'delete':
                $element->deleteElement($_GET['id']);
                break;
            default:
                echo('No es una accion valida');
                break;
        }
    }
?>