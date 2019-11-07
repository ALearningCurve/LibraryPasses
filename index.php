<!DOCTYPE html>
<html>

<div class="fullscreen nopadding">
  <div id="header">
    <img src="bromfield_trojan.jpeg" width="30px" />
    <ul>
      <li> Home </li>
    </ul>
  </div>

  <div class="header">
    <h1>Bromfield Library Passes</h1>
  </div>
</div>

<p>
<a href="login.php">Admin Login</a>
</p>

<div class="white nopadding more">
  <a id="more">&#x25BC;</a>
</div>

<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
<h1> Hi! </h1>

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<!DOCTYPE html>
<html>
<head>
<title> TBS Lib Pass Form </title>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>


</head>
<body>

<div class="container">
  <form action="/submission.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="semail">Your Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="semail" name="semail" placeholder="Your email..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Period">Period</label>
    </div>
    <div class="col-75">
      <select id="Period" name="Period">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Teacher">Teacher</label>
    </div>
    <div class="col-75">
      <select id="temail" name="temail">
        <?php
          require 'sqlmanager.php';
          drop_down_teacher_information();
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>




</body>
</html>
<style type = "text/css" media="screen">

@import url(https://fonts.googleapis.com/css?family=Signika+Negative:400,700);

html, body {
  height:100%;
  font-family: 'Signika Negative', sans-serif;
  font-size: 25px;
}cslot

html {
  background: url('https://2.bp.blogspot.com/-SUMDIuZ7m48/TeWj1YDWcNI/AAAAAAAABhg/9fjPiDZHwms/s1600/winter.JPG') fixed;
  background-size: 100%;
}

div {
  overflow: hidden;
}

a {
  color: #322bff;
  text-decoration: underline;
  transition: 500ms;
}
a:hover {
  color: #26a1ff;
}

p {
  padding: 0 5%;
}

img {
  box-shadow: 0px 0px 4px #000;
}

#header {
  background: rgba(255, 255, 255, .5);
  padding: 1%;
  overflow: hidden;
  height: 55px;
}
#header img {
  float: left;
  box-shadow: none;
}
#header ul {
  list-style: none;
  float: left;
  padding-left: 10px;
  margin-top: 15px;
}
header ul li {
  float: left;
  margin-left: 10px;
  font-size: 20px;
}

.fullscreen {
  height: 95%;
  position: relativtfnamee;
}
.fullscreen .header {
  position: absolute;
  bottom: 0;
  text-align: center;
  width: 100%;
  color: #fff;
  text-shadow: 0px 0px 2px #000;
}

.white {
  background: #eeeeec;
  padding: 0 5%;
}
.nobg {
  background: none;
  padding: 0 5%;
  color: #fff;
  text-shadow: 0px 0px 4px #000;
}
.semitrans {
  background: rgba(255, 255, 255, .5);
  padding: 0 5%;
}
.dark {
  color: #eeeeec;
  background: #010105;
  padding: 0 5%;
}

.nopadding {
  padding: 0;
}

.floatleft {
  float: left;
  margin: 2%;
}
.floatright {
  float: right;
  margin 2%;
}
