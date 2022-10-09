<?php
	// see fail peab olema siis seotud kõigiga kus 
	// tahame sessiooni kasutada
	// saab kasutada nüüd $_SESSION muutujat
	session_start();
	
	function signup($email, $password) {
	
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE(?, ?)");
		echo $mysqli->error . "<br>";
		
		$stmt->bind_param("ss", $email, $password);
		
		if ($stmt->execute()) {
			echo "õnnestus" . "<br>";
		} else {
			echo "<br>ERROR<br>".$stmt->error . "<br>";
		}
	}

	function login($email, $password) {
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("
			SELECT id, email, password, created
			FROM user_sample
			WHERE email = ?
		");
		//echo $mysqli->error . "<br>";
		
		//asendan küsimärgi
		$stmt->bind_param("s", $email);
		
		//rea kohta tulba väärtus
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		
		$stmt->execute();
		
		//ainult SELECT'i puhul
		if($stmt->fetch()) {
			// oli olemas, rida käes
			// kasutaja sisestas sisselogimiseks
			$hash = hash("sha512", $password);
			
			if($hash == $passwordFromDb){
				//echo "Kasutaja $id logis sisse" . "<br>";
				
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				header("Location: data.php");
			} else {
				$notice = "parool vale";
			}
		} else {
			
			//ei olnud ühtegi rida
			$notice =  "Sellise emailiga $email kasutjat ei ole olemas";
		}
		return $notice;
	}
?>