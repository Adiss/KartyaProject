/*#################################################*/
/*########## KártyaProject Asztal Script ##########*/
/*#################################################*/



var players = document.getElementsByTagName("th").length;
var i = 0;
var dama = 0;
var asz = 0;
var tmp_n_dama = 0;
var tmp_n_asz = 0;

var pakli_szamlalo = 52;
var pakli = [
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
	var randomnumber = Math.floor((Math.random()*13)+1);
	var randomchar = Math.floor((Math.random()*4)+1);
	var n = i%players;

	// Ha elfogyott a pakli, nem ad lapot, és kiírja, hogy nincs lap.
	if (pakli_szamlalo == 0) {
		document.getElementById("lapok").innerHTML = "Nincs több lap a pakliban!";
	} else {

		// Kihúzott kártya kivétele a pakliból
		if (pakli[randomnumber-1][randomchar-1] == 0) {
			randomkartya();
		} else {
			pakli[randomnumber-1][randomchar-1] = 0;
			pakli_szamlalo--;
		}

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
		document.getElementById("lapok").innerHTML = "<img src='images/kartya/"+ randomnumber + randomchar +".gif'><br>Pakliban maradt lapok: "+pakli_szamlalo;

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
}

function nullaz(){
	//Pakli nullazasa
	pakli_szamlalo = 52;
	for  (var i = 0; i <= 3; i++) {
		for (var j = 0; j <= 12; j++) {
			pakli[j][i] = 1;
		}
	}
	document.getElementById("asz" + tmp_n_asz + "").innerHTML = " ";
	document.getElementById("dama" + tmp_n_dama + "").innerHTML = " ";
	document.getElementById("lapok").innerHTML = "Nem volt még lap húzva!";
	document.getElementById("kartyahuzas").innerHTML = '<a href="#" onclick="randomkartya(); soros();">Kártya húzás</a>';
}

// Sör körbeadása
function soros(){
	var n = i%players;
	if (pakli_szamlalo == 0) {
		document.getElementById("kartyahuzas").innerHTML = "<a href='#' onclick='nullaz();'>Új pakli</a>";
		document.getElementById("jatekos" + (players-1) + "").innerHTML = " ";
		document.getElementById("jatekos" + n + "").innerHTML = " <img src='images/beer-icon.png'> ";
	} else {
		if (n > 0) {;
			document.getElementById("jatekos" + (n-1) + "").innerHTML = " ";
		}
		if (n == 0 && i != 0) {
			document.getElementById("jatekos" + (players-1) + "").innerHTML = " ";
		}
		document.getElementById("jatekos" + n + "").innerHTML = " <img src='images/beer-icon.png'> ";
		i++;
	}
}