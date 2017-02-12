<?php
    error_reporting(0);
	include('conn.php');
    	
    if($_POST['studentSubmit'] == 'Register' )
    {
       
      $name = $_POST['name'];
      $email = $_POST['email'];
	  $password = md5($_POST['password']);
      $phone = $_POST['phNumber'];
      $address= $_POST['address'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $courses = $_POST['courses'];
      $year_of_passing= $_POST['yearofpassing'];
      $last_qualification = $_POST['lastqualification']; 
	  
	  
      if(!empty($name) && !empty($email))
      {
		  
		  
	$result_email = mysql_query("select * from student where email = '$email'");
	$count_email = mysql_num_rows($result_email);
	
	
	
	if($count_email > 0)	
	{
		?>
		<script>
		alert("Email Id already exisits");
		</script>
        <?php
		header("Location:register.php");
		
	}else
		{
	
	$insert = "insert into student(name,email,password,phone,address,city,gender,year_of_passing,last_qualification) 			values('$name','$email','$password','$phone','$address','$city','$gender','$year_of_passing','$last_qualification')";  
		$result = mysql_query($insert);
		
		$lastid = mysql_insert_id();
		
		$count = count($courses);
		
			for($i=0; $i<$count; $i++)
			{
				$course = $courses[$i];
				$insert_courses = "insert into courses(student_id,course_name) values ('$lastid','$course')";
				$courses_result = mysql_query($insert_courses);
	
			}
			
 				header("Location:thank you.php");
		
		}
      
	  }
	}
    
        
    ?>
<form action="" method="post">
 <fieldset>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"/>
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email"/>
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password"/>
          
          <label for="phNumber">Phone Number:</label>
          <input type="number" id="phNumber" name="phNumber"/>
          
          <label for="address">Address:</label>
          <textarea name="address" value = ""></textarea>
          <label for="city">City:</label>
          <select name="city" >
    <option value="" >Select a city:</option>
    <option value=""><i>Ahmedabad</i></option>
    <option value=""><i>Surat</i></option>
    <option value=""><i>Rajkot</i></option>
    </select>
             
          <label for="gender">Gender:</label>
          <input type='radio' name = "gender" value="male">MALE
    <input type='radio' name="gender" value="female">FEMALE
    <br><br>
            <label for="courses"> Courses Interested:</label><input type='checkbox' name="courses[]" value="java"/><label class="light" for="java">JAVA</label>
        <br>
    <input type='checkbox' name="courses[]" value=".net"/><label class="light" for=".net">.NET</label>
    <br>
    <input type='checkbox' name="courses[]" value="html"/><label class="light" for="html">HTML</label>
    <br>
    <input type='checkbox' name="courses[]" value="PHP"/><label class="light" for="PHP">PHP</label>
    <br>
    <input type='checkbox' name="courses[]" value="android"/><label class="light" for="andriod">ANDROID</label>
    <br>
    <input type='checkbox' name="courses[]" value="javascript"/><label class="light" for="javascript">JAVASCRIPT</label>
    <br>
    <br>
    <label for="lastQualification" >Last Qualification:</label><input type="text" name="lastqualification" value=""/><label for="Year of Passing">Year Of Passing:</label><input type="number" name="yearofpassing" value=""/>
    
        </fieldset>
        <button name="studentSubmit" value="Register">Register</button>
      </form>

  

