<?php


    include_once("Db.class.php");

    class Message {
        
	   private $m_sText;
	   private $m_sUser;
        
	   public function setText($p_sValue){
	   	$this->m_sText = $p_sValue;
	   }
        
	   public function setUser($p_sValue){
	   	$this->m_sUser = $p_sValue;
	   }
        
	   public function getText(){
	   	return $this->m_sText;
	   }
        
	   public function getUser(){
	   	return $this->m_sUser;
	   }
        
	   public function Create(){
           
	   	$db = Db::getInstance();
	   	$statement = $db->prepare("INSERT INTO Messages (text, user) VALUES (:message, :user)");
	   	$statement->bindValue(':message', $this->m_sText);
	   	$statement->bindValue(':user', $this->m_sUser);
	   	$statement->execute();
	   } 
        
        public function GetAllMessages(){
            
	   	return Db::getInstance()->query("select * from messages;");
	   }
    }
?>