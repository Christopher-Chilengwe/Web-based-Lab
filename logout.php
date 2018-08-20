<?php 
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
// unset( $_SESSION['USERID'] );
// unset( $_SESSION['FULLNAME'] );
// unset( $_SESSION['USERNAME'] );
// unset( $_SESSION['PASS'] );
// unset( $_SESSION['ROLE'] );


// 4. Destroy the session
// session_destroy();

if ($_SESSION['ACCOUNT_TYPE']=='Student'){

		if (isset($_POST['updatedtimes'])){
			
		global $mydb;

		$mydb->setQuery("UPDATE tblenrollment SET TIMEALLOTED=STR_TO_DATE('".$_POST['updatedtimes']."', '%H:%i:%s') where STUDENTID='".$_SESSION['EMPID']."' AND  SEMESTER='".$_SESSION['SEMESTER']."' AND AY='".$_SESSION['AY']."'");
		$mydb->executeQuery();

		$mydb->setQuery("SELECT * FROM `tbltimelogs` WHERE `IDNUM`='". $_SESSION['EMPID'] ."'");
   		 $LOGS =  $mydb->loadSingleResult();


	$mydb->setQuery("UPDATE `tbltimelogs` SET `TIMEEND` = STR_TO_DATE('".$_POST['updatedtimes']."', '%H:%i:%s'), ACTIVESTATUS='NOTACTIVE' WHERE LOGID=". $LOGS->LOGID );
		$mydb->executeQuery();
		
			//redirect("index.php");

		}

}
unset( $_SESSION['ACCOUNT_ID'] );
unset( $_SESSION['ACCOUNT_NAME'] );
unset( $_SESSION['ACCOUNT_USERNAME'] );
unset( $_SESSION['ACCOUNT_PASSWORD'] );
unset( $_SESSION['ACCOUNT_TYPE'] );
unset( $_SESSION['EMPID'] );
?>
<script type="text/javascript">
                  
  document.cookie = "remaining="; 
</script>
<?php
redirect(WEB_ROOT."login.php?logout=1");
?>
 