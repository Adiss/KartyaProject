<script type='text/javascript'>
    function jatekosADD(){
        // Játékosok száma
        var number = document.getElementById("jatekos").value;
        // Az űrlap, amiben az inputok lesznek
        var container = document.getElementById("urlap");
        // Az űrlap esetleg meglévő elemeinek törlése
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i=0;i<number;i++){
            // Input előtti szöveg kiíratása
            container.appendChild(document.createTextNode((i+1) + ". Játékos neve: "))
            // Az input elem definiálása
            var input = document.createElement("input");
            input.type = "text";
            input.name = "jatekos" + i;
            container.appendChild(input);
            // Sortötés
            container.appendChild(document.createElement("br"));
        }
        // A submit elem létrehozása
        var submit = document.createElement("input");
        submit.type = "submit";
        submit.value = "Kész"
        container.appendChild(submit);
    }
</script>
<div align="center">
    <br>
	Játékosok száma <input type="text" id="jatekos" name="jatekos" value=""><br />
    <br>
	<a href="#" onclick="jatekosADD()">Tovább</a>
    <br>
	<form id="urlap" name="jatekosok" method="post" action="index.php?oldal=asztal"/>
</div>