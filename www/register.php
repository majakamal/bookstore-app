<?php
 
 $db = mysqli_connect("localhost", "root", "majakamal", "admin")

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     

     <?php 

     if (array_key_exists('submit', $_POST)) {
     	$error =  [];
     }

     	if(empty($_POST['firstname'])){
				$error[] = "Enter first name";
				}else{
					$fname = mysqli_real_escape_string($db, $_POST['firstname']);
					}

		if (empty($_POST['Lastame'])) {
			$error[] = "Enter Lastname"; 

		}	else {
			$lname = mysqli_real_escape_string ($db, $_POST['Lastname']);

		}

		if (empty($_POST['email'])) {
			$error[] = "Enter Email";
		} else {
			$email = mysqli_real_escape_string ($db, $_POST['email']);
		}

		if(empty($_POST['Password'])) {
			$error[] = "Enter Password";
		} else {
			$pword = mysqli_real_escape_string($db, $_POST['password']);
		}
		if(empty($error)) {

			$insert = msqli_querry ($db, "INSERT INTO admin VALUES (NULL,
																		'".$fname."',
																		'".$lname."',
																		'".$email."',
																		'".$pword."')") or die (mysqli_error());




		$success = "Registration Successful";
		header ("location:register.php?succes=$success");

		} else {
			foreach ($error as $error) {
				echo $error.'<br/';
			}

		   }
	

		if (isset($_GET['success'])){
			$succed = $_GET['success'];
			echo $succed;
			}
?>






     ?>

		<form id="register" action="register.php" method="post"/>

		<p> Firstname: <input type="text" name="fname"/> </p>
		<p> Lastame :<input type="text" name="lname"/></p>
		<p>Email :<input type="text" name="email"/></p>
		<p>Password : <input type="Password" name="pword"/></p>
		<p> Confirm Password : <input type="Password" name="pword"/></p>

		<input type="submit" name="register" value="register"/>
		</form>


</body>
</html>