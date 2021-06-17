<?php
    //IMPORTS
    require_once('../../model/conection.php');

    //CLASS
    class CommentActions {

        private $db;

        public function __construct(){
            $this->db = Conection::conect();
        }

        //Get count of comments per entry
        public function getCommentsCount($entryId){
            $consult = $this->db->query("SELECT COUNT(*) FROM comentario WHERE entrada_id = $entryId");
            $result = $consult->fetch();

            return $result[0];
        }

        //obtener el numero de entradas del autor y sacar los comentarios

        public function getComments($id = 0){//mejorar la recursividad en este metodo
            $result = array();
            if($id == 0){
                $consult = $this->db->query("SELECT * FROM comentario");
                if($consult->rowCount() > 0){
                    while ($row = $consult->fetch(PDO::FETCH_ASSOC)) {
                        $result[] = $row;
                    }
                    return $result;
                }else{
                    return false;
                }
            }else{
                $consult = $this->db->query("SELECT * FROM comentario WHERE entrada_id=$id");
                if($consult->rowCount() > 0){
                    while ($row = $consult->fetch(PDO::FETCH_ASSOC)) {
                        $result[] = $row;
                    }
                    return $result;
                }else{
                    return false;
                }
            }
        }

        public function createComment($comment){
            $consult = $this->db->query("INSERT INTO comentario VALUES(NULL, '" . date('Y-m-d') . "', '" . $comment['value'] ."', 1, " . $comment['entry_id'] . ")");
            if($consult->rowCount() > 0){
                header('location: ../../view/Main/mainEntry.php');
            }else{
                header('location: ../../view/Main/createComment.php?entry=' . $comment['entry_id']);
            }
        }
    }

    //Actions

    if(isset($_GET['q'])){

        $action = new CommentActions();

        switch ($_GET['q']) {
            case 'create':
                $action->createComment($_POST);
                break;
            default:
                echo('No es una opcion valida');
                break;
        }
    }
?>