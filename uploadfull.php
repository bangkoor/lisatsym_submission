<?php
$query = mysqli_query($link, "SELECT * FROM tbl_user WHERE username='".$sessionUser."'");
$query_title = mysqli_fetch_array($query);

$userID 	= $query_user['user_id'];
$namaFile	= $userID;

if(isset($_POST['submitProfile'])){
	$allowed_ext	= array('png', 'jpg', 'gif', '');
	$file_name 		= $_FILES['file']['name'];
	$value			= explode('.', $file_name);
	$file_ext		= strtolower(array_pop($value));
	$file_size		= $_FILES['file']['size'];
	$file_tmp		= $_FILES['file']['tmp_name'];

	$password 		= @$_POST['password'];
	$salutation 	= @$_POST['salutation'];
	$firstname 		= @$_POST['firstname'];
	$lastname 		= @$_POST['lastname'];
	$email 			= @$_POST['email'];
	$institution 	= @$_POST['institution'];
	$address 		= @$_POST['address'];
	$phone 			= @$_POST['phone'];
	$type 			= @$_POST['type'];
	$topic 			= @$_POST['topic'];
	
	$errorProfpic = "";
	
	
	if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 102400){
						if(!$file_name == NULL){
							$queryEdit = mysqli_query($link, "UPDATE tbl_user SET profpic='".$namaFile.".".$file_ext."' WHERE username='".$sessionUser."';");
						}
						$lokasi = 'data/images/user_profile/'.$namaFile.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$queryEdit = mysqli_query($link, "UPDATE tbl_user SET password='".$password."', salutation='".$salutation."', firstName='".$firstname."', lastName='".$lastname."', email='".$email."', institution='".$institution."', address='".$address."', phone='".$phone."', type='".$type."', topic='".$topic."' WHERE username='".$sessionUser."';");
	
						echo "<meta http-equiv='refresh' content='0;url='profile.php''>";						
					}else{
						$errorProfpic = "ERROR: File is to large! (max = 100 kb)";
					}
				}else{
					$errorProfpic = "ERROR: File extention not allowed! Please use jpg, png, or gif";
				}
}
?>