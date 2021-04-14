<?php

    class DummyDatabase {

        private $path = '../app/libraries/reviews2.json';

        public $array;

        //access to the JSON file and decoding it

       public function jsonRead()
       {
        $strJsonFile = file_get_contents($this->path);
        
        $this->array = json_decode($strJsonFile, true);

        return $this->array;
       }

    }