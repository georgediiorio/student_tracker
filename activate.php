<?php 
require('includes/config.inc.php');
$page_title = 'Activate Your Account';
include('includes/inc_navbar.php');


if (isset($_GET['x'], $_GET['y'])
	&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)
	&& (strlen($_GET['y']) == 32 )
	) {

	// Update the database...
	require(MYSQL);
	//$q = "UPDATE users SET active=NULL WHERE (email='" . mysqli_real_escape_string($connection, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($connection, $_GET['y']) . "') LIMIT 1";
	$q = "UPDATE USERS SET status='Active' WHERE (email='" . mysqli_real_escape_string($connection, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($connection, $_GET['y']) . "') LIMIT 1";
	$r = mysqli_query($connection, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($connection));

	// Print a customized message:
	if (mysqli_affected_rows($connection) == 1) {
		echo "<h3>Your account is now active. You may now log in.</h3>";
	} else {
		echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>';
	}

	mysqli_close($connection);

} else { 

	$url = BASE_URL . 'index.php'; 
	ob_end_clean(); 
	header("Location: $url");
	exit(); 

} 

include('includes/inc_footer.php');
?>