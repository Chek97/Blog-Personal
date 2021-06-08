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
    }
?>