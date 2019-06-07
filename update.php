<?php
	session_start();

	$_SESSION['useename']='admin';
	$_SESSION['password']='12345';

	if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin' and $_SESSION['password']=='12345' ) {
     	?>
	
		<!DOCTYPE html>
		<html>
		<head>
			<title>add new text</title>
			<style type="text/css">
				*{
					background-color:  navajowhite;
				}
				.add{
					width: 25%;
					height: 700px;
					background-color: sandybrown;
					margin-top: 80px;
					margin-left: 700px;
				}
				.tit{
		            width: 80%;
		            height: 40px;
					margin-left: 60px;
					font-size: 30px;
				}
				textarea{
					margin-left: 60px;
					font-size: 12px;
				}
				.post{
					width: 40%;
					height: 40px;
					margin-left: 150px;
					font-size: 15px;

				}
				h2{  font-style: italic;
					text-align: center;
					margin-top: 100px;
					color: rgb(99, 97, 99);
				}
				input{
					background-color: white;
				}
			</style>
		</head>
		<body>
			<h2>UPDATE POST</h2>
		<div class="add">
			
			<form action="" method="post" style="background-color: sandybrown;">
				
				<input type="text" name="title" placeholder="title" class="tit" style="margin-top: 20px"><br><br><br>
				<input type="text" name="kind" placeholder="type" class="tit"><br><br><br>
				<textarea placeholder="Content" name="content" rows="20" cols="50" style="background-color: white;"></textarea><br> <br><br>
				<input type="submit" name="submit" value="UPDATE" class="post">
				<input type="submit" name="back" value="BACK" class="post" style="margin-top: 20px;">
			</form>
		</div>
		</body>
		<?php


		
			if(isset($_POST['submit'])){
                $id = $_SESSION['id'];
				$title = strip_tags($_POST['title']);
				$kind = strip_tags($_POST['kind']);
			    $content = strip_tags($_POST['content']);

			    if($title==null || $content==null || $kind==null){
			    	?>
					    <script type="text/javascript">
					 		alert('Please fill all places');
					    </script>
			    	<?php
			    	return;
			    }
			    else{
			    	$conn = mysqli_connect('localhost','root', '','project');
			    	
			    	$date = date('l jS \of F Y h:i:s A');
			    	$sql = "UPDATE data 
			 SET title= '$title', type='$kind', content='$content', data='$date'
			 WHERE id= '$id'
			 ";
			          if(mysqli_query($conn, $sql)){
			          	 	?>
			 <script type="text/javascript">
			 	alert('successfully added');
			 </script>
			    	<?php
			    	header('Location: '.$_SERVER['PHP_SELF']);
			    	header('Location: tech.php');
			          }
			          else
			          	echo "error to add".mysqli_error($conn);
			    }

			}
			if(isset($_POST['back'])){
				header('Location: second.php');
			}
		
		

		?>
		</html>
		<?php
} else {
		echo "You are not admin";	

	}

?>