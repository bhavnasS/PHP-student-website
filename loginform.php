<?php
    //error_reporting(0);
	include('conn.php');
    	
    if($_POST['login'] == 'login' )
    {
       
      
      $email = $_POST['email'];
	  $password = md5($_POST['password']);
	  
	   
      if(!empty($email) && !empty($password))
      {
		$result_login = mysql_query("select * from student where email = '$email' AND password = '$password'");
		$count_login = mysql_num_rows($result_login);
		
			if($count_login > 0)
			{
				echo "Login Success";
				$row = mysql_fetch_object($result_login);
				$ID = $row->ID;
				$name = $row->name;
				$email = $row->email;
				
				$_SESSION['ID'] = $ID;
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				
				
				header("Location:profile.php");
				
				
				
			}else{ 
				
				//echo "Login Failed.Invalid credentials.";
				//header("Location:login.php");
				$message = "Login Failed.Invalid email or password.*";
				
			}
		}
     
	}
    
        
    ?>

    
    
      <form action="" method="post">
        
        <fieldset>
        	
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email"/>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password"/>
          
         
    	<i>	<?php echo $message; ?> </i>
			             
        </fieldset>
        <button name="login" value="login">Login</button>
      </form>
      
    </body>
</html>
  

