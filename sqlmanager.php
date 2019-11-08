<?php
  /*
  PHP script to interact with the mysql database located locally on the server computer and then provide certain functions to display and change its content

  Variables on lines 14-17 must be updated to accurately reflect the actual database credentials
  */


  // returns a connection and adds the connection to the database into the global variable socket_create_listen
  // Should be closed after transaction is complete with $GLOBALS['conn']->close();
  function make_connection()
  {
    // Info to connect to database
    $servername = 'localhost'; // <-- Change only if the database is not hosted on the same machine
    $username = 'williamws'; // Change this login
    $passcode = 'williamws'; // Change this passcode
    $databasename = 'LibraryPasses';  // Change this if the database is named differently

    $conn = new mysqli($servername, $username, $passcode, $databasename);
    $GLOBALS['conn'] = $conn; // adds the connection to the list of global variables

    // If cannot connect then quit the script
    if ($GLOBALS['conn']->connect_error)
    {
      die('<h1> FAILURE to connect to server: ' . $GLOBALS['conn']->connect_error . "</h1>"); // Displays error and then quits
    }

    return $conn; // returns the connection so that it can be accessed outside of this file
  }


  // Gets all the students from the table and prints out their information in the form of a table
  function print_student_information($conn)
  {
    // Get Info from a table
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo "<br> <h2> Students </h2>";

    // Get row numbers
    $num_rows = mysqli_num_rows($result);
    echo "<p>Number of rows: " . $num_rows . "</p><br>";


    echo '<table id="sql">';
    echo  '<tr>';
    echo    '<th>ID</th>';
    echo    '<th>Name</th>';
    echo    '<th>Email</th>';
    echo '</tr>';

    // Print out info from Querried mysql_list_table
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo '<tr>';
        echo  '<td>'.$row["id"].'</td>';
        echo  '<td>'.$row["firstname"]. " ".$row["lastname"].'</td>';
        echo  '<td>'.$row["email"].'</td>';
        echo '</tr>';

        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
      }
    }
    else
    {
        echo "<p id=noresults>0 results</p>";
    }

    echo '</table>';
  }

  // Gets all the teachers from the table and prints out their information in the form of a table
  function print_teacher_information($conn)
  {
    // Get Info from a table
    $sql = "SELECT * FROM Teachers";
    $result = mysqli_query($conn, $sql);
    echo "<br> <h2> Teachers </h2>";

    // Get row numbers
    $num_rows = mysqli_num_rows($result);

    echo "<p>Number of rows: " . $num_rows . "</p><br>";

    echo '<table id="sql">';
    echo  '<tr>';
    echo    '<th>ID</th>';
    echo    '<th>Name</th>';
    echo    '<th>Email</th>';
    echo '</tr>';

    // Print out info from Querried mysql_list_table
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo '<tr>';
        echo  '<td>'.$row["id"].'</td>';
        echo  '<td>'.$row["firstname"]. " ".$row["lastname"].'</td>';
        echo  '<td>'.$row["email"].'</td>';
        echo '</tr>';
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
      }
    }
    else
    {
        echo "<p id=noresults>0 results</p>";
    }

    echo '</table>';
  }


  // Gets all the teachers from the table and prints out their information such that it appears as a drop down multiple choice menu
  function drop_down_teacher_information()
  {
    make_connection();
    $sql = "SELECT * FROM Teachers";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    $num_rows = mysqli_num_rows($result);

    // Print out info from Querried mysql_list_table
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo  '<option value= '.$row["email"] .'>' . $row["email"] . '    ------    (' . $row["firstname"] . " " . $row["lastname"] . ')' . '</option>';
      }
    }
  }

  // Gets all the slots from the table and prints out their information in the form of a table
  function print_slot_information($conn)
  {
    // Get Info from a table
    $sql = "SELECT * FROM Slots";
    $result = mysqli_query($conn, $sql);
    echo "<br> <h2> Slots </h2>";

    // Get row numbers
    $num_rows = mysqli_num_rows($result);
    echo "<p>Number of rows: " . $num_rows . "</p><br>";


    echo '<table id="sql">';
    echo  '<tr>';
    echo    '<th>ID</th>';
    echo    '<th>Block</th>';
    echo    '<th>Passes</th>';
    echo    '<th>Max Students</th>';
    echo '</tr>';

    // Print out info from Querried mysql_list_table
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {

          echo '<tr>';
          echo  '<td>'.$row["id"].'</td>';
          echo  '<td>'.$row["block"].'</td>';
          echo  '<td>'.$row["passes"].'</td>';
          echo  '<td>'.$row["max_students"].'</td>';
          echo '</tr>';
          // echo "id: " . $row["id"] . "- block: " . $row["block"] . "- passes: " . $row["passes"] . "- max_students: " . $row["max_students"] . "<br>";
      }
    }
    else
    {
        echo "<p id=noresults>0 results</p>";
    }

      echo '</table>';
  }



  // Gets all the Passes from the table and prints out their information in the form of a table
  function print_passes_information($conn)
  {
    // Get Info from a table
    $sql = "SELECT * FROM Passes";
    $result = mysqli_query($conn, $sql);
    echo "<br> <h2> Passes </h2>";

    // Get row numbers
    $num_rows = mysqli_num_rows($result);
    echo "<p>Number of rows: " . $num_rows . "</p><br>";

    echo '<table id="sql">';
    echo  '<tr>';
    echo    '<th>ID</th>';
    echo    '<th>Student ID</th>';
    echo    '<th>Teacher ID</th>';
    echo    '<th>Slot ID</th>';
    echo '</tr>';

    // Print out info from Querried mysql_list_table
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
          echo '<tr>';
          echo  '<td>'.$row["id"].'</td>';
          echo  '<td>'.$row["student_key"].'</td>';
          echo  '<td>'.$row["teacher_key"].'</td>';
          echo  '<td>'.$row["slot_key"].'</td>';
          echo '</tr>';
          // echo "id: " . $row["id"] . "- student_key: " . $row["student_key"] . "- teacher_key: " . $row["teacher_key"] . "- slot_key: " . $row["slot_key"]. "<br>";
      }
      echo '</table>';
    }
    else
    {
        echo '</table>';
        echo "<p id=noresults>0 results</p>";
    }
  }

  // Displays the information in all of the tables
  function print_database_information()
  {
    make_connection();
    echo "<h1> Database Information </h1>";
    print_student_information($GLOBALS['conn']);
    print_teacher_information($GLOBALS['conn']);
    print_passes_information($GLOBALS['conn']);
    print_slot_information($GLOBALS['conn']);
    $GLOBALS['conn']->close();
  }


  // Makes a student row in the table Students in the LibraryPasses Database
  function make_new_student($firstname, $lastname, $email)
  {
    make_connection();

    // Fomat mysqli_query
    $sql = "INSERT INTO `Students` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES (NULL, '$firstname', '$lastname', '$email', CURRENT_TIMESTAMP)";
    $result = mysqli_query($GLOBALS['conn'], $sql);

    $GLOBALS['conn']->close();
  }

  // Makes a teacher row in the table Teachers in the LibraryPasses Database
  function make_new_teacher($firstname, $lastname, $email)
  {
    make_connection();

    // Fomat mysqli_query
    $sql = "INSERT INTO `Teachers` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES (NULL, '$firstname', '$lastname', '$email', CURRENT_TIMESTAMP)";
    $result = mysqli_query($GLOBALS['conn'], $sql);

    $GLOBALS['conn']->close();
  }



  // Makes a pass row in the table Passes in the LibraryPasses Database
  // Return the pass id
  function make_new_pass($student_key, $teacher_key, $slot_key)
  {
    make_connection();

    // Fomat mysqli_query
    $sql = "INSERT INTO `Passes` (`id`, `student_key`, `teacher_key`, `slot_key`,  `reg_date`) VALUES (NULL, '$student_key', '$teacher_key', '$slot_key', CURRENT_TIMESTAMP)";
    $result = mysqli_query($GLOBALS['conn'], $sql);

    $GLOBALS['conn']->close();

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Passes where student_key IN ('$student_key') AND teacher_key IN ('$teacher_key') AND slot_key IN ('$slot_key')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $pass_id = -1;
    while($row = $result->fetch_assoc())
    {

        $pass_id = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $pass_id;
  }


  //  outputs html of the variables that were entered into the form to display it onto a website
  function display_form_data()
  {
    echo "<br><h1> Info From Form </h1>";
    echo "Name: " . $_GET["firstname"] . " " . $_GET["lastname"] . "<br>";
    echo "Student Email: " . $_GET["semail"] . "<br>";
    echo "Period: " . $_GET["Period"] . "<br>";
    echo "Teacher: " . $_GET["temail"] . "<br>";
    echo "<br><br><br>";
  }

  // Makes a student from form data and returns the value of the id of the new student
  function make_student_from_form()
  {
    // Gets the inputs from the form and sanitaizes it
    $first = sanatize_string($_GET["firstname"]);
    $last = sanatize_string($_GET["lastname"]);
    $email = sanatize_string($_GET["semail"]);


    make_new_student($first, $last, $email);

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Students where firstname IN ('$first') AND lastname IN ('$last') AND email IN ('$email')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $student_id = -1;
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
        $student_id = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $student_id;
  }

  // Makes a student from form data and returns the value of the id of the new student
  // Return -1 if it does not exist
  function get_student_from_form()
  {
    // Gets the inputs from the form and sanitaizes it
    $first = sanatize_string($_GET["firstname"]);
    $last = sanatize_string($_GET["lastname"]);
    $email = sanatize_string($_GET["semail"]);

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Students where firstname IN ('$first') AND lastname IN ('$last') AND email IN ('$email')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $student_id = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
        $student_id = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $student_id;
  }


  // gets a teacher from form data and returns the value of the id of the new teacher
  // Return -1 if it does not exist
  function get_teacher_from_form()
  {
    // Gets the inputs from the form and sanitaizes it
    $email = sanatize_string($_GET['temail']);

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Teachers where email IN ('$email')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $teacher_key = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
        $teacher_key = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $teacher_key;

  }

  // Gets a period from the form and returns the id of the block
  // Return -1 if it does not exist
  function get_slots_from_form()
  {
    // Gets the inputs from the form and sanitaizes it

    $block = sanatize_string($_GET["Period"]);

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Slots where block IN ('$block')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $slot_key = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Block: " . $row["block"]. " - Passes: " . $row["passes"] . " MaxStudents: " . $row["max_students"] . "<br>";
        $slot_key = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $slot_key;

  }

  // Gets a period from the parameter and returns the id of the block
  // Return -1 if it does not exist
  function validate_slot_block($block)
  {

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Slots where block IN ('$block')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $slot_key = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Block: " . $row["block"]. " - Passes: " . $row["passes"] . " MaxStudents: " . $row["max_students"] . "<br>";
        $slot_key = $row["id"];
    }

    // returns the id slot given as a param
    return $slot_key;
  }

  // Gets a period from the parameter and returns the id of the block
  // Return -1 if it does not exist
  function validate_slot_id($id)
  {

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Slots where id IN ('$id')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $slot_key = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Block: " . $row["block"]. " - Passes: " . $row["passes"] . " MaxStudents: " . $row["max_students"] . "<br>";
        $slot_key = $row["id"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $slot_key;
  }

  // Gets a pass from the parameter and returns the id of the pass
  // Return -1 if it does not exist
  function validate_pass($pass)
  {

    // Connect and query the database
    make_connection();
    $sql = "SELECT * from Passes where id IN ('$pass')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

    // Loop through and find the last of id of student with the same first and last name
    $slot_key = -1;
    while($row = $result->fetch_assoc())
    {
        // echo "id: " . $row["id"]. " - Block: " . $row["block"]. " - Passes: " . $row["passes"] . " MaxStudents: " . $row["max_students"] . "<br>";
        $slot_key = $row["id"];
    }

    // returns the id the given pass
    return $slot_key;

  }


  // Gets the max number of students for a slot from the SLOTS table under "max_students"
  function get_max_passes_from_slot($slot_key)
  {
    make_connection();
    $sql = "SELECT * from Slots where ID IN ('$slot_key')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();


    // Loop through and find the last of id of student with the same first and last name
    $max = -1;
    while($row = $result->fetch_assoc())
    {
        $max = $row["max_students"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $max;
  }


  // Gets the passes from the "Passes" Column in the specified slot
  function get_passes_from_slot($slot_key)
  {
    make_connection();
    $sql = "SELECT * from Slots where ID IN ('$slot_key')";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();


    // Loop through and find the last of id of student with the same first and last name
    $passes;
    while($row = $result->fetch_assoc())
    {
        $passes = $row["passes"];
    }

    // returns the id of the last student with the same first and last name as the one on the form
    return $passes;
  }


  // Gets the number of passes in the "Passes" column in the specified slot
  // Uses "," which are inserted before every pass to count the pass number
  function get_number_passes_from_slot($slot_key)
  {
      return substr_count(get_passes_from_slot($slot_key),",");
  }


  // Returns 1 if the slot is full, but 0 if the slot is not full
  function check_slot_full($slot_key)
  {
    if (get_number_passes_from_slot($slot_key) >= get_max_passes_from_slot($slot_key))
    {
      return 1;
    }

    return 0;
  }


  /**
  * Gets accesses the sql table row of the slot_key and then adds the id of a pass to the column
 */
  function add_pass_to_slot($slot_key, $pass_id)
  {
    make_connection();
    $sql = "SELECT `passes` FROM `Slots` WHERE `id` = $slot_key";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $GLOBALS['conn']->close();

    $old_text = $result->fetch_assoc()['passes'];

    $new_passes_column = $old_text . "," . $pass_id;


    make_connection();
    $sql = "UPDATE `Slots` SET `passes` = '$new_passes_column' WHERE `Slots`.`id` = '$slot_key'";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();
  }


  /**
  * removes a pass of given ID key from the Passes table
  * removes a pass of given ID key from the sql table row of slot_key in table SLOTS
  */
  function remove_given_pass($slot_key, $pass_key)
  {
    delete_pass_from_slot($slot_key, $pass_key);
    delete_pass($pass_id);
  }

  /**
  * removes a pass of given ID key from the Passes table
  */
  function delete_pass_from_slot($slot_key, $pass_key)
  {
    make_connection();
    $sql = "SELECT `passes` FROM `Slots` WHERE `id` = $slot_key";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $GLOBALS['conn']->close();

    $old_text = $result->fetch_assoc()['passes'];
    $new_passes_column = str_replace(",".$pass_key, "", $old_text);


    make_connection();
    $sql = "UPDATE `Slots` SET `passes` = '$new_passes_column' WHERE `Slots`.`id` = '$slot_key'";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();
  }


  /**
  * Gets accesses the sql table row of the slot_key and then removes the id of a pass from the column
 */
  function delete_pass($pass_id)
  {
    make_connection();
    $sql = "DELETE FROM `Passes` WHERE `Passes`.`id` = $pass_id";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();

  }

  /*
  *  uses the specified parameters to remove a teacher from the database
  */
  function remove_teacher($fname, $lname, $email) {
    make_connection();
    $sql = "DELETE FROM `Teachers` where `firstname` IN ('$fname') AND `lastname` IN ('$lname') AND `email` IN ('$email');";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();
  }

  /*
  *  Uses the specified parameters to remove a student from the database
  */
  function remove_student($fname, $lname, $email) {
    make_connection();
    $sql = "DELETE FROM `Students` where `firstname` IN ('$fname') AND `lastname` IN ('$lname') AND `email` IN ('$email');";
    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();
  }


  /**
  * Function to find a created pass and insert its ID into the slot that it is in's pass list
  */
  function process_new_pass ($student_key, $teacher_key, $slot_key) {
    $pass_id = make_new_pass($student_key, $teacher_key, $slot_key);
    add_pass_to_slot($slot_key, $pass_id);
  }

  function sanatize_string($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }


  /**
  * Clears the pass table
  * EXAMPLE USE CASE: Can be used to clear table after a day so that the next day the table is emtpy
  */
  function empty_passes_table()
  {
    make_connection();

    $sql = 'DELETE FROM `Passes`';
    $result = mysqli_query($GLOBALS['conn'], $sql);

    $GLOBALS['conn']->close();
  }

  /**
  * Gets accesses the sql table row of the slot_key and then deletes the PASSES column in that row
  */
  function empty_passes_from_slot($slot_key)
  {
    make_connection();
    $sql = "UPDATE `Slots` SET `passes` = '' WHERE `Slots`.`id` = $slot_key";

    $result = mysqli_query($GLOBALS['conn'], $sql) or die(mysqli_error($GLOBALS['conn']));
    $GLOBALS['conn']->close();
  }


  function empty_all_passes_in_slots()
  {
    // Get Info from a table
    make_connection();
    $sql = "SELECT * FROM Slots";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $GLOBALS['conn']->close();

    // use ID for each of the blocks to clear the passes column of each
    while($row = $result->fetch_assoc())
    {
        $row_id = $row["id"];
        empty_passes_from_slot($row_id);
    }
  }

  /*
    Clears the passes in the Passes table and clears the pass ids out of the Slot table's passes column
    Can be used to reset the database at the end of the day
  */
  function reset_all_passes()
  {
    empty_all_passes_in_slots();
    empty_passes_table();
  }


  // Updates the maximum amount of students for a given slot name/block (like "E") to be what was passed in as $max_students
  function change_max_students($slot_name, $max_students)
  {
    make_connection();
    $sql = "UPDATE `Slots` SET `max_students` = $max_students WHERE `Slots`.`block` = '$slot_name'";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $GLOBALS['conn']->close();
  }
?>
