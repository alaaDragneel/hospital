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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/flexslider.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon"  href="images/Hospital-icon.jpg" /> 

</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->

<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">    
      <h1>الخدمات التى تقدمها المستشفى</h1>
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
		
			//   $con = mysqli_connect('localhost','root' , '', 'hospital');
			   mysqli_set_charset($con,'UTF8');
 $select= " SELECT * FROM `services`";
			   $query = mysqli_query($con ,$select);
			   while($rows = mysqli_fetch_array($query)){
				   
				   ?>
                   
   <div class=" col-lg-12 animated" style="margin-bottom:30px ; box-shadow:inset #090; height:auto" data-animate-effect="fadeIn">
     <div class="row" style="  background-color:rgba(0,204,255,.4)">
     <h1 id="title"> <?PHP echo $rows['Title'] 	?> </h1>
       <img src="images/servecis/<?PHP echo $rows['pic']?>" width="100%" height="350px"/>
    <h3 style="text-align:center;background-color:rgba(0,153,204,.4);width:200px;height: auto;border-radius:5px 5px 5px 5px; margin-left:10px">
    
    </h3>
         <span>
         <p id="article"><?PHP echo $rows['description'];?></p>
         
    </span>
        </div>
    </div>
				<?PHP } // END second Loop?>
       
</div>
<!-- end of page wrapper -->
<div class="clearing"></div>
</div>
<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------>
</body>
</html>
