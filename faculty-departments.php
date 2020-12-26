<?php
include 'faculty-header.php';
?>

<main>
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


echo "<h1>Departments</h1>";

if(isset($_GET['msg'])) {
    echo "<h4 class='alert'> Your record has been updated.</h4>";
}
$query = "SELECT * FROM DEPARTMENTS";
$result = mysqli_query($connection, $query);


echo "<table><thead><td class='center'>Department ID</td><td>Department Name</td><td>Status</td></thead>"; // open table and include table headings


while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['department_id'] . "</td><td>" . $row['department_name'] . "</td><td>" . $row['status'] . "</td></tr>";
}
//  for status in the future
echo "</table>"; // close table

?>
</main>
<?php
include 'faculty-footer.php';
?>
</body>
</html>