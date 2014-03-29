<table align="center" width="100%">
	<tr>
		<?php
			// Játékosok száma
			$jatekosok = count($_POST);
			$td_width = 100/$jatekosok;
			// Játékosok asztalhoz ültetése
			for($i = 0; $i<$jatekosok; $i++){
				echo '<th width="'.$td_width.'%">'.$_POST["jatekos".$i.""].'</th>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Sör
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="'.$td_width.'%" height="90px" id="jatekos'.$i.'"></td>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Dáma
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="'.$td_width.'%" height="65px" id="dama'.$i.'" align="center"></td>';
			}
		?>
	</tr>
	<tr>
		<?php
			// Király
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td width="'.$td_width.'%" height="65px" id="asz'.$i.'"></td>';
			}
		?>
	</tr>
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
<script type="text/javascript" src="js/kartya.js"></script>