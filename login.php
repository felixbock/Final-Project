<?php


include('config.php');

// check if the fourm is submited
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// input from fourm
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// pull records that match password
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username,
		'password' => $password
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
	if(!empty($users)) {
		//first results
		$user = $users[0];
        //setting session varabals
		$_SESSION['userID'] = $user['userid'];
        $_SESSION['Username'] = $user['username'];
		
		//home
		header('location: home.php');
	}
}
?>

<!doctype html>
<style>
    body{
        background-color:burlywood; 
        }
    
        #banner{
            background-image:url('Pics/foodBanner.jpg');
            width:100%;
            height: 200px;
        }
    #logincontent{
         position: absolute;
            top: 50%;
            left: 35%;
            background-color:orange;
            border: 5px solid black;
    }

    </style>

    <head>
	<meta charset="utf-8">
    <title>Login</title> 
   </head>
  
<body>
	 <div id ="banner"> </div>
    <div id = "logincontent">
		<h1>Login</h1>
		<form method="POST" action="">
			<input type = "text" name = "username" placeholder = "Username" />
			<input type = "password" name = "password" placeholder = "Password" />
			<input type="submit" value = "Log In" />
		</form>
	</div>
    
</body>
</html>
   
