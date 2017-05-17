 <?PHP 
  //if($_SERVER["REQUEST_METHOD"]=='post') {
	include("../include/connection.php"); 
	
	@$id = $_GET['id'];
	$_SESSION['id'] = $id ;
	$exp = time()+86400 ; 
	setcookie( 'id' ,$id ,$exp );
	$select = " SELECT * FROM `specialties` WHERE `Sepc_ID` = '".$_SESSION['id']."' ";
	mysqli_set_charset($con,'UTF8');
	$_SELECT_Query  =  mysqli_query($con,$select);
	while($_select_result = mysqli_fetch_array($_SELECT_Query)){
	?>	
    <fieldset>
       <legend>
        <h2 class='form_title'> UpDate Specialty</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action="specialties_update.php" method='post' enctype="multipart/form-data"> 
        <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> Specialty Name</label> </td>
        <td style='padding:20px'> 
      <input type='text' name='specialty_Namee' placeholder=' Enter Name' class='input' value="<?PHP echo $_select_result['Specialty_name'] ?>"/></td>
        </tr>               
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
        <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default' value="<?PHP echo $_select_result['img'] ?>"/></td>
        </tr>
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='update_specialty' class=' btn btn-block btn-primary' value='update'/> </td>
        </tr>
      </form>
        </table>
      </fieldset>
	<?PHP	
	}
	?>

        
     
                  
<?PHP

	  // Update Admin Data ... 
	  if(isset($_POST['update_specialty'])){
		  
		@$specialty_Name   = $_POST['specialty_Namee'];
		@$dir_name 		   = dirname(__FILE__) . "/uploded_images/";
		@$path 			   = $_FILES['img']['tmp_name']; 
		@$name 			   = $_FILES['img']['name']; 
		@$size 			   = $_FILES['img']['size']; 
		@$type 		       = $_FILES['img']['type'];  
		@$error 	       = $_FILES['img']['error']; 
		
	if(empty($specialty_Namee) && empty($name) ){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
	
		
	
$update = "UPDATE `specialties` SET  `Specialty_name`='".$specialty_Name."' ,`img`='".$name."' WHERE `Sepc_ID` ='".$_COOKIE['id']."' ";
		 
	    $query = mysqli_query($con,$update) or die(mysqli_error());
		if($query){
			header("location:index.php?p=specialties_view");

			}else{
			echo 'error';	
			}
	
	  }
  }
 ?>

 <?PHP
// }else {
//	 header("location:login.php");
	 
//	 }
 ?>