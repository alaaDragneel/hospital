t <?PHP
 //if($_SERVER["REQUEST_METHOD"]=='post') { 
  session_start();
	include("../include/connection.php"); 
	
	@$id = $_GET['id'];
	$_SESSION['id'] = $id ;
	$exp = time()+86400 ; 
	setcookie( 'Ser_id' ,$id ,$exp );
	
	$select = " SELECT * FROM `schedule` WHERE `schedule_ID`= '".$_SESSION['id']."' ";
	mysqli_set_charset($con,'UTF8');
	$_SELECT_Query  =  mysqli_query($con,$select);
	while($_select_result = mysqli_fetch_array($_SELECT_Query)){
	?>	
    <fieldset>
       <legend>
        <h2 class='form_title'> UpDate schedule</h2>
        </legend>  
        <table class='table table-condensed'>
        <form action="Schedule_update.php" method='post' enctype="multipart/form-data"> 
        <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> Day</label> </td>
        <td style='padding:20px'> 
      <input type='text' name='Day' placeholder=' Enter Day' class='input' value="<?PHP echo $_select_result['Day'] ?>"/></td>
        </tr>      
        
     <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> Time</label> </td>
        <td style='padding:20px'> 
     From :<input type='text' name='start'  class='input' value="<?PHP echo $_select_result['start'] ?>" style="width:70px; margin-right:10px"/>
      To : <input type='text' name='end' class='input' value="<?PHP echo $_select_result['end'] ?>" style="width:70px"/>
      </td>
        </tr> 
      
       <tr class='td'>
        <td style='padding:20px'>
        <label class='input_title'> Date</label> </td>
        <td style='padding:20px'> 
      <input type='text' name='Date' placeholder=' Enter Date' class='input' value="<?PHP echo $_select_result['Date'] ?>"/></td>
        </tr> 
        <tr class='td'>
        <td colspan='2'>  <input type='submit' name='update_sch' class=' btn btn-block btn-primary' value='update'/> </td>
        </tr>
      </form>
        </table>
      </fieldset>
	<?PHP	
	}
	?>

        
     
                  
<?PHP

	  // Update Admin Data ... 
	  if(isset($_POST['update_sch'])){
		  
		@$Day     = $_POST['Day'];
		@$start   = $_POST['start'];
		@$end     = $_POST['end'];
		@$Date    = $_POST['Date'];
		
	if(empty($Day) && empty($start) && empty($end) && empty($Date)){ 
	  
	  echo " <script> alert('Some fields are empty Please complete entering the data ')</script>";
	}else{
$update_ = 
"UPDATE `schedule` SET `Day`='".$Day."',`start`='".$start."',`end`='".$end."',`Date`='".$Date."' WHERE `schedule_ID`= '".$_COOKIE['Ser_id']."'";
	
	 
	    $query = mysqli_query($con,$update_) or die(mysqli_error());
		if($query){
	header("location:index.php?p=Schedule_view");
			}else{
			echo 'error';	
			}
	
	      }
	  }
 ?>

 <?PHP
// }else {
	// header("location:login.php");
	 
	// }
 ?>