<html>
<head>
	
</head>
<body>
Info submitted:
  <p>email: <?php echo $_POST['email']; ?></p>
  <p>firstname: <?php echo $_POST['firstname']; ?></p>
  <p>lastname: <?php echo $_POST['lastname']; ?></p>
  <p>departmentid: <?php echo $_POST['departmentid']; ?></p>
  <?php

// Description: Create a RESTful client to read the API from another site
ini_set("display_errors", "On");
error_reporting(E_ALL);
// Use GETs to read person info
//if (isset($_POST["action"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["credits"]) && isset($_POST["gpa"]) && $_POST["action"] == "create_course") 
//{
$instructor_id = file_get_contents('http://vm344e.se.rit.edu/api/Instructor.php?action=create_instructor&email=' . $_POST["email"] . '&firstname=' . $_POST['firstname'] . '&lastname=' . $_POST['lastname']. '&authtoken=' . rand() . '&departmentid=' . $_POST['departmentid']);
$instructor_id = json_decode($instructor_id, true);
echo 'An instructor has been created with the following id:' . $instructor_id . "\n";

?>
<br> </br>
retreiving information from api...
<?php
$instructor_info = file_get_contents('http://vm344e.se.rit.edu/api/Instructor.php?action=get_instructor_by_id&id=' . $instructor_id);
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
