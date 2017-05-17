<?PHP

// destroing the session 
// logout 


   session_start();
    $logout = session_destroy();
	 if($logout == true){
		 
		 header('location:login.php');
		 }
 
 ?>