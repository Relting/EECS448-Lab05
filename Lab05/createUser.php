<?php

if ($_POST["username"] == NULL) {
echo "Username cannot be empty! Go back and try again.";
}
else{
$mysqli = new mysqli("mysql.eecs.ku.edu", "rachelelting", "XeeR9pee", "rachelelting");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('" . $mysqli->real_escape_string($_POST["username"]) . "');";

/* for debugging use: echo $query; */

if ($result = $mysqli->query($query)) {
echo "Your user was created!";
}
else{
echo "This user already exists -- go back and try again!";
}

/* for debugging use: echo $mysqli->error; */

/* close connection */
$mysqli->close();
}

?>
