<?php
    // Stable connection to the database using PDO
    class Conectar {
        protected $dbhost; //

        // Function to connect to the database
        protected function conexion() {
            try {
                $conectar = $this->dbhost = new PDO("mysql://bb77a1467414b5:73a4d617@us-cdbr-east-06.cleardb.net; dbname=heroku_400cd3a4bb1d969", "bb77a1467414b5", "73a4d617");
                return $conectar;
            }
            catch (Exception $e) {
                print"Error conexion con la base de datos: ".$e->getMessage()." <br>";
                die();
            }
        }

        //Function for convertion of special characters UTF8
        public function set_names() {
            return $this->dbhost->query("SET NAMES 'utf8'");
        }

    }

?>