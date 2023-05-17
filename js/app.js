//Script realizado para la transiccion de botones sin recargar pagina 

window.onload = function () { //Se crea una funcion
    var x = document.getElementById("Ejemplo1"); // Se establecen variables y a la vez almacenan datos por medio del is
    var y = document.getElementById("Ejemplo2"); 

    //Se le da conocimiento tanto de block como los none
    //Donde block muestra y none oculta contenido

    x.style.display = "block";
    y.style.display = "none";

    //Se declaran clases para al presionar el boton muestre u oculte datos

    document.getElementById("MenuUno").className = "active";
    document.getElementById("MenuDos").className = "desactive";
};

//Funcion show(se da con un onclick)

function show(param_div_id) {
    var x = document.getElementById("Ejemplo1");
    var y = document.getElementById("Ejemplo2");

//Condicion para mostrar y/u ocultar datos
    if (param_div_id === "Ejemplo1") {
    x.style.display = "block";
    y.style.display = "none";

    document.getElementById("MenuUno").className = "active";
    document.getElementById("MenuDos").className = "desactive";
    } else {
    x.style.display = "none";
    y.style.display = "block";

    document.getElementById("MenuUno").className = "desactive";
    document.getElementById("MenuDos").className = "active";
    }
}
