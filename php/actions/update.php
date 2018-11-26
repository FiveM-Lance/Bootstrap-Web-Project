<?php
	error_reporting(0);
    session_start();
	$response = array();

	include $_SERVER["DOCUMENT_ROOT"] . "/php/assets/db.php";
	
	// Update Username //
	
	if(isset($_POST['new_username']))
    {
		$response["new_username"] = array(
			"updating" 	=> false,
			"status" 	=> false,
			"msg" 		=> "",
			"form_id"	=> "#user-name",
			"input_id"	=> "new_username"
		);

		if ($_POST['new_username'] == '')
		{
			$response['new_username']['updating'] = false;
			$response['new_username']['status'] = false;
		}
		else
		{
			$response['new_username']['updating'] = true;
			$username = mysqli_real_escape_string($conn, $_POST['new_username']);
			$sql  = "select username from users where username='".$username."'";
			$res    = mysqli_query($conn, $sql);
			$count  = mysqli_num_rows($res);
			if($count > 0)
			{
				$response['new_username']['status'] = false;
				$response['new_username']['msg'] = 'This username is already taken.';
			}
			else if(strlen($username) < 6 || strlen($username) > 15){
				$response['new_username']['status'] = false;
				$response['new_username']['msg'] = 'Your username must be 6 to 15 characters';
			}
			else if (!preg_match("/^[a-zA-Z0-9]+$/", $username))
			{
				$response['new_username']['status'] = false;
				$response['new_username']['msg'] = 'Use alphanumeric characters only (a-Z, 0-9).';
			}
			else
			{
				$query = "UPDATE users SET username='".$username."' WHERE id = ".$_SESSION["user_id"].";";
				mysqli_query($conn, $query);
				$_SESSION['username'] = $username;
				$response['new_username']['status'] = true;
				$response['new_username']['msg'] = 'Updated!';
			}
		}
		
	}
	
	// Update Displayname //

	if(isset($_POST['new_displayname']))
	{
		$response["new_displayname"] = array(
			"updating" 	=> false,
			"status" 	=> false,
			"msg" 		=> "",
			"form_id"	=> "#display-name",
			"input_id"	=> "new_displayname"
		);

		$displayname = mysqli_real_escape_string($conn, $_POST['new_displayname']);

		if ($_POST['new_displayname'] == '') 
		{
			$response['new_displayname']['updating'] = false;
			$response['new_displayname']['status'] = false;
		}
		else 
		{
			$response['new_displayname']['updating'] = true;
			if(strlen($displayname) > 15){
				$response['new_displayname']['status'] = false;
				$response['new_displayname']['msg'] = 'Your display name must be 15 characters or lower.';
			}
			else if (!preg_match("/^[a-zA-Z0-9 ]+$/", $displayname))
			{
				$response['new_displayname']['status'] = false;
				$response['new_displayname']['msg'] = 'Use alphanumeric characters only (a-Z, 0-9).';
			}
			else
			{
				$sql  = "select displayname from users where displayname='".$displayname."'";
				$res    = mysqli_query($conn, $sql);
				$count  = mysqli_num_rows($res);
				$query = "UPDATE users SET displayname='".$displayname."' WHERE id = ".$_SESSION["user_id"].";";
				
				mysqli_query($conn, $query);
		
				$_SESSION['displayname'] = $displayname;
		
				$response['new_displayname']['status'] = true;
				$response['new_displayname']['msg'] = 'Updated!';
			}
		}
	}

	if(isset($_FILES["new_profilepicture"]["name"])) 
	{
		$response["new_profilepicture"] = array(
			"updating" 	=> true,
			"status" 	=> true,
			"msg" 		=> "",
			"form_id"	=> "#profile-picture",
			"input_id"	=> "new_profilepicture"
		);
		// Update Profile Picture //
		$extension = pathinfo($_FILES["new_profilepicture"]["name"], PATHINFO_EXTENSION);
		$name = $_SESSION['user_id'];
		$target_dir = "/images/users/";
		$target_file = $target_dir . basename($_FILES["new_profilepicture"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["new_profilepicture"]["tmp_name"]);
		if($check == false) {
			$response["new_profilepicture"]["msg"] = "File is not an image.";
			$response["new_profilepicture"]["status"] = false;
		}
		// Check file size
		if ($_FILES["new_profilepicture"]["size"] > 5000000) {
			$response["new_profilepicture"]["msg"] = "Sorry, your file is too large.";
			$response["new_profilepicture"]["status"] = false;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			$response["new_profilepicture"]["msg"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$response["new_profilepicture"]["status"] = false;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($response["new_profilepicture"]["status"] == true)  
		{
			if (move_uploaded_file($_FILES["new_profilepicture"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . $target_dir . $name . "." . $extension)) 
			{
				$profilePictureLocation = 'images/users/'. $name .'.'. $extension;
				$response["new_profilepicture"]["msg"] 		= "The profile picture has been updated.";
				$response["new_profilepicture"]["status"] 	= true;
				$conn->query("UPDATE users SET profile_picture = '" . $profilePictureLocation . "' WHERE id=". $_SESSION['user_id'] .";");
				$_SESSION['profile_picture'] = $profilePictureLocation;
			} 
			else 
			{
				$response["new_profilepicture"]["msg"] 		= "Sorry, there was an error uploading your file.";
				$response["new_profilepicture"]["status"] 	= false;
			}
		}
	}
	echo json_encode($response);
?>