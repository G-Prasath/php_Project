<?php
    class database{

        public static $conn = null;

        public static function getconnection(){
            
            if(database::$conn == null){
                // $servername = get_confing('db_server');
                // $username = get_confing('db_username');
                // $password = get_confing('db_password');
                // $dbname = get_confing('db_name');

                $servername = 'localhost';
                $username = 'root';
                $password = 'Vg#84210';
                $dbname = 'photogram';

                // Create connection
                $connection = new mysqli($servername, $username, $password, $dbname);
            
                // Check connection
                if ($connection->connect_error) {
                  die("Connection failed: " . $connection->connect_error); //Error Handing
                }
                else{
                    database::$conn = $connection;
                    return database::$conn;
                }
            }
            else{
                return database::$conn;
            }
        }
    }
?>