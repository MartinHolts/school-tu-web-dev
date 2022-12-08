<?php 
class User {
	
	private $connection;
	
	// k�ivitatakse siis kui on = new User(see j�uab siia)
	function __construct($mysqli){
		// this viitab sellele klassile ja selle 
		// klassi muutujale
		$this->connection = $mysqli;
	}
	
	/* K�IK FUNKTSIOONID*/
	
	function login($email, $password) {
		
		$notice = "";
				
		$stmt = $this->connection->prepare("
			SELECT id, email, password, created
			FROM user_sample
			WHERE email = ?
		");
		
		echo $this->connection->error;
		
		//asendan k�sim�rgi
		$stmt->bind_param("s", $email);
		
		//rea kohta tulba v��rtus
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		
		$stmt->execute();
		
		//ainult SELECT'i puhul
		if($stmt->fetch()) {
			// oli olemas, rida k�es
			//kasutaja sisestas sisselogimiseks
			$hash = hash("sha512", $password);
			
			if ($hash == $passwordFromDb) {
				//echo "Kasutaja $id logis sisse";
				
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				//echo "ERROR";
				
				header("Location: data.php");
				exit();
				
			} else {
				$notice = "parool vale";
			}
			
			
		} else {
			
			//ei olnud �htegi rida
			$notice = "Sellise emailiga ".$email." kasutajat ei ole olemas";
		}
		
		$stmt->close();
		
		return $notice;

	}
	
	function signup($email, $password) {
				
		$stmt = $this->connection->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
		echo $this->connection->error;
		
		$stmt->bind_param("ss", $email, $password);
		
		if ( $stmt->execute() ) {
			echo "�nnestus";
		} else {
			echo "ERROR ".$stmt->error;
		}
		
	}
	
} 
?>