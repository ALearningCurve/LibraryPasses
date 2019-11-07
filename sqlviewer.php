<!DOCTYPE html>
<html>
<head>
<title> TBS Lib Passes Admin Options</title>
<style>

html * {
  font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

h1 {
  font-size: 60px;
}

p {
    font-size: 15px;
    color: grey;
}

#warning {
  font-size: 12px;
  color: red;
}
#sql {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#sql td, #sql th {
  border: 1px solid #ddd;
  padding: 8px;
}

#sql tr:nth-child(even){background-color: #cce5ff;}

#sql tr:hover {background-color: #006fe6;}

#sql th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #004a99;
  color: white;
}
</style>
</head>

<?php

    require "sqlmanager.php";  # the "import" statement to get the sqlmanager.php functions to be included here

    /*
    Needs to be implemented in the other functions
    // This variable shows the previous admin use operated sucessfully or no
    if (isset($_GET['status'])) {
      if ($_GET['status'] == "success") {
        echo'<p><font color="green">Action Completed</font></p>';
      }

      if ($_GET['status'] == "failure") {
        echo '<p><font color="red">Action Failed   <i>(Something you entered probably doesn\'t exist)</i></font></p>';
      }
    }
    */


    print_database_information();


    // If the user submitted that they wanted to reset all the passes 'rall' will equal 1
    // if passes reset, it will then reset the url so that a page refresh won't accidentally
    // empty the Database
    if (isset($_GET['rall']) && sanatize_string($_GET['rall']) == 1){
      reset_all_passes();
      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");
    }


    // If the user has submitted the information required to make a student, then it will take that information to make a student
    if (isset($_GET['semail']) && isset($_GET['sfname']) && isset($_GET['slname'])){
      make_new_student(sanatize_string($_GET['sfname']), sanatize_string($_GET['slname']), sanatize_string($_GET['semail']));
      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");
    }

    // If the user has submitted the information required to make a teacher, then it will take that information to make a teacher
    if (isset($_GET['temail']) && isset($_GET['tfname']) && isset($_GET['tlname'])){
      make_new_teacher(sanatize_string($_GET['tfname']), sanatize_string($_GET['tlname']), sanatize_string($_GET['temail']));


      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");

    }

    // If the user has submitted the information required to delete a pass, then it will take that information to remove that pass from the 'Passes' table
    // And it will then use that information to
    if (isset($_GET['rpassid']) && isset($_GET['rpassslot'])){
      $pass_id = validate_pass($_GET['rpassid']);
      $slot_id = validate_slot_id($_GET['rpassslot']);

      // Since the id will return -1 if not real, then it will error here before the method is called
      if ($pass_id < 0 || $slot_id <0) {
        echo '<script language="javascript">';
        echo 'alert("Invalid information has been entered! \n\n\|--------------------------------------------------------------| \n| Something you entered does not exist! |\n|--------------------------------------------------------------|")';
        echo '</script>';
        header("Location: http://10.0.2.98:8888/sqlviewer.php?status=failure");
      } else {
          delete_pass($pass_id);
          delete_pass_from_slot($slot_id, $pass_id);
      }


      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");
    }

    // If the user has submitted the information required to ID a teacher or student, then it will remove the specified item
    if (isset($_GET['remail']) && isset($_GET['rfname']) && isset($_GET['rlname']) && isset($_GET["rteacherorstudent"]))   {

      // if ($_GET["rteacherorstudent"] == 1 && validate_teacher(sanatize_string($_GET['rfname']), sanatize_string($_GET['rlname']), sanatize_string($_GET['remail'])) >=0) {
      if ($_GET["rteacherorstudent"] == 1) {
        remove_teacher(sanatize_string($_GET['rfname']), sanatize_string($_GET['rlname']), sanatize_string($_GET['remail']));
      }
    //  else if ($_GET["rteacherorstudent"] == 0 && validate_student(sanatize_string($_GET['rfname']), sanatize_string($_GET['rlname']), sanatize_string($_GET['remail'])) >= 0) {
      else if ($_GET["rteacherorstudent"] == 0) {
        remove_student(sanatize_string($_GET['rfname']), sanatize_string($_GET['rlname']), sanatize_string($_GET['remail']));
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Invalid information has been entered! \n\n\|--------------------------------------------------------------| \n| Something you entered does not exist! |\n|--------------------------------------------------------------|")';
        echo '</script>';
        header("Location: http://10.0.2.98:8888/sqlviewer.php?status=failure");
      }

      reset_all_passes();
      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");
    }

    // If the user has submitted the information required to make a teacher, then it will take that information to make a teacher
    if (isset($_GET['cslot']) && isset($_GET['max_students'])){
      change_max_students(sanatize_string($_GET['cslot']), sanatize_string($_GET['max_students']));

      header("Location: http://10.0.2.98:8888/sqlviewer.php?status=success");
      reset_all_passes();
    }

?>

<h1> Admin Actions </h1>

<h3>Reset Passes</h3>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <select id="rall" name="rall">
    <option value="0">Nothing</option>
    <option value="1">Reset All</option>
  </select>
  <input type = "submit" />
</form>

<h3>Remove a Pass</h3>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <input type="text" id="rpassid" name="rpassid" placeholder="Pass ID to remove.." required>
  <input type="text" id="rpassslot" name="rpassslot" placeholder="Slot of pass to remove.." required>
  <input type = "submit" />
</form>


<h3>Add a Student</h3>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <input type="text" id="sfname" name="sfname" placeholder="Student Firstname.." required>
  <input type="text" id="slname" name="slname" placeholder="Student Lastname.." required>
  <input type="text" id="semail" name="semail" placeholder="Student Email.." required>
  <input type = "submit" />
</form>

<h3>Add a Teacher</h3>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <input type="text" id="tfname" name="tfname" placeholder="Teacher Firstname.." required>
  <input type="text" id="tlname" name="tlname" placeholder="Teacher Lastname.." required>
  <input type="text" id="temail" name="temail" placeholder="Teacher Email.." required>
  <input type = "submit" />
</form>

<h3>Remove a Student or Teacher</h3> <p id="warning">** Performing these actions will reset the passes ** </p>

<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <input type="text" id="rfname" name="rfname" placeholder="Firstname.." required>
  <input type="text" id="rlname" name="rlname" placeholder="Lastname.." required>
  <input type="text" id="remail" name="remail" placeholder="Email.." required>

  <select id="rteacherorstudent" name="rteacherorstudent">
    <option value="0">Student</option>
    <option value="1">Teacher</option>
  </select>
  <input type = "submit" />
</form>

<h3>Change Max Students in Slot</h3> <p id="warning">** Performing these actions will reset the passes ** </p>
<form action = "<?php $_PHP_SELF ?>" method = "GET">
  <select id="cslot" name="cslot">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
    <option value="F">F</option>
    <option value="G">G</option>
  </select>
  <input type="text" id="max_students" name="max_students" placeholder="Max Students.." required>
  <input type = "submit" />

</form>
</html>
