<?php
include_once '..\DB\connection.php';
$sql = "DELETE FROM produit WHERE refProduit='" . $_GET["refProduit"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: Pindex.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>