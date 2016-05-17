<?php
session_start();
session_destroy();
 
echo '<script language="javascript">alert("You are succesfully logged out!"); document.location="login.php";</script>';
?>