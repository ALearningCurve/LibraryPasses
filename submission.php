<!DOCTYPE html>
<html>
<head>
<title> TBS Lib Pass Submission </title>

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

<header> TBS Library Passes: Submission </header>
<?php
    require "sqlmanager.php";  # the "import" statement to get the sqlmanager.php functions to be included here

    $student_key = get_student_from_form();
    $teacher_key = get_teacher_from_form();
    $slot_key = get_slots_from_form();

    // Checks if any of the inputs is invalid and doesn't exist
    // Doing this will prevent an invalid form from being entered into the table
    if ($teacher_key < 0 || $student_key < 0 || $slot_key < 0)
    {

      echo '<script language="javascript">';
      echo 'alert("Invalid information has been entered! \n\n\|--------------------------------------------------------------| \n| Something you entered does not exist! |\n|--------------------------------------------------------------|")';
      echo '</script>';

      echo "<h1> Resubmit form addressing these errors: </h1>";

      // Display a the missing items in a list format
      echo "<ul>";
      if ($teacher_key < 0){
        echo "<li> Teacher name not found </li>";
      }

      if ($student_key < 0){
        echo "<li> Student not found </li>";
      }

      if ($slot_key < 0) {
        echo "<li> Period/Block not found </li>";
      }

      echo "</ul>";
      die ("<h1> Resubmit the form with the correct information </h1> <br>");
    }

    // Checks if the period/slot of the desired pass is full already
    // If full, then the pass will not be created
    if (check_slot_full($slot_key) == 1)
    {
      echo '<script language="javascript">';
      echo 'alert("\nThe slot/period is full!\n\n\nTry checking to make sure that slot you entered is correct")';
      echo '</script>';

      die ("<h1> The period/slot you are tyring to enter is full! <h1> Please Resubmit the form with a period that is not full");
    }

    // Uses the information entered from the form to make a pass and insert it into the table
    process_new_pass($student_key, $teacher_key, $slot_key);


    echo "<span style=Trebuchet MS: sans-serif/>";
    echo ("<h1>Congrats, your pass has been made!!!! </h1>");


?>
</html>
