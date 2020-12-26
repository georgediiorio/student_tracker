<?php

session_start(); // Start the session.

  // Need the functions:
  require('includes/login_functions_inc.php');

$authorized_user = "";

switch ($_SESSION['user_role']) {
  case "Admin":
    $authorized_user = "Your are an Admin.";
    break;
  case "Faculty":
    $authorized_user = "You are a faculty member.";
    break;
  case "Student":
   redirect_user('unauthorized-access.php');
    break;
  default:
   redirect_user('unauthorized-access.php');
}

$pagetitle = 'Edit Notes';

include ('includes/header.php');
$user_id = $_GET['id'] ;
$faculty_id = $_SESSION['user_id'] ;
include ('inc_newnotes.php');  


?>


<main>
    <?php
    ?>
    <form action="notes-add.php" method="post" class="form">


	<p><label for="user_id">Student ID:</label><input type="text" placeholder="Enter the Student's ID" name="user_id" size="15" value="<?php if(isset($_POST['user_id'])) { print htmlspecialchars($_POST['user_id']); } ?>" readonly></p>


	<p><label for="faculty_id">Faculty ID:</label><input type="text" placeholder="Enter your ID" name="faculty_id" size="15" value="<?php if(isset($_POST['faculty_id'])) { print htmlspecialchars($_POST['faculty_id']); } ?>" readonly></p>

	<p><label for="course_name">Course Name:</label><input type="text" placeholder="Enter Course Name" name="course_name" size="15" value="<?php if(isset($_POST['course_name'])) { print htmlspecialchars($_POST['course_name']); } ?>"></p>

  	<p><label for="scholarship">Scholarship Reccomendation:</label>
	<select placeholder="Select Scholarship" name="scholarship" value="<?php if(isset($_POST['scholarship'])) { print htmlspecialchars($_POST['scholarship']); } ?>">>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
	
  	<p><label for="internship">Internship Reccomendation:</label>
	<select placeholder="Select Internship" name="internship" value="<?php if(isset($_POST['internship'])) { print htmlspecialchars($_POST['internship']); } ?>">>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>


	<p><label for="notes">Notes:</label><input type="text" placeholder="Enter your notes" name="notes" size="15" value="<?php if(isset($_POST['notes'])) { print htmlspecialchars($_POST['notes']); } ?>"></p>


	<p><input type="submit" name="submit" value="Add Record" class="button"></p>

</form>
</main>

<?php
include 'footer.php';
?>