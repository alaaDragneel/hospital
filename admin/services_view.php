
    <h2 class='form_title'>Edite services</h2> 
   <?PHP 
  // if($_SERVER["REQUEST_METHOD"]=='post') {
    include("../include/connection.php");
    mysqli_set_charset($con,'UTF8');
   $select_doctors = "SELECT * FROM `services`  " ;
   $query = mysqli_query($con,$select_doctors);
   if(mysqli_num_rows($query)>0){
	echo '  <table class="table-hover table">
	      <th class="th"> #</th>
          <th class="th">service Name </th> 
		  <th class="th">Description </th>
           <th class="th">Image</th>
			   <th class="th"> Action</th>
	'; 
	while( $result = mysqli_fetch_array($query)) {  
	
echo "
  <tr> 
    <td class='td'> ".$result['serv_ID']."  </td>
	<td class='td'> ".$result['Title']." </td>
	<td class='td'> ".$result['description']." </td>
     <td class='td'> <img src='../images/servecis/".$result['pic']."' width='250px' height='150px' > </td>
        <td class='td'>
		<form method='post' action='index.php?p=services_update&id=".$result['serv_ID']."'> 
		 <input type='submit' name='delete_service' class=' btn btn-primary btn-block button' value='Delte'/>
		<input type='submit' name='udpate' class=' btn btn-info btn-block button' value='Update'/>
		</form>
		</td>
     </tr>
    "; 
	// Delete Items 
  if(isset($_POST['delete_service'])){
	  $_ID = $_GET['id'];
   @$delete = " DELETE FROM `services` WHERE  `serv_ID`= $_ID";
  @$delte_query = mysqli_query($con,$delete)or die(mysqli_error());
   if($delte_query){
	echo 'done'; // header('location:index.php?p=services_edit');
	  
	   } else {
		echo 'error  ';   
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
	 
	// }
 ?>