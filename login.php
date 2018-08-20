<?php
require_once("include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['ACCOUNT_ID'])){
    redirect(WEB_ROOT."index.php");
  }
  ?>
  


 <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel Login</title>
  
  
    <link rel="icon" href="<?php echo WEB_ROOT; ?>favicon-1.ico" type="image/x-icon">
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body>
<div class="container">
  <section id="content">
  <?php check_message(); ?>
    <form action="" method="POST">
      <h1>Login</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username"  name="user_email" />
      </div>
      <div>
        <input type="password" placeholder="Password" required="" id="password" name="user_pass" />
      </div>
      <div>
        <input type="submit" name="btnLogin" value="Log in" />
      
      </div>
    </form><!-- form -->
    <div class="button">
     
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/index.js"></script>

</body>
</html>



 <?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::AuthenticateUser($email, $h_upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['ACCOUNT_TYPE'].".","success");
      if ($_SESSION['ACCOUNT_TYPE']=='Administrator' || $_SESSION['ACCOUNT_TYPE']=='Student'){

        $_SESSION['ACCOUNT_ID']       = $_SESSION['ACCOUNT_ID'];
        $_SESSION['ACCOUNT_NAME']     = $_SESSION['ACCOUNT_NAME'] ;
        $_SESSION['ACCOUNT_USERNAME'] = $_SESSION['ACCOUNT_USERNAME'];
        $_SESSION['ACCOUNT_TYPE']     = $_SESSION['ACCOUNT_TYPE'];
        $_SESSION['EMPID']            = $_SESSION['EMPID'];

          $singledft = new Defaults();
          $assignedSEM = $singledft->single_default_sem();
          $assignedAY = $singledft->single_default_ay();

          $_SESSION['SEMESTER']      =    $assignedSEM->LISTNAME;
          $_SESSION['AY']            =    $assignedAY->LISTNAME;
      

       if ($_SESSION['ACCOUNT_TYPE']=='Student'){



      //  if ($_SESSION['ACCOUNT_TYPE']=='Student'){
         date_default_timezone_set('Asia/Manila'); 
        
        $date  = date("Y-m-d");
        $time = date(' g:i:a  ');

      $mydb->setQuery("SELECT TIMEALLOTED, DATE_FORMAT(`TIMEALLOTED`, '%H') as HR, DATE_FORMAT(`TIMEALLOTED`, '%i') as MM, DATE_FORMAT(`TIMEALLOTED`, '%S') as ss  FROM `tblenrollment` WHERE `STUDENTID`='". $_SESSION['EMPID'] ."' AND `SEMESTER`='".$_SESSION['SEMESTER']."' AND `AY`='".$_SESSION['AY']."'");
      $res =  $mydb->loadSingleResult();
      $logtime =$res->TIMEALLOTED;
      $_SESSION['HR'] = $res->HR;
      $_SESSION['MM'] = $res->MM;
      $_SESSION['SS'] = $res->ss;

       $mydb->setQuery("INSERT INTO `tbltimelogs` (`LOGID`, `LAST_LOGINDATE`, `LAST_LOGINTIME`, `TIMESTART`, `TIMEEND`, `IDNUM`,ACTIVESTATUS) VALUES (NULL, '{$date}', '{$time}', '{$logtime}', '00:00:00', '". $_SESSION['EMPID'] ."', 'ACTIVE');");
          $mydb->executeQuery();
    }    


         redirect(WEB_ROOT."index.php");
      } 
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(WEB_ROOT."login.php"); 
    }
 }
 } 
 ?> 
 


