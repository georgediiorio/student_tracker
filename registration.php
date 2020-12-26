<?php
/* --------
Filename: registration.php
Author: Alex Green
Purpose: Form to add users to the database
--------  */

$pagetitle = 'Create an Account';

include ('includes/header.php');

function redirect_user($page = 'index.php') {

	// Start defining the URL...
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	// Remove any trailing slashes:
	$url = rtrim($url, '/\\');

	// Add the page:
	$url .= '/' . $page;

	// Redirect the user:
	header("Location: $url");
	exit(); // Quit the script.

}
?>

<main>
         <div class="video-block">
            <video autoplay muted loop id="myVideo">
             <source src="lbcc.mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" type="video/mp4">
             Your browser does not support HTML5 video.
            </video>
            <div class="content"> 
                <section class="index-section">
                    <article class="index-article">
			<form action="registration.php" method="post" class="form-area">
			<h2>Register</h2>
			<?php 
			// Check if the form has been submitted:
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$problem = false; // No problems so far.
				
				// Check for each value...
				if (empty($_POST['first-name'])) {
					$problem = true;
					print '<p><span class="form-error">Please enter your first name.</span></p>';
				}
				
				if (empty($_POST['last-name'])) {
					$problem = true;
					print '<p><span class="form-error">Please enter your last name.</span></p>';
				}

				if (empty($_POST['email'])) {
					$problem = true;
					print '<p><span class="form-error">Please enter your email address.</span></p>';
				}

				if (empty($_POST['phone-number'])) {
					$problem = true;
					print '<p><span class="form-error">Please enter your phone number.</span></p>';
				}

				if (empty($_POST['password'])) {
					$problem = true;
					print '<p><span class="form-error">Please enter a password!</span></p>';
				}

				if ($_POST['password'] != $_POST['confirm-password']) {
					$problem = true;
					print '<p><span class="form-error">Your password did not match your confirmed password!</span></p>';
				} 
				
				if (!$problem) { // If there weren't any problems...

					// Add user to database
					$firstname = $_POST['first-name'];
					$lastname = $_POST['last-name'];
					$email = $_POST['email'];
					$phonenumber = $_POST['phone-number'];
					//$userrole = $_POST['user-role'];
					//$password = $_POST['password'];
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					
					// Create the activation code:
					$a = md5(uniqid(rand(), true));

					require('mysqli_connect.php');

					$sql = "INSERT INTO USERS (first_name, last_name, email, phone_number, password, user_role, major, status, department_id)
			        VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $phonenumber . "','" . $password . "', 'Student', '', 'active', '1' )";

					$confirmemailbutton = '<button type="submit">Confirm Email</button>';

					// Send an email:
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$body ="<body class='w3-light-grey'>";
					$body .="<header>";
					$body .="<div style='color: white;'>";
					$body .="<a class='site_logo' href='index.php'>";
					$body .="<img class='site_logo_lbc' src='https://i.postimg.cc/9fn4FY5L/final-logo.png' 
					style='display: block; margin-left: auto; margin-right: auto;'/></a></div> ";
					$body .="</header>";
					$body .= "Thank you for registering at LBC Student Tracker. To activate your account, please click on this link:\n\n";
					$body .="<a href='activate.php?x='. urlencode($email) . '&y=$a' class='w3-bar-item w3-button'>Confirm Email</a>";
					mail(trim($_POST['email']), 'Registration Confirmation', $body, 'From: admin@sitename.com');

				// Finish the page:
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				// echo $body;
				include('includes/footer.php'); // Include the HTML footer.
				exit(); // Stop the page.
					// ----end of code revision ----

					if (mysqli_query($connection, $sql)) {
					  //echo '<p><span class="form-success">' . $firstname . ' ' . $lastname . ', your account has been successfully registered.</span></p>';
						redirect_user('login.php');
					  // for troubleshooting - to view email body
					  // echo $body;

					} else {
					  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
					}

					mysqli_close($connection);		

					// Clear the posted values:
					$_POST = [];
				
				} else { // Forgot a field.
				
					print '<p><span class="form-error">Please try again!</span></p>';
					
				}

			} // End of handle form IF.
			?>


				
					<input type="text" name="first-name" id="first-name" placeholder="First Name" value="<?php if (isset($_POST['first-name'])) { print htmlspecialchars($_POST['first-name']); } ?>">
				

				
					<input type="text" name="last-name" id="last-name" placeholder="Last Name" value="<?php if (isset($_POST['last-name'])) { print htmlspecialchars($_POST['last-name']); } ?>">
				

				
					<input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>">
				

			
					<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone-number" id="phone-number" placeholder="Phone Number" value="<?php if (isset($_POST['phone-number'])) { print htmlspecialchars($_POST['phone-number']); } ?>">
				<!-- updated code -->
				<small>Format: 123-456-7890</small><br />
			
					<!--
						<select name="user-role">
							<option selected value="<?php //if (isset($_POST['user-role'])) { print htmlspecialchars($_POST['user-role']); } ?>">Select Role</option>
							<option value="Student">Student</option>
							<option value="Faculty">Faculty</option>
							<option value="Admin">Admin</option>
						</select>
					-->
					
			
					<input type="password" name="password" id="password" placeholder="Password">
			
			
				<input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="confirm-password" id="confirm-password" placeholder="Password">
				<small>Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)</small><br />
				<!-- updated code -->
			
				<input type="submit">
			
			</form>
		</article>
	</section>
</main>

