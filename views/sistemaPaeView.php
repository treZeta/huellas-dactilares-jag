<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="treZeta">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Sistema PAE</title>
</head>

<?php

    $service = "Refrigerio";

    if(isset($_POST['service'])){
        if($_POST['service'] == ""){
            $service = "Refrigerio";
        } else{
            $service = "Almuerzo";
        }
    }

?>

<body class="<?php echo $service ?>">
    <div class="container no-flex">
        <h1 class="<?php echo $service ?>" >Sistema PAE</h1>

        <div class="serviceContainer">

            <p class="Refrigerio">Refrigerio</p>
            
            <form id="serviceForm" action="" method="POST">
                <label class="switch">
                    <input name="service" value="Almuerzo" type="checkbox" onclick="document.getElementById('serviceForm').submit()" <?php if($service == "Almuerzo") { echo "checked"; } ?>>
                    <span class="slider round"></span>
                </label>
            </form>

            <p class="Almuerzo">Almuerzo</p>

        </div>

        <p class="<?php echo $service ?>">Esperando un ingreso...</p>
</div>
</body>

</html>