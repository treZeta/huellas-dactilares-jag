<?php
include("db.php");

//START | MUITHI | 11-SEPT-2015
//FIRST NAME AND SURNAME SHOULD YOU NEED THEM

$fname = mysqli_real_escape_string($con, $_POST['funame']);
$sname = mysqli_real_escape_string($con, $_POST['suname']);

//END | MUITHI | 11-SEPT-2015


$empno = mysqli_real_escape_string($con, $_POST['empno']);
$f_no1 = mysqli_real_escape_string($con, $_POST['fu_no1']);
$fptemplate1 = mysqli_real_escape_string($con, $_POST['fputemplate1']);
$f_no2 = mysqli_real_escape_string($con, $_POST['fu_no2']);
$fptemplate2 = mysqli_real_escape_string($con, $_POST['fputemplate2']);
$reg_names = $fname." ".$sname;

/**
  echo "Testing POST from Registration Form "."<br/>";
  echo "fname ".$fname."<br/>";
  echo "sname ".$sname."<br/>";
  echo "empno ".$empno."<br/>";
  echo "f_no1 ".$f_no1."<br/>";
  echo "fptemplate1 ".$fptemplate1."<br/>";
  echo "f_no2 ".$f_no2."<br/>";
  echo "fptemplate2 ".$fptemplate2."<br/>";
 **/
?>

<?php

//FP EXISTS CHECK
//$qry_existsfp = "SELECT COUNT(*)count_chkfp FROM regs_users WHERE emp_no = '".$empno."'"; //MUITHI | 11-SEPT-2015
$qry_existsfp = "SELECT COUNT(*)count_chkfp FROM employees WHERE empno = '".$empno."'";  //MUITHI | 11-SEPT-2015
//echo $qry_existsfp."<br/>";
$chk_exists_stmtfp = mysqli_query($con, $qry_existsfp);
while($res_chkfp = mysqli_fetch_assoc($chk_exists_stmtfp)){
	$count_entryfp = $res_chkfp['count_chkfp'];
}


//SYSTEM USER PARTICULARS TO DB
//START | MUITHI | 11-SEPT-2015
/*
$ins_stmtfp = "INSERT INTO regs_users (fname, sname, emp_no, fp_data1, fp_data2, fp1_id, fp2_id) 
            VALUES ('$fname','$sname','$empno','$fptemplate1','$fptemplate2','$f_no1','$f_no2')";
 */
 
$ins_stmtfp = "INSERT INTO employees (empfname, empsname, empno, fptemplate1, fptemplate2, f_no1, f_no2) 
            VALUES ('$fname','$sname','$empno','$fptemplate1','$fptemplate2','$f_no1','$f_no2')"; 
			
//echo $ins_stmtfp;
//END | MUITHI | 11-SEPT-2015

            
if($count_entryfp == 0){
    //echo $ins_stmtfp."<br/>";
	mysqli_query($con, $ins_stmtfp); //09-AUG-2013

	//echo $ins_stmtfp."<br/>";
	//echo $con;
	//exit;
	//SUCCESS
    header("location:registration_success.php");  //MUITHI | 11-SEPT-2015
}else if($count_entryfp >= 1){
    
	//FAIL
    header("location:registration_fail.php");   //MUITHI | 11-SEPT-2015
}else{
    //DO A LOT OF NOTHING HERE
}
//header("location : registration.php"); //09-AUG-2013 
?>
