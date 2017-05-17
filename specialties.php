<?PHP session_start();
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
<link href="css/style2.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon"  href="images/Hospital-icon.jpg" /> 

</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->

<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">
      <h1>تخصصات المستشفى</h1>
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
               $select= "SELECT `Sepc_ID`, `Specialty_name`, `img` FROM `specialties` ";
			   $query = mysqli_query($con ,$select);
			   while($rows = mysqli_fetch_array($query)){
				   
				 $sep_id = $rows['Sepc_ID'];  
				 $_SESSION['Sepc_ID'] = $sep_id;  
				 
				   ?>
                   
   <div class=" col-lg-4"  >
      <div class="row" style=" background-color:#F2F2F2 ; margin:10px auto ; height:400px; width:300px; margin-right:10px ; margin-bottom:40px ; padding-bottom:10px">
    <h2 style="text-align:center;background-color:rgba(0,153,204,.7);width:250px;height:35px; margin:10px auto;padding-bottom:5px; color:#fff ">
    <span ><?PHP echo $rows['Specialty_name'];?></span>
    </h2>
     <img src="images/specialties/<?PHP echo $rows['img'];?>" width="250px" height="300px" style="margin-left:20px "/>
    <h4 style="text-align:center;background-color:rgba(0,153,204,.3);width:200px;height:20px; border-radius:10px 10px 10px 10px; margin:10px auto">
    <span  style="margin-left:0"> 
    <button class='btn btn-primary book' id="book_button" ><a href="#" id="book"> حجز موعد</a></button>
    </span>
    </h4>
    </div>
	      </div>
            <?PHP
		 } // END second Loop
		?>			  
        <div id="confirmationBox">
     
      <div style="right:0; top:0px; background-color:#0CC; position:absolute"> 
      <a href="#" id="close"><img src="images/close_icon.PNG" style="width:30px ; height:30px" /></a>
      </div>
         <h4 id="Message_title"> سجل دخول لتتمكن من حجز موعد</h4>  
           <table id="form_table">
              <tr> 
                <td> 
   		<?PHP 
			   mysqli_set_charset($con ,'UTF8');
               $selectt= "SELECT `Sepc_ID`, `Specialty_name`, `img` FROM `specialties` ";
			   $querys = mysqli_query($con,$selectt);
			   while($rows2 = mysqli_fetch_array($querys)){
				 $sep_id = $rows2['Sepc_ID'];  
				 $_SESSION['Spec_ID'] = $sep_id; 
				 } ?> 
          <form method="post" action="register.php?type=l">
                <input type="submit"  value="تسجيل الدخول"  class="btn btn-primary form_btn " id="login" />
                     </form>
        </td>
            <td>
        <form method="post" action="register.php?type=R">
           <input type="submit" name="no_re"  value="التسجيل فى  الموقع"  class="btn btn-primary form_btn" id="regstir" />
        </form>
	
        </td>
           </tr>
        </table>
        </div>
</div>
<div class="clearing"></div>
</div>
<!--// advertisment // --->
       <aside style="position:absolute; position: ; right:20px;; top:460px">
            <a href="www.pepsi.com" title="Pepsi">  <img src="images/advertisment/adv4.jpg" width="190px" height="800px" alt="Pepsi"  /> </a>
            </aside>
                  <aside style="position:absolute; position: ; left:15px;; top:460px">
             <img src="images/advertisment/adv5.png" width="230px" height="820px"  /> 
            </aside>
        <!--// END advertisment // --->

<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------>
<script src="js/jquery.js"> </script> <!-- Jquery libary-->
<!-- Jquery confermation message fomr >>-->
<script> 
$(document).ready(function(e) {
     $(".book").click(function(){
		$("#confirmationBox").show(); 
		 
		 })
		 
		  $("#close").click(function(){
		$("#confirmationBox").hide(); 
		 
		 })
});


</script> 
</body>
</html>
