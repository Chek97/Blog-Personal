<?php 

    class Author {

        private $id;
        private $name;
        private $lastName;
        private $age;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setAge($age){
            $this->age = $age;
        }

        public function getAge(){
            return $this->age;
        }
    }
?>