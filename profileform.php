<?php
    
	error_reporting(0);
	
	include('conn.php');
	$ID = $_SESSION['ID'];
	$select_student = mysql_query("select * from student where ID = $ID");
	
	$student_row = mysql_fetch_array($select_student);
    $select_courses = mysql_query("select * from courses where student_id = $ID");
$numval =  mysql_num_rows($select_courses);
$course_list= "";
if($numval > 0)
 {
 while($course_row = mysql_fetch_array($select_courses))
 {
	$course .= $course_row['course_name'].","; 
	
 }
 $course_list = rtrim($course,",");

 }
        
 ?>

        <form  method="post">
      
        
       
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" disabled value =<?php echo $student_row['name'] ?>>
          
          <label for="mail">Email:</label>
          <input type="text" disabled value = <?php echo $student_row['email'] ?> >
          
          <label for="phNumber">Phone Number:</label>
          <input type="text" disabled value =<?php echo $student_row['phone']; ?> >
          
          <label for="address">Address:</label>
          <input type="text" disabled value=<?php echo $student_row['address']; ?> >
          <label for="city">City:</label>
          <input type="text" disabled value = <?php echo $student_row['city']; ?> >
          
             
          <label for="gender">Gender:</label>
          <input type="text" disabled value = <?php echo $student_row['gender']; ?> >
    <br>
            <label for="courses">Courses Interested:</label> 
            <input type="text" disabled value = <?php echo $course_list; ?> >
    <label for="lastQualification" >Last Qualification:</label>
    <input type="text" disabled value=<?php echo $student_row['last_qualification']; ?> >
    <label for="Year of Passing">Year Of Passing:</label>
     <input type="text" disabled value=<?php echo $student_row['year_of_passing']; ?> >
		<br>
              
        <button name="Update" formaction="update.php" value="Update">Click here to update your profile</button>
      </form>

