function validarCamposEstudiante() {

    var camposErroneos = [];
    var nombres = document.getElementById('nombres');
    var apellidos = document.getElementById('apellidos');
    var idEstudiante = document.getElementById('idEstudiante');
    var huella1 = document.getElementById('huella1');
    var huella2 = document.getElementById('huella2');
    var programaAlimentario = document.getElementsByName('programaAlimentario');
    var genero = document.getElementsByName('genero');
    var grupo = document.getElementById('grupo');
    var error = false;

    var labels = document.getElementsByClassName("error");
    while(labels.length > 0){
        labels[0].parentNode.removeChild(labels[0]);
    }
    var shakeDivs = document.getElementsByClassName("shake");
    while(shakeDivs.length > 0){
        shakeDivs[0].classList.toggle("shake");
        shakeDivs = document.getElementsByClassName("shake");
    }


    if(nombres.value.trim() == ""){
        crearLabelDeError(nombres, "El estudiante debe tener un nombre");
        error = true;
    } else if(nombres.value.trim().length < 4 || nombres.value.trim().length > 30){
        crearLabelDeError(nombres, "Los nombres deben contener entre 4 y 30 caracteres");
        error = true;
    }
    
    if(apellidos.value.trim() == ""){
        crearLabelDeError(apellidos, "El estudiante debe tener un apellido");
        error = true;
    } else if(apellidos.value.trim().length < 5 || apellidos.value.trim().length > 30){
        crearLabelDeError(apellidos, "Los apellidos deben contener entre 5 y 30 caracteres");
        error = true;
    }
    
    if(idEstudiante.value.trim() == ""){
        crearLabelDeError(idEstudiante, "El estudiante debe tener un ID");
        error = true;
        camposErroneos.push("");
    } else if(idEstudiante.value.trim().length < 5 || idEstudiante.value.trim().length > 30){
        crearLabelDeError(idEstudiante, "El id debe contener entre 5 y 30 caracteres");
        error = true;
    }
    
    if(!programaAlimentario[0].checked && !programaAlimentario[1].checked){
        crearLabelDeError(programaAlimentario[0].parentNode, "El estudiante debe tener un programa alimentario");
        error = true;
    }
    
    if(!genero[0].checked && !genero[1].checked){
        crearLabelDeError(genero[0].parentNode, "El estudiante debe tener un genero");
        error = true;
    }
    
    if(grupo.value == ""){
        crearLabelDeError(grupo, "El estudiante debe tener un grupo");
        error = true;
    }
    
    if(huella1.value.length == ""){
        crearLabelDeError(document.getElementById("DPFPEnrollmentUserRegn"), "No se ingresó la primera huella");
        error = true;
    }
    
    if(huella2.value.length == ""){
        crearLabelDeError(document.getElementById("DPFPEnrollmentUserRegn"), "No se ingresó la segunda huella");
        error = true;
    }
    
    if(error == false){
        document.querySelector("form").submit();
    }

    

}

function crearLabelDeError(input, texto){
    label = document.createElement("LABEL");
    label.classList.add("error");
    label.setAttribute("for", input.getAttribute("id"));
    input.parentNode.classList.toggle("shake");
    label.innerHTML = "<strong>" + texto + "</strong";
    input.parentNode.appendChild(label);
    setTimeout(function(){input.parentNode.classList.toggle("shake");}, 500);
}