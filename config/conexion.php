<?php
    // Stable connection to the database using PDO
    class Conectar {
        protected $dbhost; //

        // Function to connect to the database
        protected function conexion() {
            try {
                $conectar = $this->dbhost = new PDO("mysql:host=localhost; dbname=ferreteria_apirest", "root", "");
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