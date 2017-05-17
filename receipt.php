<?PHP
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
		<link href="css/bootstrap.css" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/style2.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="images/Hospital-icon.jpg" />

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
				<p> قم بالتأكيد على الحجز حتى يتم اعتماد حجزك <br /> يجب احضار الايصال بعد طبعه فى معاد الكشف وإلا سوف يتم الغاء الحجز</p>
			</Div>
			<div id="content" style="margin-left:190px;  width:auto">
				<?PHP 
	  @$schedule_ID     = $_GET['sch_id']; 
	  @$patient_ID = $_GET['userId'];     
		     $con = mysqli_connect('localhost','root','','hospital');
			 mysqli_set_charset($con , 'UTF8');
			 $select_join = "

SELECT * FROM `schedule` JOIN `doctors` JOIN `specialties` JOIN`patient`WHERE 
`doctors`.Doc_ID =`schedule`.Doc_ID and 
`specialties`.Sepc_ID = `schedule`.Sepc_ID  AND
schedule.schedule_ID ='".$schedule_ID."' AND
`patient`.patient_ID = '".$patient_ID."'
			 ";
			 
			 
		$QUERY = mysqli_query($con,$select_join);
		if(mysqli_num_rows($QUERY) >0){
			?>
				<table id="receipt">
					<?PHP
             while($row = mysqli_fetch_array($QUERY)){
			 ?>
						<tr>
							<td colspan="2" id="receipt_title">
								<!-- logo-->&nbsp; </td>
						</tr>
						<tr>
							<form action=" <?PHP echo $_SERVER['PHP_SELF'] ?>" method="post">
								<td class="info"><label><?PHP echo date('d/m/y'); ?></label></td>
								<td class="info"><label> التاريخ : </label> </td>
						</tr>
						<tr>
							<td class="info">

								<label> 
   <label > <?PHP echo $row['start']; ?></label> - الى -
								<label><?PHP echo $row['end']; ?></label>
								<input type="text" name="schedule_ID" value="<?PHP echo $schedule_ID ?>" style=" width:70px; display:none" class="booking_input" readonly="readonly" />
								</label>


							</td>
							<td class="info"><label> الموعد : </label> </td>
						</tr>
						<tr>
							<td class="info">
								<label><?PHP echo $row['p_name']; ?></label>
		<input type="text" name="patient_ID" value=" <?PHP echo $patient_ID ?>" class="booking_input" readonly="readonly" style="display:none"/></td>
							<td class="info"><label> إسم المريض : </label> </td>
						</tr>
						<tr>
							<td class="info">
								<label> <?PHP echo $row['Specialty_name']; ?></label>
		<input type="text" name="Sepc_ID" value="<?PHP echo $row['Sepc_ID']; ?>" class="booking_input" readonly="readonly" style="display:none" />
							</td>
							<td class="info"><label> العيادة :</label> </td>
						</tr>
						<tr>
							<td class="info">
								<label> <?PHP echo $row['Name']; ?> </label>
		<input type="text" name="Doc_ID" value="<?PHP echo $row['Doc_ID'];?>" class="booking_input" readonly="readonly" style="display:none" />
							</td>
							<td class="info"><label> الدكتور المعالج :</label></td>
						</tr>
						<?PHP
		} // while loop end
			  ?>
				</table>
				<?PHP } // if end ?>
			</div>
			<button class="btn btn-info btn-block" id="print_btn" name="save" onclick="Clickheretoprint()">  تأكيد الحجز</button>
			</form>

		</div>

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
	  
	  @$date        = date('d/m/y') ;
	  @$Doc_ID      = $_POST['Doc_ID'];
	  @$patient_ID  = $_POST['patient_ID'];
	  @$schedule_ID = $_POST['schedule_ID'];
	  @$Sepc_ID     = $_POST['Sepc_ID'];
	$connnn = mysqli_connect('localhost','root','','hospital');
	  $INSERT = " 
	 INSERT INTO `booking`( `date`, `Doc_ID`, `patient_ID`, `schedule_ID`, `Sepc_ID`) VALUES 
	   ('".$date."','".$Doc_ID."','".$patient_ID."','".$schedule_ID."', '".$Sepc_ID."') " or die( mysqli_error()); 	
	
	  $insert_query = mysqli_query($connnn,$INSERT) or die(mysqli_error());  
	  if($insert_query){
		 echo " <script> alert('done..') </script> ";
		 echo "<script> 
 window.open('booking_specialties.php?&userId=".$_SESSION['patient_ID']." ','_self')
  </script>";
	  }
  } //if isset //END
 
  ?>


		<script language="javascript">
			function Clickheretoprint()
			{
				var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
				disp_setting += "scrollbars=yes,width=400, height=400, left=400, top=25";
				var content_vlue = document.getElementById("content").innerHTML;
			
				var docprint = window.open("", "", disp_setting);
				docprint.document.open();
				docprint.document.write('<html><head><title>ايصال الحجز</title>');
				docprint.document.write('</head><body onLoad="self.print()">');
				docprint.document.write(content_vlue);
				docprint.document.write('</body></html>');
				docprint.document.close();
				docprint.focus();
				//window.print();
			}
		</script>
		</body>

	</html>