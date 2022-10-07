<?php
	// Ühendan sessiooniga.
	require("functions.php");

	// Kui ei ole sisseloginud, suunan login lehele.
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");
	}

	// Kas aadressireal on logout?
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
	}

?>

<h1>Data</h1>
<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">logi välja</a> <!-- Lisab ?logout=1 aadressi reale log -->
</p>