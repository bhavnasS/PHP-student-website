<?php
    //error_reporting(0);
	include('conn.php');
    $ID = $_SESSION['ID'];
	$select_student = mysql_query("select * from student where ID = '$ID'");
	$select_student_result = mysql_fetch_array($select_student);
	$select_course = mysql_query("select course_name from courses where student_id = '$ID'");
	$i =0;
	while($select_course_result = mysql_fetch_array($select_course))
	{
	
	//$count = mysql_num_rows($select_course);
	$course_arr[$i] = $select_course_result['course_name'] ;
		$i++;	
	}
	if(!empty($_POST['studentUpdate']))
	{
	  $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phNumber'];
      $address= $_POST['address'];
      $city = $_POST['city'];
      $gender = $_POST['gender'];
      $courses = $_POST['courses'];
      $year_of_passing= $_POST['yearofpassing'];
      $last_qualification = $_POST['lastqualification']; 
	  

	  $update_student = mysql_query("update student set name='$name',email='$email',phone='$phone',address='$address',city='$city',gender='$gender',year_of_passing='$year_of_passing',last_qualification='$last_qualification' where ID = '$ID'"); 
	  
	  $count = count($courses);
	  $delete_old_courses = mysql_query("delete from courses where student_id = '$ID'");
	  for($i = 0 ; $i < $count ; $i++)
	  {
		  
		$courseName = $courses[$i]; 
		echo $courseName;
		$update_course = mysql_query("insert into courses (course_name,student_id) values('$courseName','$ID')");
	  }
	  header("Location:profile.php");
	}
		
		
?>		
      <form  method="post">
       <label for="name">Name:</label>
       <input type="text" id="name" name="name" value =<?php echo $select_student_result['name'] ?>>
          
          <label for="mail">Email:</label>
          <input type="text" name="email" value = <?php echo $select_student_result['email'] ?> >
          
          <label for="phNumber">Phone Number:</label>
          <input type="text" name= "phNumber" value = <?php echo $select_student_result['phone']; ?> >
          
          <label for="address">Address:</label>
          <input type="text" name= "address" value= <?php echo $select_student_result['address']; ?>>
          
          <label for="city">City:</label>
          <select name="city" >
    <option value="" >Select a city</option>
    <option value="Ahmedabad" <?php if($select_student_result[city] == 'Ahmedabad'){?> selected <?php }?>>Ahmedabad</option>
    <option value="Surat" <?php if($select_student_result[city] == 'Surat'){ echo 'selected'; }?>>Surat</option>
    <option value="Rajkot" <?php if($select_student_result[city] == 'Rajkot'){?> selected <?php }?>>Rajkot</option>
    </select>      
          <label for="gender">Gender:</label>
          <input type='radio' name = "gender" <?php if($select_student_result['gender'] == 'male'){?> checked <?php }?>value="male">MALE
    <input type='radio' name="gender"  <?php if($select_student_result['gender'] == 'female'){?> checked <?php }?>value="female">FEMALE
    <br>
            <label for="courses">Courses Interested:</label> 
            <input type='checkbox' name="courses[]" <?php if (in_array("java", $course_arr)){?> checked <?php }?> value="java"/>JAVA
    <input type='checkbox' name="courses[]" <?php if (in_array(".net", $course_arr)){?> checked <?php }?> value=".net"/>.NET
    <input type='checkbox' name="courses[]" <?php if (in_array("html", $course_arr)){?> checked <?php }?> value="html"/>HTML</i>
    <input type='checkbox' name="courses[]" <?php if (in_array("PHP", $course_arr)){?> checked <?php }?> value="PHP"/>PHP
    <input type='checkbox' name="courses[]" <?php if (in_array("android", $course_arr)){?> checked <?php }?> value="android"/>ANDROID
    <input type='checkbox' name="courses[]" <?php if (in_array("javascript", $course_arr)){?> checked <?php }?> value="javascript"/>JAVASCRIPT
   
    <label for="lastQualification" >Last Qualification:</label>
    <input type="text" name = "lastqualification" value=<?php echo $select_student_result['last_qualification']; ?>>
    <label for="Year of Passing">Year Of Passing:</label>
     <input type="text" name = "yearofpassing" value=<?php echo $select_student_result['year_of_passing']; ?> >
		<br>
              
        <button name="studentUpdate"  value="studentUpdate">Update Profile</button>
      </form>

