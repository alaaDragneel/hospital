<?PHP 
include("include/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مستشفى الامل</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald|Pontano+Sans' rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css"  />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon"  href="images/Hospital-icon.jpg" /> 

</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->

<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">
      <h1>الدكتور المعالج</h1>
    </div>
<!-- <div class="search">
      <div class="search-input">
        <input type="text" class="search-text-field" value="Search Here ..." />
      </div>
      <div class="search-button"><a href="#">
      <img src="images/search2.png" alt="search" width="46" height="40" style="border-radius:10%; "/>
      </a></div>
    </div> -->
  </div>
</div>
<!-- end of header wrapper -->
<!-- end of header wrapper -->
<div class="clearing"></div>
<div class="page-wrapper">
  <div class="portfolio">
     <div style="background-color:rgba(0,153,255,.3); border-radius:20px 20px 20px 20px">
          <?PHP 
		     $doctor_id = $_GET['doc'];
			 mysqli_set_charset($con , 'UTF8');
			 $select_join = "
			SELECT * FROM `doctors` WHERE Doc_ID= '".$doctor_id."'

			 ";
		$QUERY = mysqli_query($con,$select_join);
	
			
		while($result = mysqli_fetch_array($QUERY)){
			 ?>
            <div style="border:1px #999999; width: auto ; height:auto; text-align:center;"> 
            <div style="width:auto; height:auto; margin:50px auto; position:relative">
    <div style="text-align:center; position:absolute; top:-70px; right:360px"> <img width="150px" height="120px" style="border-radius:50%" src="images/<?PHP echo $result['pic'] ?>" /> </div>
          <div style="padding-top:40px; padding-bottom:20px">
             <h2> <?PHP echo $result['Name'] ?></h2>
             <span> <p>  <?PHP echo $result['achievement'] ?> </p></span>
            <span>
              <h5>Contact:</h5>
                <label>Mobile : <?PHP echo $result['mobile'] ?>  </label> <br />
                <label>E-mail : <?PHP echo $result['email'] ?>  </label> <br />


                 </span>
               </div>
	      	</div>
         </div>
            <?PHP
			 } // while Loop #END
			echo ' </table>';
			 
		  ?>
     
     
     </div>

    </div>
				  

</div>
<!-- end of page wrapper -->
<div class="clearing"></div>
<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------> 
</body>
</html>
