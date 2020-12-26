<?php 

require('mysqli_connect.php');

$query_users ="";
$result_users = "";

$query_users = 'SELECT * FROM USERS';
$result_users = mysqli_query($connection, $query_users);

$users_admin = "0";
$users_faculty = "0";
$users_student = "0";
$users_total = "0";
$users_active = "0";
$users_inactive = "0";

	while ($row_users = mysqli_fetch_assoc($result_users)) {

		if ($row_users['user_role'] == "Admin"){
			$users_admin++;
		}
		if ($row_users['user_role'] == "Faculty"){
			$users_faculty++;
		}
		if ($row_users['user_role'] == "Student"){
			$users_student++;
		}
		if ($row_users['status'] == "Active"){
			$users_active++;
		}
		if ($row_users['status'] == "Inactive"){
			$users_inactive++;
		}
	}

	$users_total = $users_admin + $users_faculty + $users_student;
?>

<script src="https://kit.fontawesome.com/8f98c091c3.js" crossorigin="anonymous"></script>

<style>
	.dashboard-circle {
		border-radius: 50%;
		height: 265px;
		padding: 45px 0 0 0;
		text-align: center;
		width: 300px;
	}

	.dashboard-users {
		background-color: red;
		color: white;
	}

	.dashboard-courses {
		background-color: orange;
		color: white;
	}

	.dashboard-degrees-certs {
		background-color: magenta;
		color: white;
	}

	.lg-icon  {
		font-size: 200px;
	}
	.sm-icon {
		font-size: 50px;
	}
</style>
	<div class="dashboard-circle dashboard-users">
		<i class="fas fa-users lg-icon"></i>
	</div><!-- dashboard-users -->
	
	<h3>Users</h3>

	<ul>
		<li><a href="admin-user-add.php"><i class="fas fa-plus-circle sm-icon"></i>Add New</a></li>
		<li><a href="admin-user-edit.php"><i class="fas fa-edit sm-icon"></i>View / Edit</a></li>
	</ul>

	<p>
		Admins: <?php echo $users_admin; ?><br />
		Faculty: <?php echo $users_faculty; ?><br/>
		Students: <?php echo $users_student; ?><br />
		Active Users: <?php echo $users_active; ?><br />
		Inactive Users: <?php echo $users_inactive; ?><br />
		Total Users: <?php echo $users_total; ?>
	</p>
	
	<div class="dashboard-circle dashboard-courses">
		<i class="fas fa-book lg-icon"></i>
	</div><!-- dashboard-courses -->
	
	<h3>Courses</h3>

	<ul>
		<li><a href="course-add.php"><i class="fas fa-plus-circle sm-icon"></i>Add New</a></li>
		<li><a href="courses-edit.php"><i class="fas fa-edit sm-icon"></i>View / Edit</a></li>
	</ul>
	
	<div class="dashboard-circle dashboard-degrees-certs">
		<i class="fas fa-graduation-cap lg-icon"></i>
	</div>

	<h3>Degrees and<br />Certifications</h3>

	<ul>
		<li><a href="degrees-certificate-add.php"><i class="fas fa-plus-circle sm-icon"></i>Add New</a></li>
		<li><a href="degrees-certificate-edit.php"><i class="fas fa-edit sm-icon"></i>View / Edit</a></li>
	</ul>