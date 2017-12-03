<?php
include('config.php');
//to reduce error message
$weight = 0;
$height =0;

// makes new class with varabals and updates the height and weight of current user
if (!empty($_POST['bmi'])) {
	// input from fourm
	$weight = $_POST['weight'];
	$height = $_POST['height'];
    $username = $_SESSION['Username'];
    //userid = $session()
    
    
	// updates the record to new weight and height
	$sql = file_get_contents('sql/updatefinalu.sql');
	$params = array(
        'weight' => $weight,
        'height' => $height,
        'username' =>$username
	);
    
	$statement = $database->prepare($sql);
	$statement->execute($params);
    
    //make a class with the new data in order to use the bmi function
     $person = new Person($username,$weight,$height);
    

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
        #logout 
        {
           position: absolute;
           background-color: lightgreen;
            top: 30%;
            left: 90%;
             border: 2px solid black;
        }
        
        #content{
            position: absolute;
            top: 40%;
            left: 25%;
            background-color:white;
            border: 5px solid black;
        }
        
        #results
        {
            position: absolute;
            top: 60%;
            left: 10%;
            background-color:greenyellow;
            border: 5px solid black;
        }
        #large{
          font-size: 2em;  
        }
        
    </style>
    <head>
	<meta charset="utf-8">
    <title>Health Tracker</title> 
   </head>
    
    <body>
        
        <div id ="banner"> </div>
        
        <nav>
            <div id = "n1">
            <a  href="enterfood.php"> <strong> Add Food </strong> </a>
            </div>

           <div id = "n2">
            <a href= "dailyfood.php"> <strong> Daily Intake </strong> </a>
            </div>
            
            <div id = "n3">
            <a   href="home.php"> <strong> Home </strong> </a>
            </div>
         </nav> 
        <div>
        
         <div id ="content"> 
             <h2>Calculate your BMI</h2>
		      <form name="bmi" method="POST" action="" >
                  
				<label>Enter in your Weight</label>
					<input type="text" name="weight" placeholder="kg"/>
                  
                  <label>Enter in your Height</label>
					<input type="text" name="height" placeholder="meters"/>
                  
                  <br>
				<input type="submit" name="bmi" class="button" />&nbsp;
				<input type="reset" class="button" />   
                  </form>
			</div>
            
            <div id = "results">
            <img src="pics/bmi.jpg"  title ="bmi" width= "100%">
                <p> Your bmi can be an indicator on your overall health. please compare your score with the chart. </p>
                <pid = "large"><stong>Your BMI is :<?php if (!empty($_POST['bmi'])) { echo($person->getBMI()); }?></stong></p>
            </div>
        
        
        
        </div>
        <a id = logout href="logout.php">Log Out</a>
    
</body>
</html>