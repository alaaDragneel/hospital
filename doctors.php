<?PHP
//connection
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

<style> 
  .td { margin:20px ; text-align:center; padding:5px 5px 5px 5px; border:none}
  textarea { border:none ; width:300px ; padding:20px ; margin:10px auto}
  .R { padding-left:20px; padding-right:40px}
  </style>
  
</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->

<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">    
      <h1>دكاترة الاقسام والتخصصات</h1>
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

		<?PHP 
			   mysqli_set_charset($con ,'UTF8');
 $select= "SELECT doctors.Name , doctors.achievement , doctors.mobile , doctors.email , doctors.pic  ,specialties.Specialty_name 
  FROM doctors JOIN  specialties 
  
  WHERE doctors.Sepc_ID = specialties.Sepc_ID";
			   $query = mysqli_query($con ,$select);
			   while($rows = mysqli_fetch_array($query)){
				   ?>
                   
   <div class=" col-lg-4" >
     <div class="row" style=" background-color:#F2F2F2 ; margin:10px auto ">
       <img src="images/<?PHP echo $rows['pic'];?>" width="200px" height="200px" style="margin-left:20px; margin-top:10px "/>
    <h3 style="text-align:center;background-color:rgba(0,153,204,.4);width:200px;height: auto;border-radius:5px 5px 5px 5px; margin-left:10px">
    <span ><?PHP echo $rows['Specialty_name'];?></span>
    </h3>
         <span style="margin-left:10px">
               <h3  <?PHP echo $rows['Name'];?> </h3> 
                  <p><?PHP echo $rows['achievement'];?> </p>
                 <h5>Contact:</h5>
                
                <label >Mobile : <?PHP echo $rows['mobile'] ?>  </label> <br />
                <label  style="font-size:15px">E-mail : <?PHP echo $rows['email'] ?>  </label> <br />
    </span>


        </div>
    </div>
				   <?PHP
				   } // END second Loop
		?>

</div>
<!-- end of page wrapper -->
<div class="clearing"></div>
</div>
<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------>
</body>
</html>
