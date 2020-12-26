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

$pagetitle = 'Add a Degree or Certificate';

include 'includes/header.php';

?>
<main>
<?php
//intro text:
print '<h2>Add Degree Certificate</h2><div class="reg--p">
<p class="reg-p"> </p></div>';
// make a connection 
 require('mysqli_connect.php');

$mysqli = new mysqli($host, $user, $pass, $db, $port);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$stmt = $mysqli->prepare("SELECT course_id, course_name FROM COURSES ORDER BY course_name");
$stmt->execute();
$coursesArray = [];

foreach ($stmt->get_result() as $row)
{
    $coursesArray[$row['course_id']] = $row['course_name'];
}

/* close connection */
$mysqli->close();


// has the form been submitted?
if($_SERVER{'REQUEST_METHOD'} == 'POST'){
	
	$problem = false; 
	
	// value check
	
	
	if(empty ($_POST{'course_id'})){
		$problem = true;
		print '<p class="input--error">Please input course id!</p>';
	}
	if(empty ($_POST{'cert_deg_name'})){
		$problem = true;
		print '<p class="input--error">Please input certificagte degree name!</p>';
	}	
	if(!$problem){
		
		
    
    
    // create variables
   // $cert_deg_id = $_POST{'cert_deg_id'};
    $course_id = $_POST{'course_id'};
    $cert_deg_name = $_POST{'cert_deg_name'};
    $cert_deg_type = $_POST{'cert_deg_type'};
    
    // bulid insert statement
    $add_degcert ="INSERT INTO DEGREE_CERTIFICATE (course_id, cert_deg_name, cert_deg_type) VALUES('$course_id','$cert_deg_name','$cert_deg_type')";
    
    // Run Statement
    $result = mysqli_query($connection, $add_degcert);
    //var_dump($connection);
    // check if successful
    if($result){
        print'<div class="link">
        <p class="input--success">The degree certificate you add is now registered!</p>
</div>';
    }
		
		$_POST = [ ];
		
	} 
	else {
		print '<p class="input--error"> Please try again!';
	}
	
 } //end of handler
 
 
// start of form

?>
<div id="formTab">
<form action="degreecertificate_add.php" method="post" class="form--inline">
    <br>
	<p>
	    Course Name
	<select name="course_id">
	  <br>  
        <option selected="selected">Choose one</option>
	     <?php
        
            // Iterating through the courses array
            foreach($coursesArray as $key => $value) {
                //do something with your $key and $value;
                echo "<option value='$key'>$value</option>";
            }
        ?>
    </select></p>
<br>
	<p>
	    Certificate Degree Name
	    <input type="text" name="cert_deg_name" size="50">
	</p>
<br>
	<p>
	    Certificate Degree Type:
	    <select  name="cert_deg_type">
	       <option value="Degree">Degree</option>
	       <option value="Certificate">Certificate</option>
	    </select>
    </p>
<br><br>

	<p><input type="submit" name="submit" value="Submit"></p>

</form>
</div>
</main>
<?php include('includes/footer.php'); ?>