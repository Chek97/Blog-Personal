<?php 

    //ENTRY Class
    class Entry {

        private $id;
        private $title;
        private $date;
        private $views;
        private $active;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function setViews($views){
            $this->views = $views;
        }

        public function getViews(){
            return $this->views;
        }

        public function setActive($active){
            $this->active = $active;
        }

        public function getActive(){
            return $this->active;
        }

    }
?>