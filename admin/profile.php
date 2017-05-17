<?PHP
 //if($_SERVER["REQUEST_METHOD"]=='post') {
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
  <a href="#" class="navLink">Profile</a>  
  <a href="index.php" class="navLink">control panel</a> 
   <a href="messages.php" class="navLink">Inbox</a> 
     <a href="logout.php" class="navLink">logOut</a>  </span>
    <div class="logo">    
    </div>
  </div>
</div>
<!-- end of header wrapper -->
<!-- end of header wrapper -->
<div class="clearing"></div>

  <div id="contenar">
    
    <!-----------  ------------->
          <div id="containt"> 
            
             <section id="" style="width:500px; margin-left:-20px; margin-top:0; margin-bottom:0 ; height:500px"> 
       
   <?PHP 
    include("../include/connection.php");
	
    mysqli_set_charset($con,'UTF8');
   $select_doctors = "SELECT * FROM `admin` where Admin_ID = 1	" ;
   $query = mysqli_query($con,$select_doctors);
   if(mysqli_num_rows($query)>0){
	echo '  <table class="table-hover table" style="height:520px">
	'; 
	while( $result = mysqli_fetch_array($query)) { 
	
	$admin_name =  $result['Name'];
	$email      =  $result['email']; 
	$pass       =  $result['password'];
	$img        =  $result['pic'];
	
	$_SESSION['Name']      = $admin_name;
	$_SESSION['email']     = $email;
	$_SESSION['password']  = $pass;
	$_SESSION['pic']       = $img;
	
echo "

  <tr >
  <td > <img src='../images/".$result['pic']."' height='320px' width='25%' style='border-radius:50% ; position:absolute ; margin-left:20px' /> </td>
  <tr>
  <tr> 
	<td class='th'> ".$result['Name']." </td>
	</tr>
	
	<tr>
	<td class='th'> ".$result['email']." </td>
	</tr>

		</form>
		</td>
     </tr>
    "; 
	  // Delete Items 
  if(isset($_POST['delete'])){
	  $doc_ID = $_GET['id'];
   @$delete = " ";
  @$delte_query = mysqli_query($con,$delete)or die(mysqli_error());
   if($delte_query){
	   echo 'done';
	   } else {
		echo 'error  ';   
	   }
  }

 }
  echo "
  </table>"; 
   }
 ?>    
            </section>
            
            
            <section style="float:left; position:absolute; right:100px; bottom:70px; margin-top:15px" id="update_admin_form">
                 <fieldset style="margin-top:10px">
       <legend>
        <h2 class='form_title'> Edite Profile</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action="profile.php" method='post' enctype="multipart/form-data"> 
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Name</label> </td>
        <td style='padding:20px'> <input type='text' name='admin_name'   class='input' value="<?PHP echo $_SESSION['Name']; ?>"/></td>
        </tr>  
        
      <tr class='td'>
        <td style='padding:20px'><label class='input_title'> E-mail</label> </td>
        <td style='padding:20px'> <input type='email' name='email'   class='input' value="<?PHP echo $_SESSION['email']; ?>"/></td>
        </tr>   
        
       <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Password</label> </td>
        <td style='padding:20px'> <input type='password' name='pass'   class='input' value="<?PHP echo $_SESSION['password']; ?>"/></td>
        </tr>           
        
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
        <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default'  value="<?PHP echo $_SESSION['pic']; ?>"/></td>
        </tr>
        
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='Update' class=' btn btn-block btn-primary' value='Update'/> </td>
         <td colspan='2'>  
          <a href="#" id="clcik" class=' btn btn-block  btn-success'> Add New Admin</a></td>
        </tr>
      </form>
        </table>
      </fieldset>
      
      <?PHP
	  
	  // Update Admin Data ... 
	  if(isset($_POST['Update'])){
		  
		@$_Admin_name   = $_POST['admin_name'];
		@$_Admin_email  = $_POST['email'];
		@$_Admin_pass   = $_POST['pass'];
		@$dir_name 		= dirname(__FILE__) . "/uploded_images/";
		@$path 			= $_FILES['img']['tmp_name']; 
		@$name 			= $_FILES['img']['name']; 
		@$size 			= $_FILES['img']['size']; 
		@$type 			= $_FILES['img']['type'];  
		@$error 	    = $_FILES['img']['error']; 
		
	 
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
		
$update = "UPDATE `admin` SET `Name`='".$_Admin_name."',`email`='".$_Admin_email."',`password`='".$_Admin_pass."',`pic`='".$name."' where Admin_ID=1";
		
	    mysqli_query($con,$update) or die(mysqli_error());
	
	  }
	  
	  
	  
	   ?>
            </section>

   <section style="float:left; position:absolute; right:100px; bottom:70px ;display:none " id="add_admin_form">
                 <fieldset>
       <legend>
        <h2 class='form_title'> Add New Admin</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action="profile.php" method='post'> 
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Name</label> </td>
        <td style='padding:20px'> <input type='text' name='admin_name'   class='input' placeholder="Enter Name"/></td>
        </tr>  
        
      <tr class='td'>
        <td style='padding:20px'><label class='input_title'> E-mail</label> </td>
        <td style='padding:20px'> <input type='email' name='email'   class='input' placeholder="Enter E-mail"/></td>
        </tr>   
        
       <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Password</label> </td>
        <td style='padding:20px'> <input type='text' name='pass'   class='input' placeholder="Password"/></td>
        </tr>           
        
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
        <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default'  /></td>
        </tr>
        
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='ADD' class=' btn btn-block btn-success' value='Add'/> </td>
        </tr>
      </form>
        </table>
      </fieldset>

      <?PHP
	  
	  // Update Admin Data ... 
	  if(isset($_POST['ADD'])){
		  
		@$Admin_name   = $_POST['admin_name'];
		@$Admin_email  = $_POST['email'];
		@$Admin_pass   = $_POST['pass'];
		@$dir_name 		= dirname(__FILE__) . "/uploded_images/";
		@$path 			= $_FILES['img']['tmp_name']; 
		@$name_ 		= $_FILES['img']['name']; 
		@$size 			= $_FILES['img']['size']; 
		@$type 			= $_FILES['img']['type'];  
		@$error 	    = $_FILES['img']['error']; 
		
	 
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
		
$insert = "INSERT INTO `admin`(`Name`, `email`, `password`, `pic`) VALUES ('".$Admin_name."','".$Admin_email."' ,'".$Admin_pass."','".$name_."')";
		
	    mysqli_query($con,$insert) or die(mysqli_error());
	
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

<!------//  Jquery Script   //------>
<script src="../js/jquery.js"></script>
<script>
  $(document).ready(function(e) {
    $("#clcik").click(function(){
		
		$("#update_admin_form").hide(3000);
		$("#add_admin_form").show(3000);
		
		})
});

   </script>
<!------// //END JQ Script   //------>
</body>
</html>
 <?PHP
// }else {
//	 header("location:login.php");
	 
	// }
 ?>