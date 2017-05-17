<?PHP 
//if($_SERVER["REQUEST_METHOD"]=='post') {
include("../include/connection.php"); ?>

     <fieldset>
         <legend>
         <h2 class='form_title'> Add New services</h2>
             </legend>  
       <table class='table table-condensed'>
 <form action="add_services.php" method='post' enctype="multipart/form-data"> 
  <tr class='td'>
    <td style='padding:20px'><label class='input_title'> Service Name</label> </td>
    <td style='padding:20px'> <input type='text' name='Service_Name' placeholder=' Enter Name' class='input'/></td>
   </tr>               
    <tr class='td'>
    <td style='padding:20px'><label class='input_title'>  Description</label> </td>
    <td style='padding:20px'> 
	<textarea name='Description' placeholder=' Enter  Description' class='input' style='max-width:400px;height:100px'></textarea>
	</td>
   </tr> 
     <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
         <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default' placeholder='Image'/></td>
     </tr>
     
     <tr class='td'>
       <td colspan='2'>  <input type='submit' name='save_Service' class=' btn btn-block btn-primary' value='Save'/> </td>
     </tr>
     </form>
     </table>
     </fieldset>

<?PHP

if(isset($_POST['save_Service'])) {
		@$Service_Name  = filter_var( $_POST['Service_Name'], FILTER_SANITIZE_STRING);
		@$Description   = filter_var( $_POST['Description'], FILTER_SANITIZE_STRING);
		@$dir_name 		= dirname(__FILE__) . "/uploded_images/";
		@$path 			= $_FILES['img']['tmp_name']; 
		@$name 			= $_FILES['img']['name']; 
		@$size 			= $_FILES['img']['size']; 
		@$type 			= $_FILES['img']['type'];  
		@$error 	    = $_FILES['img']['error']; 
		
	 		
if(empty($Service_Name) && empty($Description) && empty($name)){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
		mysqli_set_charset($con,'UTF8');
		@$insert = "INSERT INTO `services`(`Title`, `description`, `pic`) VALUES ('".$Service_Name."','".$Description."','".$name."')";
		@$insert_query = mysqli_query($con ,$insert) or die(mysqli_error());
		if($insert_query){
		header("location:index.php?p=add_services");
		}
	}
}
 ?>
 
 <?PHP
// }else {
	// header("location:login.php");
	 
	// }
 ?>