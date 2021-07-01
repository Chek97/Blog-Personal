<?php 

    class HashtagActions {

        private $db;

        public function __construct(){
            require_once('../../model/conection.php');
            $this->db = Conection::conect();
        }

        public function getHashtags(){
            $statement = $this->db->prepare("SELECT * FROM etiqueta");
            $statement->execute(array());

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

?>