<?php
    //IMPORTS
    require_once('../../model/conection.php');

    //CLASS
    class CommentActions {

        private $db;

        //CONSTRUCTOR
        public function __construct(){
            $this->db = Conection::conect();
        }

        //Get count of comments per entry
        public function getCommentsCount($entryId = 0){
            if($entryId == 0){
                $statement = $this->db->prepare("SELECT COUNT(*) FROM comentario");
                $statement->execute(array());
                $result = $statement->fetch();
            }else{
                $statement = $this->db->prepare("SELECT COUNT(*) FROM comentario WHERE entrada_id = :id");
                $statement->execute(array(':id' => $entryId));
                $result = $statement->fetch();
            }

            return $result[0];
        }

        //Get Comments or Entry comments

        public function getComments($id = 0){
            $result = array();
            if($id == 0){
                $statement = $this->db->prepare("SELECT * FROM comentario");
                $statement->execute(array());
            }else{
                $statement = $this->db->prepare("SELECT * FROM comentario WHERE entrada_id = :id");
                $statement->execute(array(':id' => $id));
            }
            if($statement->rowCount() > 0){
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
                return $result;
            }else{
                return false;
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

        public function getComment($id){
            $statement = $this->db->prepare("SELECT id, valor FROM comentario WHERE id = :id");
            $statement->execute(array(':id' => $id));

            if($statement->rowCount() > 0){
                return $statement->fetch();
            }else{
                return false;
            }
        }

        public function updateComment($comment){
            $statement = $this->db->prepare("UPDATE comentario SET valor = :val WHERE id = :id ");
            $statement->execute(array(':val' => $comment['value'], 'id' => $comment['id']));

            if($statement->rowCount()){
                header('location: ../../view/Main/mainEntry.php');
            }else{
                header('location: ../../view/Main/mainEntry.php');
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
            case 'update':
                $action->updateComment($_POST);
                break;
            default:
                echo('No es una opcion valida');
                break;
        }
    }
?>