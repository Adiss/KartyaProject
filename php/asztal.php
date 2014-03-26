<table align="center" border="1">
	<tr>
		<?php
			// Játékosok száma
			$jatekosok = count($_POST);

			// Játékosok asztalhoz ültetése
			for($i = 0; $i<$jatekosok; $i++){
				echo '<td>'.$_POST["jatekos".$i.""].'</td>';
			}
		?>
	</tr>
</table>