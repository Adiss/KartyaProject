<script type="text/javascript">
	function randomkartya(){
		var randomnumber = Math.floor((Math.random()*13)+1);
		var randomchar = Math.floor((Math.random()*4)+1);

		var deck = [
			[1, 1, 1, 1],
			[2, 2, 2, 2],
			[3, 3, 3, 3],
			[4, 4, 4, 4],
			[5, 5, 5, 5],
			[6, 6, 6, 6],
			[7, 7, 7, 7],
			[8, 8, 8, 8],
			[9, 9, 9, 9],
			[10, 10, 10, 10],
			[11, 11, 11, 11],
			[12, 12, 12, 12],
			[13, 13, 13, 13]
		];

		switch(randomchar){
			case 1:
				randomchar = "c";
				break;
			case 2:
				randomchar = "d";
				break;
			case 3:
				randomchar = "h";
				break;
			case 4:
				randomchar = "s";
				break;

		}

		document.getElementById("lapok").innerHTML = "<img src='images/kartya/"+ randomnumber + randomchar +".gif'>";
	}
</script>
<table align="center" border="1">
	<tr>
		<?php
			// Játékosok száma
			$jatekosok = count($_POST);
			$hossz = 100 / $jatekosok;
			// Játékosok asztalhoz ültetése
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="'.$hossz.'%">'.$_POST["jatekos".$i.""].'</td>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Játékosok előtti asztalrész
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="'.$hossz.'%" height="100px"></td>';
			}
		?>
	</tr>
</table>
<br>
<div align="center" id="lapok"></div>
<div align="center"><a href="#" onclick="randomkartya()">Kártya húzás</a></div>