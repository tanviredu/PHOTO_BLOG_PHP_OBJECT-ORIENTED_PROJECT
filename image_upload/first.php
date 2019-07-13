<?php 
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="uploadfile" value="">
		<input type="submit" name="submit" value="Upload file">
	</form>

</body>
</html>

<?php 
	$folder = "student/";
	 //echo $_FILES['uploadfile'];
	 // when you upload a file there produce a multiple array
	 // with a name and temp name and size we extract the value from it
	 //echo $folder;

	echo getcwd();
	 echo "<hr/>";

	 $filename=$_FILES['uploadfile']["name"];
	 $tempname=$_FILES['uploadfile']["tmp_name"];
	 $folder = "student/".$filename;
	 echo $folder;
	 echo "<hr/>";
	 echo $tempname;
	 move_uploaded_file($tempname, $folder);

	// try also save the image name into database
	 // so you can iterate through the database later and 
	// show all the images



	?>
	<img src="student/myimage.jpg" height="100px" width="100px;">