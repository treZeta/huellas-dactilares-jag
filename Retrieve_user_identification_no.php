<?php
$retrievedEmployeeNo = $_GET['jmu1'];
$retrievedEmployeeFname = $_GET['jmuname1'];
$retrievedEmployeeSname = $_GET['jmuname2'];
?>
<!DOCTYPE html>

<html>

<head>
   <title>Validacion exitosa</title>
   <meta name="author" content="Fingerprints">
   <meta name="robots" content="0">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/styles.css">
</head>

<body>
   <div class="container">
      <h2>
         El sistema de identificación de huellas dactilares ha reconocido a el usuario <?php echo $retrievedEmployeeFname .
                                                                                          " " . $retrievedEmployeeSname; ?> de identificador #<?php echo $retrievedEmployeeNo; ?>
      </h2>
      <p>JORGE LUIS ROJAS SANDOVAL <br>
         Biometrics Software Developer & Consultant <br>
         ingenierojl@misena.edu.co</p>
      <form name='' id='' action='Employee_authentication.php' method='post'>
         <input class='button' type='submit' name='btnsubmit' value='Volver a la autenticacion de usuario'>
      </form>   
   </div>
</body>

</html>

<?php

//$retrievedEmployeeNo = $_GET['jmu1']; //using $_GET
//$retrievedEmployeeNo = $_POST['jmu1']; //using $_POST



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

?>