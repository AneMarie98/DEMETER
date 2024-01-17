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

        public function getConnection(){
            return $this->connection;
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

        public function getNews(){
            $query="SELECT idNotizia, titolo, descrizione FROM notizie ";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
                if(mysqli_num_rows($queryResult) != 0){
                    $result = array();
                    while($row = mysqli_fetch_array($queryResult)){
                        $result[] = $row;
                    }
                    $queryResult -> free();
                    return $result;
                }else{
                    return null;
                }
            }catch(\Exception $e){

            }
            return null;
           
        }

        public function getSegnalazioni(){
            $query="SELECT idSegnalazione, inCarico, indirizzo, dataS FROM segnalazioni ";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
                if(mysqli_num_rows($queryResult) != 0){
                    $result = array();
                    while($row = mysqli_fetch_array($queryResult)){
                        $result[] = $row;
                    }
                    $queryResult -> free();
                    return $result;
                }else{
                    return null;
                }
            }catch(\Exception $e){

            }
            return null;
           
        }

        public function getDetailedNews($id){
            $query="SELECT * FROM notizie WHERE idNotizia='$id' ";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
                if(mysqli_num_rows($queryResult) != 0){
                    $row = mysqli_fetch_array($queryResult);
                    $queryResult -> free();
                    return array($row['titolo'],$row['articolo'],$row['urlImg'],$row['dataN']);
    
                }else{
                    return null;
                }
            }catch(\Exception $e){

            }
            return null;
        }

        public function getDetailedSegnalazione($id){
            $query="SELECT * FROM segnalazioni WHERE idSegnalazione='$id' ";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
                if(mysqli_num_rows($queryResult) != 0){
                    $row = mysqli_fetch_array($queryResult);
                    $queryResult -> free();
                    return array( $row['indirizzo'], $row['dataS'], $row['testo'], $row['inCarico']);
    
                }else{
                    return null;
                }
            }catch(\Exception $e){

            }
            return null;
        }

    public function insertSegnalazione($indirizzo, $data, $testo){
        cleanInput($indirizzo, $this->connection);
        cleanInput($data, $this->connection);
        cleanInput($testo, $this->connection);
        $query="INSERT INTO segnalazioni (indirizzo, dataS, testo) VALUES ('$indirizzo', '$data', '$testo')";
        try{
            $queryResult = mysqli_query($this -> connection, $query);
        }catch(\Exception $e){

        }
        return mysqli_affected_rows($this->connection) >0;
    }

    public function searchRifiuto($rifiuto){
        $query="SELECT * FROM rifiuti WHERE nomeRifiuto LIKE '%$rifiuto%'";
        try{
            $queryResult = mysqli_query($this -> connection, $query);
            if(mysqli_num_rows($queryResult) != 0){
                $result = array();
                while($row = mysqli_fetch_array($queryResult)){
                    $result[] = $row;
                }
                $queryResult -> free();
                return $result;
            }else{
                return null;
            }
        }catch(\Exception $e){

        }
        return null;
    }
}
