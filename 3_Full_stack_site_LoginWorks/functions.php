<?php
	function signup($email, $password) {
	
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE(?, ?)");
		echo $mysqli->error;
		
		$stmt->bind_param("ss", $email, $password);
		
		if ($stmt->execute()) {
			echo "õnnestus";
		} else {
			echo "<br>ERROR<br>".$stmt->error;
		}
	
	}

	function login($email, $password) {
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("
		
			SELECT id, email, password, created
			FROM user_sample
			WHERE email = ?
		");
		
		echo $mysqli->error;
		
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
				echo "Kasutaja $id logis sisse";
			} else {
				echo "parool";
			}
			
		} else {
			
			//ei olnud ühtegi rida
			echo "Sellise emailiga $email kasutjat ei ole olemas";
		}
		
		
	}
	
	
?>