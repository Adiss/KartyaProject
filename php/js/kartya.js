/*#################################################*/
/*########## KártyaProject Asztal Script ##########*/
/*#################################################*/



var players = document.getElementsByTagName("th").length; 	// Játékosok száma (THEAD elemek megszámolásával kiszámítva)
var korok = 0; 												// Körök száma (A "soros" függvény lefutásával növekszik)
var dama = 0; 												// Van-e valakinél dáma (Ha van akkor az értéke 1, ha nincs akkor 0. Alapértelemezetten nincs senkinél.)
var asz = 0; 												// Van-e valakinél ász (Ha van akkor az értéke 1, ha nincs akkor 0. Alapértelemezetten nincs senkinél.)
var n = 0; 													// A soron következő játékos (Értéke (körök mod jatekosok), azaz minden teljes kör után reset 0-ra.)
var tmp_n_dama = 0;											// Ideiglenes változó (Éppen hanyas játékosnál van a dáma)
var tmp_n_asz = 0; 											// Ideiglenes változó (Éppen hanyas játékosnál van az ász)
var tmp_n = 0; 												// Ideiglenes változó (Annak a játékosnak a száma, akinél utoljára volt a sör a pakli elfogyása után)

var pakli_szamlalo = 52; 									// A pakli lapjainak száma
var pakli = [												// A pakli mátrixa 
	[1,2,3,4],
	[5,6,7,8],
	[9,10,11,12],
	[13,14,15,16],
	[17,18,19,20],
	[21,22,23,24],
	[25,26,27,28],
	[29,30,31,32],
	[33,34,35,36],
	[37,38,39,40],
	[41,42,43,44],
	[45,46,47,48],
	[49,50,51,52]
];

// Random kártya kidobása
function randomkartya(){
	var randomnumber = Math.floor((Math.random()*13)+1);	// A kártya száma
	var randomchar = Math.floor((Math.random()*4)+1);		// A kártya színe
	n = korok%players;

	/* Ha elfogyott a pakli, nem ad lapot, és kiírja, hogy nincs lap. */
	if (pakli_szamlalo == 0) {
		document.getElementById("lapok").innerHTML = "Nincs több lap a pakliban!";
	} else {

		/* Kihúzott kártya kivétele a pakliból */
		if (pakli[randomnumber-1][randomchar-1] == 0) {
			randomkartya();
		} else {
			pakli[randomnumber-1][randomchar-1] = 0;
			pakli_szamlalo--;
		
		/* A kártya színének betűvé alakítása (Így fogja majd a képet beszúrni) */
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

		/* Kártyahúzás */
		document.getElementById("lapok").innerHTML = "<img src='images/kartya/"+ randomnumber + randomchar +".gif'><br>Pakli: "+pakli_szamlalo+" lap";

		/* Ha dáma lett húzva bemegy az első IF-be, ott ellenőrzi, hogy volt-e már dáma húzva. 
		   Ha volt, akkor az előző játékostol elveszi, és az új kapja meg.
		   Ha nem volt, akkor a most soron lévő játékos simán megkapja. */
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

		/* Az ásznál is ugyan az a módszer mint a dámánál. */
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
	}
}

//Új kör
function nullaz(){
	korok=0; // Lenullázza a körök számát
	pakli_szamlalo = 52; // A paklit újra feltölti
	/* Reseteli a mátrixot */
	for  (var h = 0; h <= 3; h++) {
		for (var j = 0; j <= 12; j++) {
			pakli[j][h] = 1;
		}
	}
	document.getElementById("jatekos" + (players-1) + "").innerHTML = " "; // Törli a sört
	document.getElementById("jatekos" + tmp_n + "").innerHTML = ""; // Törli a sört
	document.getElementById("asz" + tmp_n_asz + "").innerHTML = " "; // Törli az ászt
	document.getElementById("dama" + tmp_n_dama + "").innerHTML = " "; // Törli a dámát
	/* Reseteli az asztalt */
	document.getElementById("lapok").innerHTML = "Nem volt még lap húzva!";
	document.getElementById("kartyahuzas").innerHTML = '<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>';
}

//Új pakli
function pluszpakli(){
	korok = tmp_n + 1; // Megjegyzi kinél volt utoljára a sör, majd a következővel fogja folytatni
	pakli_szamlalo = 52; // Feltölti a paklit
	/* Reseteli a mátrixot */
	for  (var k = 0; k <= 3; k++) {
		for (var j = 0; j <= 12; j++) {
			pakli[j][k] = 1;
		}
	}
	/* Reseteli az asztalt */
	document.getElementById("lapok").innerHTML = "Pakliban maradt lapok: 52";
	document.getElementById("kartyahuzas").innerHTML = '<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>';
}

// Sör körbeadása
function soros(){
	/* Ha elfogytak a lapok, bemegy az IF-be és kiírja, hogy új paklit szeretnénk vagy új kört, majd megjegyzi az utolsó játékos számát.
	   Ha már volt kártyahúzás, azaz nem az első játékos húz, akkor törli az előzőtöl a sört.
	   Ha a kör előről kezdődött, de ez már nem az első kör, akkor törli a sört az utolsó embertől.
	   Végül odaadja a sört a soros embernek, és megnöveli a körök számát. */
	if (pakli_szamlalo == 0) {
		document.getElementById("kartyahuzas").innerHTML = "<a href='#' onclick='nullaz();'>Új kör</a> | <a href='#' onclick='pluszpakli();'>+1 Pakli</a>";
		document.getElementById("jatekos" + (n-1) + "").innerHTML = " ";
		document.getElementById("jatekos" + n + "").innerHTML = " <img src='images/beer-icon.png'> ";
		tmp_n = n;
	} else {
		if (n > 0) {;
			document.getElementById("jatekos" + (n-1) + "").innerHTML = " ";
		}
		if (n == 0 && korok != 0) {
			document.getElementById("jatekos" + (players-1) + "").innerHTML = " ";
		}
		document.getElementById("jatekos" + n + "").innerHTML = " <img src='images/beer-icon.png'> ";
		korok++;
	}
}