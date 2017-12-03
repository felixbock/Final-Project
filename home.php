<?php
include('config.php');
?>

<!doctype html>
<!--An individual final project that will allow for the use of learned concepts this semester.

Required elements: (70 pts)
	- A configuration file that connects to a database, includes functions.php and autoloads classes
      R: In config file
	- Two forms that support add/edit functionality
        R: 1.add food edit 2.food add/edit user info 3. add daily food

	- At least one listing page that is searchable 
         R: Enter food page by name and/or food type
	- Usage of session variables somehow in the application
          login/userid/username
	- A database with at least 3 tables, 2 or which are related
        finalu = user databace
        finalfood = food databace            //all related
        finaldaily =food for the day record

	- Use an SQL query with a JOIN statement
          R: showdailyJOIN.sql in sql folder used to show daily food eaten

	- Make use of an OOP class somewhere in the application
       R:Person class for health

	- Use a function or class method other than the constructor method
      R:person class method to calsulate BMI 

	- Properly print variables inside of HTML
      both listings and names shown
	- Project hosted on github
     R:yes url given
	
Creativity (20 pts)
	- Aesthetically pleasing design implemented
	- Idea showed effort and creativity
Presentation (10 pts)
	- Present to the class your completed project pointing out how you implemented some of the required elements (max 5 minutes)
	- Attendance during both day of presentations (no electronics allowed)
/////////////////////////////////////////////////////////////////////////////////////-->
<html>
 <head>
    <title> Health Tracker Home </title> 
   </head>
	
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
        #content{
            position: absolute;
            top: 40%;
            left: 20%;
            width: 60%;
            background-color:white;
            border: 5px solid black;
        }
        h1{
            align-content: center;
            background-color: darkorange;
          
        }
        h2{
             align-content: center;
            
            background-color: darkorange;
            
        }
    #logout 
        {
           position: absolute;
           background-color: lightgreen;
            top: 30%;
            left: 90%;
             border: 2px solid black;
        }
        p{
          background-color: lightgreen;  
        }
    </style>
    
    <head>
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
            <a   href="checkhealth.php"> <strong> check Health </strong> </a>
            </div>
         </nav> 
        
        <div id="content">
            <h1><strong> Welcome  <?php echo $_SESSION['Username'];?> to our food tracker</strong></h1>
        <img src="pics/health.jpg"  title ="health" width= "100%">
        <p> We hope that you can find lots of usefulness in this website and use it to improve yourself and help your fitness and diet journey. One of the largest factors for weight loss and health is diet and with this website you can get in great shape too.</p>
              <h2> Daily food</h2>
            <p>
               Daily food is a page that connects to you and shows you what you are for today as you eat add food to this page.
            </p>
            <h2> Check Out Addfood</h2>
            <p>
                On this page  you can check the food we have and if we don't have a record of what you want you can just add it. You can also remove bab records you come across. Search for your fav foods.
            </p>
            <h2> Check Health</h2>
            <p>
            On this page we will teach you about bmi and calculate it for you. This can be a useful tool in order to track your progress or see where you are in your fitness journey. It's easy just enter your weight and height and we will do the rest.
            </p>

          
        </div>
        <a id = logout href="logout.php">Log Out</a>
    
    </body>
</html>