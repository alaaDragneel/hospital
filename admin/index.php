<?PHP
// if( $_SERVER["REQUEST_METHOD"]=='post') {
//connection
include("../include/connection.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>controal Panel</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald|Pontano+Sans' rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.css"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon"  href="../images/Hospital-icon.jpg" /> 
<link rel="stylesheet" href="css/style.css" /> 

</head>

<div id="header">
  <div class="logo-search-container">
  <span style="position:absolute; left:10px; top:10px">
   <span id="logo">control panel</span>
   </span>
  <span style=" right:20px; top:50px; position:absolute">
 <a href="profile.php" class="navLink">Profile</a> 
 <a href="Reservation.php" class="navLink">Reservations</a>
 <a href="messages.php" class="navLink">Inbox</a>   
 <a href="logout.php" class="navLink">logOut</a>  </span>
    <div class="logo">    
    </div>
  </div>
</div>

<div class="clearing"></div>

  <div id="contenar">
    
    <!-----------  ------------->
    <aside id="menu"> 
       
       <ul> 
          <li>
       <h2 style="text-align:center; font-weight:900; font-size:26px; background-color:#069; line-height:inherit">specialties</h2>  
        <ul  style="margin-bottom:50px; padding-top:10px">
             <li style="margin-bottom:10px"> <a href="index.php?p=add_Specialty">Add Specialty </a></li>
             <li> <a href="index.php?p=specialties_view">View </a></li>
          </ul>
          </li>
          <li>
          <h2 style="text-align:center; font-weight:900; font-size:26px; background-color:#069; line-height:inherit">Doctors</h2> 
       <ul style="margin-bottom:50px; padding-top:10px">
             <li style="margin-bottom:10px"> <a href="index.php?p=add_doctors">Add New Doctor </a></li>
             <li> <a href="index.php?p=Doctor_view">View </a></li>
          </ul>
          </li>
            <li>
          <h2 style="text-align:center; font-weight:900; font-size:26px; background-color:#069; line-height:inherit">services</h2> 
         <ul style="margin-bottom:50px; padding-top:10px">
             <li style="margin-bottom:10px"> <a href="index.php?p=add_services">Add New services </a></li>
             <li> <a href="index.php?p=services_view">View </a></li>
          </ul>
          </li>
        <li>
          <h2 style="text-align:center; font-weight:900; font-size:26px; background-color:#069; line-height:inherit">schedule</h2> 
             <ul style="margin-bottom:50px; padding-top:10px">
             <li style="margin-bottom:10px"> <a href="index.php?p=add_schedule">Add New schedule</a></li>
             <li> <a href="index.php?p=Schedule_view">View </a></li>
          </ul>
          </li>
          </ul>
        </aside> <!-----------  ------------>
          <div id="containt"> 
            
             <section id="main_containt"> 
       
                <?php
			
     if(isset($_GET['p']))
	 {
		 
		 $url = $_GET['p'] . '.php';
		 if(is_file($url))
		   include($url);
		 else
		   echo 'Page Not Found.';
	 }
	 
	 else{
	   include ('add_Specialty.php');	 
	 }
    
  ?>  
             
                  </section>
            
                 </div>
        

</div>
<!-- end of page wrapper -->
<div class="clearing"></div>

<!--- Footer------>
<?PHP include("../include/template/footer.php");?>
<!---//END  Footer------>

</body>
</html>
<?PHP
// }else {
	// header("location:login.php");
	 
//	 }
 ?>