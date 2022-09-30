<?php

	//var_dump($_GET);
	
	//echo "<br/>";
	
	$signupEmailError = "";
	
	//var_dump($_POST);
	
	
	//kas keegi vajutas nuppu ja kas on olemas
	
	if (isset($_POST["signupEmail"])) {
		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupEmail"])) {
			
			//on tühi
			$signupEmailError = "Väli on kohustuslik!";
		} 
	}
	
	// kas epost on tühi sssss
	
	
	$signupPasswordError = "";
	
	//var_dump($_POST);


	//kas keegi vajutas nuppu ja kas on olemas
	
	if (isset($_POST["signupPassword"])) {
		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupPassword"])) {

			//on tühi
			$signupPasswordError = "Väli on kohustuslik!";
		} else {
			
			//parool ei olnud tühi
			if( strlen($_POST["signupPassword"]) < 8) {
				
				$signupPasswordError = "* Parrol peab olema vähemalt 8 tähemärki pikk";
			}
		}
	}

	// SURENAME CONTROLL

	$signupSurnameError = "";

	if (isset($_POST["signupSurname"])) {
		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupSurname"])) {

			//on tühi
			$signupSurnameError = "Väli on kohustuslik!";
		}
	}

	// FORENAME CONTROLL
	$signupForenameError = "";

	if (isset($_POST["signupForename"])) {
		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupForename"])) {

			//on tühi
			$signupForenameError = "Väli on kohustuslik!";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Logi Sisse</h1>

	<form method="POST">
		<input name="loginEmail" placeholder="E-post" type="email">
			<br/><br/>
		<input name="loginPassword" placeholder="Parool" type="password">
			<br/><br/>
		<input type="submit" value="Logi sisse">
			<br/><br/>
			<br/><br/>
	</form>
	
<h1>Loo kasutaja</h1>

	<form method="POST">
		<input name="signupEmail" placeholder="E-post" type="email"> <?php echo $signupEmailError; ?>
			<br/><br/>
		<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
			<br/><br/>
		<input name="signupSurname" placeholder="First name " type="text"> <?php echo $signupSurnameError; ?>
			<br/><br/>
		<input name="signupForename" placeholder="Last name" type="text"> <?php echo $signupForenameError; ?>
			<br/><br/>
		<input type="submit" value="Loo Kasutaja">
	</form>
</body>
</html>