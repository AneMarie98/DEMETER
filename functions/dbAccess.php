<?php 
    namespace DB;
    class DBAccess{
        private const HOST_DB = "localhost";
        private const DB_NAME = "demeter";
        private const USERNAME = "root";
        private const PASSWORD = "";

        private $connection;
        public function openDBConnection(){
            $this -> connection = mysqli_connect(self::HOST_DB, self::USERNAME, self::PASSWORD, self::DB_NAME);

            return mysqli_connect_errno() == 0;
        }

        public function closeDBConnection(){
            mysqli_close($this->connection);
        }

        public function verifyUser($email){
            $query="SELECT * FROM users WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
            }catch(\Exception $e){

            }
            if(mysqli_num_rows($queryResult) === 1){
                return true;
            }else{
                return false;
            }
        }

        public function getUserPassword($email){
            $query="SELECT password FROM users WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
            }catch(\Exception $e){

            }
            if(mysqli_num_rows($queryResult) != 0){
                while($row = mysqli_fetch_array($queryResult)){
                    $dbpassword=$row["password"];
                }
                $queryResult -> free();
                return $dbpassword;
            }else{
                return null;
            }
        }

        public function getAuthUserInfo($email){
            $query="SELECT firstname,lastname FROM users WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
            }catch(\Exception $e){

            }
            if(mysqli_num_rows($queryResult) != 0){
                while($row = mysqli_fetch_array($queryResult)){
                    $_SESSION["email"]=$email;
                    $_SESSION["firstname"] = $row["firstname"];
                    $_SESSION["lastname"] = $row["lastname"];
                }
                $queryResult -> free();
            }else{
                return null;
            }
        }
    }