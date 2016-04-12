<?php

    class User {
        private $m_sUserName;

        public function __set($p_sProperty, $p_vValue){
        switch ($p_sProperty) {
            case "Username":
                $this->m_sUserName = $p_vValue;
                break;
            }
        }

        public function __get($p_sProperty){
            
        $vResult = null;
        switch ($p_sProperty) {
            case "Username":
                $vResult = $this->m_sUserName;
                break;
        }
        return $vResult;
        }

        public function UsernameAvailable(){
            
        include("Connection.php"); //open connection to Dbase
        $sSql = "select * from users where user_login = '" . mysqli_real_escape_string($link, $this->m_sUserName) . "';";
        $rResult = mysqli_query($link, $sSql);
        $count = mysqli_num_rows($rResult);
        if ($count == 1) {
            throw new Exception('error');
        } else {
            return false;
        }
        mysqli_close($link); //close connection with Dbase
        }

        public function Create(){
            
        $this->UsernameAvailable();
        include("Connection.php");
        $sSql = "insert into users (user_login) values ('" . mysqli_real_escape_string($link, $this->m_sUserName) . "');";
        if ($this->UsernameAvailable()) {
            throw new Exception(":( username already taken!");
        } else {
            if ($rResult = mysqli_query($link, $sSql)) {
                //query went OK
            } else {
                echo $sSql;
                // er zijn geen query resultaten, dus query is gefaald
                throw new Exception('error');
            }
        }
        mysqli_close($link);
    }

}

?>