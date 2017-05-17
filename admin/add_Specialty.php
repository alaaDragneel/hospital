<?PHP
// if($_SERVER["REQUEST_METHOD"]=='post') {
 include("../include/connection.php"); ?>

        
     <fieldset>
       <legend>
        <h2 class='form_title'> View Specialty</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action='<?PHP echo $_SERVER['PHP_SELF'] ?>' method='post' enctype="multipart/form-data"> 
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Specialty Name</label> </td>
        <td style='padding:20px'> <input type='text' name='specialty_Name' placeholder=' Enter Name' class='input'/></td>
        </tr>               
        
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
        <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default' placeholder='Image'/></td>
        </tr>
        
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='save' class=' btn btn-block btn-primary' value='Save'/> </td>
        </tr>
      </form>
        </table>
      </fieldset>
                  
<?PHP

if(isset($_POST['save'])) {
		@$specialty_Name = filter_var( $_POST['specialty_Name'], FILTER_SANITIZE_STRING);
		@$dir_name 		= dirname(__FILE__) . "/uploded_images/";
		@$path 			= $_FILES['img']['tmp_name']; 
		@$name 			= $_FILES['img']['name']; 
		@$size 			= $_FILES['img']['size']; 
		@$type 			= $_FILES['img']['type'];  
		@$error 	    = $_FILES['img']['error']; 
		
if(empty($specialty_Name) && empty($name)){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
		mysqli_set_charset($con,'UTF8');
		@$insert = " INSERT INTO `specialties`(`Specialty_name`, `img`) VALUES ('".$specialty_Name."','".$name."')";
		@$insert_query = mysqli_query($con ,$insert) or die(mysqli_error());
		if($insert_query){
			mysqli_close($con);
		}
	}
}
 ?>

<?PHP
// }else {
//	 header("location:login.php");
	 
	// }
 ?>