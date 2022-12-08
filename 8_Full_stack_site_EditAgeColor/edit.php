<?php
	//edit.php
	require("functions.php");
	require("editFunctions.php");
	
	//kas kasutaja uuendab andmeid
	if(isset($_POST["update"])){
		
		updatePerson(cleanInput($_POST["id"]), cleanInput($_POST["age"]), cleanInput($_POST["color"]));
		
		header("Location: edit.php?id=".$_POST["id"]."&success=true");
        exit();	
		
	}
	
	//saadan kaasa id
	$p = getSinglePerosonData($_GET["id"]);
	var_dump($p);

	
?>
<br><br>
<a href="data.php"> tagasi </a>

<h2>Muuda kirjet</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<input type="hidden" name="id" value="<?=$_GET["id"];?>" > 
  	<label for="age" >vanus</label><br>
	<input id="age" name="age" type="text" value="<?php echo $p->age;?>" ><br><br>
  	<label for="color" >värv</label><br>
	<input id="color" name="color" type="color" value="<?=$p->color;?>"><br><br>
  	
	<input type="submit" name="update" value="Salvesta">
  </form>