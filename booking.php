<?PHP
//connection
include("include/connection.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مستشفى الامل</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald|Pontano+Sans' rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css"  />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon"  href="images/Hospital-icon.jpg" /> 

</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->
<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">
      <h1> أيصال الحجز</h1>
    </div>
<!-- <div class="search">
      <div class="search-input">
        <input type="text" class="search-text-field" value="Search Here ..." />
      </div>
      <div class="search-button"><a href="#">
      <img src="images/search2.png" alt="search" width="46" height="40" style="border-radius:10%; "/>
      </a></div>
    </div> -->
  </div>
</div>
<!-- end of header wrapper -->
<!-- end of header wrapper -->
<div class="clearing"></div>
<div class="page-wrapper">

  
  <div class="portfolio">
  <Div id="nots">
   <h2> ملحوظة</h2>
   <p> قم بالتأكيد على الحجز حتى يتم اعتماد حجزك</p>
    </Div>
       <div id="content" style="margin-left:190px;  width:auto"> 
       <?PHP 
	  @$sch_id = $_GET['sch_id']; 
	  @$User_id = $_GET['userId'];     
			 mysqli_set_charset($con , 'UTF8');
			 $select_join = "
SELECT * FROM _schedule JOIN doctors JOIN doctors_schedule JOIN specialties JOIN schedule_specialties JOIN patient WHERE _schedule.schedule_ID =doctors_schedule.schedule_ID AND doctors.Doc_ID = doctors_schedule.doc_ID AND doctors.Doc_ID = doctors.Doc_ID AND schedule_specialties.schedule_ID = _schedule.schedule_ID AND schedule_specialties.Sepc_ID = specialties.Sepc_ID AND _schedule.schedule_ID = '".$sch_id."' AND patient.patient_ID = '".$User_id."'
			 ";
		$QUERY = mysqli_query($con,$select_join);
		if(mysqli_num_rows($QUERY) >0){
			?>
          <table id="receipt"  > 
             <?PHP
             while($row = mysqli_fetch_array($QUERY)){
			 ?>
              <tr>  
     <td colspan="2" id="receipt_title"> <!-- logo--> &nbsp; </td>
                   </tr>
                 <tr> <form action="receipt.php" method="post">
                  <td class="info">
<input type="text" name="date" value="<?PHP echo date('d/m/y'); ?>" /></td>
                  <td class="info"><label > التاريخ : </label> </td>
                 </tr>
                      <tr> 
         <td class="info">
                  
   
   <label class="info"> 
    <input type="text" name="schedule_ID" value="<?PHP echo $row['start']; ?>"  style=" width:70px"/>
     </label>     
                  -  الى -
     <label class="info"> 
     <input type="text" name="schedule_ID" value=" <?PHP echo $row['end']; ?>"   style=" width:70px"/> 
     </label>
                 
         </td>
             <td class="info"><label > الموعد : </label> </td>
              </tr>
           <tr> 
                  <td class="info">
     <input type="text" name="P_name" value=" <?PHP echo $row['patient_ID']; ?>"  /></td>
                   <td class="info"><label>أسم المريض : </label> </td>
                 </tr>
                 <tr> 
                  <td class="info">
        <input type="text" name="Sepc_ID" value="<?PHP echo $row['Sepc_ID']; ?>"  />      
                  </td>
                  <td class="info"><label>العيادة :</label> </td>
                 </tr>
                 <tr> 
                  <td class="info">
                 <input type="text" name="Doc_ID" value=" <?PHP echo $row['Doc_ID']; ?>"  />   
                  </td>
                   <td class="info"><label>الدكتور المعالج :</label></td>
                 </tr>
             <?PHP
		} // while loop end
			  ?>
              </table>
         <?PHP } // if end ?>     
              </div>
          <button class="btn btn-info btn-block" id="print_btn" onclick="Clickheretoprint()" >  save</button>      
       </form>
     
     </div>
    </div>
        
</div>
<!-- end of page wrapper -->
<div class="clearing"></div>
<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------>
 
 <?PHP
   // Save the R
 if(isset($_POST['save'])){
	  
	  @$date        = $_POST['date'];
	  @$Doc_ID      = $_POST['Doc_ID'];
	  @$patient_ID  = $_POST['patient_ID'];
	  @$schedule_ID = $_POST['schedule_ID'];
	  @$Sepc_ID     = $_POST['Sepc_ID'];
	 
	  $INSERT = " 
	  INSERT INTO `booking`( `Date_time`, `Doc_ID`, `patient_ID`, `schedule_ID`, `Sepc_ID`)
	   VALUES 
	   ('".$date."','".$Doc_ID."','".$patient_ID."','".$schedule_ID."','".$Sepc_ID."') " or die( mysqli_error()); 	
	   
	  $insert_query = mysqli_query($con , $INSERT);  
	  if($insert_query){
		 echo " <script> alert('done..') </script> "; 
	  }
  } //if isset //END
 
  ?>

</body>
</html>
