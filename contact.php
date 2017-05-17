
<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->

    <div class="logo-sarch-wrap">
    <div class="logo-search-container">
    <div class="logo">
      <h1>أتصل بنا</h1>
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
    
    
     <!--....... Content ........ -->
        <div class="contact-form col-xs-12 col-lg-8" style="margin-left:100px; margin-top:20px">
    <form class="col-lg-12 formValidation" action="contact.php" method="post">
         <input class="col-md-7 in inputValidation form-control" name="username" placeholder="Name" type="text" style="margin-bottom:20px"> 
            <input class="col-md-7 in inputValidation form-control" name="email" placeholder="Email" type="email" style="margin-bottom:20px"> 
     <textarea class="col-xs-11 in inputValidation form-control" name="message" placeholder="Message" rows="5" style="margin-bottom:20px"></textarea>
<input type="submit" value="send" name="send" class="btn col-xs-7 btn-primary btn-block" style="background-color:#337ab7; color: #fff; margin-bottom:40px" />
                    </form>
                </div>
      </div>
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
      <?PHP 
   // ادخال الاستفسارات والشكاوى form
   
     if(isset($_POST['send'])){
		 include("include/connection.php");
	        $name    =  mysqli_real_escape_string($con,$_POST['username']) ;
	        $Email   =   mysqli_real_escape_string($con,$_POST['email']) ;
	        $Message =  mysqli_real_escape_string($con,$_POST['message']) ;

	           
	           mysqli_query($con, ' SET eco-news UTF8');
	if(empty($name) && empty($Email) && empty($Message) ){
		  echo " الرجاء استكمال الادخال ";
		  exit();
	  }
	  
   else {
	     $query = " 
           INSERT INTO `contact_us`( `Name`, `email`, `message`) 
			 VALUES
			  ('".$name."', '".$Email."', '".$Message."') ";
			 
			 mysqli_query($con, $query) or die( mysqli_error('error'));
			 mysqli_query($con, ' SET eco-news UTF8');
		 	 echo " <script> window.alert('تم ارسال الرسالة سوف يتم الرد فى اسرع وقت ..شكرا')</script> "; 
		     mysqli_close($con);
   exit();
     }
  } 
   ?>