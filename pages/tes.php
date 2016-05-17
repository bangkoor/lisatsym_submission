<?php
if(isset($_POST['submit'])){
	for($x=1;$x<=3;$x++){
			$fig[$x] = @$_FILES['input[$x]']['name'];
			echo $x."<br/>";
		}
}
?>
<form method="POST">
<input type="text" name="input[1]"></input><br/>
<input type="text" name="input[2]"></input><br/>
<input type="text" name="input[3]"></input><br/>
<input type="submit" name="submit" value="kirim"></input>
</form>