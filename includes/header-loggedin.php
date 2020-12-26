<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $pagetitle; ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="/lbcc/cosw30/alpha-team-project/css/style-proposed.css"> Temp CSS by Alex Green -->
    <link rel="stylesheet" href="https://use.typekit.net/orz0dyh.css">
    <script src="https://kit.fontawesome.com/8f98c091c3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="faculty.css">
    <link rel="stylesheet" href="assets-user.css">

</head>

<body class="w3-light-grey">
    <header>
        <div style="color: white; text-align: right;"><?php print_r($_SESSION); ?></div>
        <a class="site_logo" href="index.php">
            <img class="site_logo_lbc" src="https://i.postimg.cc/9fn4FY5L/final-logo.png" />
            <span class="site_name"> Alpha Team </span>
    </header>

    <div class="navbar">
        <a href="profile.php">Profile</a>
        <a href="news.php">News</a>
        <a href="directory.php">Directory</a>

<?php 

if ($_SESSION['user_role'] == "Admin") {

echo '<!-- admin navigation -->
        <div class="dropdown">
            <button class="dropbtn">Admin
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
                <a href="admin-users.php" class="w3-bar-item w3-button">Users</a>
                <a href="departments.php" class="w3-bar-item w3-button">Departments</a>
                <a href="degree-certificate.php" class="w3-bar-item w3-button">Degrees and Certificates</a>
                <a href="courses.php" class="w3-bar-item w3-button">Course</a>
            </div>
        </div>';
}


if ($_SESSION['user_role'] == "Faculty") {

echo '<!-- faculty navigation -->
        <div class="dropdown">
          <button class="dropbtn">Faculty
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
            <a href="faculty-users.php" class="w3-bar-item w3-button">Students</a>
            <a href="departments.php" class="w3-bar-item w3-button">Departments</a>
            <a href="degree_certificate.php" class="w3-bar-item w3-button">Degrees and Certificates</a>
            <a href="courses.php" class="w3-bar-item w3-button">Course</a>
          </div>
        </div>';
}

if ($_SESSION['user-role'] == "Student") {

  echo '<!-- student navigation -->
          <div class="dropdown">
            <button class="dropbtn">Student
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="student-home.php" class="w3-bar-item w3-button">Dashboard</a>
            </div>
          </div>';
        }
          
?>
        <a href="logout.php">Logout</a>
    </div>