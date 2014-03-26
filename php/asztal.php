<table align="center">
	<tr>
		<?php
			// Játékosok száma
			$jatekosok = count($_POST);
			// Játékosok asztalhoz ültetése
			for($i = 0; $i<$jatekosok; $i++){
				echo '<th width="55px">'.$_POST["jatekos".$i.""].'</th>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Sör
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="55px" height="90px" id="jatekos'.$i.'"></td>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Dáma
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="55px" height="65px" id="dama'.$i.'" align="center"></td>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Király
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="55px" height="65px" id="asz'.$i.'"></td>';
			}
		?>
	</tr>
</table>
<br>
<table align="center" bgcolor="brown" width="200" height="100">
	<tr>
		<td id="lapok" height="65px" align="center">Nem volt még lap húzva!</td>
	</tr>
	<tr>
		<td align="center">
			<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>
		</td>
	</tr>
</table>

<script type="text/javascript">

	var players = document.getElementsByTagName("th").length;
	var i = 0;
	var dama = 0;
	var asz = 0;
	var tmp_n_dama = 0;
	var tmp_n_asz = 0;


	// Random kártya kidobása
	function randomkartya(){
		var randomnumber = Math.floor((Math.random()*13)+1);
		var randomchar = Math.floor((Math.random()*4)+1);
		var n = i%players;

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

		// Kártyahúzás
		document.getElementById("lapok").innerHTML = "<img src='images/kartya/"+ randomnumber + randomchar +".gif'>";

		// Dáma cserélgetése
		if (randomnumber == 12) {
			if(dama == 1){
				document.getElementById("dama" + tmp_n_dama + "").innerHTML = " ";
				document.getElementById("dama" + n + "").innerHTML = " <img src='images/kartya/"+ randomnumber + randomchar +".gif'>";
				tmp_n_dama = n;
			} else {
				document.getElementById("dama" + n + "").innerHTML = " <img src='images/kartya/"+ randomnumber + randomchar +".gif'>";
				dama = 1;
				tmp_n_dama = n;
			}
		}

		// Ász cserélgetése
		if (randomnumber == 1) {
			if(asz == 1){
				document.getElementById("asz" + tmp_n_asz + "").innerHTML = " ";
				document.getElementById("asz" + n + "").innerHTML = " <img src='images/kartya/"+ randomnumber + randomchar +".gif'>";
				tmp_n_asz = n;
			} else {
				document.getElementById("asz" + n + "").innerHTML = " <img src='images/kartya/"+ randomnumber + randomchar +".gif'>";
				asz = 1;
				tmp_n_asz = n;
			}
		}
	}

	// Sör körbeadása
	function soros(){
		var n = i%players;
		if (n > 0) {;
			document.getElementById("jatekos" + (n-1) + "").innerHTML = " ";
		}
		if (n == 0 && i != 0) {
			document.getElementById("jatekos" + (players-1) + "").innerHTML = " ";
		}
		document.getElementById("jatekos" + n + "").innerHTML = " <img src='images/beer-icon.png'> ";
		i++;
	}

</script>