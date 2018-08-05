<?php

    class DbConnection {
        private $hostName;
        private $userName;
        private $passWord;
        private $dbName;
        
        protected function connect() {
            $this->hostName = 'localhost';
            $this->userName = 'root';
            $this->passWord = '123';
            $this->dbName = 'people';

            $connection = new mysqli($this->hostName, $this->userName, 
                                     $this->passWord, $this->dbName);

            return $connection;
                                     
        }
    }

?>