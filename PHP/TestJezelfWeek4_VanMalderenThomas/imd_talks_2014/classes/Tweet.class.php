<?php 

    class Tweet {
         private $m_sPost;
         private $m_iUserID;
 
         public function __set($p_sProperty, $p_vValue)
         {
             switch ($p_sProperty) {
                 case "Post":
                     $this->m_sPost = $p_vValue;
                     break;
                 case "UserID":
                     $this->m_iUserID = $p_vValue;
                     break;
             }
         }
 
         public function __get($p_sProperty)
         {
             switch ($p_sProperty) {
                 case "Post":
                     return $this->m_sPost;
                     break;
                 case "UserID":
                     return $this->m_iUserID;
                     break;
             }
         }
 
         public function Save() {
             $conn = new PDO("mysql:host=localhost; dbname=imd", "root", "root");
 
             $statement = $conn->prepare("insert into IMDTalksPosts (userid, message) values (:userID, :message)");
             
             $statement->bindValue(":userID", $this->m_iUserID);
             $statement->bindValue(":message", $this->m_sPost);
 
             $result = $statement->execute();
             return $result;
         }
 
         public function GetAll() {
             $conn = new PDO("mysql:host=localhost; dbname=imd", "root", "root");
 
             //$sql = "select * from tweets where userID = ".$_SESSION['userID'];
             $statement = $conn->prepare("select * from IMDTalksPosts where userID = ".$_SESSION['userID']);
             $statement->execute();
 
             $result = $statement->fetchAll();
 
             return $result;
         }
     }
?>