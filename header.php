<?php
 session_start();
 error_reporting(0);
 if($_GET['action'] == 'logout')
{
	unset($_SESSION['ID']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	session_destroy();
	
}
 
 
 
 ?>

<header>
    <div class="container">
      <h1><a href="#">Student's site</a></h1>
      <nav>
        <ul>
          <li><a href="index.php" class="m1">Home Page</a></li>
          <li><a href="about-us.php" class="m2">About Us</a></li>
          <li><a href="register.php" class="m3">Register</a></li>
           <?php if(!empty($_SESSION['ID'])){?>
<li><a href="http://localhost/students-site?action=logout" class="m4">Logout</a></li>
<?php }else{?>
<li><a href="login.php" class="m4">Login</a></li>
<?php }?>
          
          <li class="last"><a href="contact-us.php" class="m5">Contact Us</a></li>
        </ul>
      </nav>
     
    </div>
</header>
 