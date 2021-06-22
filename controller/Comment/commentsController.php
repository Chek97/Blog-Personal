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

        //Get comments count
        public function getCommentsCount($entryId){
            $statement = $this->db->prepare("SELECT COUNT(*) FROM comentario WHERE entrada_id = :id");
            $statement->execute(array(':id' => $entryId));
            $result = $statement->fetch();

            return $result[0];
        }

        //Get Comments or Entry comments

        public function getComments($id = 0){
            $result = array();
            if($id == 0){
                $statement = $this->db->prepare("SELECT * FROM comentario");
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
    }
?>