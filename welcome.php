<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<style type="text/css">
		*{
		overflow-x: hidden;
		}
		.topnav {
  background-color: #333;
  overflow: hidden;
}


.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}


.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
		.header{
			width: 100%;
			height: 100px;
			background-color :linen;
			text-align: center;
		}
	.back{
		background-image: url("pic5.jpg");
		background-size: 100% auto ;
		height: 700px;
		text-align: center;
		padding-top: 50px;
		background-repeat: no-repeat;
		 transition: 1s;
	}
	 .back:hover{;
          opacity: 0.5;
          filter: alpha(opacity=50);
          transition: 1s;
        }
        .back>h2{
        background-color:  rgb(240,128,128);
        width: 50%;;
        padding: 10px 50px 10px 60px;
	    	color:rgb(500,0,0);
        font-family: Righteous;
	    	margin-left: 10%;
	    	font-size: 50px;
        position: relative;
        top: 20%;
        left: 12%;
	    	}
        .back>h2:hover{
          background-color: rgb(205,92,92);
          transition: 1s;
        }
	
	.form{
    width: 20%;
    height: 200px;
   margin-top: 70px;
    float: right;
    text-align: center;
    padding-top: 20px;
    background-color: tomato;
    
    z-index: 10;
	}
	input{
		width: 50%;
		height: 30px;
		 background-color: linen;
	}
 .add{
 	display:none;
 }
 .content{
		border: 2px solid navajowhite;
		width: 100%;
		height: 300px;
		background-color: linen;
		margin-left: 0px;
		padding-left: 10px;
		position: absolute;
		z-index: -3;
	}
	.type{
		background-color: tomato;
		width: 30%;
		margin-left: 600px;
		height: 50px;
		text-align:center;
		padding-top: 20px;
		font-size: 20px;
		position: absolute;

	}
	</style>
</head>
<body>
 <div class="topnav">
  <a class="active" href="welcome.php">ALL TOPICS</a>
  <a href="techWel.php">TECH</a>
  <a href="healthwel.php">HEALTH</a>
  <a href="travelWel.php">TRAVEL</a>
</div> 
	

<div class="back">
	<h2>Welcome to Sevinc's Blog!</h2>
</div>
<div class="type">All topics</div>
<div class="form">
<form action="" method="post" style=" background-color: tomato;">
	username
	<input type="text" name="username">
	<br><br>
	password
	<input type="password" name="password">
	<br><br>
	<input type="submit" name="submit" value="Log in">
</form>
</div>

	<div class="add">
		<a href="add.php"> add new text </a>
	</div>


</body>

<?php
ob_start();
session_start();
$_SESSION['username'] = "default";
$_SESSION['password'] = "default";
if(isset($_POST['submit'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($username == 'admin' and $password =='12345'){  
    $_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
			
   header("Location: second.php");

	}
}

$user = $_SESSION['username'];
$pass = $_SESSION['password'];
$conn = mysqli_connect('localhost','root', '','project');
 if(!$conn){
 	die( "connection problem");
 }

 $sql = 'SELECT * FROM data ORDER BY id DESC';
 $x=70;
   $res = mysqli_query($conn, $sql) or die('problem with get data');
   if(mysqli_num_rows($res)>0){
   	while($row = mysqli_fetch_assoc($res)){
   		$id = $row['id'];
   		$title = $row['title'];
   		$type = $row['type'];
   		$content = $row['content'];
   		$date  = $row['data'];
   			echo "<div class='content' style='margin-top:".$x."px'>";
   	   $x = $x+350;
   	   echo "<h2 style='color:green;'> TITLE:   ".$title."</h2>";
   	   echo "<h2 style='color:tomato;'> TYPE:    ".$type."</h2>";
   	   echo "<h3>".$content."</h3>";
   	   echo "<h3> DATE:    </h3>".$date
   		?>

	<tr><td><form method="post" action=<?php $_SERVER['PHP_SELF']; ?>>

	<input type="hidden" name="rowid" value=<?php echo $row['id']; ?>>
	</form></td> </tr></div>
	<?php
	

	
}

  
	mysqli_close($conn);
	}
   	
   		
   	
  
   





?>
</html>