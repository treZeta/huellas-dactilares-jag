<?php
    header("Cache-control: no-store, no-cache, must-revalidate");
    header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
    header("Pragma: no-cache");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<html>
    <head>
        <title>Validacion exitosa</title>
        <meta name="author" content="Fingerprints">
        <meta name="robots" content="0">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <meta http-equiv="x-ua-compatible" content="IE=10">
    </head>


<?php
include("db.php");
$jomutech = "254724482764";
$start_key = "254724482764";
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/msie/', $user_agent)){
	//INTERNET EXPLORER BROWSER
	$load_enroll_user = '<img id="NotActive" name="NotActive" src="../img/NotActivated.png" />';
    $load_veri = '<img id="NotActive" name="NotActive" src="../img/NotActivatedVer.png" />';
}else{
    //START | MUITHI | SPAWN USER RIGHTS 11-SEPT-2013
    //-->require_once("jmu_modspawn.php");
    //END | MUITHI | 11-SEPT-2013
    
	//NON-INTERNET EXPLORER BROWSER
	$load_enroll_user = '<object id="DPFPEnrollmentUserRegn" classid="clsid:0B4409EF-FD2B-4680-9519-D18C528B265E" >
	<PARAM NAME="MaxEnrollFingerCount" VALUE="2">
	</object>';
}
?>

<!--
<html>
<head>
<title>Tregon</title>
-->

<?php
    include("jmu_create_user.js");
?>


</head>
<body>

<?php
    echo "<div id='jmu_user_registration'>";    
    $reg_print1 = "<h3>Panel de registro de usuarios</h3>";
    //$reg_print1 .= "<form name='jmu_userregnform' id='jmu_userregnform' action='jmu_fpuser_processing.php' method='post' onsubmit='return valUSERREGN();'>";
	$reg_print1 .= "<form name='jmu_userregnform' id='jmu_userregnform' action='' method='post' onsubmit='return valUSERREGN();'>";
    $reg_print1 .= "<br />";		
    $reg_print1 .= "<table>
    <tr>
    <td>Nombres :</td>
    <td><input type='text' name='funame' id='funame' size='30'></td>
    </tr>
    <tr>
    <td>Apellidos :</td>
    <td><input type='text' name='suname' id='suname' size='30'></td>
    </tr>
    <tr>
    <td>Usuario No. :</td>
    <td><input type='text' name='empno' id='empno' size='30'></td>
    </tr>";    
    echo $reg_print1;


    $reg_print3 = "<tr><td>
    <input type='hidden' name='fu_no1' id='fu_no1' size='30'>
    <input type='hidden' name='fputemplate1' id='fputemplate1' value='' size='30'>
    <input type='hidden' name='fu_no2' id='fu_no2' size='30'>
    <input type='hidden' name='fputemplate2' id='fputemplate2' value='' size='30'>
    <input type='reset' name='btnresetr' value='Borrar' class='button'>
    </td>
    <td><input class='button' type='submit' name='btnsubmit' value='Grabar' size='30'></td>
    </tr>
    <tr>
    <td colspan=2>";    
    $reg_print4 = "</td></tr></table></form><br />";
    //REGISTRATION START |  | 31-JULY-2013
    echo $reg_print3."\n".$load_enroll_user."\n".$reg_print4."\n";
    //REGISTRATION END |  | 31-JULY-2013
    ?>

</body>

<script type="text/vbscript">    
<?php
    include("jmu_create_user.vbs");
?>
</script>
<!--
</html>
-->
<?php
    echo "</div>";
?>

</html>