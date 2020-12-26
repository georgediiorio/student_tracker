<?php

session_start(); // Start the session.

  // Need the functions:
  require('includes/login_functions_inc.php');

$authorized_user = "";

switch ($_SESSION['user_role']) {
  case "Admin":
    $authorized_user = "You are an Admin.";
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

?>


<main> 
<?php 
require('mysqli_connect.php');
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // print_r($_POST);
    $record_id = $_POST['record_id'];
    $user_id = $_POST['user_id'];
    $faculty_id = $_POST['faculty_id'];
    $course_name = $_POST['course_name'];
    $scholarship = $_POST['scholarship'];
    $internship = $_POST['internship'];
    $notes = $_POST['notes'];
    $session_id = $_SESSION['user_id'];


    if ($faculty_id = $session_id) {
    $update_query =
        "UPDATE NOTES
        SET user_id = '$user_id',
        faculty_id = '$faculty_id',
        course_name = '$course_name',
        scholarship = '$scholarship',
        internship = '$internship',
        notes = '$notes'
        WHERE record_id = '$record_id' ";
    
    // testing
    // echo $update_query;
    
    $update_result = mysqli_query($connection, $update_query);
    }
    if($update_result) {
      print'<div class="link">
        <p class="input--success">The note has been updated</p>
</div>';
    }
    else{
        echo "Update Failed.";
    }

    exit("");
}
else{
$record_id = $_GET['record_id'] ;
$query = "SELECT * FROM NOTES WHERE record_id = $record_id";

// USER TESTING
// echo $department_id;
// echo $query;

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

}
?>
<h1>Update User Note Record</h1>

<form action="notes-edit.php" method="post">
<p> Record ID:
<input type="text" name="record_id" readonly value="<?php echo $row['record_id']; ?>">
</p>

<p> Student ID:
<input type="text" name="user_id" readonly value="<?php echo $row['user_id']; ?>">
</p>

<p>Faculty ID:
<input type="text" name="faculty_id" readonly value="<?php echo $row['faculty_id']; ?>" required>
</p>

<p>Course Name:
<input type="text" name="course_name" value="<?php echo $row['course_name']; ?>" >
</p>


<p>Scholarship Reccomendation:
<select type="text" name="scholarship" value="<?php echo $row['scholarship']; ?>" required>
    <option value="Yes">Yes</option>
     <option value="No">No</option>
     </select>
</p>


<p>Internship Reccomendation:
<select type="text" name="internship" value="<?php echo $row['status']; ?>" required>
    <option value="Yes">Yes</option>
     <option value="No">No</option>
     </select>
</p>

<p>Notes:
<input type="text" name="notes" value="<?php echo $row['notes']; ?>" >
</p>


<p>
<input class="button" type="submit">
</p>
</form>

</main>
<?php
include 'footer.php';
?>

</body>
</html>


