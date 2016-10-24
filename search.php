<html>
<head>
	
</head>
<body>

<?php

ini_set("display_errors", "On");
error_reporting(E_ALL);
?>
<?php
$instructor_info = file_get_contents('http://vm344e.se.rit.edu/api/Instructor.php?action=get_instructor_by_id&id=' . $_POST['InstructorID']);
$instructor_info = json_decode($instructor_info, true);
?>
Instructor Information:
    <table border ="1">
      <tr>
	        <tr>
        <td>departmentid: </td><td> <?php echo $instructor_info[0]["DepartmentID"] ?></td>
      </tr>
	        <tr>
        <td>instructorid: </td><td> <?php echo $instructor_info[0]["InstructorID"] ?></td>
      </tr>
	        <tr>
        <td>UserID: </td><td> <?php echo $instructor_info[0]["UserID"] ?></td>
      </tr>
    </table>
    <br />
Instructor User Info:
<?php
$user_info = file_get_contents('http://vm344e.se.rit.edu/api/User.php?action=get_user_by_id&id=' . $instructor_info[0]["UserID"]);
$user_info = json_decode($user_info, true);
?>
    <table border ="1">
      <tr>
	        <tr>
        <td>email: </td><td> <?php echo $user_info[0]["Email"] ?></td>
      </tr>
	        <tr>
        <td>type: </td><td> <?php echo $user_info[0]["Type"] ?></td>
      </tr>
	        <tr>
        <td>firstname: </td><td> <?php echo $user_info[0]["Firstname"] ?></td>
      </tr>
	        <tr>
        <td>lastname: </td><td> <?php echo $user_info[0]["Lastname"] ?></td>
      </tr>
	        <tr>
        <td>authtoken: </td><td> <?php echo $user_info[0]["AuthToken"] ?></td>
      </tr>
  
    </table>
    <br />
</body>
</html>
