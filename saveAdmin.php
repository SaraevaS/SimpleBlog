<?php
session_start();
$_SESSION['useename']='admin';
	$_SESSION['password']='12345';
if($_SESSION['username']=='admin' and $_SESSION['password']=='12345' ){
?>


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

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
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
   
    float: right;
    text-align: center;
    padding-top: 20px;
    background-color: linen;
	}
	input{
		width: 50%;
		height: 30px;
		 background-color: linen;
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
	.add{
		float: left;
		width: 30%;
		height: 50px;
		background-color: linen;
		text-align:center;
		padding-top: 20px;
		font-size: 20px;
		
	}
	.content{
		border: 2px solid navajowhite;
		width: 100%;
		height: 300px;
		background-color: linen;
		margin-left: 0px;
		padding-left: 10px;
		position: absolute;
	}
.iki{width: 100%;
	height: 700px;


}

	</style>

</head>
<body>

	 <div class="topnav">
  <a class="active" href="second.php">ALL TOPICS</a>
  <a href="tech.php">TECH</a>
  <a href="health.php">HEALTH</a>
  <a href="travel.php">TRAVEL</a>
</div> 


<div class="back">
	<h2>Welcome to Sevinc's Blog!</h2>
</div>

<div class="type"><?php echo " ".$name." "?> topics</div>

	<div class="add">
		<a href="add.php"> add new text </a>
	</div>
<form action="" method="post">
	<input type="submit" name="logout" value="Log out" style="float: right; width: 50%; height: 70px; font-size: 20px">
</form>


</body>

<?php
ob_start();

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	if($username == 'admin' and $password =='12345'){  
    $_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
$conn = mysqli_connect('localhost','root', '','project');
 if(!$conn){
 	die( "connection problem");
 }
 $sql = 'SELECT * FROM data ORDER BY id DESC';
       $x=50;
   $res = mysqli_query($conn, $sql) or die('problem with get data');
   $say = 0;
   if(mysqli_num_rows($res)>0){
   	while($row = mysqli_fetch_assoc($res)){
   		$id = $row['id'];
   		$title = $row['title'];
   		$type = $row['type'];
   		$content = $row['content'];
   		$date  = $row['data'];
   		
   		if($type==$name ||$type==$name2 ||$type==$name3){
   			$say++;
   	echo "<div class='content' style='margin-top:".$x."px'>";
   	   $x = $x+350;
   	   echo "<h2 style='color:green;'> TITLE:   ".$title."</h2>";
   	   echo "<h2 style='color:tomato;'> TYPE:    ".$type."</h2>";
   	   echo "<h3>".$content."</h3>";
   	   echo "<h3> DATE:    </h3>".$date
		?>
	<tr><td><form method="post" action=<?php $_SERVER['PHP_SELF']; ?>>
	<input type="submit" name="delete" value="delete"/ style="width: 20%">
	<input type="submit" name="edit" value="edit"/ style="width: 20%">
	<input type="hidden" name="rowid" value=<?php echo $row['id']; ?>>
	</form></td> </tr></div>
	<?php
}
 
  if(isset($_POST['delete'])){
	$sql2="DELETE FROM data WHERE id=".$_POST['rowid'];
	echo "row has been deleted!";
	mysqli_query($conn,$sql2);
	header('Location: '.$_SERVER['PHP_SELF']);
}
if(isset($_POST['edit'])){
	$_SESSION['id']= $id;
   header("Location: update.php");
	
}}}
if($say==0){
	echo "<div style='margin-top:20px;'>There is no data to display </div>";
	}
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: welcome.php');
}
	mysqli_close($conn);
	}
   	
   		
   	
   	else 
   		echo "you are not an admin!!!";
  
   



}
else
echo "you are not an admin";

?>

</html>