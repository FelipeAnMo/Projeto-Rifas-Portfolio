<?php
    namespace App;

    class Connection {

        public static function getDb() {
            try {
                $conn = new \PDO(
                    "mysql:host=localhost;dbname=rifas;charset=utf8",
                    "root",
                    ""
                );

                return $conn;

            } catch(\PDOException $e) {
                //.. tratar o erro //
            }

        } 

    }

?>