<?PHP 
session_start();
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
 <style>
  .table_header {
	 
	 background-color:rgba(0,0,102,.9);
	 direction:rtl;
	 width:100%;
	 height:50px
	  
	  }
 .table_title { 
 color:#fff ; 
 font-family:Tahoma, Geneva, sans-serif ;
  font-size:30px ; 
  font-weight:800 ; 
  direction:rtl ;
  padding-right:10px}

</style>

</head>
<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>
<!------ //END  Heeder and NavBar--------->
<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">
      <h1> تسجيل دخول</h1>
    </div>
<!--    <div class="search">
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
    @$type   =  $_GET['type'];
	@$sep_id =  $_GET['sepID'];
	$_SESSION['sepId'] = $sep_id ;
	$exp = time()+86400 ;
	setcookie('sep_id',$sep_id ,$exp);
	
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	if( @$_GET['type'] =='R'){
//-------- sign up form--------//
		echo '
		
		 <div id="regsiter_form">
    <Div id="nots">
    <h1> للحجز</h1>
   <p> قم بإدخال بياناتك الشخصيه وقم بالضغط على <strong>تسجيل</strong> بعد ان تملىء البانات </p>
    </Div>
               <form method="post" action=" '.$_SERVER['PHP_SELF'].' ">
           <table id="register"  class="table-hover" style="margin-left:200px ; padding-bottom:30px">
		           
         <tr>  
          <td class="table_header" colspan="2">  <h1 class="table_title"> تسجيل البيانات الشخصية</h1></td>
        </tr> 
                <tr>
      <td class="info">  <label> إسم المريض : </label></td> 
      <td class="info"> <input type="text" name="name" placeholder="Enter Your Name"  class=" input-group-sm input"/></td>
                </tr>
                
                 <tr>
                  <td class="info">  <label> النوع : </label></td>
                 <td class="info"> 
                  <input type="radio" name="gender" value="m"  style="margin-right:30px"  />
                  <label id="radio_text">  ذكر</label>
                  &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="gender" value="f"  /> 
                   <label id="radio_text">أنثى  </label>
                  </td>
                </tr>
             
              
                   <tr>
                  <td class="info">  <label> رقم المحمول : </label></td>
                  <td class="info">
                  <input type="text" name="mobile" placeholder="Mobile"  class=" input-group-sm input"/>
                  </td>
                </tr>
             
                 <tr>
             <td class="info"><label> البريد الالكترونى: </label> </td>  
             <td class="info"> <input type="email" name="email" placeholder="E-mail"  class=" input-group-sm input"/></td>
                </tr>
              
		 <tr>
             <td class="info"><label> الرقم السرى: </label> </td>  
          <td class="info">
		   <input type="password" name="password" placeholder=" password"  class=" input-group-sm input"/></td>
                </tr>
				
                 <tr>
            <td colspan="2"> <input type="submit" name="save" value="تسجيل" class="btn btn-info btn-block"/></td>
                </tr>
              
              </table>
               </form>
			   
     </div>
		
		';
		
		}else {
///--------- login Form ----------//
			echo '
		
		 <div id="regsiter_form">

               <form method="post" action=" '.$_SERVER['PHP_SELF'].' ">
           <table id="register"  class="table-hover" style="margin-left:200px">
         
         <tr>  
          <td class="table_header" colspan="2">  <h1 class="table_title"> تسجيل الدخول</h1></td>
        </tr>   
          <tr>
             <td class="info"><label> البريد الالكترونى: </label> </td>  
         <td class="info"> <input type="email" name="User_email" placeholder="E-mail"  class=" input-group-sm input"/></td>
                </tr>
	
        <tr>
             <td class="info"><label> الرقم السرى: </label> </td>  
          <td class="info">
		   <input type="password" name="User_password" placeholder="password"  class=" input-group-sm input"/></td>
              </tr>
          <tr>
            <td colspan="2"> <input type="submit" name="login" value="دخول" class="btn btn-info btn-block"/></td>
                </tr>
              
              </table>
               </form>
			   
     </div>
		
		';
			}
			}else
			{
				echo ' <div style="width:250px ; height:80px; padding:30px; margin-bottom:200px" class=" btn-danger center-block"> لا يمكنك الدخول الى هذه الصفحة مباشرة 
 <strong> <a href="specialties.php">الرجوع الى الخلف</a></strong> </div>
     </div>   
    ';
			}
  ?> 

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
// check in the database if the user account is exist LogIn

   
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   if(isset($_POST['login']))
	   {
		    
			@$email    = mysqli_real_escape_string($con,$_POST['User_email']);
			@$password = mysqli_real_escape_string($con,$_POST['User_password']);
			
	$select_statment = "SELECT email , password_ , `patient_ID` FROM patient WHERE email ='".$email."'  AND password_= '".$password."'";
		@$query = mysqli_query($con , $select_statment) or die(mysqli_error());
		if( mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query)){
				
				$user_id     = $row['patient_ID'];
				
				$_SESSION['patient_ID']= $user_id ; 
				}
	
 echo "<script> 
 window.open('booking_specialties.php?&userId=".$_SESSION['patient_ID']." ','_self')
  </script>";
		}
		mysqli_close($con);
		   } // while loop 
	   } 
	   else{
		   echo " <script> alert('user Not found.') </script>";
		   }

   // insert paient's information Sign_UP 
    
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   if(isset($_POST['save']))
	   {
         $con   = mysqli_connect('localhost','root','','hospital')or die(mysqli_error());
		    @$name     = mysqli_real_escape_string($con, $_POST['name']);
			@$gender   = mysqli_real_escape_string($con,$_POST['gender']);
			@$mobile   = mysqli_real_escape_string($con,$_POST['mobile']);
			@$email    = mysqli_real_escape_string($con,$_POST['email']);
			@$password = mysqli_real_escape_string($con,$_POST['password']);
			
	if(empty($name)&& empty($gender) &&empty($mobile)&& empty($email) && empty($password)){
				$error_message = '<div> من فضلك قم بأستكمال إدخال البيانات </div>' ;
				$_SESSION['error'] = $error_message;
				}else  
			
		
		$select_statment = " 
			INSERT INTO `patient`( `p_name`, `mobile`, `gender`, `email` ,`password_`) 
			VALUES ( '".$name."' , '".$mobile."' , '".$gender."' , '".$email."' , '".$password."')
			";
		@$query = mysqli_query($con , $select_statment) or die(mysqli_error());
		if($query == true){
			header('LOCATION:register.php?type=l');
		}
		mysqli_close($con);
		   }
	   }

 ?>