function validarCamposEstudiante() {

    if(document.querySelector('.error') != 'undefined' && document.querySelector('.error') != null){
            var container = document.querySelector(".container");
            var error = document.querySelector(".error");
            container.removeChild(error);
    }

    var camposErroneos = [];
    var nombres = document.getElementById('nombres');
    var apellidos = document.getElementById('apellidos');
    var idEstudiante = document.getElementById('idEstudiante');
    var huella1 = document.getElementById('huella1');
    var huella2 = document.getElementById('huella2');
    var programaAlimentario = document.getElementsByName('programaAlimentario');
    var genero = document.getElementsByName('genero');
    var grupo = document.getElementById('grupo');

    if(nombres.value.length == ""){
        camposErroneos.push("El estudiante debe tener un nombre");
    } else if(nombres.value.length < 4 || nombres.value.length > 30){
        camposErroneos.push("Los nombres deben contener entre 4 y 30 caracteres");
    }
    
    if(apellidos.value.length == ""){
        camposErroneos.push("El estudiante debe tener un apellido");
    } else if(apellidos.value.length < 5 || apellidos.value.length > 30){
        camposErroneos.push("Los apellidos deben contener entre 5 y 30 caracteres");
    }

    if(idEstudiante.value.length == ""){
        camposErroneos.push("El estudiante debe tener un ID");
    } else if(idEstudiante.value.length < 5 || idEstudiante.value.length > 30){
        camposErroneos.push("El id debe contener entre 5 y 30 caracteres");
    }
    
    if(!programaAlimentario[0].checked && !programaAlimentario[1].checked){
        camposErroneos.push("El estudiante debe tener un programa alimentario");
    }

    if(!genero[0].checked && !genero[1].checked){
        camposErroneos.push("El estudiante debe tener un genero");
    }

    if(grupo.value == ""){
        camposErroneos.push("El estudiante debe tener un grupo");
    }

    if(huella1.value.length == ""){
        camposErroneos.push("No se ingresó la primera huella");
    }
    
    if(huella2.value.length == ""){
        camposErroneos.push("No se ingresó la segunda huella");
    }
    
    if(camposErroneos.length > 0){

        var divErrores = document.createElement("DIV");
        divErrores.classList.add("error");

        var ulErrores = document.createElement("UL");

        for(campoErroneo in camposErroneos){
            error = document.createElement("LI");
            error.textContent = camposErroneos[campoErroneo];
            ulErrores.appendChild(error);
        }

        divErrores.appendChild(ulErrores);
        var form = document.querySelector("form");
        document.querySelector(".container").insertBefore(divErrores, form);
        window.scrollTo({ top: 130, behavior: 'smooth' });
    } else {
        document.querySelector("form").submit();
    }

    

}