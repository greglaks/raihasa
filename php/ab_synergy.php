<?php
include "connection.php";
$sql = "SELECT `val` FROM `values` WHERE `dat` = 'about_us_synergy'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['val'];  
    }
} else {
    echo "0 results";
}
$conn->close();
?>