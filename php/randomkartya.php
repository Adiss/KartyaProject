<meta charset="utf-8">
<?php

	function randomkartya(){
		$rand = rand(1,14);
		switch ($rand) {
			case '1':
				echo "Egyet iszol.";
				break;
			case '2':
				echo "Kettőt iszol. ";
				break;
			case '3':
				echo "Hármat iszol.";
				break;
			case '4':
				echo "Négyet iszol.";				
				break;
			case '5':
				echo "Ötöt iszol.";				
				break;
			case '6':
				echo "Hatot szétoszthatsz.";				
				break;
			case '7':
				echo "Hetet szétoszthatsz.";				
				break;
			case '8':
				echo "Nyolcat szétoszthatsz.";				
				break;
			case '9':
				echo "Kilencet szétoszthatsz.";				
				break;
			case '10':
				echo "Tízet szétoszthatsz.";				
				break;
			case '11':
				echo "J: A melletted ülők között kell szétosztanod 10-et.";				
				break;
			case '12':
				echo "DÁMA!";				
				break;
			case '13':
				echo "K: Új szabály!";				
				break;
			case '14':
				echo "ÁSZ!";				
				break;
		}
	}

	randomkartya();

?>