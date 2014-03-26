<html>
	<head>
		<title>Kártya project - Kezdőlap</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1 align="center">Kártya Project v0.1</h1>
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
</html>