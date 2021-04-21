<?php 

    class Element {

        private $id;
        private $type;
        private $value;
        private $entry;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setType($type){
            $this->type = $type;
        }

        public function getType(){
            return $this->type;
        }

        public function setValue($value){
            $this->value = $value;
        }

        public function getValue(){
            return $this->value;
        }

        public function setEntry($entry){
            $this->entry = $entry;
        }

        public function getEntry(){
            return $this->entry;
        }
    }


?>