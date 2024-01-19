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
            $query="SELECT * FROM utenti WHERE email='$email'";
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
            $query="SELECT password FROM utenti WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
           
            if(mysqli_num_rows($queryResult) != 0){
                while($row = mysqli_fetch_array($queryResult)){
                    $dbpassword=$row["password"];
                }
                $queryResult -> free();
                return $dbpassword;
            }else{
                return null;
            }
            }catch(\Exception $e){

            }
        }

        public function getAuthUserInfo($email){
            $query="SELECT nome, cognome FROM utenti WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
            
            if(mysqli_num_rows($queryResult) != 0){
                $result = array();
                while($row = mysqli_fetch_array($queryResult)){
                    $_SESSION["email"]=$email;
                    $_SESSION["firstname"] = $row["nome"];
                    $_SESSION["lastname"] = $row["cognome"];
                    $result = array($row["nome"], $row["cognome"], $email);
                }
                $queryResult -> free();
                return $result;
            }else{
                return null;
            }
        }catch(\Exception $e){

        }
        }

        public function getUserId($email){
            $query="SELECT idUtente FROM utenti WHERE email='$email'";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
            }catch(\Exception $e){

            }
            if(mysqli_num_rows($queryResult) != 0){
                while($row = mysqli_fetch_array($queryResult)){
                    $id=$row["idUtente"];
                }
                $queryResult -> free();
                return $id;
            }else{
                return null;
            }
        }

        public function getNews(){
            $query="SELECT idNotizia, titolo, urlImg, descrizione FROM notizie ";
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


        public function getSvuotDays(){
            $query="SELECT * FROM svuotamenti";
            try{
                $queryResult = mysqli_query($this -> connection, $query);
                if(mysqli_num_rows($queryResult) != 0){
                    while($row = mysqli_fetch_array($queryResult)){
                        $result[] = $row;
                    }
                    $queryResult -> free();
                    return $result;
                }
            return null;
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
    
    
    public function insertSegnalazione($indirizzo, $data, $testo, $email){
        cleanInput($indirizzo, $this->connection);
        cleanInput($data, $this->connection);
        cleanInput($testo, $this->connection);
        $idUtente = $this->getUserId($email);  
        $query="INSERT INTO segnalazioni (indirizzo, dataS, testo, fkUtenteS) VALUES ('$indirizzo', '$data', '$testo', '$idUtente')";
        echo $query;
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
