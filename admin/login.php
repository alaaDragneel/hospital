<?PHP
//connection
include("../include/connection.php");
session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>controal Panel</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald|Pontano+Sans' rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon"  href="../images/Hospital-icon.jpg" /> 
<link rel="stylesheet" href="css/style.css" /> 

</head>
<body id="body"> 
<div  style="  height:100%; width:100%; ; padding-top:10px; padding-bottom:220px; margin-bottom:0">
  <header>
    <h2 id="title"> Admin panel</h2>  
  <span style="margin-left:40px; margin-top:10px; margin-bottom:10px">
  <img src="img/logo.png" width="200px" height="150px"   />	
  </span> 
  </header>
    <form  action="login.php" method="post"> 
      <table class=" " id="table"> 
  
         <tr>  
             <td style="padding-left:120px"> 
             <input type="text" name="username" placeholder="Enter UserName " class="btn btn-block botton inp" /> 
             </td>
              </tr>
             <tr>
                <td style="padding-left:120px">  
               <input type="password" name="password" placeholder="Enter Password " class="btn btn-block botton inp" />  
             </td>
              </tr>
            <tr> 
                <td style="padding-left:"> 
               <input type="submit" name="Login"  class="btn btn-info bbtn "	  value="Login"/>  
             </td>
             </tr>
           </table>
          </form>
 </div>   
<!-- end of page wrapper -->

<!--- Footer------>
<?PHP include("../include/template/footer.php");?>

<!---//END  Footer------>
</body>
</html>

<?PHP

  // signin form 
   if(isset($_POST['Login'])){
		 @$username = mysqli_real_escape_string($con, $_POST['username']);
		 @$password = mysqli_real_escape_string($con, $_POST['password']);  
		
		if(empty($username) && empty($password)) {
			echo "<script> alert('please Insert valid Username And Password')</script>";
			
		}else {
		@$select_admin = " SELECT * FROM `admin` WHERE `email`='".$username."' AND `password`='".$password."'"; 
		@$query = mysqli_query($con,$select_admin);
		
		if(mysqli_num_rows($query)>0){
		   while( $result = mysqli_fetch_array($query)){
			       $Admin_id              = $result['Admin_ID'];
			       $Admin_name            = $result['Name'];
		           $_SESSION['Admin_ID']  = $Admin_id;
		           $_SESSION['Name']      = $Admin_name;
			     } // while loop #END 

	 header("location:index.php?p=add_Specialty");	
		}// if num rows #END
		

		else{
			echo " <script> alert('User NOt Found') </script>";
			
		}// Else #END
		 
	 }// if isset #END

   } // validation If #END

 ?>   