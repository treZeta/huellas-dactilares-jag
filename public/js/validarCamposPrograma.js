function validarCamposPrograma() {

    var camposErroneos = [];
    var nombreProgramaAlimentario = document.getElementById('nombreProgramaAlimentario');
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


    if(nombreProgramaAlimentario.value.trim().length < 2){
        crearLabelDeError(nombreProgramaAlimentario, "El nombre del programa alimentario debe contener al menos dos caracteres");
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