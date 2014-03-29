<table align="center" width="100%">
	<tr>
		<th width="25%"><img src="images/cards.png"></th>
		<th width="25%">Sör</th>
		<th width="25%">Dáma</th>
		<th width="25%">Ász</th>
	</tr>
	<?php
		// Játékosok száma
		$jatekosok = count($_POST);
		$td_width = 100/$jatekosok;
		// Játékosok asztalhoz ültetése
		for($i = 0; $i<$jatekosok; $i++){
			echo '	<tr>
						<th width="25%">'.$_POST["jatekos".$i.""].'</th>
						<td width="25%" height="43px" id="jatekos'.$i.'">
						<td width="25%" height="43px" id="dama'.$i.'"></td>
						<td width="25%" height="43px" id="asz'.$i.'"></td>
					</tr>';
		}
	?>
</table>
<br>
<table align="center" width="263px" height="100px">
	<tr>
		<td id="lapok" height="65px" align="center">Nem volt még lap húzva!</td>
	</tr>
	<tr>
		<td id="kartyahuzas" align="center">
			<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>
		</td>
	</tr>
</table>
<br>
<table id="szabalyok" align="center" width="263px">
	<th>Szabályok</th>
	<tr>
		<td id="szabaly_textbox">Ha királyt húzol, új szabályt írhatsz be</td>
	</tr>
</table>
<script type="text/javascript" src="js/kartya.js"></script>