<?php 

    class AutorActions {

        private $db;

        public function __construct(){
            $this->db = Conection::conect();
        }

        public function getAuthor($id){
            $consult = $this->db->query("SELECT * FROM autor WHERE id=$id");
            
            if($consult->rowCount() > 0){
                return $consult->fetch(PDO::FETCH_ASSOC);
            }else{
                return false;
            }
        }
    }


?>