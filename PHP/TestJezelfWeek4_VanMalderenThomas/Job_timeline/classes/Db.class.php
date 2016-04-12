<?php

    class Job {

    private $m_sName;
    private $m_sPeriod;
    private $m_sDescription;

    public function __set($p_sProperty, $p_vValue){
        
        switch ($p_sProperty) {
            case "Name":
                $this->m_sName = $p_vValue;
                break;

            case "Period":
                $this->m_sPeriod = $p_vValue;
                break;

            case "Description":
                $this->m_sDescription = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty){
        
        switch ($p_sProperty) {
            case "Name":
                return $this->m_sName;
                break;

            case "Period":
                return $this->m_sPeriod;
                break;

            case "Description":
                return $this->m_sDescription;
                break;
        }
    }

    function Save(){
        
        $conn = new PDO("mysql:host=localhost; dbname=imd", "root", "root");
        
        $statement = $conn->prepare("insert into jobs (job_name, period, description) values (:job_name, :period, :description)");
        
        $statement->bindValue(":job_name",$this->Name);
        $statement->bindValue(":period",$this->Period);
        $statement->bindValue(":description",$this->Description);
        $result = $statement->execute();
        
        return $result;
    }

}

?>