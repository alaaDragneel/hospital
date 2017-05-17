<?PHP 
//if($_SERVER["REQUEST_METHOD"]=='post') {
include("../include/connection.php"); ?>
          <fieldset>
         <legend>
         <h2 class='form_title'> Add New schedule</h2>
             </legend>  
       <table class='table table-condensed'>
 <form action="add_schedule.php" method='post' enctype="multipart/form-data"> 
	 <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Day</label></td>
         <td style='padding:20px'> 
		 <select name='day' style='color:#000; padding-left:120px' class='input Select'>
         
		  <option > -- Day --</optgroup>
           <option value="الجمعة"> الجمعة</optgroup>
            <option value="السبت">السبت</optgroup>
             <option value="الاحد"> الاحد</optgroup>
              <option value="الاثنين"> الاثنين</optgroup>
               <option value="الثلاثاء"> الثلاثاء</optgroup>
                <option value="الاربعاء"> الاربعاء</optgroup>
                <option value="الخميس"> الخميس</optgroup>
		 </select>
		 
		 </td>
     </tr>
	 	 <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Specialty</label></td>
         <td style='padding:20px'> 
		 <select name='Specialty' style='color:#000; padding-left:100px' class='input Select'>
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
        <td style='padding:20px'><label class='input_title'> Doctor</label></td>
         <td style='padding:20px'> 
		 <select name='doctor_name' style='color:#000; padding-left:120px' class='input Select'>
		  <option> -- Doctor --</optgroup>
                   <?PHP 
		 	 mysqli_set_charset($con ,'UTF8');
		 $select_Doctors = "SELECT `Doc_ID`, `Name` FROM `doctors`  ";
		 $query_Doctors  = mysqli_query($con,$select_Doctors);
		 while($Doctors_result = mysqli_fetch_array($query_Doctors)){
			 echo " <option value='".$Doctors_result['Doc_ID']."'> ".$Doctors_result['Name']."</optgroup>";
			 }
		 ?>
		 
		 </select>
		 
		 </td>
     </tr>
    
	 <tr class='td'>
        <td style='padding:20px'><label class='input_title'> Time</label></td>
         <td style='padding:20px'> 
	 <label style="color:#000">From</label><input type='text' name='From' placeholder=' From' class='input' style='width:110px; margin-right:20px'/>
	<label style="color:#000">To</label><input type="text" name='To' placeholder=' To' class='input' style='width:110px'/>
		 </select>
		 
		 </td>
     </tr>
	 
	     <tr class='td'>
       <td colspan='2'>  <input type='submit' name='save_schedule' class=' btn btn-block btn-primary' value='Save'/> </td>
     </tr>
     </form>
     </table>
     </fieldset>
                  
 <?PHP
 if(isset($_POST['save_schedule'])){
   $date        = date('d/m/y');
   @$Day        = filter_var( $_POST['day'], FILTER_SANITIZE_STRING);
   @$Specialty  = filter_var( $_POST['Specialty'], FILTER_SANITIZE_STRING);
   @$Doctor     = filter_var( $_POST['doctor_name'], FILTER_SANITIZE_STRING);
   @$from       = $_POST['From'];
   @$to         = $_POST['To'];
   
 if(empty($date) && empty($Day) && empty($Specialty) && empty($Doctor) && empty($from) && empty($to)){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
 mysqli_set_charset($con,'UTF8');
 @$insert_schedule = "INSERT INTO `schedule` (`Day`, `start`, `end`, `Date`, `Doc_ID`, `Sepc_ID`) VALUES 
 ('".$Day."','".$from."','".$to."','".$date."' ,'".$Doctor."' ,'".$Specialty."')";

   @$query_schedule = mysqli_query($con,$insert_schedule) or(die(mysqli_error()));
 }
 
 if( $query_schedule == true) {
	 	mysqli_close($con);
	 header("location:index.php?p=add_schedule");
 
    }
 }
  ?>

<?PHP
// }else {
	// header("location:login.php");
	 
	// }
 ?>