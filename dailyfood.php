<?php
include('config.php');
if (!empty($_POST['addfooddiary'])) {
	// input from fourm
	$name = $_POST['name'];
    $userid = $_SESSION['userID'];
	// insert into finalfood
	$sql = file_get_contents('sql/insertdaily.sql');
	$params = array(
        'userid' => $userid,
        'name' => $name,
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
}
//remove item from log
if (!empty($_POST['removefooddiary'])) {
	// input from fourm
	$name = $_POST['name'];
    $userid = $_SESSION['userID'];
	// insert into finalfood
	$sql = file_get_contents('sql/removedaily.sql');
	$params = array(
        'userid' => $userid,
        'name' => $name,
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
}
//gets results from join sql
if (!empty($_POST['showfooddaily'])) {
    $userid = $_SESSION['userID'];
	
     $sql = file_get_contents('sql/showDailyJOIN.sql');
	   $params = array(
		'userid' => $userid,
	
	    );
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$dailys = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html>
    <style>
        body{
           background-color:burlywood; 
        }
        #banner{
            background-image:url('Pics/foodBanner.jpg');
    
            width:100%;
            height: 200px;
            
        }
       
       #n1{
         position: absolute;
           left:20%;
           top: 30%;
             width: 20%;
            text-align:center;
           border-color: black;
           text-decoration:none;
           background-color: lightgreen;
            font-family: fantasy;
            border-style:solid;
            font-size: 2em;
        }
        #n2{
           position: absolute;
           left:40%;
            top: 30%;
             width: 20%;
            text-align:center;
           border-color: black;
           text-decoration:none;
           background-color: lightgreen;
            font-family: fantasy;
            border-style:solid;
            font-size: 2em;
        }
        #n3{
             position: absolute;
           left:60%;
           top: 30%;
             width: 20%;
            text-align:center;
           border-color: black;
           text-decoration:none;
           background-color: lightgreen;
            font-family: fantasy;
            border-style:solid;
            font-size: 2em;
        }
        
        #addfooddiary{
            position: absolute;
            top: 40%;
            left: 70%;
            background-color:orange;
            border: 5px solid black;
        }
         #removefooddiary{
            position: absolute;
            top: 60%;
            left: 70%;
            background-color:orange;
            border: 5px solid black;
        }
        #showfooddaily{
            position: absolute;
            top: 80%;
            left: 70%;
            background-color:orange;
            border: 5px solid black;
        }
        #logout 
        {
           position: absolute;
           background-color: lightgreen;
            top: 30%;
            left: 90%;
             border: 2px solid black;
        }
        #daily{
             position: absolute;
            top: 40%;
            left: 25%;
            width: 40%;
            background-color:greenyellow;
            font-weight: bold;
            font-size: 1.5em;
            align-content: center;  
            border: 5px solid black;
        }
        p{
            align-content: center;
        }
        
    </style>
    <head>
	<meta charset="utf-8">
    <title>daily food</title> 
   </head>
    
    <body>

        <div id ="banner"> </div>
        
        <nav>
            <div id = "n1">
            <a  href="enterfood.php"> <strong> Add Food </strong> </a>
            </div>

           <div id = "n2">
            <a href= "home.php"> <strong> Home </strong> </a>
            </div>
            
            <div id = "n3">
            <a   href="checkhealth.php"> <strong> check Health </strong> </a>
            </div>
         </nav>  
          <div id ="addfooddiary"> 
             <h2>Enter the food you ate</h2>
            
		      <form name="addfooddiary" method="POST" action="" >
                  
				<label>Food Name</label>
					<input type="text" name="name" placeholder="Foodname"/>
                  <br>
				<input type="submit"  name="addfooddiary" class="button" />&nbsp;
				<input type="reset" class="button" />   
                  </form>
			</div>
        
        <div id ="removefooddiary"> 
             <h2>Remove the food you ate</h2>
            
		      <form name="removefooddiary" method="POST" action="" >
                  
				<label>Food Name</label>
					<input type="text" name="name" placeholder="Foodname"/>
                  <br>
				<input type="submit"  name="removefooddiary" class="button" />&nbsp;
				<input type="reset" class="button" />   
                  </form>
			</div>
        <div id ="showfooddaily"> 
             <h2>Food Log</h2>
            
		      <form name="showfooddaily" method="POST" action="" >
				<input type="submit"  name="showfooddaily" class="button" />&nbsp;
                  </form>
			</div>
        
        <div id = "daily">
               <p>
        <p> </p>Welcome  <?php echo $_SESSION['Username']; ?></$php$_SESSION[> this is your food log. Click food log submit button too see your updated log<p>
        
             <?php 
             //displays the results
            if (!empty($_POST['showfooddaily'])) {
               $max =  sizeof($dailys);
                for($x = 0; $x < $max; $x++)    
                {
                     $daily = $dailys[$x];
                    ?>
                <p id = "res">
                    <?php
                    echo ($daily['name']. ' ');
                     ?>
               <?php echo ($daily['type'].' ');?>

               <?php echo ($daily['cal'].' ');}
            } ?>
                    <br>
                    </p>
    
                
             </p>
        
        </div>
<a id = logout href="logout.php">Log Out</a>
        
        
</body>
</html>