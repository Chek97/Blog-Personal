<?php
    //IMPORTS
    require('../../model/conection.php');


    //Class controller
    class EntryActions {

        private $db;

        public function __construct(){
            $this->db = Conection::conect();
        }

        public function getEntrys(){
            $consult = $this->db->query("SELECT * FROM entrada");

            if($consult->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }

?>