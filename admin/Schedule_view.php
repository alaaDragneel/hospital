
   <h2 class='form_title'>View Schedule</h2> 
   <?PHP 
  // if($_SERVER["REQUEST_METHOD"]=='post') {
    include("../include/connection.php");
    mysqli_set_charset($con,'UTF8');
$select_doctors = 
"SELECT *FROM `schedule` JOIN `doctors` JOIN `specialties` WHERE `doctors`.Doc_ID =`schedule`.Doc_ID and specialties.Sepc_ID =`schedule`.Sepc_ID" ;
   $query = mysqli_query($con,$select_doctors);
   if(mysqli_num_rows($query)>0){
	echo '  <table class="table-hover table">
	      <th class="th"> #</th>
		  <th class="th">Date </th>
          <th class="th">Day </th> 
		  <th class="th">Specialty  </th>
           <th class="th">Doctor</th>
		   <th class="th">Time</th>
			   <th class="th"> Action</th>
	'; 
	while( $result = mysqli_fetch_array($query)) {  
	
echo "
  <tr>
  <td class='td'> ".$result['schedule_ID']."  </td> 
    <td class='td'> ".$result['Date']."  </td>
	<td class='td'> ".$result['Day']." </td>
	<td class='td'> ".$result['Specialty_name']." </td>
	<td class='td'> ".$result['Name']." </td>
	<td class='td'>   From : ".$result['start']." &nbsp; &nbsp; &nbsp;  to : ".$result['end']."</td>
        <td class='td'>
		<form method='post' action='Schedule_edit.php?id=".$result['schedule_ID']."' style='margin-bottom:5px'> 
		 <input type='submit' name='delete_schedule' class=' btn btn-primary btn-block button' value='Delte'/>
		 </form>
	<form method='post' action='index.php?p=Schedule_update&id=".$result['schedule_ID']."'> 	 
		<input type='submit' name='udpate' class=' btn btn-info btn-block button' value='Update'/>
		</form>
		</td>
     </tr>
    "; 
  if(isset($_POST['delete_schedule'])){
	  $_ID = $_GET['id'];
   @$delete = " DELETE FROM `schedule` WHERE `schedule_ID`= $_ID";
  @$delte_query = mysqli_query($con,$delete)or die(mysqli_error());
   if($delte_query){
	   	mysqli_close($con);
	  header('location:index.php?p=Schedule_edit');
	  
	   } else {
		echo 'error asdas d';   
	   }
  }

 }
  echo "
  </table>"; 
   }
 ?>     
 <?PHP
// }else {
//	 header("location:login.php");
	 
	// }
 ?>