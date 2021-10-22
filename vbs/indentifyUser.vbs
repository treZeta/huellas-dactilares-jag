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
		dbHexdata1 = document.getElementByID("dbhexstr1-"&a).value
		dbHexdata2 = document.getElementByID("dbhexstr2-"&a).value
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
			MsgBox("�Has logrado con �xito la huella 1!")'--INITIAL SUCCESS MSG--
			'getFPType(1)
			getREGID(a)
			'endVeri()
			Exit For
		ElseIf give2.Verified = True Then
			document.getElementById("authstat").value = 1
			MsgBox("�Has logrado con �xito la huella 2!")'--INITIAL SUCCESS MSG--
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
