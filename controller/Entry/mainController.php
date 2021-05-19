<?php
    //IMPORTS
    require_once('../../model/conection.php');
    
    
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

        public function newEntry(){
            $date = date('Y-m-d');
            $consult = $this->db->query("INSERT INTO entrada VALUES(NULL, 'Sin Titulo', '" . $date . "', 0, 0, 1)");
            //modificar la pagina de newEntry
            if($consult->rowCount() > 0){
                header('location: ../../view/Main/createEntry.php');
            }else{
                header('location: ../../view/Main/mainEntry.php');
            }
        }

        public function getEntry($option){
            if($option == 1){
                $consult = $this->db->query("SELECT * FROM entrada ORDER BY id DESC LIMIT 1");

                $result = $consult->fetch();
                return $result;
            }
        }
    }

    //Actions

    if(isset($_GET['q'])){

        $action = new EntryActions();

        switch ($_GET['q']) {
            case 'create':
                $action->newEntry();
                break;
            default:
                echo('No es una opcion valida');
                break;
        }
    }
?>