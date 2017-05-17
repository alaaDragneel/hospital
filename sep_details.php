<?PHP
 session_start();
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
 <link rel="shortcut icon"  href="images/Hospital-icon.jpg" /> 


<style>
.center { text-align:center }
#book { text-decoration:none ; color:#fff ; font-size:large}
#book_button { width:200px ; height:35px}

#confirmationBox {
	
	height:30% ;
	 width:40% ;
	 position:absolute;
	 position:fixed;
	 top:180px ; 
	 left:420px;
	 background-color:rgba(0,51,102,.9);
	 display:none	
	}
#Message_title { 
text-align:center ; font-family:
Tahoma, Geneva, sans-serif ;
font-weight:;
font-size:36px;
color:#fff}	

#form_table {  padding:30px ; margin-left:90px; margin-top:35px}
#form_table td { padding:10px ; margin:30px; padding-left:20px;}
.form_btn { width:140px}
</style>
</head>

<!------ Heeder and NavBar--------->
 <?PHP include("include/template/header_&_navbar.php");  ?>

<!------ //END  Heeder and NavBar--------->
<div class="logo-sarch-wrap">
  <div class="logo-search-container">
    <div class="logo">
      <h1>المواعيد</h1>
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
     <div style="background-color:rgba(0,153,204,.1); margin-bottom:150px; margin-top:40PX">
          <?PHP 
		     @$sepp_ID = $_GET['sep'];
			 @$userID = $_GET['userId'];
			 @$_SESSION['sepId']= $sepp_ID ;
		     
			 mysqli_set_charset($con , 'UTF8');
			 $select_join = "
SELECT * FROM `schedule` JOIN `doctors` JOIN `specialties` WHERE `doctors`.Doc_ID =`schedule`.Doc_ID and 
`specialties`.Sepc_ID = `schedule`.Sepc_ID AND `specialties`.Sepc_ID = '".$_SESSION['sepId']."'

			 ";
		$QUERY = mysqli_query($con,$select_join);
		
		if(mysqli_num_rows($QUERY) >0){
			
			?>
              
               <table class="table table-bordered table-hover " width="20%" height="20%">
                <tr> 
                <th class="center"> حجز موعد</th>
                <th class="center">الى</th>
                <th class="center">من</th>
                <th class="center">اليوم</th>
                <th class="center">الدكتور</th>
                
                </tr> 
            <?PHP
			
		while($result = mysqli_fetch_array($QUERY)){
			 ?>
           
                <tr>
                <td class="center">
                <button class='btn btn-info' id="book_button"><a href="#" id="book">حجز</a></button></td>
                <td class="center"> <?PHP echo $result['end'] ?> </td>
                <td class="center"> <?PHP echo $result['start'] ?> </td>
                <td class="center"> <?PHP echo $result['Day'] ?> </td>
                <td class="center">
             <a href="doctor_details.php?doc=<?PHP echo $result['Doc_ID'] ?>"> <?PHP echo $result['Name'] ?></a></td>
                </tr>
            <?PHP
			 } // while Loop #END
			echo ' </table>';
			 
		}  // if num rows #END
		  ?>
     </div>
        
    </div>
        <div id="confirmationBox">
        <h1 id="Message_title"> تأكيد الحجز</h1>  
        <table id="form_table">
         <tr> 
        <td> 
        <?PHP
   $select_join2 = "
SELECT * FROM `schedule` JOIN `doctors` JOIN `specialties` WHERE `doctors`.Doc_ID =`schedule`.Doc_ID and 
`specialties`.Sepc_ID = `schedule`.Sepc_ID AND `specialties`.Sepc_ID = '".$_SESSION['sepId']."' ";
		$QUERY2 = mysqli_query($con,$select_join2);
       while($rows = mysqli_fetch_array($QUERY2)){
		$sch_ID =  $rows['schedule_ID'];
		$_SESSION['schedule_ID'] = $sch_ID ;   
	   }
		?>
          <form method="post" action="receipt.php<?PHP echo'?sch_id='.$_SESSION['schedule_ID'].'&userId='.$userID ; ?> ">
        <input type="submit"  value="YES"  class="btn btn-success form_btn " id="yes" />
           </form>
          
        </td>
          <td>
        <input type="submit" name="no_re"  value="NO"  class="btn btn-danger  form_btn" id="no" /></td>
           </tr>
        </table>
        </div>
</div>
<!-- end of page wrapper -->
<div class="clearing"></div>
<!--- Footer------>
<?PHP include("include/template/footer.php");?>
<!---//END  Footer------>

<script src="js/jquery.js"> </script> <!-- Jquery libary-->
<!-- Jquery confermation message fomr >>-->
<script> 
$(document).ready(function(e) {

$("#book_button").click(function(){
$("#confirmationBox").show()
})
$("#no").click(function(){
$("#confirmationBox").hide()
})


});

</script> 

</body>
</html>
