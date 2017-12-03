<?php
include('config.php');

if (!empty($_POST['addfood'])) {
	// input from fourm
	$name = $_POST['name'];
	$type = $_POST['type'];
    $cal = $_POST['cal'];
    
	// insert into finalfood
	$sql = file_get_contents('sql/insertFood.sql');
	$params = array(
        'name' => $name,
        'type' => $type,
        'cal' => $cal
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
}

//remove a food
if (!empty($_POST['renamefood'])){
    $rname=$_POST['rname'];
    $sql = file_get_contents('sql/removeFood.sql');
	$params = array(
        'rname' => $rname
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
 }

//search word by name or type or both
if (!empty($_POST['search'])){
    
    $searchterm = $_POST['searchterm'];
	$searchtype = $_POST['searchtype'];
	
     $sql = file_get_contents('sql/searchFood.sql');
	   $params = array(
		'searchterm' => $searchterm,
		'searchtype' => $searchtype
	    );
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$foods = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        #logout 
        {
           position: absolute;
           background-color: lightgreen;
            top: 30%;
            left: 90%;
             border: 2px solid black;
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
        #foodfourm{
            position: absolute;
            top: 40%;
            left: 2%;
            background-color:orange;
            border: 5px solid black;
        }
   
          #removefoodfourm{
            position: absolute;
            top: 70%;
            left: 2%;
            background-color:orange;
            border: 5px solid black;
        }
        #foodlist{
            position: absolute;
            left: 30%;
            top: 40%;
            width: 600px;
            background-color: white;
            border: 5px solid black;
        }
       
        #search{
            left:40%;
        }
        #res{
        background-color: greenyellow;
        }
        
    </style>
    <head>
	<meta charset="utf-8">
    <title> Enter Food </title> 
   </head>
    
    <body>
         
        <!-- <img class="logo" src="Pics/logo.png" alt="logo" title =" logo Banner"> -->
        
        <div id ="banner"> </div>
        
        <nav>
            <div id = "n1">
            <a  href="home.php"> <strong> Home </strong> </a>
            </div>

           <div id = "n2">
            <a href= "dailyfood.php"> <strong> Daily Intake </strong> </a>
            </div>
            
            <div id = "n3">
            <a   href="checkhealth.php"> <strong> check Health </strong> </a>
            </div>
            
         </nav>  
        
        <div id ="foodfourm"> 
             <h2>Add a new food item</h2>
            
		      <form name="addfood" method="POST" action="" >
                  
				<label>Food Name</label>
					<input type="text" name="name" placeholder="Foodname"/>
                  <br>
                  
			        <label>Food type</label>
					<select name="type">
                        <option value="Fruit">Fruit</option>
                        <option value="Vegges">Vegges</option>
                        <option value="Drink">Drink</option>
                        <option value="Meat">Meat</option>
                         <option value="Carb">Carb</option>
                        <option value="Fat">Fat</option>
                     </select>
                <br>
                  
                  <label>Ammount of calories</label>
					<input type="number" name="cal" placeholder="Calories"/>
                  <br>
                  
				<input type="submit"  name="addfood" class="button" />&nbsp;
				<input type="reset" class="button" />   
                  </form>
			</div>
        
        
         <div id ="removefoodfourm"> 
             <h2>Remove food item</h2>
            
		      <form name="renamefood" method="POST" action="" >
                  
				<label>Food Name</label>
					<input type="text" name="rname" placeholder="Foodname"/>
                  <br>
				<input type="submit" name="renamefood" class="button" />&nbsp;
				<input type="reset" class="button" />   
                  </form>
			</div>
		
        
         <div id ="foodlist"> 
               <div id="Search">
                   <label>Search by Name</label>
                <form  name="search" method="POST">
			     <input type="text" name="searchterm" placeholder="Search..." />
                    <br>
                    <label>Search by type</label>
					<select name="searchtype">
                        <option value=""></option>
                        <option value="Fruit">Fruit</option>
                        <option value="Vegges">Vegges</option>
                        <option value="Drink">Drink</option>
                        <option value="Meat">Meat</option>
                         <option value="Carb">Carb</option>
                          <option value="Fat">Fat</option>
                     </select>
                    <br>
			        <input name="search" type="submit" />
                    </form> 
                  </div>
            <p>

             <?php 
                if (!empty($_POST['search'])){
                 $max =  sizeof($foods);
                for($x = 0; $x < $max; $x++)    
                {
                     $food = $foods[$x];
                    ?>
                <p id = "res">
                    <?php
                    echo ($food['name']. ' ');
                     ?>
               <?php echo ($food['type'].' ');?>

               <?php echo ($food['cal'].' ');}}
                     ?>
                    <br>
                    </p>
    
                
             </p>
             
             </div>
    <a id = logout href="logout.php">Log Out</a>
          
</body>
</html>