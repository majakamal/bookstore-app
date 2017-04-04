<?php # test.php sandbox

/*define('DBUSER', 'root');
define('DBPASS', 'majakamal');

try {
	# prepare a pdo instnce 

$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

# set verbose  error modes
$conn->setAttributes(PDO: :ATTR_ERRMODE, PDO: :ERRMODE_SILENT);
} catch(PDOException $e) {
	echo $e->getmessage(;)

}*/

# max file size...
define("MAX_FILE_SIZE", "2097152");

if(array_key_exists('save', $_POST)){

	$error = [];

	# be sure a file was selected..
	if(empty($_FILES['pic']['name'])) {
		$error[]= "please choose a file";
	}

	#check file size ...
	if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		$error[]= "File size exceed maixmum. maximum:".MAX_FILE_SIZE; 
	}

	#generate random number to append 
	$rnd= rand(0000000000, 9999999999);

	# strip filename  for spaces
	$strip_name = str_replace("", "_", $_FILES['pic']['name']);

	$filename = $rnd.$strip_name;
	$destination = 'upload/'.$filename;

	if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
		$errors[] = "file upoad failed";
	}
	if(empty($error)) {
		echo "done";
	} else {   
		foreach ($error as $err) {
			echo $err. '</br';
		} 
	}
}


?>

<form id="register" method="POST" enctype="multipart/form-data">
<p>please upload a file </p>
<input type="file" name="pic">

<input type="submit" name="save">
</form>