<?php 

    class HashEntryActions {
        private $db;

        public function __construct(){
            require_once('../../model/conection.php');
            $this->db = Conection::conect();
        }

        public function insertHashEntry($hashEntry){
            $statement = $this->db->prepare("INSERT INTO entrada_etiqueta VALUES(NULL, :ent, :has)");
            $statement->execute(array(':ent' => $hashEntry['id'], ':has' => $hashEntry['listHashtag']));

            session_start();
            if($statement->rowCount() > 0){
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Etiqueta agregada con exito';
            }else{
                $_SESSION['status'] = 'danger';
                $_SESSION['message'] = 'No se agrego la etiqueta';
            }
            header('location: ../../view/Main/createEntry.php?entry=' . $hashEntry['id']);
        }

        public function getHashtag($id){
            $statement = $this->db->prepare("SELECT * FROM entrada_etiqueta INNER JOIN etiqueta 
                ON(entrada_etiqueta.etiqueta_id = etiqueta.id) WHERE entrada_etiqueta.entrada_id = :id");
            $statement->execute(array(':id' => $id));

            if($statement->rowCount() > 0){
                $result = array();
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    $result[] = $row;
                }
                return $result;
            }else{
                return false;
            }
        }
    }

    if(isset($_GET['q'])){

        $action = new HashEntryActions();

        switch ($_GET['q']) {
            case 'insert':
                $action->insertHashEntry($_POST);
                break;
            default:
                echo('No es una opcion valida');
        }
    }

?>