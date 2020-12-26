<?php
//intro text:
print '<h2>Student Note Creation Form</h2><div class="reg--p">
<p class="reg-p">Enter your notes about the student.  You will be able to edit this record in the future.</p></div>';

// has the form been submitted?
if($_SERVER{'REQUEST_METHOD'} == 'POST'){
	
	$problem = false; 
	
	// value check
	if(empty ($_POST{'user_id'})){
		$problem = true;
		print '<p class="input--error">Please input the name of the student.</p>';
	}
	
		if(empty ($_POST{'faculty_id'})){
		$problem = true;
		print '<p class="input--error">Please input your name</p>';
	}
	
	
	if(!$problem){
		
		
// 		connect to database

    require('mysqli_connect.php');
    // create variables
    $user_id = $_POST{'user_id'};
    $faculty_id = $_POST{'faculty_id'};
    $course_name = $_POST{'course_name'};
    $scholarship = $_POST{'scholarship'};
    $internship = $_POST{'internship'};
    $notes = $_POST{'notes'};
    

    // bulid insert statement
    $add_note ="INSERT INTO NOTES (user_id, faculty_id, course_name, scholarship, internship, notes) VALUES('$user_id','$faculty_id', '$course_name', '$scholarship', '$internship', '$notes')";
    
    // Run Statement
    $result = mysqli_query($connection, $add_note);
    
    // check if successful
    if($result){
        print'<div class="link">
        <p class="input--success">The new note has been recorded</p>
</div>';
    }
		
		$_POST = [ ];
		
	} 
	else {
		print '<p class="input--error"> Please try again';
	}
	
 } //end of handler
 
 
// start of form

?>