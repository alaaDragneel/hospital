   <?PHP 
  // if($_SERVER["REQUEST_METHOD"]=='post') {
    include("../include/connection.php");
	echo " <h2 class='form_title'>Edite specialties</h2> ";
    mysqli_set_charset($con,'UTF8');
   $select_doctors = "SELECT * FROM `specialties`  " ;
   $query = mysqli_query($con,$select_doctors);
   if(mysqli_num_rows($query)>0){
	echo '  <table class="table-hover table">
	      <th class="th"> #</th>
          <th class="th">Specialty Name </th>
           <th class="th">Image</th>
			   <th class="th"> Action</th>
	'; 
	while( $result = mysqli_fetch_array($query)) {  
	
echo "
  <tr> 
    <td class='td'> ".$result['Sepc_ID']."  </td>
	<td class='td'> ".$result['Specialty_name']." </td>
     <td class='td'> <img src='../images/specialties/".$result['img']."' width='250px' height='150px' > </td>
        <td class='td'>
		<form method='post' action='specialties_edit.php?id=".$result['Sepc_ID']."'> 
		 <input type='submit' name='delete' class=' btn btn-primary btn-block button' value='Delte'/>
		 </form>
		 <form method='post' action='index.php?p=specialties_update&id=".$result['Sepc_ID']."' style='margin-top:10px'> 
		<input type='submit' name='udpate' class=' btn btn-info btn-block button' value='Update'/>
		</form>
		</td>
     </tr>
    "; 
	  // Delete Items 
  if(isset($_POST['delete'])){
	  $doc_ID = $_GET['id'];
   @$delete = " DELETE FROM `doctors` WHERE `Doc_ID` = '$doc_ID'";
  @$delte_query = mysqli_query($con,$delete)or die(mysqli_error());
   if($delte_query){
	   	mysqli_close($con);
	   echo 'done';
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
 //}else {
	// header("location:login.php");
	 
	// }
 ?>