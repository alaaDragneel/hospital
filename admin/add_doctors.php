<?PHP 
//if($_SERVER["REQUEST_METHOD"]=='post') {
include("../include/connection.php"); ?>

          <fieldset>
         <legend>
         <h2 class='form_title'> Add New Doctor</h2>
             </legend>  
       <table class='table table-condensed'>
 <form action="add_doctors.php" method='post' enctype="multipart/form-data"> 
  <tr class='td'>
    <td style='padding:20px'><label class='input_title'> Doctor Name</label> </td>
    <td style='padding:20px'> <input type='text' name='doctor_Name' placeholder=' Enter Name' class='input'/></td>
   </tr>  
   
       <tr class='td'>
    <td style='padding:20px'><label class='input_title'> Achievements</label> </td>
    <td style='padding:20px'> 
	<textarea name='Achievements' placeholder=' Enter Achievements' class='input' style='max-width:400px;height:100px'></textarea>
	</td>
   </tr>
   
     <tr class='td'>
    <td style='padding:20px'><label class='input_title'> Mobile</label> </td>
    <td style='padding:20px'> <input type='text' name='mobile' placeholder=' Enter Phone Number' class='input'/></td>
   </tr>     
   
        <tr class='td'>
    <td style='padding:20px'><label class='input_title'> E-mail</label> </td>
    <td style='padding:20px'> <input type='email' name='email' placeholder=' Enter E-mail' class='input'/></td>
   </tr>           
     
     <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Image</label></td>
         <td style='padding:20px'> <input type='file' name='img' class=' btn btn-default' placeholder='Image'/></td>
     </tr>
	 
	 <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Specialty</label></td>
         <td style='padding:20px'> 
		 <select name='Specialty'  style='color:#000; padding-left:100px'' class='input Select'>
		        <option> -- Specialty --</optgroup>
         <?PHP 
		 	 mysqli_set_charset($con ,'UTF8');
		 $select_specialties = "SELECT `Sepc_ID` ,`Specialty_name` FROM `specialties`";
		 $query_specialties= mysqli_query($con,$select_specialties);
		 while($specialties_result=mysqli_fetch_array($query_specialties)){
			 echo " <option value='".$specialties_result['Sepc_ID']."'> ".$specialties_result['Specialty_name']."</optgroup>";
			 }
		 ?>
		 
		 </select>
		 
		 </td>
     </tr>
     
     <tr class='td'>
       <td colspan='2'>  <input type='submit' name='save_Doctor' class=' btn btn-block btn-primary' value='Save'/> </td>
     </tr>
     </form>
     </table>
     </fieldset>
<?PHP

if(isset($_POST['save_Doctor'])) {
		@$doctor_Name   = filter_var( $_POST['doctor_Name'], FILTER_SANITIZE_STRING);
		@$Achievements  = filter_var( $_POST['Achievements'], FILTER_SANITIZE_STRING);
		@$mobile        = filter_var( $_POST['mobile'], FILTER_SANITIZE_STRING);
		@$email         = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
		@$Specialty     = filter_var( $_POST['Specialty'], FILTER_SANITIZE_STRING);
		@$dir_name 		= dirname(__FILE__) . "/uploded_images/";
		@$path 			= $_FILES['img']['tmp_name']; 
		@$name 			= $_FILES['img']['name']; 
		@$size 			= $_FILES['img']['size']; 
		@$type 			= $_FILES['img']['type'];  
		@$error 	    = $_FILES['img']['error']; 
		
	if(empty($doctor_Name) && empty($Achievements) && empty($mobile) && empty($email) && empty($Specialty)  && empty($name)){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
	    if (!$error && is_uploaded_file($path) && in_array($type, array('image/png', 'image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg',          'image/x-png', 'image/png')) && $size < 200000) {
	 
		move_uploaded_file($path, $dir_name . $name);
		} else {
		echo 'error in upload file ' . $error;
		}
		mysqli_set_charset($con,'UTF8');
		
 
		@$_insert_doctors = "INSERT INTO `doctors`(`Name`, `achievement`, `mobile`, `email`, `pic`, `Sepc_ID`) VALUES
		 ('".$doctor_Name."','".$Achievements."','".$mobile."','".$email."','".$name."' ,'".$Specialty."')";
		@$insert_query = mysqli_query($con ,$_insert_doctors) or die(mysqli_error());
		if($insert_query){
			mysqli_close($con);
		header("location:index.php?p=add_doctors");
		}

     }
}
 ?>
 
 <?PHP
 ///}else {
	// header("location:login.php");
  
//	 }
 ?>