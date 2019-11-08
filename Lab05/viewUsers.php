<?php
/* Note how you can exit the php tags to add table tags as needed! */


$mysqli = new mysqli("mysql.eecs.ku.edu", "rachelelting", "XeeR9pee", "rachelelting");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
?>
<table>
<tr>
<th>Username</th>
<tr>
<?php

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
	?>
		<tr>
			<td><?=$row["user_id"]?></td>
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
