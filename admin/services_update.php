 <?PHP 
 
  session_start();
 // if($_SERVER["REQUEST_METHOD"]=='post') {
	include("../include/connection.php"); 
	
	@$id = $_GET['id'];
	$_SESSION['id'] = $id ;
	$exp = time()+86400 ; 
	setcookie( 'Ser_id' ,$id ,$exp );
	
	$select = " SELECT * FROM `services` WHERE `serv_ID` = '".$_SESSION['id']."' ";
	mysqli_set_charset($con,'UTF8');
	$_SELECT_Query  =  mysqli_query($con,$select);
	while($_select_result = mysqli_fetch_array($_SELECT_Query)){
	?>	
    <fieldset>
       <legend>
        <h2 class='form_title'> UpDate services</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action="services_update.php" method='post' enctype="multipart/form-data"> 
        <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> service Name</label> </td>
        <td style='padding:20px'> 
      <input type='text' name='service_Name' placeholder=' Enter Title' class='input' value="<?PHP echo $_select_result['Title'] ?>"/></td>
        </tr>      
        
      <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> description</label> </td>
        <td style='padding:20px'> 
      <textarea name='description' placeholder='description' class='input' ><?PHP echo $_select_result['description'] ?></textarea>
      
        <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
        <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default' value="<?PHP echo $_select_result['img'] ?>"/></td>
        </tr>
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='update_doc' class=' btn btn-block btn-primary' value='update'/> </td>
        </tr>
      </form>
        </table>
      </fieldset>
	<?PHP	
	}
	?>

        
     
                  
<?PHP

	  // Update Admin Data ... 
	  if(isset($_POST['update_doc'])){
		  
		@$service_Name     = $_POST['service_Name'];
		@$description      = $_POST['description'];
		@$dir_name 	       = dirname(__FILE__) . "/uploded_images/";
		@$path 			   = $_FILES['img']['tmp_name']; 
		@$name 		       = $_FILES['img']['name']; 
		@$size 		       = $_FILES['img']['size']; 
		@$type 		       = $_FILES['img']['type'];  
		@$error 	       = $_FILES['img']['error']; 
	if(empty($service_Name) && empty($description) && empty($name)){ 
	
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{	
	 
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
$update_ = 
"UPDATE `services` SET `Title`='$service_Name',`description`='$description',`pic`= '$name' WHERE `serv_ID`= '".$_COOKIE['Ser_id']."'";
	
	 
	    $query = mysqli_query($con,$update_) or die(mysqli_error());
		if($query){
	header("location:index.php?p=services_view");
			}else{
			echo 'error';	
			}
	
	  }
	}
 ?>

 <?PHP
// }else {
//	 header("location:login.php");
	 
	// }
 ?>