<?php

if ($_POST["postText"] == NULL) {
echo "Your post cannot be empty! Go back and try again.";
}
else{
$mysqli = new mysqli("mysql.eecs.ku.edu", "rachelelting", "XeeR9pee", "rachelelting");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $mysqli->real_escape_string($_POST["postText"]) . "','" . $mysqli->real_escape_string($_POST["username"]) . "');";

/* for debugging use: echo $query; */

if ($result = $mysqli->query($query)) {
echo "Post added!";
}
else{
echo "Unable to add post, go back and make sure the user exists!";
}

/* for debugging use: echo $mysqli->error; */

/* close connection */
$mysqli->close();

}
?>
