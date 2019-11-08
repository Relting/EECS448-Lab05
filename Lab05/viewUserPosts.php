<?php
/* Note how you can exit the php tags to add table tags as needed! */


$mysqli = new mysqli("mysql.eecs.ku.edu", "rachelelting", "XeeR9pee", "rachelelting");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM Posts WHERE author_id = '" . $mysqli->real_escape_string($_POST["selection"]) . "';";

if ($result = $mysqli->query($query)) {
?>
<table>
<tr>
<th>Posts by the selected user</th>
<tr>
<?php

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
	?>
		<tr>
			<td><?=$row["content"]?></td>
		</tr>
	<?php
    }
?>
</table>
<?php

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
