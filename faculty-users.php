<?php
include 'faculty-header.php';
?>
<main>
<?php 
session_start(); // Start the session.

// // If no session value is present, redirect the user:
// if (!isset($_SESSION['user_id'])) {

// 	// Need the functions:
// 	require('login.php');
// 	header("Location: login.php");
// 	exit();

// }
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries

echo "<h1>List of Website Users</h1>";

if(isset($_GET['msg'])) {
    echo "<h4 class='alert'> Your record has been updated.</h4>";
}

$query = "SELECT * FROM USERS WHERE user_role = 'student'";
$result = mysqli_query($connection, $query);


echo "<table><thead><td>User ID</td><td>First Name</td><td>Last Name</td><td>Birthday</td><td>Email Address</td><td>Phone Number</td><td>Major</td><td>User Role</td><td>Status</td><td>Action</td><td>Notes</td></thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td><a href='faculty-user-details.php?id=" . $row['user_id'] ."'>" . $row['user_id'] . "</a></td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] ."</td><td>" . $row['birthday'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone_number'] . "</td><td>" . $row['major'] . "</td><td>" . $row['user_role'] ."</td>
<td>". $row['status'] . "</td><td><a href='edit_user.php?id=". $row['user_id'] . "'>Edit</a></td><td><a href='notes-add.php?id=". $row['user_id'] . "'>Add Notes</a></td>
</tr>";
}
echo "</table>"; // close table

?>
</main>
<?php
include 'faculty-footer.php';
?>
</body>
</html>