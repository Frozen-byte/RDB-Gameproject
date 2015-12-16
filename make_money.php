<?php 	require_once 'include/init.php.inc';

	switch ($_GET['job']) {
		case 'beggar':
			$money = 20;
			break;
		case 'pickpocket':
			$money = 50;
			break;
		case 'peon':
			$money = 70;
			break;
		case 'errandboy':
			$money = 100;
			break;
		
		default:
			$money = 0;
			break;
	}

	//TODO: Add money to Database and make useful output

	require_once 'include/header.html.inc';
?>
<div>
	<h2>Schritt 2</h2>
	<h3></h3>
	
</div>
<?php require_once 'include/footer.html.inc'; ?>