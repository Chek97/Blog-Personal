<?php

    class Answer {
        
        private $id;
        private $date;
        private $value;
        private $comment;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return  $this->id;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return  $this->date;
        }

        public function setValue($value){
            $this->value = $value;
        }

        public function getValue(){
            return  $this->value;
        }

        public function setComment($comment){
            $this->comment = $comment;
        }

        public function getComment(){
            return  $this->comment;
        }
    }
?>