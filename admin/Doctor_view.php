
    <h2 class='form_title'>View Dotors</h2> 
   <?PHP
   // if($_SERVER["REQUEST_METHOD"]=='post') { 
    include("../include/connection.php");
    mysqli_set_charset($con,'UTF8');
   $select_doctors = "SELECT * FROM `doctors` JOIN `specialties` where specialties.Sepc_ID = doctors.Sepc_ID" ;
   $query = mysqli_query($con,$select_doctors);
   if(mysqli_num_rows($query)>0){
	   
	echo '  <table class="table-hover table">
	      <th class="th"> #</th>
          <th class="th">Name </th>
           <th class="th"> achievement</th>
            <th class="th"> mobile</th>
             <th class="th">email </th>
               <th class="th"> Specialty Name</th>
			   <th class="th"> Action</th>

	'; 
	while( $result = mysqli_fetch_array($query)) {  
	
echo "
  <tr> 
        
    <td class='td'> ".$result['Doc_ID']."  </td>
	<td class='td'> ".$result['Name']." </td>
     <td class='td'> ".$result['achievement']." </td>
      <td class='td'> ".$result['mobile'] ."</td>
       <td class='td'> ".$result['email']." </td>
        <td class='td'> ".$result['Specialty_name']." </td>
        <td class='td'>
		<form method='post' action='Doctor_edit.php?id=".$result['Doc_ID']."' style='margin-bottom:10px'> 
		 <input type='submit' name='delete_Doctor' class=' btn btn-primary btn-block button' value='Delte'/>
		 </form>
		 <form method='post' action='index.php?p=Doctor_update&id=".$result['Doc_ID']."'> 
		<input type='submit' name='udpate' class=' btn btn-info btn-block button' value='Update'/> 
		</form>
		</td>
     </tr>
    
    "; 

	  // Delete Items 
  if(isset($_POST['delete_Doctor'])){
   @$_ID = $_GET['id'];
   @$_delete = " DELETE FROM `doctors` WHERE `Doc_ID`= $_ID";
   @$delte_query = mysqli_query($con,$_delete)or die(mysqli_error());
   if($delte_query){
	   	mysqli_close($con);
	  header('location:index.php?p=Doctor_edit');
	  
	   } else {
		echo 'error';   
	   }
  }

 }
  echo "
 
 
  </table>"; 
   }
 ?>     

<?PHP
// }else {
	// header("location:login.php");
	 
//	 }
 ?>

