<html>
	<head>
		<title>Kártya project</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/master.css">
		<!--<link href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>-->
		<link href='http://fonts.googleapis.com/css?family=The+Girl+Next+Door' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<h1 class="font"><a href="index.php">Kártya Project v0.1</a></h1>
		<?php

			// Az oldal tartalmának kiválasztása
			$oldal = isset($_REQUEST["oldal"]) ? $_REQUEST["oldal"] : "urlap";
			switch ($oldal) {
				case 'asztal':
					require("asztal.php");
					break;
				case 'urlap':
					require("form.php");
					break;
				default:
					echo "<div align=\"center\"><b>HIBA!</b><br>Nincs ilyen oldal!</div>";
					break;
			}

		?>
	</body>
	<footer>
		<div align="center">
			<br>
			<font size="2">&copy; Jakab Ádám</font>
			<br>
		</div>
	</footer>
</html>