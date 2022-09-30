<?php 
	
	require("../../config.php");
	var_dump($GLOBALS);
	require("./functions.php");
	
	//Emaili muutujad.
	$signupEmailError = "*";
	$signupEmail = "";
	
	//kas emaili muutuja on olemas?
	if (isset ($_POST["signupEmail"])) {
		
		// kas epost on tühi
		if (empty ($_POST["signupEmail"])) {
			$signupEmailError = "* Väli on kohustuslik!";
		} else {
			$signupEmail = $_POST["signupEmail"];
		}
	}
	
	$signupPasswordError = "*";
	
	// kas parooli muutuja on olemas?
	if (isset ($_POST["signupPassword"])) {

		// kas parool on tühi
		if (empty ($_POST["signupPassword"])) {
			$signupPasswordError = "* Väli on kohustuslik!";
		} else {

			// Kas parooli pikkus on vähem kui 8.
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				$signupPasswordError = "* Parool peab olema vähemalt 8 tähemärkki pikk!";
			}
		}
	}
	
	//vaikimisi väärtus
	$gender = "";
	
	// Kas sugu muutuja on olemas?
	if (isset ($_POST["gender"])) {

		// Kas sugu on tühi
		if (empty ($_POST["gender"])) {
			$genderError = "* Väli on kohustuslik!";
		} else {
			$gender = $_POST["gender"];
		}
	}
	
	
	if ( $signupEmailError == "*" AND
		 $signupPasswordError == "*" AND
		 isset ($_POST["signupEmail"]) AND
		 isset ($_POST["signupPassword"])
	)	{
		
		//vigu ei olnud, kõik on olemas
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		echo "parool".$_POST["signupPassword"]."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo $password;
		
		signup($signupEmail, $password);

		
		
	}
	
	//kas kasutaja tahab sisse logida
	if ( isset($_POST["loginEmail"]) &&
		 isset($_POST["loginPassword"]) &&
		 !empty($_POST["loginPassword"]) &&
		 !empty($_POST["loginPassword"])
	) {
		login($_POST["loginEmail"], $_POST["loginPassword"]);
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST" >
			<label>E-post</label><br>
			<input name="loginEmail" type="email">
			<br><br>
			<input name="loginPassword" placeholder="Parool" type="password">
			<br><br>
			<input type="submit" value="Logi sisse">
		</form>
		
		<h1>Loo kasutaja</h1>
		<form method="POST" >
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			<br><br>
			<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
			<br><br>
					
			<?php if ($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked> female<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="female" > female<br>
			<?php } ?>
			
			<?php if ($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked> male<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="male" > male<br>
			<?php } ?>

			<?php if ($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked> other<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="other" > other<br>
			<?php } ?>

			<input type="submit" value="Loo kasutaja">
		</form>

	</body>
</html>