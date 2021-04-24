<?php 

    class Comment {

        private $id;
        private $date;
        private $value;
        private $author;
        private $entry;


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function setValue($value){
            $this->value = $value;
        }

        public function getValue(){
            return $this->value;
        }

        public function setAuthor($author){
            $this->author = $author;
        }

        public function getAuthor(){
            return $this->author;
        }

        public function setEntry($entry){
            $this->entry = $entry;
        }

        public function getEntry(){
            return $this->entry;
        }
    }
?>