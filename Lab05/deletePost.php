<?php
/* Note how you can exit the php tags to add table tags as needed! */


$mysqli = new mysqli("mysql.eecs.ku.edu", "rachelelting", "XeeR9pee", "rachelelting");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo "The following posts were successfully deleted: ";
?>
<br>
<?php

foreach($_POST["valueArray"] as $toDelete){

$query = "DELETE FROM Posts WHERE post_id = '" . $mysqli->real_escape_string($toDelete) . "';";

if ($result = $mysqli->query($query)) {
echo $toDelete;
?>
<br>
<?php
}

}

/* close connection */
$mysqli->close();
?>
