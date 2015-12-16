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
	//Security note: Just for demonstration. Don't try this @ home
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

	<h2>Schritt 2</h2>
	<h3>Verdiene etwas Geld</h3>
	<p>Bevor du deinen Helden ausrüsten kannst, solltest du etwas Geld verdienen. Wie möchtest du dein Geld verdienen?</p>
	<ul>
		<li><a href="get_money.php?job=beggar">Betteln (20 Gold)</a></li>
		<li><a href="get_money.php?job=pickpocket">Taschendieb (50 Gold)</a></li>
		<li><a href="get_money.php?job=peon">Tageslöhner (70 Gold)</a></li>
		<li><a href="get_money.php?job=errandboy">Botenjunge (100 Gold)</a></li>
	</ul>
</div>
<?php require_once 'include/footer.html.inc'; ?>