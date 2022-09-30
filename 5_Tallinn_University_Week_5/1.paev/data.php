<?php
	//ühendan sessiooniga
	require("functions.php");

	//kui ei ole sisseloginud, suunan login lehele
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");
	}
	//kas aadressireal on logout
	
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
	}

?>
<h1>Data</h1>

<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a>
<br><br	

		<form method="POST" >
				<label>Age</label><br>
			<input name="signupEmail" type="text">
			
			<br><br>
				
				<label>Color</label><br>
			<input name="signupPassword" type="color">
			
			<br><br>
			
			
			<input type="submit" value="Salvesta">
			
			</form>
</p>