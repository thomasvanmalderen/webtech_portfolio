<?php


	include_once("classes/User.class.php");
	include_once("classes/Tweet.class.php");

	if(!empty($_POST) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){
        
		if ( !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
            
			$user = new User();
            
			$user->Name = $_POST["name"];
			$user->Email = $_POST["email"];
			$user->Password = $_POST["password"];
            
			$user->Register();
		}
	}

	if(!empty($_POST)){
        
		if(!empty($_POST["username"]) && !empty($_POST["passwordLogin"])){
            
			$userLogin = new User();
            
			$userLogin->Email = $_POST["username"];
			$userLogin->Password = $_POST["passwordLogin"];

			if($userLogin->canLogin()){
                
				$_SESSION['loggedin'] = true;
				header('Location: createpost.php');
			}
			else {
                
			}
		}else{

		}

	}
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
		<?php if(isset($_SESSION['loggedin'])): ?>
			<a href="logout.php">Logout</a>
		<?php else: ?>
			<a href="index.php">Login</a>
		<?php endif; ?>
	</nav>

	<header>
		<h1>Welcome to IMD-Talks</h1>
		<h2>Find out what other IMD'ers are building around you.</h2>
	</header>
	
	<div id="rightside">	
	<section id="login">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="username" placeholder="Email" />
		<input type="password" name="passwordLogin" placeholder="Password" />
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>

		<input type="submit" name="btnLogin" value="Sign in" />
		</form>
		
	</section>	
	
	<section id="signup">
		<h2>New to IMD-Talks? <span>Sign Up</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="name" placeholder="Full name" />
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" name="btnSignup" value="Sign up for IMD Talks" />
		</form>
		
	</section>
	</div>	
	
</body>
</html> 