<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Verifying your Login Credentials</title>

<style>
header {
	text-align: left;
  padding: 20px 0;
}

body {
  background: #2980b9;
  color: #FFF;
  font-family: Helvetica;
  text-align: center;
  margin: 0;
}

li, ul {
  text-align: center;
}

</style>
</head>


<body>
  <header> Verifying..</header>

    <?php
    require 'sqlmanager.php';

    $vuname = "libadmin";
    $vpsw = "admin1";

    // Get and sanitize the input from the form
    $funame = sanatize_string($_POST['uname']);
    $fpsw = sanatize_string($_POST['psw']);

    // Check if the Credentials are correct
    if ($vuname == $funame  && $vpsw == $fpsw) {
      echo "Valid Login Credentials";
      header("Location: http://10.0.2.98:8888/sqlviewer.php");
    }

    echo "<h1> Incorrect Login Credentials </h1>";

    ?>

</body>
</html>
