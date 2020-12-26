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

$pagetitle = 'Degree and Certificates';

include 'includes/header.php';
?>
<main>
<h1>Degrees & Certificates</h1>
    <a href="admin-degree-certificate-add.php"><button id="submit" type="submit">Add Item</button></a>
<?php 

 // Start the session.
// session_start();
// If no session value is present, redirect the user:
// if (!isset($_SESSION['user_id'])) {

// 	// Need the functions:
// 	require('login.php');
// 	header("Location: login.php");
// 	exit();

// }

require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries
 

if(isset($_GET['msg'])) {
    echo "<h4 class='alert'> Your record has been updated.</h4>";
}
//$query = "SELECT * FROM DEGREE_CERTIFICATE";
$query="SELECT cert_deg_id,cert_deg_name,cert_deg_type,course_name FROM DEGREE_CERTIFICATE
INNER JOIN COURSES
ON DEGREE_CERTIFICATE.course_id=COURSES.course_id";
$result = mysqli_query($connection, $query);


echo "<table><thead><td class='center'>Certificate Degree ID</td>
<td>Course Name</td>
<td>Certificate Degree Name</td>
<td>Certificate Degree Type</td>
<td>Actions</td>
</thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
    $coursename=$row['course_name'];
echo "<tr><td>" . $row['cert_deg_id'] . "</td>
<td>" .$row['course_name'] . "</td>
<td>" .$row['cert_deg_name'] . "</td>
<td>" .$row['cert_deg_type'] . "</td>
<td><a href='degree-certificate-edit.php?id=". $row['cert_deg_id'] . "&coursename=". $coursename . "'>Edit</a></td></tr>";
}
//  for status in the future
echo "</table>"; // close table


?>
</main>
<?php include ('footer.php'); ?>