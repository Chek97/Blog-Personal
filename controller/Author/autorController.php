<?php 

    class AutorActions {

        private $db;

        public function __construct(){
            $this->db = Conection::conect();
        }

        public function getAuthor($id){
            $statement = $this->db->prepare("SELECT * FROM autor WHERE id= :id");
            $statement->execute(array(':id' => $id));
            
            if($statement->rowCount() > 0){
                return $statement->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        }
    }


?>