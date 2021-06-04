<html>
<head>
<meta http-equiv="x-ua-compatible" content="IE=10">
<link rel='stylesheet' type='text/css' media='screen' href='css/default.css' />
<link rel='stylesheet' type='text/css' media='print' href='css/print.css' />
<meta http-equiv='refresh' content="300;URL=Employee_authentication.php">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<script language="javascript" src="scripts/pnguin_timeclock.js"></script>
<script type="text/javascript"> 
var _app = navigator.appName;
var rtvregval = -1;
var gtftyp;

if (_app == "Netscape"){
    alert("Esta aplicación corre solamente en Microsoft Internet Explorer !!!");
}else if(_app=="Microsoft Internet Explorer"){
    //Continue
}

function endVeri(){
	var chkvstat = document.getElementById("authstat").value;
	//alert ("My value is " +chkvstat);
	if(chkvstat == 1){
		//alert("You have been SUCCESSFULY VERIFIED !");
		//window.location = "post_auth.php";
	}else if(chkvstat == 0){
		alert ("Utilice la huella dactilar CORRECTA para el propósito de la verificación o para entrar con su identidad VERDADERA si éste no es USTED!");
		//window.location = "pre_auth.php";
        //window.location = "fset_processing.php";
        window.location = "#";
	}
    return chkvstat;
}

function getIDVal(aval){
    var arrayval = aval;
    alert("value from vbscript is " + arrayval);
    var arraystring;
    arraystring = document.getElementById("dbhexstr"+arrayval).value;
    return arraystring;
}

function getFPType(swara){
    var ftyp = swara;
    gtftyp = ftyp;
}

function getREGID(ridval){
    var regftyp = gtftyp;
    var regval = ridval;
    var regid = document.getElementById("dbreg_id"+regval).value;
    //-->var staffnames = document.getElementById("dbfpnames"+regval).value;  //MUITHI | 11-SEPT-2015
	//var inout = document.getElementById("left_inout").value; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014
	//-->var notes = document.getElementById("left_notes").value; //MUITHI | 10-SEPT-2015
	//var remcookie = document.getElementById("remember_me").value;
	//var resetcookie = document.getElementById("reset_cookie").value;
    rtvregval = regid;
    //-->alert(staffnames + " You have been Successfully Identified ID " + regid); //MUITHI | 11-SEPT-2015
    //regid = 6;
    var vidstart = document.getElementById("authstat").value;
    var empno = document.getElementById("dbfpempid"+regval).value;
	var empfname = document.getElementById("dbfpempfname"+regval).value;
	var empsname = document.getElementById("dbfpempsname"+regval).value;
    //var fpno = document.getElementById("dbfpno"+regval).value;
    var fp1no = document.getElementById("dbfpno1"+regval).value;
    var fp2no = document.getElementById("dbfpno2"+regval).value;
    
    if (regftyp == 1){
        var fpno = fp1no;
        alert("Huella 1");
    }
    if (regftyp == 2){
        var fpno = fp2no;
        alert("Huella 2");
    }
	if(vidstart == 1){
	   alert("VERIFICADO CON ÉXITO 1 !");
	   //window.location = "post_auth.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+fpno; //MUITHI | 16-JAN-2014
	   //window.location = "post_auth.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+inout; //MUITHI | 16-JAN-2014
	   //window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+inout+"&jmu4="+notes; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014
	   //-->window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu4="+notes; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015
	   //-->window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015
	   //-->window.location = "main_checkin.php?jmu1="+empno+"&jmu2="+staffnames; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015
	   //window.location = "main_checkout.php?jmu1="+empno; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015
	   //>>>window.location = "Retrieve_user_identification_no.php?jmu1="+empno; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015 | 04-JULY-2016
	   window.location = "Retrieve_user_identification_no.php?jmu1="+empno+"&jmuname1="+empfname+"&jmuname2="+empsname; //MUITHI | STATUS IN/OUT NOT NEEDED | 29-JAN-2014 | 10-SEPT-2015 | 04-JULY-2016
	   //-->window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+inout+"&jmu4="+notes+"&jmu5="+remcookie;
	   //window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+inout+"&jmu4="+notes+"&jmu5="+remcookie+"&jmu6="+resetcookie; //MUITHI | 16-JAN-2014
	   //window.location = "timeclock.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+inout+"&jmu4="+notes+"&jmu5="+remcookie+"&jmu6=1"; //MUITHI | 16-JAN-2014
	   //valVERY();
	   
    }
	
    return regid;
}

function getContraBio(xbioval){
    var xval = xbioval;
    var payloadval = document.getElementById("cntstaff").value;
    //alert("xval is " + xval + " payload is " + payloadval);
    if(xval == payloadval){
        alert("Personal no válido / no autorizado. Acceso denegado !!!");
        alert("Use el dedo correcto para la identificación o póngase en contacto con el administrador para registrarse!");        
    }else{
        //Do Nothing: Relevant part of code already executed. Application should not find itself here!!!
        //alert("Do Nothing: Relevant part of code already executed. Application should not find itself here !!!");
        //AUDIT for this incidence
    }
}

/**
function valVERY(){
	var inout = document.getElementById("left_inout").value;
	if(inout == ''){
		document.timeclock.action = "";
		alert("Choose Event to Clock !");
		document.timeclock.left_inout.style.background = '#FF99FF';
		document.timeclock.left_inout.focus();
		return false;
	}else{
		alert("SUCCESSFULY VERIFIED 2 !");
		//window.location = "post_auth.php?jmu1="+empno+"&jmu2="+staffnames+"&jmu3="+fpno;
		document.getElementById("timeclock").action = "faluja.php";
        return true;	
	}
}
**/







</script>
</head>
<body>


<?php


include 'db.php';

$load_veri = '<object id="DPFPVerControl" classid="clsid:F4AD5526-3497-4B8C-873A-A108EA777493"></object>';

echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
echo "  <tr valign=top>\n";
echo "    <td class=left_main width=170 align=left scope=col>\n";
echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";

echo "        <tr></tr>\n";

//>>>echo "        <form name='timeclock' id='timeclock' action='$self' method='post'>\n";
echo "        <form name='timeclock' id='timeclock' action='' method='post'>\n";


echo "        <tr><td height=7></td></tr>\n";


echo "        <tr><td class=title_underline height=4 align=left valign=middle style='padding-left:10px;'>Identificar Usuario</td></tr>\n";
echo "        <tr><td height=7></td></tr>\n";
echo "        <tr><td height=4 align=left valign=middle class=misc_items>Ingrese huella a identificar</td></tr>\n";
echo "        <tr><td height=4 align=left valign=middle class=misc_items bgcolor='#F0F0F0'  align='center' style='border:1px solid #999999;'>\n".$load_veri."\n</td></tr>\n";




    //$query = "select reg_id, displayname, empfullname, f_no1 as fp1_id, f_no2 as fp2_id, fptemplate1 as fp_data1, fptemplate2 as fp_data2 from ".$db_prefix."employees where disabled <> '1'  and empfullname <> 'admin' order by displayname"; //MUITHI | 11-SEPT-2015
	//$query = "select reg_id, empfullname, f_no1 as fp1_id, f_no2 as fp2_id, fptemplate1 as fp_data1, fptemplate2 as fp_data2 from ".$db_prefix."employees"; //MUITHI | 11-SEPT-2015
	$query = "select reg_id, empfname, empno, empsname, f_no1 as fp1_id, f_no2 as fp2_id, fptemplate1 as fp_data1, fptemplate2 as fp_data2 from employees"; //MUITHI | 11-SEPT-2015
    $emp_name_result = mysqli_query($con, $query);
    //echo "              <select name='left_displayname' tabindex=1>\n"; //MUITHI | 18-JAN-2014
    //echo "              <option value =''>...</option>\n"; //MUITHI | 18-JAN-2014

	$staff_count = 0;
    while ($row = mysqli_fetch_assoc($emp_name_result)) {

        //-->$abc = stripslashes("".$row['displayname'].""); // MUITHI | 11-SEPT-2015
		$fpdata1[] = $row['fp_data1'];
		$fpdata2[] = $row['fp_data2'];
		$fpno1[] = $row['fp1_id'];
		$fpno2[] = $row['fp2_id'];
		$fpempno[] = $row['empno'];
		$fpreg_id[] = $row['reg_id'];
		$fpempfname[] = $row['empfname'];
		$fpempsname[] = $row['empsname'];
		//-->$fpnames[] = $row['displayname']; //MUITHI | 11-SEPT-2015

		/*
        if ((isset($_COOKIE['remember_me'])) && (stripslashes($_COOKIE['remember_me']) == $abc)) {
            //echo "              <option selected>$abc</option>\n"; //MUITHI | 18-JAN-2014
        } else {
            //echo "              <option>$abc</option>\n"; //MUITHI | 18-JAN-2014
        }
		*/
		$staff_count++;

    }
    
	
	
if($staff_count >= 1){

	for($i=0; $i<sizeof($fpempno); $i++){
        $k = $i+1;
	}

    //echo "              </select></td></tr>\n"; //MUITHI | 18-JAN-2014
    //>>>>mysql_free_result($emp_name_result);
    echo "        <tr><td height=7>";
	$fpno1_count = 1;
	foreach($fpno1 as $fpno1_val){
		echo '<input type="hidden" name="dbfpno1[]" id="dbfpno1'.$fpno1_count.'" value="'.$fpno1_val.'">';
		$fpno1_count++;
	}
	$fpno2_count = 1;
	foreach($fpno2 as $fpno2_val){
		echo '<input type="hidden" name="dbfpno2[]" id="dbfpno2'.$fpno2_count.'" value="'.$fpno2_val.'">';
		$fpno2_count++;
	}
	$fpdata1_count = 1;
	foreach($fpdata1 as $fpdata1_val){
		echo '<input type="hidden" name="dbhexstr1[]" id="dbhexstr1'.$fpdata1_count.'" value="'.$fpdata1_val.'">';
		$fpdata1_count++;
	}
	$fpdata2_count = 1;
	foreach($fpdata2 as $fpdata2_val){
		echo '<input type="hidden" name="dbhexstr2[]" id="dbhexstr2'.$fpdata2_count.'" value="'.$fpdata2_val.'">';
		$fpdata2_count++;
	}
	$fpreg_id_count = 1;
	foreach($fpreg_id as $fpreg_id_val){
		echo '<input type="hidden" name="dbreg_id[]" id="dbreg_id'.$fpreg_id_count.'" value="'.$fpreg_id_val.'">';
		$fpreg_id_count++;
	}
	$fpempid_count = 1;
	foreach($fpempno as $fpempid_val){
		echo '<input type="hidden" name="dbfpempid[]" id="dbfpempid'.$fpempid_count.'" value="'.$fpempid_val.'">';
		$fpempid_count++;
	}
	
	$fpempfname_count = 1;
	foreach($fpempfname as $fpempid_val){
		echo '<input type="hidden" name="dbfpempfname[]" id="dbfpempfname'.$fpempfname_count.'" value="'.$fpempid_val.'">';
		$fpempfname_count++;
	}
	
	$fpempsname_count = 1;
	foreach($fpempsname as $fpempid_val){
		echo '<input type="hidden" name="dbfpempsname[]" id="dbfpempsname'.$fpempsname_count.'" value="'.$fpempid_val.'">';
		$fpempsname_count++;
	}
	
	
	//START | MUITHI | DISPLAY NAME NOT REQUIRED HERE | 11-SEPT-2015 
	/*
	$fpnames_count = 1;
	foreach($fpnames as $fpnames_val){
		echo '<input type="hidden" name="dbfpnames[]" id="dbfpnames'.$fpnames_count.'" value="'.$fpnames_val.'">';
		$fpnames_count++;
	}
	*/
	//END | MUITHI | 11-SEPT-2015
	
	echo '<input type="hidden" name="cntstaff" id="cntstaff" class="cntstaff" value="'.sizeof($fpempno).'">';
	echo '<input type="hidden" name="authstat" id="authstat" class="authstat" value="-1" onchange="endVeri()">';
	echo "</td></tr>\n";


}	
//echo "</table>";
//echo "</table>";	

?>

 <tr><td height=7></td></tr>
        <tr><td height=4 align=left valign=middle class=misc_items></td></tr>
        <tr><td height=4 align=left valign=middle class=misc_items>        <tr><td height=7></td></tr>
        <tr><td height=4 align=left valign=middle class=misc_items><input type='submit' name='submit_button' value='Actualizar Pagina' align='center' 
                tabindex=6></td></tr></form>
        <tr><td height=90%></td></tr>
      </table></td>
    <td align=left class=right_main scope=col>
      <table width=100% height=100% border=0 cellpadding=5 cellspacing=1>
        <tr class=right_main_text>
          <td valign=top>
            <table width=100% align=center class=misc_items border=0 cellpadding=3 cellspacing=0>
              <tr class=display_hide>
<td></td></tr>
            </table>
</td></tr>
      </table>
    </td>
  </tr>
</table>

</body>
<script type='text/vbscript'>
'Format a byte array to a hex string to be sent to the server.
Function OctetToHexStr(ByVal arrbytOctet)
    Dim k
    For k = 1 To Lenb(arrbytOctet)
        OctetToHexStr = OctetToHexStr _
          & Right("0" & Hex(Ascb(Midb(arrbytOctet, k, 1))), 2)
    Next
End Function

Function encodeBase64(bytes)
	dim DM,EL
	Set DM = CreateObject("Microsoft.XMLDOM")
	'Create temporary node with Base64 data type
	Set EL = DM.CreateElement("tmp")
	EL.DataType = "bin.base64"
	'Set bytes,get encoded String
	EL.NodeTypedValue = bytes
	encodeBase64 = EL.Text
	'MsgBox "encodeBase64 output's EL.Text vartype " & vartype(EL.Text)
End Function

sub DPFPEnrollment_OnEnroll(finger, template, status)
    Dim fpe1
    Dim fpe2
    fpe1 = document.getElementById("f_no1").value
    fpe2 = document.getElementById("f_no2").value
    
    if fpe1 = "" Or fpe1 = null then
    	MsgBox "Huella 1 Capturada  "
    	document.getElementById("fptemplate1").value = encodeBase64(template.Serialize())
    	document.getElementById("f_no1").value = finger
    else
    	MsgBox "Huella 2 capturada  "
    	document.getElementById("fptemplate2").value = encodeBase64(template.Serialize())
    	document.getElementById("f_no2").value = finger
    end if 
end sub

sub DPFPEnrollment_OnDelete(delfp,status)
    Dim getfpd
    getfpd = delfp
    truncateFP(getfpd)
end sub

'HexStr
'HexStr = document.getElementById("dbhexstr21").value
'Msgbox HexStr

'Dim test : Set test = CreateObject("DPFPShrX.DPFPTemplate")
'Dim HexStr
'Dim byteStr
'Dim tempbyte
'Set tempbyte = CreateObject("Scripting.Dictionary")
'tempbyte = byteStr

sub DPFPVerControl_OnComplete(pFtrs,pStatus)
	Dim a
	Dim arraysize
	Dim fpdata12
	'--->Dim dbHexdata
	Dim dbHexdata1
	Dim dbHexdata2
	Dim tellme
	Dim valdeny
	valdeny = -5
	'fpdata12 = document.getElementById("dbhexstr[]").value
	'Msgbox "fpdata12 " & fpdata12
	arraysize = document.getElementById("cntstaff").value
	'Dim fparray()
	'fparray(12) = document.getElementById("cntstaff[12]").value
	'Msgbox "array size " & arraysize
	'Dim Enroll : Set Enroll = CreateObject("DPFPEngX.DPFPEnrollment")
	
	For a = 1 To arraysize
		'NB:CAUTION --> Walter ALWAYS REM TO START THE LOOP FOR THIS ARRAY FROM 1. REASONS WELL KNOWN TO YOU!
		'tellme = "dbhexstr" & a
		'Msgbox " tellme " & tellme
		'Msgbox(document.getElementByID("dbhexstr"&a).value)
		'dbHexdata = document.getElementByID("dbhexstr13").value
		'--->dbHexdata = document.getElementByID("dbhexstr"&a).value
		dbHexdata1 = document.getElementByID("dbhexstr1"&a).value
		dbHexdata2 = document.getElementByID("dbhexstr2"&a).value
		'dbHexdata = getIDVal(a)
		'--->Dim templ : Set templ = CreateObject("DPFPShrX.DPFPTemplate")
		Dim templ1 : Set templ1 = CreateObject("DPFPShrX.DPFPTemplate")
		Dim templ2 : Set templ2 = CreateObject("DPFPShrX.DPFPTemplate")
		'templ.Deserialize(decodeBase64(HexStr))
		'--->templ.Deserialize(decodeBase64(dbHexdata))
		templ1.Deserialize(decodeBase64(dbHexdata1))
		templ2.Deserialize(decodeBase64(dbHexdata2))
		'--->Dim give : Set give = CreateObject("DPFPEngx.DPFPVerificationResult")
		Dim give1 : Set give1 = CreateObject("DPFPEngx.DPFPVerificationResult")
		Dim give2 : Set give2 = CreateObject("DPFPEngx.DPFPVerificationResult")
		'--->Dim Ver : Set Ver = CreateObject("DPFPEngx.DPFPVerification")
		Dim Ver1 : Set Ver1 = CreateObject("DPFPEngx.DPFPVerification")
		Dim Ver2 : Set Ver2 = CreateObject("DPFPEngx.DPFPVerification")
		'--->set give = Ver.Verify(pFtrs,templ)
		set give1 = Ver1.Verify(pFtrs,templ1)
		set give2 = Ver2.Verify(pFtrs,templ2)
		'--->If give.Verified = True Then
		If give1.Verified = True Then
			document.getElementById("authstat").value = 1
			MsgBox("¡Has logrado con éxito la huella 1!")'--INITIAL SUCCESS MSG--
			'getFPType(1)
			getREGID(a)
			'endVeri()
			Exit For
		ElseIf give2.Verified = True Then
			document.getElementById("authstat").value = 1
			MsgBox("¡Has logrado con éxito la huella 2!")'--INITIAL SUCCESS MSG--
			'getFPType(2)
			getREGID(a)
			'endVeri()
			Exit For
		Else
			document.getElementById("authstat").value = 0
			valdeny = a
		End If
		'getContraBio(valdeny)
		'call endVeri()
	Next
	getContraBio(valdeny)
	call endVeri()
	
end sub

Function decodeBase64(base64)
	dim DM,EL
	Set DM = CreateObject("Microsoft.XMLDOM")
	Set EL = DM.CreateElement("tmp")
	EL.DataType = "bin.base64"
	EL.Text = base64
	decodeBase64 = EL.NodeTypedValue
End Function

</script>
</html>