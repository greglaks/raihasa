<?php
include "connection.php";

$sql = "SELECT `val` FROM `values` WHERE `dat` = 'cu_contact_us'";
$result = $conn->query($sql);
$encode = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['val'];  
    }
} else {
    echo "0 results";
}
$conn->close();
?>