<?php
session_start();

include 'config.inc.php';
//-->include 'header.php';  //MUITHI | 10-SEPT-2015
include 'header_checkout.php';  //MUITHI | 10-SEPT-2015

if (!isset($_GET['printer_friendly'])) {

    if (isset($_SESSION['valid_user'])) {
        $set_logout = "1";
    }

    //include 'topmain.php'; //MUITHI | 10-SEPT-2015
    //-->include 'leftmain.php'; //MUITHI | 10-SEPT-2015
	include 'client_checkout.php'; //MUITHI | 10-SEPT-2015
}

//-->echo "<title>$title</title>\n"; //MUITHI | MAIN CHECK IN | 11-SEPT-2015
//$current_page = "timeclock.php"; //MUITHI | MAIN CHECK IN | 10-SEPT-2015 
$current_page = "user_authenticate.php"; //MUITHI | MAIN CHECK IN | 10-SEPT-2015 

if (!isset($_GET['printer_friendly'])) {
    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=5 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
}

// code to allow sorting by Name, In/Out, Date, Notes //


// determine what users, office, and/or group will be displayed on main page //

//echo $query."<br/><br/>";//MUITHI | MY TEST

$time = time();
$tclock_hour = gmdate('H',$time);
$tclock_min = gmdate('i',$time);
$tclock_sec = gmdate('s',$time);
$tclock_month = gmdate('m',$time);
$tclock_day = gmdate('d',$time);
$tclock_year = gmdate('Y',$time);
$tclock_stamp = mktime ($tclock_hour, $tclock_min, $tclock_sec, $tclock_month, $tclock_day, $tclock_year);

$tclock_stamp = $tclock_stamp + @$tzo;
$tclock_time = date($timefmt, $tclock_stamp);
$tclock_date = date($datefmt, $tclock_stamp);
$report_name="Current Status Report";

echo "            <table width=100% align=center class=misc_items border=0 cellpadding=3 cellspacing=0>\n";

if (!isset($_GET['printer_friendly'])) {
    echo "              <tr class=display_hide>\n";
} else {
    echo "              <tr>\n";
}

//START | MUITHI | 10-SEPT-2015
/*
echo "                <td nowrap style='font-size:9px;color:#000000;padding-left:10px;'>$report_name&nbsp;&nbsp;---->&nbsp;&nbsp;As of: $tclock_time, 
                    $tclock_date</td></tr>\n";
*/

echo "<td></td></tr>\n";
//END | MUITHI | 10-SEPT-2015

echo "            </table>\n";
//-->include 'display.php'; //MUITHI | 10-SEPT-2015

if (!isset($_GET['printer_friendly'])) {
    include 'footer.php'; //MUITHI | 10-SEPT-2015
}

?>

