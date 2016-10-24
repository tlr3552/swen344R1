<html>
 <body>
  <?php
  $instructors = file_get_contents('http://vm344e.se.rit.edu/api/Instructor.php?action=get_all_instructors');
  $instructors = json_decode($instructors, true);
  ?>
    <ul>
	Instructors: 
    <?php foreach ($instructors as $instructor): ?>
      <li>
		
        <a href=<?php echo "http://vm344e.se.rit.edu/api/Instructor.php?action=get_instructor_by_id&id=" . $instructor["InstructorID"]  ?> alt=<?php echo "instructor_" . $instructor_["InstructorID"] ?>><?php echo $instructor["InstructorID"] ?></a>
    </li>
    <?php endforeach; ?>
    </ul>
  <?php
 ?>
 </body>
</html>