<?php 	require_once 'include/init.php.inc';

	require_once 'include/header.html.inc';
?>

	<h1>Willkommen auf azz001</h1>
	<div>
		<h2>Schritt 1</h2>
		<h3>Erstelle deinen eigenen Charakter:</h3>
		
		<form id="form-create-character" name="create-character" method="POST" target="_self" action="create_character.php"></form>

		<input form="form-create-character" type="text" name="name" maxlength="64" placeholder="Name" required><br>
		<input form="form-create-character" type="text" name="haircolor" maxlength="49" placeholder="Haarfarbe" required><br>
		<input form="form-create-character" type="text" name="race" maxlength="32" placeholder="Rasse" required><br>
		<span>Geschlecht</span>
		<select form="form-create-character" name="gender">
			<option value="male">Männlich</option>
			<option value="female">Weiblich</option>
			<option value="unknown" selected>Unbekannt</option>
		</select><br>
		<input form="form-create-character" type="number" name="height" min="50" max="300" placeholder="Größe" required><br>
		<input form="form-create-character" type="date" name="born" placeholder="Geburtstag" required><br>
		<input form="form-create-character" type="submit" value="Charakter Erstellen"><br>

	</div>

<?php
	require_once 'include/footer.html.inc';
?>