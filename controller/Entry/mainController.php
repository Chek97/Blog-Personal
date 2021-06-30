<?php
    //IMPORTS
    require_once('../../model/conection.php');
    
    
    //CLASS
    class EntryActions {
        
        private $db;
        
        //CONSTRUCTOR
        public function __construct(){
            $this->db = Conection::conect();
        }

        //GET ENTRYS
        public function getEntrys(){
            $statement = $this->db->prepare("SELECT * FROM entrada");
            $statement->execute(array());

            if($statement->rowCount() > 0){
                $list = array();
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                   $list[] = $row;
                }
                return $list;
            }else{
                return false;
            }
        }

        //CREATE NEW ENTRY
        public function newEntry(){
            $date = date('Y-m-d');
            $statement = $this->db->prepare("INSERT INTO entrada VALUES(NULL, :tit, :fec, :vis, :act, :aut)");
            $statement->execute(array(':tit' => 'Sin Titulo', ':fec' => $date, ':vis' => 0, ':act' => 0, ':aut' => 1));

            session_start();
            if($statement->rowCount() > 0){
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Entrada creada con exito';
                header('location: ../../view/Main/createEntry.php');
            }else{
                $_SESSION['status'] = 'danger';
                $_SESSION['message'] = 'No fue posible crear la entrada';
                header('location: ../../view/Main/mainEntry.php');
            }
        }

        //GET THE LAST ENTRY OR ENTRY BY ID
        public function getEntry($option, $id = ''){
            if($option == 1){
                $statement = $this->db->prepare("SELECT * FROM entrada ORDER BY id DESC LIMIT 1");
                $statement->execute(array());
            }else{
                $statement = $this->db->prepare("SELECT * FROM entrada WHERE id = :id");
                $statement->execute(array(':id' => $id));
            }
            
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        //GET ENTRYS COUNT
        public function getEntryCount($id){
            $statement = $this->db->prepare("SELECT COUNT(*) FROM entrada WHERE autor_id = :id");
            $statement->execute(array(':id' => $id));
            
            $result = $statement->fetch();
            return $result[0];
        }

        public function updateEntryTitle($id, $title){
            $statement = $this->db->prepare("UPDATE entrada SET titulo = :tit WHERE id= :id");
            $statement->execute(array(':tit' => $title, ':id' => $id));

            if($statement->rowCount()){
                return true;
            }else{
                return false;
            }
        }

        public function searchEntries($title){
            $statement = $this->db->prepare("SELECT * FROM entrada WHERE titulo = :tit");
            $statement->execute(array(':tit' => $title));

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

    //ACTIONS

    if(isset($_GET['q'])){

        $action = new EntryActions();

        switch ($_GET['q']) {
            case 'create':
                $action->newEntry();
                break;
            case 'search':
                $action->searchEntries($_POST['searcEntry']);
            default:
                echo('No es una opcion valida');
                break;
        }
    }
?>