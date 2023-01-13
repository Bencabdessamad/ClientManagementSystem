<?php
include_once '..\DB\connection.php';
$sql = "DELETE FROM commande WHERE numCommande='" . $_GET["numCommande"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: Cindex.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>