<?php

//$retrievedEmployeeNo = $_GET['jmu1']; //using $_GET
//$retrievedEmployeeNo = $_POST['jmu1']; //using $_POST
$retrievedEmployeeNo = $_GET['jmu1'];


/*
NB:
You are receiving $_GET['jmu1'] value from 
file 'jmu_identification_checkout.js' 
in this line below
'window.location = "Generate_signature.php?jmu1="+empno;'
I noticed you have already configured yours to point to "Generate_signature.php'
which is good. I am glad to see you already getting the flow.
*/

/*
On my web browser at the address bar after I added this file Generate_signature.php I am seeing
http://localhost/tregon/Generate_signature.php?jmu1=2222222 to imply that 222222 in my database
was identified as the number saved against my fingerprint
*/


echo "<h2>Se recuper� el sistema de identificaci�n de huellas dactilares basado en la Web: Empleado No <b> [ ".$retrievedEmployeeNo." </b> ]<h2>";
echo "<br/> <br/>";
echo "A partir de entonces, puede utilizar <b>[ $retrievedEmployeeNo ]</b> A e. Recuperar el nombre del usuario para la visualizaci�n que es<br/> Si hab�a guardado alguno o utilizando una consulta de uni�n de la base de datos de integraci�n en la que tiene personas guardadas contra los n�meros que tiene en la base de datos biom�tricos o proceder con la identificaci�n postal<br/> Relacionados con la persona ahora identificada. Esto depender�<br/> Sobre c�mo ha decidido hacer su integraci�n.<br/><br/>";

$separatorString = "<br/><br/><br/>-------------------------------------------------------<br/><br/>";
echo "Por favor, h�gamelo saber si su aplicaci�n es capaz de llegar hasta aqu�.".$separatorString."Ing. Walter Alvarez<br/>Biometrics Software Developer & Consultant<br/>walteralvarez75@hotmail.com<br/>www.facebook.com/biometricos54<br/>http://biometricos.esy.es".$separatorString;

?>

<?php
echo "
<form name='' id='' action='main_checkout.php' method='post'>
<input class='button' type='submit' name='btnsubmit' value='BACK TO IDENTIFICATION' size='30'>
</form>";
?>