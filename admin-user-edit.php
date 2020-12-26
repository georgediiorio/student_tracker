<?php

/* Session and Redirect by Alex Green */
session_start(); // Start the session.
if ($_SESSION['user_role'] != "Admin") {

  // Need the functions:
  require('includes/login_functions_inc.php');
  redirect_user('unauthorized-access.php');
}

$pagetitle = 'Admin - User Edit';

include 'includes/header.php';

?>

<main> 
<?php 
require('mysqli_connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // print_r($_POST);
     
    $user_id = $_POST['user_id'];    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
 //   $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $major = $_POST['major'];
    $user_role = $_POST['user_role'];
    $status = $_POST['status'];
    
        $update_query =
        "UPDATE USERS
        SET first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        phone_number = '$phone_number',
        major = '$major',
        user_role = '$user_role',
        status = '$status'
        WHERE user_id = '$user_id'";
    
    // testing
    // echo $update_query;
    
    $update_result = mysqli_query($connection, $update_query);
    if($update_result) {
      header("Location: admin-users.php?msg=ok");
        exit;
    }
    else{
        echo "Update Failed.";
    }
    
    exit("testing");
}
else{
$user_id = $_GET['id'] ;
$query = "SELECT * FROM USERS WHERE user_id = $user_id";

// USER TESTING
// echo $user_id;
// echo $query;

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

}
?>
<h1>Update User Info</h1>

<form action="admin-user-edit.php" method="POST">
<p> User ID:
<input type="text" name="user_id" readonly value="<?php echo $row['user_id']; ?>">
</p>

<p>First Name:
<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
</p>

<p>Last Name:
<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
</p>
<!--
<p>Birthday:
<input type="date" name="birthday" value="<?php //echo $row['birthday']; ?>" required>
</p>
-->
<p>Email Address:
<input type="text" name="email" value="<?php echo $row['email']; ?>" required>
</p>

<p>Phone Number:
<input type="tel" name="phone_number" value="<?php echo $row['phone_number']; ?>" required>
</p>

<p>User Role:
    <select type="text" name="user_role" value="<?php echo $row['user_role']; ?>" required>
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
        <option value="Admin">Admin</option>
    </select>


<p>Major:
<select type="text" name="major" value="<?php echo $row['major']; ?>" required>
    <option value="Bussiness Information">Bussiness Information</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Computer Security & Networking">Computer Security & Networking</option>
    <option value="Computer Support Specialist">Computer Support Specialist</option>
    <option value="Computer Technology">Computer Technology</option>
    <option value="Database Management">Database Management</option>
    <option value="Web Development">Web Development</option>
    </select>
</p>

<p>Status:
<select type="text" name="status" value="<?php echo $row['status']; ?>" required>
    <option value="Active">Active</option>
     <option value="Inactive">Inactive</option>
     </select>
</p>  
</p>

<p>
<input type="submit">
</p>
</form>

</main>

<?php include ('includes/footer.php'); ?>