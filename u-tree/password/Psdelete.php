<?php
include_once '..\DB\connection.php';
$sql = "DELETE FROM admin WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: Psindex.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>