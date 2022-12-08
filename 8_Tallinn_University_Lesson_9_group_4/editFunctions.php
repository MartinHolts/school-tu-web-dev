<?php

	require_once("../config.php");
	
	function getSinglePerosonData($edit_id){
		
		//echo "id on ".$edit_id;
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("
			SELECT age, color FROM whistle
			WHERE id=?
		");

		echo $mysqli->error;

		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($age, $color);
		$stmt->execute();
		
		//tekitan objekti
		$p = new Stdclass();
		
		//saime ühe rea andmeid
		if ($stmt->fetch()){
			// saan siin alles kasutada bind_result muutujaid
			$p->age = $age;
			$p->color = $color;
			
		} else {
			// ei saanud rida andmeid kätte
			// sellist id'd ei ole olemas
			// see rida võib olla kustutatud
			header("Location: data.php");
			exit();
		}
		
		$stmt->close();
		$mysqli->close();
		
		return $p;
	}

	function updatePerson($id, $age, $color){
    	
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE whistle SET age=?, color=? WHERE id=?");
		$stmt->bind_param("isi",$age, $color, $id);
		
		// kas õnnestus salvestada
		if($stmt->execute()){
			// õnnestus
			// echo "salvestus õnnestus!";
		}
		
		$stmt->close();
		$mysqli->close();
	}
?>