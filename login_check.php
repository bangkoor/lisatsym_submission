<?php
include('config.php');
if(isset($_POST['login'])){
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	//untuk menentukan expire cookie, dihtung dri waktu server + waktu umur cookie          
	$time = time();                 
	//cek jika setcookie di cek set cookie jika tidak ''
	$check = isset($_POST['setcookie'])?$_POST['setcookie']:'';
	
	$sql = mysqli_query($link, "SELECT * FROM tbl_user WHERE username='".$user."' AND password='".$pass."'");
	if(mysqli_num_rows($sql) == 0){
		echo '<script language="javascript">alert("User not found! Please make sure the username and password you entered is all correct"); document.location="login.php";</script>';
	}else{
		$row = mysqli_fetch_assoc($sql);
		if($row['level'] == 1){
			$_SESSION['admin']=$user;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin/index.php";</script>';
		}else{
			$_SESSION['user']=$user;
			echo '<script language="javascript">alert("Welcome '.$_SESSION['user'].'! You are successfully logged in as User!"); document.location="index.php";</script>';
		}
	if($check) {        
			setcookie("cookielogin[user]",$user , $time + 3600);        
			setcookie("cookielogin[pass]", $pass, $time + 3600);    
			}
	}
}
?>