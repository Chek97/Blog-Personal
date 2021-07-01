<?php

    class Hashtag {

        private $id;
        private $title;

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
    }

?>