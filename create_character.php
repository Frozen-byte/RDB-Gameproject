<?php 	require_once 'include/init.php.inc';
	
	//Prepare the Query
	$query = $sql->prepare("INSERT INTO `character`(`name`, `haircolor`, `race`, `gender`, `height`, `born`) VALUES (:name, :haircolor, :race, :gender, :height, :born)");

	//Fill the data-array for prepared query
	$data = Array(
		':name' => $_POST['name'],
		':haircolor' => $_POST['haircolor'],
		':race' => $_POST['race'],
		':gender' => $_POST['gender'],
		':height' => $_POST['height'],
		':born' => $_POST['born']
	);
	$query->execute($data);

	//fetch the ID from last INERT INTO command
	$lastID = $sql->lastInsertId();


	//now get the freshly created character
	$character = $sql->query("SELECT * FROM `character` WHERE `ID` = $lastID")->fetchAll();
	

	require_once 'include/header.html.inc';
?>
<div>
	<h2>Schritt 1</h2>
	<h3>Du hats folgenden Charakter erstellt:</h3>
	<?=html_table_from_array($character)?>

</div>
<?php require_once 'include/footer.html.inc'; ?>