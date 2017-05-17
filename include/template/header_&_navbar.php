<?PHP
//connection
include("include/connection.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الامل</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald|Pontano+Sans' rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css"  />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../images/Hospital-icon.jpg"  />
<style>
#nav2 { display:none ; position:absolute}
#nav2 li { margin-top:2px; float:none; background-color:rgba(0,0,0,.9)}

#nav1 li:hover > #nav2 { display:block ; }

</style>
</head>
<body>
<div class="header-wrap">
  <div class="header">
    <div class="menu">

      <ul id="nav1">
      <li ><a href="index.php" class="active" id="ul">الرئيسة</a>  </li>
        <li><a href="specialties.php">التخصصات</a></li>
        <li id="nav"><a>خدمات المستشفى</a>
            <ul id="nav2">
                <li><a href="services.php">خدمات </a></li>
                <li><a href="doctors.php">الدكاتره</a></li>
          </ul>
        </li>
        <li><a href="contact.php">اتصل بنا</a></li>
       <li><a href="admin/login.php" target="new"> لوحة التحكم</a></li>
      </ul>
    </div>
    <div class="social-media">
      <ul>
        <li><a href="#"><img src="images/aim.gif" alt="aim" /></a></li>
        <li><a href="#"><img src="images/facebook.gif" alt="facebook" /></a></li>
        <li><a href="#"><img src="images/linkedin.gif" alt="linkedin" /></a></li>
        <li><a href="#"><img src="images/twitter.gif" alt="twitter" /></a></li>

      </ul>
    </div>
  </div>
</div>