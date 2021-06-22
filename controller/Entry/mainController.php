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
                $list = array();
                while ($row = $consult->fetch(PDO::FETCH_ASSOC)) {
                   $list[] = $row;
                }
                return $list;
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

        public function getEntry($option, $id = ''){
            if($option == 1){
                $consult = $this->db->query("SELECT * FROM entrada ORDER BY id DESC LIMIT 1");

                $result = $consult->fetch();
                return $result;
            }else{
                $consult = $this->db->query("SELECT * FROM entrada WHERE id=$id");

                $result = $consult->fetch(PDO::FETCH_ASSOC);
                return $result;                
            }
        
        }

        public function getEntryCount($id){
            $consult = $this->db->query("SELECT COUNT(*) FROM entrada WHERE autor_id = $id");
            
            $result = $consult->fetch();
            return $result[0];
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