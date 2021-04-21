<?php 

    class EntryHashtag {

        private $id;
        private $entry;
        private $hashtag;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setEntry($entry){
            $this->entry = $entry;
        }

        public function getEntry(){
            return $this->entry;
        }

        public function setHashtag($hashtag){
            $this->hashtag = $hashtag;
        }

        public function getHashtag(){
            return $this->hashtag;
        }
    }

?>