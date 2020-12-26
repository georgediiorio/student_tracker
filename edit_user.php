<?php

/* Session and Redirect by Alex Green */
session_start(); // Start the session.
if ($_SESSION['user_role'] != "Admin") {

  // Need the functions:
  require('includes/login_functions_inc.php');
  redirect_user('unauthorized-access.php');
}

$pagetitle = 'Administration Profile Page';

include 'includes/header.php';
?>
<!DOCTYPE html>
<head>
	<title>LBC Tracker</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<style>


@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Crete+Round&display=swap');


*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'ABeeZee', sans-serif;
  list-style: none;
}

body{
/*   background: pink; */
  color: black;
}

.wrapper {
    width: 650px;
    height: auto;
    margin: 0 auto;
}

.wrapper .profile{
   width: 500px;
   margin-right: 25px;
}

.wrapper .profile .profile_img_info{
   display: flex;
   background: #fff;
/*    border-radius: 10px; */
  border-style: solid;
  border-color: #d3d3d3;
   margin-bottom: 25px;
}

.wrapper .profile .profile_img_info .img{
  width: 500px;
}

.wrapper .profile .profile_img_info .img img{
  width: 100%;
  display: block;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  
  
}

.wrapper .profile .profile_img_info .info{
    width: calc(100% - 125px);
    padding: 40px;
}

.wrapper .profile .profile_img_info .info .name{
  font-size: 24px;
  font-weight: 700;
  font-family: 'Crete Round', serif;
  margin-bottom: 5px;
}
.wrapper .profile .profile_img_info .info .text-muted {
  margin-bottom: 100px;
  font-family: 'ABeeZee', sans-serif;
}

.wrapper .profile .profile_img_info .place{
    font-weight: 300;
}

.changePhotoBtn {
  padding: 5px;
  text-align: center;
  text-decoration: none;
}

.changePhotoBtn:hover {
  background: #3e505b;
  transition: .5s;
  color: white;
}

.wrapper .profile .profile_skills{
  background: #fff;
/*   border-radius: 10px; */
  padding: 25px;
   border-style: solid;
  border-color: #d3d3d3;

}

.wrapper .profile .profile_skills .skills{
  padding-bottom: 20px;
  border-bottom: 1px solid #cccccc;
  display: flex;
  flex-direction: column;
}

.wrapper .profile .profile_skills .skills p{
  text-transform: uppercase;
  font-weight: 700;
  font-size: 18px;
  margin-bottom: 10px;
}

/*textarea*/
.wrapper .profile .profile_skills .form{
  display: flex;
  flex-direction: column;
  padding-top: 20px;
  margin-bottom: 20px;
}
.wrapper .profile .profile_skills .about_me{
  padding-bottom: 10px;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 18px;
  margin-bottom: 10px;
}

.wrapper .profile .profile_skills .text_area {
  padding: 10px;
  display: block;
}

.social {
  display:inline-block;
  width:32.7%;
  margin-right: 50px;
}

.input {
  padding: 5px;
}

.url {
  border-top: 1px solid #cccccc;
  padding-top: 20px;
}
.wrapper .profile .url .url_title{
  text-transform: uppercase;
  font-weight: 700;
  font-size: 18px;
  padding-bottom: 10px;
}

.wrapper .profile .profile_skill_div .change_password{
  padding-bottom: 10px;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 18px;
  margin-bottom: 10px;
  border-top: 1px solid #cccccc;
  padding-top: 20px;
}
.wrapper .profile .profile_skill_div .password{
  padding-top: 20px;
/*   border-top: 1px solid #cccccc; */
}


.form-group {
  padding: 4px;
}

  .form-control {
    padding: 5px;
  }

/* .change_password {
  display: flex;
  flex-direction: column;
} */
.btns_submit{
  padding: 20px;
  text-align: center;
  text-decoration: none;
  
}
.btn_cancel {
  padding: 5px;
  cursor: pointer;
  font-size: 14px;
}
.btn_saveChanges {
  padding: 5px;
  cursor: pointer;
  font-size: 14px;
  border-color:white;
  background-color: rgb(138,176,171,.9);
}
.btn_saveChanges:hover {
  background: #3e505b;
  transition: .5s;
  color: white;
}
.btn_cancel:hover {
  background: #3e505b;
  transition: .5s;
  color:white;
}

	</style>
</head>


<div class="wrapper">
    <div class="profile">
        <div class="profile_img_info">         
             <div class="img">
                <img src="https://i.postimg.cc/Nf5DVHzk/profile-pic.png" alt="profile_pic">     
             </div>
             <div class="info">
                  <p class="name">Mark Doe</p>
                  <div class="text-muted"><small>Last login: 12/01/2020</small></div>
                   <button class="changePhotoBtn" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>   
             </div>
        </div>
        <div class="profile_skills">
            <div class="skills">
                <p>Interests</p>       
           <div class="custom-checkbox">   
              <ul class="checkbox-list">
      <li>
        <input type="checkbox" id="">
          <label for="">Front End Developer</label>
      </li>
      <li>
        <input type="checkbox" id="" checked>
          <label for="">Back End Developer</label>
      </li>
      <li>
        <input type="checkbox" id="">
          <label for="">Web Developer</label>
      </li>
      <li>
        <input type="checkbox" id="">
          <label for="">Database</label>
      </li> 
      <li>
        <input type="checkbox" id="">
          <label for="">Intership</label>
      </li>
      <li>
        <input type="checkbox" id="">
          <label for="">Tutor</label>
      </li>
  </ul>
  </div>
          </div>
            <div class="form">
                  <label class="about_me">About Me</label>
                    <textarea class="text_area" rows="5" placeholder="About Me"></textarea>
            </div>
              <div class="url">
                <div><label class="url_title">URLs</label></div>
               <div class="social">
                <label class="url_label" for="input">Portolio</label>	
	                <input class="input e" type="text" id="input">
               </div>
               <div class="social r1">
                <label class="label" for="input">Resume</label>	
	                <input class="input e" type="text" id="input">
                </div>
                </div>
              
          <div class="profile_skill_div">
            <div class="password">
              <div class="change_password"><b>Change Password</b></div>
              <div> <label>Current Password</label></div>
                    <input class="form-control" type="password" placeholder="••••••">
            </div>
            <div class="form-group">
              <div> <label>New Password</label></div>
                     <input class="form-control" type="password" placeholder="••••••">
            </div>
            <div class="form-group">
              <div> <label>Confirm Password</label></div>
                     <input class="form-control" type="password" placeholder="••••••"></div>
            </div>
          
            <div class="btns_submit">
              <button class="btn_cancel" type="submit">Cancel</button>
              <button class="btn_saveChanges" type="submit">Save Changes</button>
</div>
</html>