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
				echo '<td width="'.$hossz.'%" height="100px" id="jatekos'.$i.'"></td>';
			}
		?>
	</tr>
</table>
<br>
<table align="center" bgcolor="brown" width="200" height="100">
	<tr>
		<td id="lapok" align="center">Nem volt még lap húzva!</td>
	</tr>
	<tr>
		<td align="center">
			<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>
		</td>
	</tr>
</table>

<script type="text/javascript">

	var players = (document.getElementsByTagName("td").length / 2) - 1;
	var i = 0;

	function randomkartya(){
		var randomnumber = Math.floor((Math.random()*13)+1);
		var randomchar = Math.floor((Math.random()*4)+1);

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

	function soros(){
		var n = i%players;
		if (n > 0) {;
			document.getElementById("jatekos" + (n-1) + "").innerHTML = " ";;
		}
		document.getElementById("jatekos" + n + "").innerHTML = " DEALER "+n+" ";
		i++;
	}

</script>