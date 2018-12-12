function comprar(id, usuario, producto) {

    var value = id.value;
    var identificador = id.id;
    
    var xhttp = new XMLHttpRequest();
    var cantidad = parseInt(document.getElementById("aux"+identificador).value);
    console.log(id.id + "  - " + cantidad);

    if(value === "mas") {
        cantidad++;
        document.getElementById("cantidad"+identificador).innerHTML = cantidad;
        document.getElementById("aux"+identificador).value = cantidad;
    } else {
        if(cantidad <= 0) { //la cantidad no puede ser menor que 0
            cantidad = 0;
            document.getElementById("cantidad"+identificador).innerHTML = cantidad;
            document.getElementById("aux"+identificador).value = cantidad;
        } else {
            cantidad--;
            document.getElementById("cantidad"+identificador).innerHTML = cantidad;
            document.getElementById("aux"+identificador).value = cantidad;
        }
    }

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
        }
    };

    url = 'cesta.php?id='+ identificador + '&cantidad=' + cantidad + '&usuario=' + usuario + "&producto=" + producto;
    xhttp.open("GET", url, true);
    xhttp.send();
}