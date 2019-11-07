<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Verifying your Login Credentials</title>
</head>


<body>
  <p>Verifying..</p>
  <p>
    <?php
    require 'sqlmanager.php';

    $vuname = "libadmin";
    $vpsw = "69420";

    // Get and sanitize the input from the form
    $funame = sanatize_string($_POST['uname']);
    $fpsw = sanatize_string($_POST['psw']);

    // Check if the Credentials are correct
    if ($vuname == $funame  && $vpsw == $fpsw) {
      echo "Valid Login Credentials";
      header("Location: http://10.0.2.98:8888/sqlviewer.php");
    }

    echo "Incorrect Login Credentials";

    ?>
  </p>
</body>
</html>
