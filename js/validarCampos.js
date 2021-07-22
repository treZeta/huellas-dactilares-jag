//VALIDATE REGN BEFORE POST | START | MUITHI | 09-AUGUST-2013
function validarCampos(){
    let nombres = document.getElementById("nombres").value;
    let apellidos = document.getElementById("apellidos").value;
    let id = document.getElementById("id").value;
    let huella1 = document.getElementById("huella1").value;
    let huella2 = document.getElementById("huella2").value;
    let huella1_id = document.getElementById("huella1_id").value;
    let huella2_id = document.getElementById("huella2_id").value;
    
    if(nombres == "" || nombres == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("Debes ingresar los nombres");
        document.getElementById("nombres").focus();
        return false;
    }else if(apellidos == "" || apellidos == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("Debes ingresar los apellidos");
        document.getElementById("apellidos").focus();
        return false;
    }else if(id == "" || id == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("Debes ingresar un identificador");
        document.getElementById("id").focus();
        return false;
    }else if(huella1 == "" || huella1 == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("La primera huella no ha sido registrada");
        return false;
    }else if(huella2 == "" || huella2 == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("La segunda huella no ha sido registrada");
        return false;
    }else if(huella1_id == "" || huella1_id == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("Finger 1 Index NOT Captured !");
        return false;
    }else if(huella2_id == "" || huella2_id == null){
        document.getElementById("formRegistroUsuarios").action = "";
        alert("Finger 2 Index NOT Captured !");
        return false;
    }else{
		document.getElementById("formRegistroUsuarios").action = "todoCorrecto.php";
        return true;
    }
}
//VALIDATE REGN BEFORE POST | END

//REMOVE FP | START | MUITHI | 09-AUGUST-2013
function truncateUserFP(rmvfp){
    var fpd1;
    var fpd2;
    var getfpd;
    var getfpd;
    getfpd = rmvfp;
    fpd1 = document.getElementById("huella1_id").value;
    fpd2 = document.getElementById("huella2_id").value;
    var fpdelmsg = "Fingerprint Deleted";
    if(fpd1==getfpd){
        alert (fpdelmsg);
        document.getElementById("huella1").value = "";
        document.getElementById("huella1_id").value = "";       
    }else if(fpd2==getfpd){
        alert(fpdelmsg);
        document.getElementById("huella2").value = "";
        document.getElementById("huella2_id").value = "";
    }else{
        alert (" All Fingerprints have been removed !!");        
    }
}
//END REMOVE FP