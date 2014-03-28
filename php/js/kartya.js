/*#################################################*/
/*########## KártyaProject Asztal Script ##########*/
/*#################################################*/



var players = document.getElementsByTagName("th").length;
var i = 0;
var dama = 0;
var asz = 0;
var tmp_n_dama = 0;
var tmp_n_asz = 0;

var pakli = [
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1],
	[1,1,1,1]
];

// Random kártya kidobása
function randomkartya(){
	var randomnumber = Math.floor((Math.random()*13)+1);
	var randomchar = Math.floor((Math.random()*4)+1);
	var n = i%players;

	// Kihúzott kártya kivétele a pakliból
	if (pakli[randomchar][randomnumber] == 0) {
		randomkartya();
	} else {
		pakli[randomchar][randomnumber] = 0;
	};

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
	document.getElementById("lapok").innerHTML = "<img src='images/kartya/"+ randomnumber + randomchar +".gif'>" ;

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