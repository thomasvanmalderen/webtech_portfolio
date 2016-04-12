<?php

    // start session
    session_start();

    // controleren of user is ingelogd
    if(isset( $_SESSION['name'] )){
        
        $currentUser = $_SESSION['name'];
    } else {
        
        header("location: login.php");
    }

    include_once("classes/Message.class.php");

    $m = new Message();
    if( !empty($_POST) ){
        
        try {
            $m = new Message();
            $m->setText($_POST['text']);
            $m->setUser($currentUser);
            $m->Create();
            
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    $all_messages = $m->GetAllMessages();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iMessage</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script>
        
        $(document).ready(function(){
            
            $.get("ajax/user.php", function (data){
                user = data.name;
            });
            
            $("#btnSend").on("click", function(e){
                var message = $(".message").val();
                $.post( "ajax/chat.php", { message: message})
                    .done(function( response ){
                        $( ".messages" ).append( "<article><article class='me'>" + response.text + "</article></article>" );
                        $(".message").val("");
                    });
                e.preventDefault();
            });
            
            
            setInterval(function() {
                
                $.get( "ajax/allmessages.php", function(response){
                    $(".messages").empty();
                    $.each(response, function(index){
                        if(response[index].user == user){
                            $( ".messages" ).append( "<article><article class='me'>" + response[index].text + "</article></article>" );
                        }
                        else {
                            $( ".messages" ).append( "<article><article class='them'>" + response[index].text + "</article></article>" );
                        }
                    });
                });
            }, 2000);
        });
        
    </script>
</head>
<body>
<div class="chat">

    <section class="messages">
        <?php
        while( $message = $all_messages->fetch(PDO::FETCH_OBJ) )
        {
            echo "<article>";
            if( $message->user === $currentUser )
            {
                echo "<article class='me'>" . $message->text . "</article>";
            }
            else
            {
                echo "<article class='them'>" . $message->text . "</article>";
            }
            echo "</article>";
        }
        ?>
    </section>

    <section class="newMessage">
        <form action="" method="post">
            <input type="text" class="message" placeholder="message" name="text">
            <button type="submit" value="Send" id="btnSend">Send message</button>
        </form>
    </section>
</div>

</body>
</html>