<?php

/* Session and Redirect by Alex Green */
session_start(); // Start the session.
$authorized_user = "";

switch ($_SESSION['user_role']) {
  case "Admin":
    $authorized_user = "Your are an Admin.";
    break;
  case "Faculty":
    $authorized_user = "You are a Faculty.";
    break;
  default:
   redirect_user('unauthorized-access.php');
}

$pagetitle = 'Add a Department';

include 'includes/header.php';


// session_start(); // Start the session.

// // If no session value is present, redirect the user:
// if (!isset($_SESSION['user_id'])) {

// 	// Need the functions:
// 	require('login.php');
// 	header("Location: login.php");
// 	exit();

// }
?>
<main>
    <?php include 'inc_newdepartment.php' ; ?>

    <form action="departments-add.php" method="post" class="form">
	
	<p><label required for="department_name">Department Name:</label><input type="text" placeholder="Enter the department name" name="department_name" size="15" value="<?php if(isset($_POST['department_name'])) { print htmlspecialchars($_POST['department_name']); } ?>"></p>
	
	<p><label required  for="status">Status:</label>
	<select placeholder="Select active" name="status" value="<?php if(isset($_POST['status'])) { print htmlspecialchars($_POST['status']); } ?>">>
      <option value="A">Active</option>
      <option value="I">Inactive</option>
    </select>
	
	<p><input type="submit" name="submit" value="Register" class="button">
            <button id="submit" type="submit"> <a href="admin-departments.php">Go Back</button></p>
</form>
</main>

<?php include ('includes/footer.php'); ?>