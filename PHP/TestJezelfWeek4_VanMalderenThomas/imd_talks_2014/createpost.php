<?php


	session_start();

	include_once("classes/User.class.php");
	include_once("classes/Tweet.class.php");



	if(isset($_POST) && isset($_POST["post"])){
        
		if(!empty($_POST["post"])){
            
			$post = new Tweet();
			$post->Post = htmlspecialchars($_POST["post"]);
			$post->UserID = $_SESSION["userID"];
			$post->Save();
		}
	}

	if(isset($_SESSION['loggedin']) && isset($_SESSION['userID'])){

	}
	else {
		header('Location: index.php');
	}

    $post = new Tweet();
    $results = $post->GetAll();

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">
</head>
<body>

	<nav>
		<a href="logout.php"Logout>Logout</a>
	</nav>
	
	<div id="container">	
	<section id="newpost">
		<form action="" method="post">
			<label for="post">What's on your mind?</label>	
			<textarea name="post" id="post" cols="30" rows="2"></textarea>		
			<input type="submit" name="btnCreatePost" value="Send" />
			
		</form>
	</section>
	
	<section id="tweets">
		<h2>Your posts</h2>
		<?php foreach($results as $result): ?>
		<p style="margin:10px 5px"><?php echo $result["message"] ?></p>
		<?php endforeach; ?>
	</section>
	
	</div>	
	
</body>
</html>