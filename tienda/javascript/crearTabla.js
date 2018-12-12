function productos(categoria, usuario) {
    var xhttp;
    if (categoria == "") {
        document.getElementById("divProductos").innerHTML = "Seleccione una categoría";
        return;
    }

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("divProductos").innerHTML = this.responseText;
        }
    };
    url = 'tabla.php?categorias='+categoria +"&usuario=" + usuario;
    xhttp.open("GET", url, true);
    xhttp.send();
}