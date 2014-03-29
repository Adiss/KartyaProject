<html>
	<head>
		<title>Kártya project</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/master_mobile.css" rel="stylesheet" type="text/css"> <!-- MOBILE -->
		<link href="css/boilerplate.css" rel="stylesheet" type="text/css"> <!-- MOBILE -->
		<link rel="stylesheet" type="text/css" href="css/master.css">
		<link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
		<!--<link href='http://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>-->
		<script>
			function goBack(){
				window.history.back()
			}
		</script>
		<script src="js/respond.min.js"></script>
	</head>
	<body>
		<div class="gridContainer clearfix">
		<h1 class="font"><a href="index.php">Kártya Project</a></h1>
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
				case 'szabalyok':
					require("szabalyok.html");
					break;
				default:
					echo "<div align=\"center\"><b>HIBA!</b><br>Nincs ilyen oldal!</div>";
					break;
			}

		?>
		</div>
	</body>
	<footer>
		<div align="center">
			<br>
			<?php
				if ($oldal == "szabalyok") {
					echo '<a onclick="goBack();">Vissza</a><br><font size="2">&copy; Jakab Ádám</font>';
				} else {
					echo '<font size="2">&copy; Jakab Ádám</font> | <font size="2"><a href="index.php?oldal=szabalyok">Szabályok</a></font>';
				}
			?>
			<br>
		</div>
	</footer>
</html>