<?php
include_once '..\DB\connection.php';
$sql = "DELETE FROM client WHERE numClient='" . $_GET["numClient"] . "'";
$sql1 = "DELETE FROM commande WHERE numClient='" . $_GET["numClient"] . "'";
$sql2 = "DELETE FROM ligne_commande WHERE numClient='" . $_GET["numClient"] . "'";
$sql3 = "INSERT INTO archive SELECT * FROM commande WHERE numClient='" . $_GET["numClient"] . "'";
if (mysqli_query($conn, $sql3) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql)) {
   header("location: index.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>