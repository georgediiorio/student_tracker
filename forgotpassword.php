<?php
/* --------
Filename: forgotpassword.php
Author: Tracy Johnson
Purpose: To trigger random password generation 
and email to user after click of forgot password link
--------  */
?>
<?php $pagetitle = 'Forgot Password'; ?>
<?php include('includes/header.php'); ?>
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('../mysqli_connect.php'); 

	// Assume nothing:
	$id = FALSE;

	// Validate the email address...
	if (!empty($_POST['email'])) {

		// Check for the existence of that email address...
		$query = 'SELECT user_id FROM USERS WHERE email="'.  mysqli_real_escape_string($connection, $_POST['email']) . '"';
		$result = mysqli_query($connection, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($connection));

		if (mysqli_num_rows($result) == 1) { // Retrieve the user ID:
			list($id) = mysqli_fetch_array($result, MYSQLI_NUM);
		} else { // No database match made.
			echo '<p class="error">The submitted email address does not match those on file!</p>';
		}

	} else { // No email!
		echo '<p class="error">You forgot to enter your email address!</p>';
	} // End of empty($_POST['email']) IF.

	if ($id) { // If everything's OK.

		// Create a new, random password:
		$p = substr(md5(uniqid(rand(), true)), 3, 15);
		// $ph = SHA2('$p',512);

		// Update the database:
        $query = "UPDATE USERS SET `password`='$p' WHERE user_id=$id LIMIT 1";
		$result = mysqli_query($connection, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($connection));
		

		if (mysqli_affected_rows($connection) == 1) { // If it ran OK.
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			// Send an email:
			$body ="<body class='w3-light-grey'>";
			$body .="<header>";
			$body .="<div style='color: white;'>";
			$body .="<a class='site_logo' href='index.php'>";
			$body .="<img class='site_logo_lbc' src='https://i.postimg.cc/9fn4FY5L/final-logo.png' 
			style='display: block; margin-left: auto; margin-right: auto;'/></a></div> ";
			$body .="</header>";
			$body .="<div class='message' style='margin: 5%;'>";
			$body .="<p><strong>Someone requested a new password for your LBC Student Tracker account.</strong></p>";
			$body .="<p>Your password to log into LBC Student Tracker has been temporarily changed to '$p'.</p>"; 
			$body .="<p>Please log in using this password and this email address. Then you may change your password to something more familiar.</p>";
			$body .="<p>If you didn't make this request, please notify us.</p>";
			$body .="<p>Your password reset is only valid for the next 30 minutes. </p>";
			$body .="</div><div class='signature' style='margin: 8%;'>";
			$body .="<p>Sincerely, </p>";
			$body .="<p>The LBC Student Tracker team</p>";
			$body .="</div><div class='footnote' style='margin: 5%;'>";
			$body .="<p>P.S. We're always around and love hearing from you. </p>"; 
			$body .="<p>Please get in touch if you want to ask something or even just to say hello!</p>";

			mail(trim($_POST['email']), 'Forgot Password Request', $body, 'From: admin@sitename.com');
			
			// Finish the page:
			echo '<h3>Thank you for requesting your password! An email has been sent to your address. 
			Please click on the link in that email in order to reset your password.</h3>';
						
			// for troubleshooting - to view email body
			// echo $body;

			mysqli_close($connection);
			exit(); // Stop the script.

		} else { // If it did not run OK.
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>';
		}

	} else { // Failed the validation test.
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($connection);

} // End of the main Submit conditional.
?>

<main>
            <div class="content"> 
                <section class="index-section">
                    <article class="index-article">
					<form action='forgotpassword.php' method="post">
						<h1>Reset Your Password</h1>
						<p>Enter your email address below to request a new password.</p>			
						<input type='email' name='email' size='20' maxlength='60' value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"
						placeholder="Email Address">

						<input type="submit" name="submit" value="Reset My Password">
					</form>
		</article>
	</section>
</main>
